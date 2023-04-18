@extends('layouts.back.index')

@section('title', 'Admin | Pages')

@section('content')
	<style>
		.table-responsive td a {
			margin-right: 15px;
		}
	</style>
	 <section class="content-header">
      	<h1>
        	Halaman
        	<small><a href="{{url('kukaradmin/pages/create')}} " class="btn btn-xs btn-default">Tambah Baru</a></small>
      	</h1>
  	</section>

  	<section class="content">
    	<div class="row">
			   <div class="col-xs-12">
          		<div class="box">
            		<div class="box-header">
              			<h3 class="box-title"></h3>

              			<div class="box-tools">
              				{!! Form::open(['route'=>'search-pages','method' => 'GET']) !!}
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

               		<div class="box-body table-responsive no-padding">
               			<table class="table table-hover">
               				<tr>
              					<th>Judul</th>
              					<th>Penulis</th>
              					<th>Status</th>
              					<th class="hidden-xs">Dibuat</th>
								<th>view</th>
								<th>action</th>
              				</tr>
              				@foreach($pages as $page)
              				<tr>
              					<td><a href="{{url('kukaradmin/pages/'.$page->id.'/edit')}}">{{$page->title}}</a></td>
              					<td>{{$page->user->name}}</td>
              					<td>
              						@if($page->published == 0)
		                            	<span class="draft">Draft</span>
		                         	@else
		                            	<span class="publish">Publikasi</span>
		                          	@endif
		              			</td>
		              			<td class="hidden-xs">
              						{{ $carbon->createFromTimeStamp(strtotime($page->created_at))->diffForHumans() }}
              					</td>
              					<td>
              						{{$page->view}}
              					</td>
              					<td>
              						<a href="{{ url('kukaradmin/pages/'.$page->id.'/edit')}}" class="btn btn-xs btn-primary">
	                  					<i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title data-original-title="Edit"></i>
	                  				</a>
	                  				<a href="{{ url('kukaradmin/pages/delete/'.$page->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
	                  					<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Halaman"></i>
	                  				</a>
              					</td>
              				</tr>
              				@endforeach
               			</table>
               		</div>
            	</div>
            </div>
        </div>
    </section>

@endsection
