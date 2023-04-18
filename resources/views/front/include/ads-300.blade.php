<?php 
$setting = App\Setting::where('key', 'ads-300')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];

?>
			<?php $banner = App\Banner::where('startdate', '<', $carbon->now())->where('enddate','>', $carbon->now())->whereId($side['id'])->first(); ?>
			
			<div class="ads {{$side['title']}} widget">
				@if($banner)
				@if($banner->url != '' || $banner->url != null)
				<a target="_blank" href="{{$banner->url}}">
				@endif
					<img src="{{asset('img/banner/'.$banner->image)}}" alt="">
				@if($banner->url != '' || $banner->url != null)
				</a>
				@endif
				@endif
			</div>
