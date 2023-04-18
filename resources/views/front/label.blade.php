@extends('layouts.front.index')

<?php $sitename = $setting->where('key', 'sitename')->first(); ?>
@section('title', 'Berita '.$label->title.' - '.$sitename->value)

@section('desc', $label->description)

@section('content')

@section('body')<body class="kp-blog">@endsection
<div id="content" class="container clearfix">
	<?php 
	$single = $setting->where('key', 'single')->first();
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
			<div class="kp-breadcrumb">
				<ol class="breadcrumb">
				  <li><span>Label:</span></li>
				  <li class="active">{{$label->title}}</li>
				</ol>
				<span></span>
			</div>				
			<!-- breadcrumb -->
			<div class="list-posts clearfix">				
				<ul class="list-unstyled">
					@foreach($post as $p)
					<?php
						$d = strip_tags($p->description);
						if(strlen($d) >= 220) {
							$d = strip_tags($d);
							$desc = strpos($d, ' ', 190);
							$desc = substr($d, 0, $desc);
						}else {
							$desc = $d;
						}	
					?>
					<li class="clearfix">
						<div class="item clearfix">
				    		<a href="{{url($p->slug)}}">
				    			<img src="{{asset('img/news/140x140/'.$p->image)}}" alt="{{$p->title}}" />
				    			<div class="mask">
				    				<span class="icon-link"></span>
				    			</div>
				    		</a>
				    		<div class="item-content">
				    			<header class="header-item">
					    			<span class="icon-image pull-left"></span>
					    			<div class="item-right">
					    				<h4><a href="{{url($p->slug)}}">{{$p->title}}</a></h4>
					    			</div>
					    			<div class="clearfix"></div>
					    			<ul class="list-inline kp-metadata clearfix">
										<li class="kp-author"><span class="icon-chat pull-left"></span>{{$p->user->name}}</li>
										<li class="kp-view"><span class="icon-calendar pull-left"></span>{{ $carbon::createFromTimeStamp(strtotime($p->created_at))->formatLocalized('%d %B %Y') }}</li>
									</ul>
					    		</header>
					    		<p>{{$desc}} ...</p>
					    		
				    		</div>
				    	</div>
				    	<!-- item -->
					</li>
					@endforeach
				</ul>
				<div class="clearfix"></div>							
				<div class="wrap-page-links clearfix">
					<ul class="page-numbers"><li>{!! $post->render() !!}</li></ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- list-post -->
			
		</div>
		<!-- col-area-3 -->
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
	<!-- main-content -->
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
	<!-- sidebar -->
</div>

@section('singlejs')
<script>
/*$(document).ready(function(){
  setTimeout(function(){
    var scroll4 = '.kp-blog #sidebar',
      main4 = '#bottom-sidebar',
      u4    = '300px',
      type4 = 'last';
    $('.kp-blog #sidebar').scrolle(scroll4,main4,u4,type4);
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
@endsection

@endsection