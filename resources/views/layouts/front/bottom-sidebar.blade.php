<?php $logo = $setting->where('key','sitename')->first(); 
   $slogan = $setting->where('key','slogan')->first(); 
   $desc = $setting->where('key','description')->first();
   $contact = $setting->where('key','contact-us')->first();
   $facebook = $setting->where('key','facebook')->first();
   $twitter = $setting->where('key','twitter')->first();
   $google = $setting->where('key','google-plus')->first();
   $instagram = $setting->where('key','instagram')->first();
   $setcat = $setting->where('key', 'footer-kategori')->first();
?>
<div id="bottom-sidebar">
	<div class="container clearfix">
		<div class="col-area-5">
			<div id="logo">
				<a href="{{url('/')}}" class="bottom-logo">
					<!--img src="images/logo.png" alt="" /-->
					
					<span class="headlogo">{{$logo->value}}</span>
					<span class="desclogo">{{$slogan->value}}</span>
				</a>
			</div>
			<div class="widget widget-text">
				{!!$desc->value!!}
			</div>
			<!-- widget-text -->
		</div>
		<!-- col-area-5 -->
		<?php $setcatvalue = unserialize($setcat->value) ?>
		<div class="col-area-6">
			<div class="widget widget_categories">
				<h2 class="widget-title">{{$setcatvalue['kategori-1']['name']}}</h2>
				<ul class="list-unstyled">
					@foreach($cat1 as $c1)
					<li>
						<a href="{{url('kategori/'.$c1->slug)}}">{{$c1->title}}</a>
					</li>
					@endforeach
				</ul>
			</div>
			<!-- widget-flickr -->
		</div>
		<!-- col-area-6 -->
		<div class="col-area-7">
			<div class="widget widget_categories">
				<h2 class="widget-title">{{$setcatvalue['kategori-2']['name']}}</h2>
				<ul class="list-unstyled">
					@foreach($cat2 as $c1)
					<li>
						<a href="{{url('kategori/'.$c1->slug)}}">{{$c1->title}}</a>
					</li>
					@endforeach
				</ul>
			</div>
			<!-- widget-cat -->
		</div>
		<!-- col-area-7 -->
		<div class="col-area-8">
			<div class="widget widget_pages">
				<h2 class="widget-title">Halaman</h2>
				<ul class="list-unstyled">					
					@if($second->count() > 0)
			      		@foreach($second as $s)
			      			<li>
								<a href="{{url($s->url)}}">{{$s->title}}</a>
							</li>
			      		@endforeach
			      	@endif
				</ul>
			</div>
			<!-- widget-cat -->
		</div>
		<!-- col-area-8 -->
		<div class="col-area-9">
			<div class="widget widget-contact">
				<h2 class="widget-title">contact us</h2>
				<div class="widget-content">
					<?php $cont = unserialize($contact->value) ?>
					<span>{{$cont['name']}}</span>
					<ul class="list-unstyled">
						@if($cont['address'] != '')
						<li class="clearfix"><span class="icon-location pull-left"></span> 
							{{$cont['address']}} 
						</li>
						@endif
						@if($cont['telp'] != '')
						<li class="clearfix"><span class="icon-phone pull-left"></span> 
							{{$cont['telp']}}
						</li>
						@endif
						@if($cont['email'] != '')
						<li class="clearfix"><span class="icon-mail pull-left"></span>
							{{$cont['email']}}
						</li>
						@endif
					</ul>
				</div>
			</div>
			<!-- widget contact -->
		</div>
		<!-- col-area-9 -->
	</div>
	<!-- container -->
</div>
<footer id="page-footer">
	<div class="container">
		<p class="copy-right pull-left"> Copyright 2016 - <a href="{{url('/')}}"><span>{{$logo->value}}</span></a>.  All Rights Reserved</p>
		<ul class="pull-right list-inline">
			@if($facebook->value != '')
			<li><a target="_blank" href="{{url($facebook->value)}}" class="icon-facebook"></a></li>
			@endif
			@if($twitter->value != '')
			<li><a target="_blank" href="{{url($twitter->value)}}" class="icon-twitter"></a></li>
			@endif
			@if($google->value != '')
			<li><a target="_blank" href="{{url($google->value)}}" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
			@endif
			@if($instagram->value != '')
			<li><a target="_blank" href="{{url($instagram->value)}}" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			@endif
		</ul>
	</div>
</footer>