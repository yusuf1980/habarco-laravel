<?php 
$setting = App\Setting::where('key', 'widget-kecamatan')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];

	$s = $side['id'];

	$category = App\Category::where('parent_id', $s)->get();
?>
			<div class="widget widget-list-news">
				<div class="accordion-defaul">
				  <h2 class="widget-title"><span class="icon-list pull-left"></span>{{$side['title']}}</h2>
				  <div>
				    <ul class="list-unstyled">
				    	<?php $no = 1 ?>
				    	@foreach($category as $c)
				    	<li class="clearfix" style="display:block">
				    		<a href="{{url('kategori/'.$c->slug)}} ">{{$c->title}}</a>
				    	</li>
				    	<?php $no++ ?>
						@endforeach
				    </ul>
				  </div>
				</div>
			</div>