@extends('layouts.front.index')

<?php $sitename = $set->where('key', 'sitename')->first(); ?>
<?php $facebook = $set->where('key', 'facebook')->first(); ?>
@section('title', $post->title)

<?php 
$des = strip_tags($post->description);
$meta_desc = substr($des, 0, 200) ?>
@if((!$post->meta_description) && $post->meta_description != null)
	@section('desc', $post->meta_description)
	@endsection
@else
	@section('desc')
	{{$meta_desc}}
	@endsection
@endif

@section('keywords', $post->meta_keyword)

@section('image')
@if(!empty('$post->image') && $post->image != null)
  <meta property="og:image" content="{{asset('img/news/380x210/'.$post->image)}}" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:width" content="380" />
  <meta property="og:image:height" content="210" />
@endif
@endsection

@section('facebook')
@if(!empty($facebook->value))
  <meta property="article:author" content="{{$facebook->value}}" />
  <meta property="article:publisher" content="{{$facebook->value}}" />
@endif
@endsection

@section('imagetwitter')
@if(!empty('$post->image') && $post->image != null)
<meta name="twitter:image" content="{{asset('news/380x210/'.$post->image)}}" />
@endif
@endsection

@section('url', url($post->slug))

@section('content')

@section('body')<body class="kp-single">@endsection

<?php $twitter = $set->where('key', 'twitter')->first(); ?>

<div id="content" class="container clearfix">
	<style>
		.content img {
			margin: 10px;
		}
	</style>
	<?php 
	$single = $set->where('key', 'single')->first();
	$set = unserialize($single->value);	?>

			<?php $ads_top = $set['ads-top']; ?>
				
				@foreach($ads_top as $side)
					<?php 
						  $d = strrpos($side, '-');
						  $frontWord = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $backWord= substr($side, $d+1);
					?>
					@include('front.include.'.$frontWord, ['value'=>$backWord])
				@endforeach
	
	<!-- main-top -->
	<div id="main-content">
	
		<div class="col-area-3 pull-left">
			<div class="page-content clearfix">	
				
				<article>
					<h4>{{$post->title}}</h4>
					<ul class="list-inline kp-metadata clearfix">
						<li class="kp-author"><span class="icon-chat pull-left"></span>{{$post->user->name}}</li>
						<li class="kp-view"><span class="icon-calendar pull-left"></span><?php $carb = $carbon::createFromTimeStamp(strtotime($post->created_at)) ?> {{$hari[$carb->format('w')]}}, {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}} {{$carb->format('H:i') }}</li>
					</ul>	
					<div class="social-sharethis-post">
						<div id="jumboShare"></div>	
						<a href="javascript: void(0)" class="btn"  id="copy-button" data-clipboard-text="{{url($post->slug)}}" title="Copy link artikel ini">
							<i class="fa fa-files-o pull-left"></i>
						</a>
					</div>
					<div class="clearfix"></div>
					<div id="alert-copy" class="alert alert-success">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Tautan telah disalin ke Clipboard</strong> 
					</div>
					<div class="clearfix"></div>
					<div class="content">
						<p>
							{!!$post->description!!}
						</p>
					</div>	
					<div class="clearfix"></div>
					
					<!-- bottom article -->
					<ul class="kp-tag list-unstyled clearfix">
						@foreach($post->category as $label)
							<li><a href="{{url('kategori/'.$label->slug)}}">{{$label->title}}</a></li>
						@endforeach
					</ul>
					
				</article>
				<div class="related-article">
					<h2><span>Artikel Terkait</span></h2>
					<ul class="list-inline">
						@if($related->count() > 0)
							@foreach($related as $r)
							<li>
								<div class="item">
									@if($r->image != '' || $r->image != null)
									@desktop
									<a href="{{$r->slug}}" class="pull-left"><img src="{{asset('img/news/80x80/'.$r->image)}}" alt="" /></a>
									@elsedesktop
									<a href="{{$r->slug}}" class="pull-left"><img src="{{asset('img/news/50x50/'.$r->image)}}" alt="" /></a>
									@enddesktop
									@endif
									<div class="item-right">
										<h5><a href="{{$r->slug}}">{{$r->title}}</a></h5>									
									</div>
								</div>
							</li>
							@endforeach
						@else
							<li>Tidak ada artikel terkait</li>
						@endif
					</ul>
				</div>
				<!-- related-article -->
				<div class="kp-comment">
					<h2><span>komentar</span></h2>
					<div id="disqus_thread"></div>
					<div class="clearfix"></div>							
				</div>
				
			</div>
			<!-- list-post -->
			
		</div>
		<!-- col-area-3 -->
		
		<!-- col-area-4 -->
		
	</div>
	<!-- main-content -->
	<div class="sidebar-300 pull-left">
			
			<?php $ads_top = $set['sidebar']; ?>
				
				@foreach($ads_top as $side)
					<?php 
						  $d = strrpos($side, '-');
						  $frontWord = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $backWord= substr($side, $d+1);
					?>
					@include('front.include.'.$frontWord, ['value'=>$backWord])
				@endforeach
		
	</div>
	<!-- sidebar -->
</div>

@section('js')
<script src="{{asset('f/js/jumboShare.js')}}"></script>
<script src="{{asset('f/js/clipboard.min.js')}}"></script>
<script id="dsq-count-scr" src="//wamet.disqus.com/count.js" async></script>
@endsection
@section('singlejs')
<script>
/*$(document).ready(function(){
  setTimeout(function(){
    var scroll4 = '.kp-single #sidebar',
      main4 = '#bottom-sidebar',
      u4    = '300px',
      type4 = 'last';
    $('.kp-single #sidebar').scrolle(scroll4,main4,u4,type4);
  }, 3000);
})
  setTimeout(function(){
    var scroll3 = '.col-area-4',
      main3 = '#bottom-sidebar',
      u3    = '250px',
      type3 = 'last';
    $('.kp-single .col-area-4').scrolle(scroll3,main3,u3,type3);
  }, 3000);*/
</script>
<script>
	$(document).ready(function(){
		$("#jumboShare").jumboShare({url:"{{url($post->slug)}}", twitterUsername: "{{$twitter->value}}" });
	});
	(function(){
		var clipboard = new Clipboard('#copy-button');

		clipboard.on('success', function(e) {
		    jQuery('#alert-copy').fadeIn();
			    setTimeout(function(){ jQuery('#alert-copy').fadeOut(); }, 3000);
			});

	})();
</script>
<script>
    (function() {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        
        s.src = '//wamet.disqus.com/embed.js';
        
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Aktifkan JavaScript untuk menampilkan <a href="https://disqus.com/?ref_noscript" rel="nofollow">komentar powered by Disqus.</a></noscript>
@endsection

@endsection