@extends('layouts.front.index')

<?php $sitename = $setting->where('key', 'sitename')->first(); ?>
@section('title', 'Berita '.$category->title.' - '.$sitename->value)

@section('content')

@section('body', '<body class="kp-blog kecamatan">')

	<?php 
	$single = $setting->where('key', 'kecamatan')->first();
	$set = unserialize($single->value);	?>

	

<div id="content" class="container clearfix">
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
	<div class="cont">

		<div class="col-area-3 pull-right">
			<div class="kp-breadcrumb">
				<ol class="breadcrumb">
				  <li><span>Kecamatan:</span></li>
				  <li class="active">{{$category->title}}</li>
				</ol>
				<span></span>
			</div>
			<div class="page-content clearfix">
				<article>
					<h4>{{$kecamatan->title}}</h4>
					@if($kecamatan->information != '' || $kecamatan->information != null)
					<?php $info = unserialize($kecamatan->information); ?>
					<div class="widget widget-lifestyle information">
						@if($kecamatan->image != '' || $kecamatan->image != null)
						<img src="{{asset('image/kabupaten/'.$kecamatan->image)}}" alt="{{$kecamatan->title}}" title="{{$kecamatan->title}}">
						@endif
						<div class="info">
							<table>
								@foreach($info as $key => $value)
								<tr>
									<td>{{$key}}</td>
									<td> : </td>
									<td>{{$value}}</td>
								</tr>
								@endforeach
							</table>
						</div>
					</div>
					@endif
					<div class="description">
						<p>
							{!! $kecamatan->description !!}
						</p>
					</div>
				</article>
			</div>
				
			<div class="list-posts clearfix">	
				<h4 style="margin-bottom:30px">Berita {{$kecamatan->title}}</h4>		
				<ul class="list-unstyled">
				@if($post->count() != 0)
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
				    			@if($p->image != '' || $p->image != null)
				    			@desktop
				    			<img src="{{asset('img/news/140x140/'.$p->image)}}" alt="{{$p->title}}" />
				    			@elsedesktop
				    			<img src="{{asset('img/news/80x80/'.$p->image)}}" alt="{{$p->title}}">
				    			@enddesktop
				    			@endif
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
				@else
						Tidak ada berita pada kategori ini.
				@endif
				</ul>
				<div class="clearfix"></div>							
				<div class="wrap-page-links clearfix">
					<ul class="page-numbers"><li>{!! $post->render() !!}</li></ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="sidebar-left pull-left">
			<div class="col-area-1 pull-left">

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

@endsection