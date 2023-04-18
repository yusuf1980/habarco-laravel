@extends('layouts.back.index')

@section('title', 'Admin | Info Kecamatan')

@section('content')
	<style>
		.table-responsive td a {
			margin-right: 15px;
		}
	</style>
	 <section class="content-header">
      	<h1>
        	Info Kecamatan
        	<small><a href="{{url('kukaradmin/kecamatans/create')}} " class="btn btn-xs btn-default">Tambah Baru</a></small>
      	</h1>
  	</section>

  	<section class="content">
    	<div class="row">
			   <div class="col-xs-12">
          		<div class="box">
            		<div class="box-header">
              			<h3 class="box-title"></h3>

              			<div class="box-tools">
              				{!! Form::open(['route'=>'search-kecamatan','method' => 'GET']) !!}
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
               					<th>No</th>
              					<th>Judul</th>
              					<th>Kategory</th>
              					<th class="hidden-xs">Dibuat</th>
								<th>action</th>
              				</tr>
              				<?php $no = 1 ?>
              				@foreach($kecamatans as $kecamatan)
              				<tr>
              					<td>{{$no}}</td>
              					<td><a href="{{url('kukaradmin/kecamatans/'.$kecamatan->id.'/edit')}}">{{$kecamatan->title}}</a></td>
              					<td>{{$kecamatan->category->title}}</td>
		              			<td class="hidden-xs">
              						{{ $carbon->createFromTimeStamp(strtotime($kecamatan->created_at))->diffForHumans() }}
              					</td>
              					<td>
              						<a href="{{ url('kukaradmin/kecamatans/'.$kecamatan->id.'/edit')}}" class="btn btn-xs btn-primary">
	                  					<i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title data-original-title="Edit"></i>
	                  				</a>
	                  				<a href="{{ url('kukaradmin/kecamatans/delete/'.$kecamatan->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
	                  					<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Kecamatan"></i>
	                  				</a>
              					</td>
              				</tr>
              				<?php $no++ ?>
              				@endforeach
               			</table>
               		</div>
            	</div>
            </div>
        </div>
    </section>

@endsection
