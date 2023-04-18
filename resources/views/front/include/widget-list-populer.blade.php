<?php 
$setting = App\Setting::where('key', 'widget-list-populer')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];
if($side['count'] != ''){
	$count = (int) $side['count'];
}else {
	$count = 10;
}

$popularity = new App\Functions\Popularity();
$post = $popularity->getStats('thirty_days_stats', 'DESC', 'App\Post')->take($count)->get();

//$post = App\Post::take($side['count'])->orderBy('view','desc')->get();

?>
					<div class="widget widget-list" id="widget-list">
						<h2 class="widget-title">
							<span class="icon-list pull-left"></span>
							@if($side['title'] != '' || $side['title'] != null)
								{{$side['title']}}
							@else
								Artikel Populer
							@endif
						</h2>
						<div>
						    <ul class="list-unstyled">
						    	<?php $no=1 ?>
						    	@foreach($post as $p)
						    	<li class="clearfix">
						    		<span><i>{{$no}}</i></span><a href="{{url($p->trackable->slug)}}">{{$p->trackable->title}}</a>
						    	</li>
						    	<?php $no++ ?>
						    	@endforeach
						    </ul>
						</div>
					</div>