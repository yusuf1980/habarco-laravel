@extends('layouts.back.index')

@section('title', 'Admin | Banners')

@section('content')

<style>
	.banner {
		margin-bottom: 30px;
	}
	.banner img {
		width: 140px;
		height: 140px;
		float: left;
		margin-right: 10px;
	}
	@media(max-width: 767px){
		.banner img {
			width: 100%;
			height: auto;
		}
	}
	.banner span {
		margin-left: 10px;
	}
	
</style>

	<section class="content-header">
      	<h1>
        	Iklan
        	<small><a href="{{url('kukaradmin/banners/create')}} " class="btn btn-xs btn-default">Tambah Baru</a></small>
      	</h1>
  	</section>

  	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
				<div class="box">
            		<div class="box-header">
              			<h3 class="box-title"></h3>

              			<div class="box-tools">
              				{!! Form::open(['route'=>'search-banners','method' => 'GET']) !!}
                			<div class="input-group input-group-sm" style="width: 150px;">
                	
	                  			<input type="text" name="s" class="form-control pull-right" placeholder="Search">

	                  			<div class="input-group-btn">
	                    			<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  			</div>
	                
                			</div>
                			{!! Form::close() !!}
              			</div>
            		</div>
					@if (Session::has('flash_notification.message'))
                    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {{ Session::get('flash_notification.message') }}
                    </div>
               		@endif

               		<div class="box-body">
						<div class="row">
							<?php $i = 1; ?>
							@foreach($banners as $banner)
							<div class="col-md-6">
								<div class="banner">
								@if($banner->image != '' || $banner->image != null)
									<a href="{{url('kukaradmin/banners/'.$banner->id.'/edit')}}"><img src="{{asset('img/banner/thumbnail/'.$banner->image)}}" alt="{{$banner->title}}"></a>
								@endif
									<div class="desc">
										<div class="title">
											<h4><a href="{{url('kukaradmin/banners/'.$banner->id.'/edit')}}">{{$banner->title}}</a></h4>
										</div>
										<div class="instansi">
											Instansi: {{$banner->instansi}}
											<span>Nama:</span> <span>{{$banner->name}}</span>
										</div>
										@if($banner->startdate != null && $banner->enddate != null)
											<?php $dt = $carbon->now();
													$dt2 = $carbon->createFromTimeStamp(strtotime($banner->enddate)); 
													$hari = $dt->diffInDays($dt2);

													$min = $carbon->createFromTimeStamp(strtotime($banner->enddate))->startOfDay();
													$hour = $min->diffInHours($dt2);
													$jam = 24 - $hour;

													$start = $carbon->createFromTimeStamp(strtotime($banner->startdate));
													$end = $carbon->createFromTimeStamp(strtotime($banner->enddate));
													$total = $start->diffInDays($end);
													
													$startval = $start->diffInDays($dt);

											?>
											@if($banner->published == 1 && $carbon->now() >= $start && $dt2 > $carbon->now()  )
											<div style="margin-bottom: 10px">
												Sisa: 
												<span> 
													@if($hari != 0)
														{{$dt2->diffForHumans()}}
													@endif
													
													@if($hour != 0)
														@if($hari > 0)
														@else
															@if($dt->diffInHours($dt2) >= 1)
															<span class="label label-warning">{{$dt2->diffForHumans()}}</span>
															@else
															<span class="label label-danger">{{$dt2->diffForHumans()}}</span>
															@endif
														@endif
													@endif
													.
												</span>
												@if($hari > 0)
												Progress Sisa: 
												<span class="badge bg-red">
													<?php $persen = $hari / $total * 100; ?>
													{{intval($persen)}}%
												</span>
												@endif
											</div>
											@if($hari > 0)
											<div class="progress progress-xs">
						                      	<div class="progress-bar progress-bar-danger" style="width: {{intval($persen)}}%"></div>
						                    </div>
						                    @endif
						                    @else
						                    	@if($start > $dt)
													Mulai: {{$start->diffForHumans()}}
													<br>
													Selesai: {{$end->format('j F Y H:i')}}
												@elseif($dt > $dt2)
													Iklan telah <span class="label label-danger">habis</span>
						                    	@endif
						                    	<br><br>
						                    @endif
					                    @endif
										<div class="status">
											Status: 
											@if($banner->published == 0)
												 <span class="label label-warning">Pending</span>
											@elseif($banner->published == 1)
												 <span class="label label-success">Approved</span>
											@endif
											@if($banner->startdate != null && $banner->enddate != null)
											<span>Jangka Waktu:</span>
											<span> 
												<?php 
													if($hari != 0){
														echo $total. ' hari ';
													}else {
														echo $hour. ' jam';
													}
													
												?>
											</span>
											@endif
										</div>
										
									</div>
								</div>
							</div>
							 @if($i/2 == 1) 
							 	<div class="clearfix"></div>
							 @endif
							
							<?php $i++ ?>
							@endforeach
						</div>
               		</div>
				</div>
			</div>
		</div>
	</section>


@endsection