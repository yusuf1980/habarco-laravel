@extends('layouts.front.index')

@section('content')

@section('body')<body class="kp-home">@endsection

<?php  $set = unserialize($setting->value); ?>
<div id="content" class="container clearfix">
	
	<div class="main-top pull-right">

		<div class="col-area-2 pull-left">
			@desktop
			<div class="widget top-slide">
				<div class="list_carousel">
				  <ul class="carousel-2">
				  	<?php 
				  		$no = 1;
				  		$thumblarge = [1,4];
				  		$thumbbottom = [2,5];
				  		$item = [3,6];
				  	?>
					@foreach($headpost as $head)
					@if( in_array($no, $thumblarge) )
						<?php 
							$t = $head->title;
							$d = strip_tags($head->description);
							if(strlen($d) >= 100){
								if(strlen($t) <= 25){
									$desc = strpos($d, ' ', 190);
									$desc = substr($d, 0, $desc);
								}else {
									$desc = strpos($d, ' ', 100);
									$desc = substr($d, 0, $desc);
								}
							}else {
								$desc = $d;
							}
							
						?>
				    <li class="thumb-large">
				    	<div class="item">
				    		<a href="{{url($head->slug)}}">
				    			@if(!empty($head->image))
				    			<img src="{{asset('img/news/420x210/'.$head->image)}}" alt="" />
				    			@endif
				    			<div class="mask">
				    				<span class="icon-link"></span>
				    			</div>
				    		</a>
				    		<div class="item-content">
				    			<header class="header-item">
					    			<span class="icon-image pull-left"></span>
					    			<div class="item-right">
					    				<h4><a href="{{url($head->slug)}}">{{$head->title}}</a></h4>
					    				<ul class="list-inline kp-metadata clearfix">
											<!--li class="kp-author"><span class="icon-chat pull-left"></span><a href="#">By Join</a></li-->
											<li class="kp-view"><span class="icon-calendar pull-left"></span><?php $carb = $carbon::createFromTimeStamp(strtotime($head->created_at)) ?> {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}}</li>
										</ul>
					    			</div>
					    		</header>
					    		<p><?php //echo strpos($t, ' ', 35); ?> {{$desc}} ...</p>
				    		</div>
				    	</div>
				    </li>
				    @endif
				   	@if( in_array($no, $thumbbottom) )
				   		<?php 
							$t = $head->title;
							$d = strip_tags($head->description);
							if(strlen($d) >= 50){
								if(strlen($t) <= 60  ){
									//if(strpos($t, ' ', 50) <= 50){
										$desc = strpos($d, ' ', 90);
										$desc = substr($d, 0, $desc);
									//}
								}else {
									$desc = strpos($d, ' ', 50);
									$desc = substr($d, 0, $desc);
								}
							}
							else {
								$desc = $d;
							}
						?>
				    <li class="thumb-bottom">
				    	<div class="item">	
				    		<div class="item-content">
				    			<header class="header-item">
					    			
					    			<div class="item-right">
					    				<h4><a style="font-size: 13px;" href="{{url($head->slug)}}">{{$t}}</a></h4>
					    				<ul class="list-inline kp-metadata clearfix">
											<!--li class="kp-author"><span class="icon-chat pull-left"></span><a href="#">By Join</a></li-->
											<li class="kp-view"><span class="icon-calendar pull-left"></span><?php $carb = $carbon::createFromTimeStamp(strtotime($head->created_at)) ?> {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}}</li>
										</ul>
					    			</div>
					    		</header>
					    		<p>{{$desc}} ... </p>
				    		</div>
				    		<a href="{{url($head->slug)}}">
				    			@if($head->image != '' || $head->image != null)
					    		<img src="{{asset('img/news/250x210/'.$head->image)}} " alt="" />
					    		@endif
					    		<div class="mask">
				    				<span class="icon-link"></span>
				    			</div>
				    		</a>
				    	</div>
				    </li>
				    @endif
				    @if( in_array($no, $item) )
				    	<?php 
							$t = $head->title;
							$d = strip_tags($head->description);
							if(strlen($d) >= 50){
								if(strlen($t) <= 60  ){
									//if(strpos($t, ' ', 50) <= 50){
										$desc = strpos($d, ' ', 90);
										$desc = substr($d, 0, $desc);
									//}
								}else {
									$desc = strpos($d, ' ', 50);
									$desc = substr($d, 0, $desc);
								}
							}
							else {
								$desc = $d;
							}
						?>
				    <li>
				    	<div class="item">
				    		<a href="{{url($head->slug)}}">
				    			@if($head->image != '' || $head->image != null)
					    		<img src="{{asset('img/news/250x210/'.$head->image)}}" alt="" />
					    		@endif
					    		<div class="mask">
				    				<span class="icon-link"></span>
				    			</div>
				    		</a>
				    		<div class="item-content">
				    			<header class="header-item">
					    			
					    			<div class="item-right">
					    				<h4><a style="font-size:13px;" href="{{url($head->slug)}}">{{$t}}</a></h4>
					    				<ul class="list-inline kp-metadata clearfix">
											<!--li class="kp-author"><span class="icon-chat pull-left"></span><a href="#">By Join</a></li-->
											<li class="kp-view"><span class="icon-calendar pull-left"></span><?php $carb = $carbon::createFromTimeStamp(strtotime($head->created_at)) ?> {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}}</li>
										</ul>
					    			</div>
					    		</header>
					    		<p>{{$desc}} ...</p>
				    		</div>
				    	</div>
				    </li>
				    @endif
				    <?php $no++ ?>
				    @endforeach
				    
				  </ul>
				  <a id="prev2" class="prev icon-arrow-left" href="#"></a>
				  <a id="next2" class="next icon-arrow-right" href="#"></a>
				</div>
			</div>
			@elsedesktop
			<div class="widget widget-lifestyle">
					<h2 class="widget-title clearfix">
						Head News
						<!--a href="#">View All</a>
						<span></span-->
					</h2>
					<!-- widget-title-2 -->
					<ul class="list-unstyled">
					<?php  
						$no = 1;
					?>
					@foreach($headpost as $head)
						@if($no == 1)
						<li>
							<div class="item clearfix">
					    		<a href="{{url($head->slug)}}">
					    			@if(!empty($head->image))
					    			<img src="{{asset('img/news/380x210/'.$head->image)}}" alt="" />
					    			@endif
									<div class="mask">
					    				<span class="icon-link"></span>
					    			</div>				    			
					    		</a>
					    		<div class="item-content">
					    			<header class="header-item">
						    			<!--span class="icon-image pull-left"></span-->
						    			<div class="item-right">
						    				<h4><a href="{{url($head->slug)}}">{{$head->title}}</a></h4>
						    				<ul class="list-inline kp-metadata clearfix">
												<!--li class="kp-author"><span class="icon-chat pull-left"></span><a href="#">By Join</a></li-->
												<li class="kp-view"><span class="icon-calendar pull-left"></span><?php $carb = $carbon::createFromTimeStamp(strtotime($head->created_at)) ?> {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}}</li>
											</ul>
						    			</div>
						    		</header>
						    		<!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
						    		<a href="#" class="read-more">Read more</a-->
					    		</div>
					    	</div>
					    	<!-- item -->
						</li>
						@else
						<li>
							<div class="item clearfix">
								@if(!empty($head->image))
								<a href="{{url($head->slug)}}" class="pull-left">
									<img src="{{asset('img/news/250x210/'.$head->image)}}" alt="" />
								</a>
								@endif
								<div class="item-right">
									<h4><a href="{{url($head->slug)}}">{{$head->title}}</a></h4>
								</div>
							</div>
						</li>
						@endif
						<?php $no++ ?>
						@endforeach
					</ul>
			</div>
			<!-- top slide -->
			@enddesktop
				<?php $ads_bottom_head = $set['ads-bottom-head']; ?>
				
				@foreach($ads_bottom_head as $side)
					<?php //$data = $side;
						  $d = strrpos($side, '-');
						  $frontWord = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $backWord= substr($side, $d+1);
					?>
					@include('front.include.'.$frontWord, ['value'=>$backWord])
				@endforeach
			
			<div class="news-feed pull-left">
				<div class="content posts endless-pagination" id="news" data-next-page="{{$posts->nextPageUrl()}}">
					<h2 class="widget-title clearfix">News Feed</h2>
					<ul class="list-unstyled" id="items">
						
						@foreach($posts as $p)
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
						<li class="item">
							<article class="entry-item">
								<div class="entry-thumb">
									<a href="{{url($p->slug)}}">
										@if($p->image != '' || $p->image != null)
										@desktop
										<img src="{{asset('img/news/140x140/'.$p->image)}}" alt="">
										@elsedesktop
										<img src="{{asset('img/news/80x80/'.$p->image)}}" alt="">
										@enddesktop
										@endif
									</a>
								</div>
								<div class="entry-content">
									<h4 class="entry-title">
										<a href="{{url($p->slug)}}">
										 	{{$p->title}}
										</a>
									</h4>
									<span class="ket">
										<?php $c = $p->category->first(); 
											  $carb = $carbon::createFromTimeStamp(strtotime($p->created_at));
										?>
										{{$hari[$carb->format('w')]}}, {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}} {{$carb->format('H:i') }} 
									</span>
									<p>
										{{$desc}} ...
									</p>
								</div>
							</article>
						</li>
						@endforeach
						
					</ul>
				</div>
				
				<div class="btn-loader" id="loader">
					<button id="other">Muat Artikel Lainnya</button>
				</div>
				<div class="loader">
					<img src="{{asset('f/images/loading.gif')}}" alt="">
				</div>
			</div>
			<div class="sidebar-300 pull-left" id="sidebar-300">
				<?php $ads_bottom_head = $set['sidebar-300']; ?>
				
				@foreach($ads_bottom_head as $side)
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
		<!-- col-area-2 -->
		<div class="clearfix"></div>
		
	</div>

	<div class="sidebar-left pull-left">
		<div class="col-area-1 pull-left">
				<?php $ads_bottom_head = $set['sidebar-left']; ?>
				
				@foreach($ads_bottom_head as $side)
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
				<?php $ads_bottom_head = $set['ads-middle']; ?>
				
				@foreach($ads_bottom_head as $side)
					<?php 
						  $d = strrpos($side, '-');
						  $v = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $h= substr($side, $d+1);
					?>
					@include('front.include.'.$v, ['value'=>$h])
				@endforeach
	<!-- main-top -->
	<div id="main-content">
		<div class="col-area-3 pull-left">
				<?php $ads_bottom_head = $set['col-area-3']; ?>
				
				@foreach($ads_bottom_head as $side)
					<?php 
						  $d = strrpos($side, '-');
						  $frontWord = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $backWord= substr($side, $d+1);
					?>
					@include('front.include.'.$frontWord, ['value'=>$backWord])
				@endforeach
		</div>
		
		<div class="col-area-4 pull-left">
			<?php $ads_bottom_head = $set['col-area-4']; ?>
				
				@foreach($ads_bottom_head as $side)
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
			<?php $ads_bottom_head = $set['sidebar']; ?>
				
				@foreach($ads_bottom_head as $side)
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
<script src="{{asset('f/js/imagesloaded.js')}}"></script>
@endsection
@section('singlejs')
<script>
$(document).ready(function(){
	var current_width = $(window).width();
	if(current_width >= 1241){
		var stinky 	= '#sidebar-300',
			mm 		= '.news-feed',
			uk 		= '300px',
		 	type 	= 'first';
		$('#sidebar-300').scrolle(stinky,mm,uk,type);
	
		var scroll2 = '.col-area-1',
			main 	= '.news-feed',
			u 		= '250px',
			type2	= 'first';
		$('.col-area-1').scrolle(scroll2,main,u,type2);
	
		/*var scroll3 = '#sidebar',
			main3	= '#bottom-sidebar',
			u3		= '250px',
			type3	= 'last';
		$('#sidebar').scrolle(scroll3,main3,u3,type3);
	
		var scroll3 = '.col-area-4',
			main3	= '#bottom-sidebar',
			u3		= '250px',
			type3	= 'last';
		$('.col-area-4').scrolle(scroll3,main3,u3,type3);*/
	}
	if(current_width >= 1023 && current_width <= 1240){
		var scroll2 = '.col-area-1',
			main 	= '.news-feed',
			u 		= '230px',
			type2	= 'first';
		$('.col-area-1').scrolle(scroll2,main,u,type2);

		var stinky 	= '#sidebar-300',
			mm 		= '.news-feed',
			uk 		= '250px',
		 	type 	= 'first';
		$('#sidebar-300').scrolle(stinky,mm,uk,type);

		/*var scroll3 = '#sidebar',
			main3	= '#bottom-sidebar',
			u3		= '230px',
			type3	= 'last';
		$('#sidebar').scrolle(scroll3,main3,u3,type3);
	
		var scroll3 = '.col-area-4',
			main3	= '#bottom-sidebar',
			u3		= '230px',
			type3	= 'last';
		$('.col-area-4').scrolle(scroll3,main3,u3,type3);*/
	}
	if(current_width >= 990 && current_width <= 1023){
		var scroll2 = '.col-area-1',
			main 	= '.news-feed',
			u 		= '200px',
			type2	= 'first';
		$('.col-area-1').scrolle(scroll2,main,u,type2);

		var stinky 	= '#sidebar-300',
			mm 		= '.news-feed',
			uk 		= '240px',
		 	type 	= 'first';
		$('#sidebar-300').scrolle(stinky,mm,uk,type);
	}
	if(current_width >= 900 && current_width <= 979){
		/*var stinky 	= '#sidebar-300',
			mm 		= '.news-feed',
			uk 		= '240px',
		 	type 	= 'first';
		$('#sidebar-300').scrolle(stinky,mm,uk,type);*/
	}
});
</script>
<script>
$(document).ready(function(){
	$('#other').click(function(){
		var page = $('.endless-pagination').data('next-page');

		if(page !== null) {
			$('.loader').show();
			$.get(page, function(data){
				$('.posts').append(data.posts);
				$('#news').data('next-page', data.next_page);
				$('.loader').hide();
			});
		}
		else {
			$('#other').html('Maaf, tidak ada data lagi.');
		}
	});
	

	/*function fetchPosts() {
		var page = $('#news').data('next-page');
		
		if(page !== null) {
			

			clearTimeout( $.data( this, "scrollCheck" ) );

			$.data(this, "scrollCheck", setTimeout(function() {
				var scroll_position_for_posts_load = $(window).height() + $(window).scrollTop() + 100;

				if(scroll_position_for_posts_load >= $(document).height()) {
					$.get(page, function(data){
						$('#news').append(data.posts);
						$('#news').data('next-page', data.next_page);
					});
				}
			}, 350))
		}
	}*/
})
</script>
@endsection

@endsection