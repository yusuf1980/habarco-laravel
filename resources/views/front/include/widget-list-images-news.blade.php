<?php 
$setting = App\Setting::where('key', 'widget-list-images-news')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];
if($side['count'] != ''){
	$count = (int) $side['count'];
}else {
	$count = 10;
}
$popularity = new App\Functions\Popularity();
$post1 = $popularity->getStats('thirty_days_stats', 'DESC', 'App\Post')->take($count)->get();
$post2 = App\Post::take($side['count'])->orderBy('id','desc')->get();
?>
		<div class="widget widget-list-images-news">
			<div class="accordion-defaul">
			  <h2 class="widget-title" {{!empty($c->color)?'style=background-color:#'.$c->color:''}}><span class="icon-notebook pull-left"></span>popular article</h2>
			  <div>
			    <ul class="list-unstyled">
			    	@foreach($post1 as $p)
						<li>
							<div class="item clearfix">
								@if($p->trackable->image != '' || $p->trackable->image != null)
								<a href="{{url($p->trackable->slug)}}" class="pull-left"><img src="{{asset('img/news/50x50/'.$p->trackable->image)}}" alt="" /></a>
								@endif
								<div class="item-right">
									<h4><a href="{{url($p->trackable->slug)}}">{{$p->trackable->title}}</a></h4>
								</div>
							</div>
						</li>
					@endforeach
					</ul>
			  </div>
			  <h2 class="widget-title"><span class="icon-chat pull-left"></span>Terbaru</h2>
			  <div>
			    <ul class="list-unstyled">
					@foreach($post2 as $p)
						<li>
							<div class="item clearfix">
								@if($p->image != '' || $p->image != null)
								<a href="{{url($p->slug)}}" class="pull-left"><img src="{{asset('img/news/50x50/'.$p->image)}}" alt="" /></a>
								@endif
								<div class="item-right">
									<h4><a href="{{url($p->slug)}}">{{$p->title}}</a></h4>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			  </div>
			</div>
		</div>