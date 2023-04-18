<?php 
   $facebook = $setting->where('key','facebook')->first();
   $twitter = $setting->where('key','twitter')->first();
   $google = $setting->where('key','google-plus')->first();
   $instagram = $setting->where('key','instagram')->first();
?>
			<div class="widget widget-social">
				<ul class="list-unstyled clearfix">
					<!--li><a href="#" class="pull-left"><span class="icon-feed"></span></a></li-->
					@if($twitter->value != '')
					<li><a target="_blank" href="{{url($twitter->value)}}" class="pull-left"><span class="icon-twitter"></span></a></li>
					@endif
					@if($facebook->value != '')
					<li><a target="_blank" href="{{url($facebook->value)}}" class="pull-left"><span class="icon-facebook"></span></a></li>
					@endif
					@if($google->value != '')
					<li><a target="_blank" href="{{url($google->value)}}" class="pull-left"><span class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></span></a></li>
					@endif
					@if($instagram->value != '')
					<li><a target="_blank" href="{{url($instagram->value)}}" class="pull-left"><span class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></span></a></li>
					@endif
				</ul>
			</div>
			<!-- widget-social -->