<?php 

$setting = App\Setting::where('key', 'widget-news')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];

$s = $side['id'];
$c = App\Category::find($s);
$post = App\Post::whereHas('category', function($q) use ($s) {
	$q->whereId($s)->orWhere('parent_id', $s);
})->take($side['count'])->orderBy('id','desc')->get(); 
?>
		@if($side['id'] != '')	
			<div class="widget widget-news">
				<h2 class="widget-title" {{!empty($c->color)?'style=background-color:#'.$c->color:''}}>
					<span class="icon-list pull-left"></span> 
					@if($side['title'] != '')
						{{$side['title']}}
					@else
						{{$c->title}}
					@endif
				</h2>
				<div class="widget-content">
					<ul class="list-unstyled">
						@foreach($post as $p)
						<li>
							<div class="item clearfix">
								@if($p->image != '' || $p->image != null)
								<a href="{{url($p->slug)}}" class="pull-left"><img src="{{asset('img/news/50x50/'.$p->image)}}" alt="" /></a>
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
			</div>
		@endif
