<?php 
$setting = App\Setting::where('key', 'widget-tab-news')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];

$s = $side['id'];
$c = App\Category::find($s);
$post = App\Post::whereHas('category', function($q) use ($s) {
	$q->whereId($s)->orWhere('parent_id', $s);
})->take($side['count'])->orderBy('id','desc')->get(); 
?>
@if($side['id'] !== '')
			<div class="widget widget-tab-news clearfix">
				<div class="pull-left">
					<h2 class="widget-title clearfix">
						@if($side['title'] != '')
							{{$side['title']}}
						@else
							{{$c->title}}
						@endif
						<a href="#">View All</a>
						<span></span>
					</h2>
					
					<ul>
						<?php $no = 1; ?>
						@foreach($post as $p)
					    <li>
						    <a href="#tabs-{{$no}}">
							    <div class="item clearfix">
							    	@if($p->image != '' || $p->image != null)
									<img src="{{asset('img/news/50x50/'.$p->image)}}" alt="" class="pull-left" />
									@endif
									<div class="item-right">
										<h4>{{$p->title}}</h4>
										
									</div>
								</div>
							</a>
						</li>
						<?php $no++ ?>
					    @endforeach
					</ul>
				</div>
				
				<div class="pull-right">
					<?php $no = 1; ?>
					@foreach($post as $p)
					<?php 
						$d = strip_tags($p->description);
						if(strlen($d) >= 140) {
							$desc = strpos($d, ' ', 150);
							$desc = substr($d, 0, $desc);
						}else {
							$desc = $d;
						}
					?>
					<div id="tabs-{{$no}}">
						<div class="item clearfix">
				    		<a href="{{url($p->slug)}}">
				    			@if($p->image != '' || $p->image != null)
				    			<img src="{{asset('img/news/380x210/'.$p->image)}}" alt="" />
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
					    				<ul class="list-inline kp-metadata clearfix">
											<!--li class="kp-author"><span class="icon-chat pull-left"></span><a href="#">By Join</a></li-->
											<li class="kp-view"><span class="icon-calendar pull-left"></span>
												<?php $carb = $carbon::createFromTimeStamp(strtotime($p->created_at)) ?> {{$carb->format('j')}} {{$bulan[$carb->format('n')]}} {{$carb->format('Y')}}
											</li>
										</ul>
					    			</div>
					    		</header>
					    		<p>{{ $desc }} ...</p>
					    		<a href="{{url($p->slug)}}" class="read-more">Read more</a>
				    		</div>
				    	</div>
				    	
					</div>
					<?php $no++ ?>
					@endforeach
					
				</div>
				
			</div>
@endif