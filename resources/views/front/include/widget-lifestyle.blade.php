<?php
$setting = App\Setting::where('key', 'widget-lifestyle')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];

if($side['id'] !== ''){
	$s = $side['id'];
	$j = $side['count'] - 1;
	$c = App\Category::find($s);
	$post = App\Post::whereHas('category', function($q) use ($s) {
		$q->whereId($s);
	})->skip(1)->take($j)->orderBy('id','desc')->get(); 
	$first = App\Post::whereHas('category', function($q) use ($s) {
		$q->whereId($s);
	})->orderBy('id','desc')->first(); 
}
?>
			@if($side['id'] !== '')
				<div class="widget widget-lifestyle">
					<h2 class="widget-title clearfix">
						@if($side['title'] != '')
							{{$side['title']}}
						@else
							{{$c->title}}
						@endif
						<a href="#">View All</a>
						<span></span>
					</h2>
					<!-- widget-title-2 -->
					<ul class="list-unstyled">
						<li>
							<div class="item clearfix">
					    		<a href="{{url($first->slug)}}">
					    			@if($first->image != '' || $first->image != null)
					    			@desktop
					    			<img src="{{asset('img/news/250x210/'.$first->image)}}" alt="" />
					    			@elsedesktop
					    			<img src="{{asset('img/news/380x210/'.$first->image)}}" alt="" />
					    			@enddesktop
									<div class="mask">
					    				<span class="icon-link"></span>
					    			</div>		
					    			@endif		    			
					    		</a>
					    		<div class="item-content">
					    			<header class="header-item">
						    			<!--span class="icon-image pull-left"></span-->
						    			<div class="item-right">
						    				<h4><a href="{{url($first->slug)}}">{{$first->title}}</a></h4>
						    				<ul class="list-inline kp-metadata clearfix">
												<!--li class="kp-author"><span class="icon-chat pull-left"></span><a href="#">By Join</a></li-->
												<li class="kp-view"><span class="icon-calendar pull-left"></span><?php $carb = $carbon::createFromTimeStamp(strtotime($first->created_at)) ?> {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}}</li>
											</ul>
						    			</div>
						    		</header>
						    		<!--p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
						    		<a href="#" class="read-more">Read more</a-->
					    		</div>
					    	</div>
					    	<!-- item -->
						</li>
						@foreach($post as $p)
						<li>
							<div class="item clearfix">
								@if($p->image != '' || $p->image != null)
								<a href="{{url($p->slug)}}" class="pull-left"><img src="{{asset('img/news/250x210/'.$p->image)}}" alt="" /></a>
								@endif
								<div class="item-right">
									<h4><a href="{{url($p->slug)}}">{{$p->title}}</a></h4>
									<!--ul class="list-inline kp-metadata clearfix">
										<li class="kp-time">10 Sep 2013</li>
										<li class="kp-view"><span class="icon-eye pull-left"></span>50 View</li>
									</ul-->
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			@endif