

<header id="header-page">
	
	<div class="top-menu">
		@desktop	
		<div id="nav">
			<ul class="tabs primary-nav">
				@if($top->count() > 0)
					@foreach($top as $t)
						<li class="tabs__item">
							@if($t->format == 'category')
							<?php $cat =  App\Category::where('title', $t->title)->orWhere('title', $t->title_attr)->first(); 
								if(!empty($cat)) $color = 'style=background-color:#'. $cat->color;
								else $color = '';
							?>
							<a {{$color}} class="tabs__link {{ Request::is($t->url)?'active':'' }}" href="{{url($t->url)}}" title="{{$t->title_attr}}">{{$t->title}}</a>
							@else
							<a class="tabs__link {{ Request::is($t->url)?'active':'' }}" href="{{url($t->url)}}" title="{{$t->title_attr}}">{{$t->title}}</a>
							@endif
						</li>
					@endforeach
				@endif
			</ul>
		</div>
		@else
		<div id="nav-mobile">
			<select onchange="location = this.value;">
				<option value="" selected>Pilih Kategori</option>
				<option value="{{url('/')}}">Home</option>
				@if($top->count() > 0)
					@foreach($top as $t)
						<option value="{{url($t->url)}}">{{$t->title}}</option>
					@endforeach
				@endif
			</select>
		</div>
		@enddesktop
	</div>
	
  	<div class="top-header">
  		<div class="container">
	  		<div id="logo">
	  			<a href="{{url('/')}}"><!--img src="images/logo.png" alt="logo" /--> 
	  				<?php $logo = $setting->where('key','sitename')->first(); ?>
	  				<?php $slogan = $setting->where('key','slogan')->first(); ?>
					<span class="headlogo">{{$logo->value}}</span>
					<span class="desclogo">{{$slogan->value}}</span>
	  			</a>
	  		</div>
	  		<nav class="pull-right">
	  			@desktop
	  			<ul class="sf-menu" id="main-menu">
			      @if($second->count() > 0)
			      	@foreach($second as $s)
			      		<li {{ Request::is($s->url)?'class=current-item-menu':'' }}>
			      			<a title="{{$s->title_attr}}" href="{{url($s->url)}}">{{$s->title}}</a>
			      		</li>
			      	@endforeach
			      		@if (Auth::guest())
			      		@else
			      			<li {{ Request::is($s->url)?'class=current-item-menu':'' }}>
				      			<a href="{{url('kukaradmin/dashboard')}}">Admin</a>
				      		</li>
			      			<li>
			      				<a href="{{url('kukaradmin/logout')}}">Log Out</a>
			      			</li>
			      		@endif

			      @endif
			    </ul>
			    @enddesktop
			   
			    <div id="mobile-menu">
			          <span>Menu</span>
			          <ul id="toggle-view-menu">
			          	  @if($second->count() > 0)
					      	@foreach($second as $s)
					      		  <li class="clearfix">
					                  <h3><a href="{{url($s->url)}}">{{$s->title}}</a></h3>
					              </li>
					      	@endforeach
					      	@can('contributor')
					      		  <li class="clearfix">
					      		  	  <h3><a href="{{url('kukaradmin/dashboard')}}">Admin</a></h3>
					      		  </li>
					      	@endcan
					      	@if (Auth::guest())
				      		@else
				      			<li class="clearfix">
				      				<h3><a href="{{url('kukaradmin/logout')}}">Log Out</a></h3>
				      			</li>
				      		@endif
					      @endif                   
			          </ul><!--toggle-view-menu-->
			    </div><!--mobile-menu-->
			    
	  		</nav>
	  		<div class="clearfix"></div>
  		</div>
  		<!-- container -->
  	</div>

  	<!-- top-header -->
  	<div class="bottom-header">
  	<div class="container">
  		<div class="top-news pull-left">
  			<span>TOPIK SPESIAL</span>
  			<div class="list_carousel">
			  <ul class="carousel-1">
			  	@foreach($breaking as $b)
			  		<li><a href="{{url($b->slug)}}">{{$b->title}} ...</a></li>
			  	@endforeach
			  </ul>
			  <div class="clearfix"></div>
			</div>
			
  		</div>
  		<!-- top news -->
		<div class="search-box pull-right">
			{!! Form::open(['action'=>['HomeController@search'],'method' => 'GET','role'=>'search']) !!}
			
				<div class="form-group">					
					<input type="text" name="s" class="form-control" onblur="if (this.value == '')
            this.value = this.defaultValue;" onfocus="if (this.value == this.defaultValue)
            this.value = '';" value="Search..." />
				</div>
				<button type="submit"><span class="icon-search"></span></button>
			{!! Form::close() !!}
		</div>
		</div>
  		<!-- container -->
  	</div>
  	<!-- bottom-header -->
</header>

