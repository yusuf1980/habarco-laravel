<?php
$setting = App\Setting::where('key', 'widget-facebook')->first(); 
$set = unserialize($setting->value);
$side = $set[$value];
?>
		@if($side['id'] !== '')
		<div class="widget widget-facebook">
			<h2 class="widget-title"><span class="icon-thumbs-up2 pull-left"></span>LIKE US ON FACEBOOK</h2>

			<!--iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F{{--$side['page']--}}&amp;height={{--$tinggi--}}&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:{{--$tinggi--}}px;" allowtransparency="true"></iframe-->
			<div class="fb-page" data-href="https://www.facebook.com/{{$side['id']}}" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/{{$side['id']}}" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/{{$side['id']}}">Facebook</a></blockquote></div>
		</div>
		@endif