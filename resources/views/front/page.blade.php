@extends('layouts.front.index')

<?php $sitename = $setting->where('key', 'sitename')->first(); ?>
@section('title', $page->title)

@section('desc', $page->meta_description)
@section('keywords', $page->meta_keyword)

@section('content')

@section('body')<body class="kp-blog">@endsection

<?php $twitter = $setting->where('key', 'twitter')->first(); ?>

<div id="content" class="container clearfix">
	<?php 
	$single = $setting->where('key', 'category')->first();
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

	<div id="main-content">
		<div class="col-area-3 pull-right">
			<div class="kp-breadcrumb">
				<ol class="breadcrumb">
				  <li><span>Halaman:</span></li>
				  <li class="active">{{$page->title}}</li>
				</ol>
				<span></span>
			</div>
			<div class="page-content clearfix">	
				<article>
					<h4>{{$page->title}}</h4>
					<div class="social-sharethis-post">
						<div id="jumboShare"></div>	
						<a href="javascript: void(0)" class="btn"  id="copy-button" data-clipboard-text="{{url('page/'.$page->slug)}}" title="Copy link artikel ini">
							<i class="fa fa-files-o pull-left"></i>
						</a>
						<!--img src="{{--asset('img/news/420x210/'.$page->image)--}}" alt="" /-->

						<div class="clearfix"></div>
					</div>
					<p>
						<!--img class="pull-left" src="{{$page->image}}" alt="{{$page->title}}"-->
						
							{!!$page->description!!}
					</p>
					<div class="clearfix"></div>
				</artickle>
			</div>
		</div>
		<div class="col-area-4 pull-left">
			
			<?php $ads_top = $set['sidebar-left']; ?>
				
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

	</div>
	<div id="sidebar" class="pull-left">
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

</div>

@section('js')
<script src="{{asset('f/js/jumboShare.js')}}"></script>
<script src="{{asset('f/js/clipboard.min.js')}}"></script>
@endsection
@section('singlejs')
<script>
	$(document).ready(function(){
		$("#jumboShare").jumboShare({url:"{{url('page/'.$page->slug)}}", twitterUsername: "{{$twitter->value}}" });
	});
	(function(){
		var clipboard = new Clipboard('#copy-button');

		clipboard.on('success', function(e) {
		    jQuery('#alert-copy').fadeIn();
			    setTimeout(function(){ jQuery('#alert-copy').fadeOut(); }, 3000);
			});

	})();
</script>

@endsection

@endsection