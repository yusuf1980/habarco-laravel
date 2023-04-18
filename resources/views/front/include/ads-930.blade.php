<?php 
$setting = App\Setting::where('key', 'ads-930')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];

?>
			@if($side['format'] == 'choose')
			<?php $banner = App\Banner::where('startdate', '<', $carbon->now())->where('enddate','>', $carbon->now())->whereIn('id', $side['id'])->orderByRaw('RAND()')->take(1)->get(); ?>

			<div class="ads ads-930">
				@if($banner)
				@foreach($banner as $b)
				@if($b->url != '' || $b->url != null)
				<a target="_blank" href="{{$b->url}}">
				@endif
					@if($b->image != '' || $b->image != null)
					<img src="{{asset('img/banner/'.$b->image)}}" alt="">
					@endif
				@if($b->url != '' || $b->url != null)
				</a>
				@endif
				@endforeach
				@endif
			</div>
			@else
			<div class="ads ads-930">
				{!!$side['id']!!}
			</div>
			@endif