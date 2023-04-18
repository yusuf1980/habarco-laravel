@extends('layouts.back.index')

@section('title', 'Admin | Edit Banner')

@section('content')

@section('cssin')
<link rel="stylesheet" href="{{ asset('b/jquery-ui-1.11.4/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('b/css/jquery-ui-timepicker-addon.css') }}">
<style>
	.ui-widget-header {
	    color: #000;
	    font-weight: bold;
	}
	.modal .modal-body iframe{
		width: 100%;
		height: 400px;
	}
	/*#delete-image a{
		display: none;
	}*/

</style>
@endsection

	<section class="content-header">
      <h1>
        Edit Iklan
      </h1>
      
    </section>

    @if (Session::has('flash_notification.message'))
		<div class="alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			{{ Session::get('flash_notification.message') }}
		</div>
	@endif

	<section class="content">
		{!! Form::model($banner, ['route' => ['banners.update', $banner->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT', 'files'=>'true']) !!}
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header">
						<a href="{{url('kukaradmin/banners/delete/'.$banner->id)}}" class="pull-right btn btn-danger btn-sm" onClick="return delete_confirm()">Hapus Iklan</a>
					</div>
					<div class="box-body">
						<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		                    <label for="judul" class="col-sm-2 control-label">Judul</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" id="focus" placeholder="Judul" name="judul" type="text" value="{{ $banner->title }}" required>
		                         @if ($errors->has('judul'))
						            <span class="help-block">
						                <strong>{{ $errors->first('judul') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('instansi') ? ' has-error' : '' }}">
		                    <label for="instansi" class="col-sm-2 control-label">Nama Instansi</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Instansi" name="instansi" type="text" value="{{ $banner->instansi }}" required>
		                         @if ($errors->has('instansi'))
						            <span class="help-block">
						                <strong>{{ $errors->first('instansi') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                    <label for="name" class="col-sm-2 control-label">Nama Pengiklan</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama Pengiklan" name="name" type="text" value="{{ $banner->name }}">
		                         @if ($errors->has('name'))
						            <span class="help-block">
						                <strong>{{ $errors->first('name') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('suspended') ? ' has-error' : '' }}">
		                    <label class="col-lg-2 control-label">Status</label>
		                    <div class="col-lg-1">
		                        <div class="radio">
				                    <label>
				                      {!! Form::radio('published', 1, $banner->published,['id'=>'suspended']) !!}
				                      Approve
				                    </label>
				                  </div>
				                  <div class="radio">
				                    <label>
				                      {!! Form::radio('published', 0, $banner->published,['id'=>'suspended']) !!}
				                      Pending
				                    </label>
				                  </div>
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
		                    <label for="link" class="col-sm-2 control-label">Link</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Link" name="link" type="text" value="{{ $banner->url }}">
		                         @if ($errors->has('link'))
						            <span class="help-block">
						                <strong>{{ $errors->first('link') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group">
		                    <label for="name" class="col-lg-2 control-label">Tanggal Mulai</label>
		                    <div class="col-lg-4">
		                    	<?php $sdate = substr($banner->startdate,0,-9) ?>
		                    	<?php $stime = substr($banner->startdate,-9,-3) ?>
		                    	{!! Form::text('startdate', $sdate, array('id'=>'startDate', 'readonly'=>'readonly','placeholder'=>'Tanggal Mulai')) !!}
		                    	{!! Form::text('starttime', $stime, array('id'=>'startTime', 'readonly'=>'readonly', 'placeholder'=>'Waktu Mulai')) !!}
		                        {!! $errors->first('startdate', '<div class="flash alert-danger"><p>:message</p></div>') !!}
		                    </div>
		                </div><!--form control-->
		                <div class="form-group">
		                    <label for="name" class="col-lg-2 control-label">Tanggal Berakhir</label>
		                    <div class="col-lg-4">
		                    	<?php $ldate = substr($banner->enddate,0,-9) ?>
		                    	<?php $ltime = substr($banner->enddate,-9,-3) ?>
		                    	{!! Form::text('lastdate', $ldate, array('id'=>'lastDate', 'readonly'=>'readonly', 'placeholder'=>'Tanggal Berakhir')) !!}
		                    	{!! Form::text('lasttime', $ltime, array('id'=>'lastTime', 'readonly'=>'readonly', 'placeholder'=>'Waktu Berakhir')) !!}
		                        {!! $errors->first('startdate', '<div class="flash alert-danger"><p>:message</p></div>') !!}
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
		                	<label for="name" class="col-sm-2 control-label">Deskripsi</label>
			        		<div class="col-sm-10">
			        			{!! Form::textarea('deskripsi', $banner->description, array('class' => 'form-control',' rows'=>3)) !!}
						        @if ($errors->has('deskripsi'))
								    <span class="help-block">
								        <strong>{{ $errors->first('deskripsi') }}</strong>
								    </span>
								@endif
					        </div>
					    </div><!--form control-->
		                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
		                    <label for="gambar" class="col-sm-2 control-label">Gambar</label>
		                    <div class="col-sm-10">
		                        <div class="input-append" id="input-append" >
		                        	@if($banner->image != '' || $banner->image != null)
		                        		<img id="blah" src="{{asset('img/banner/'.$banner->image)}}" alt="" ></img>
		                        	@endif
								  <input name="gambarbefore"  id="fieldID4" type="hidden" value="{{asset('img/banner/'.$banner->image)}}">
								  <!--img id="blah" src="" alt="" ></img>
								  <div class="clearfix"></div>
								  <a id="modal" href="" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="margin-bottom: 10px;">Tambahkan Thumbnail Gambar</a-->
								  
								  <input id="filegambar" type="file" name="gambar">

								  <div id="delete-image" style="margin-top:10px">
										<a href="javascript:void[0]" id="delete-thumbnail">Hapus Gambar Thumbnail</a>
								  </div>
								  
								</div>
		                         @if ($errors->has('gambar'))
						            <span class="help-block">
						                <strong>{{ $errors->first('gambar') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
					</div>
					<div class="box box-info">
			            <div class="box-body">
			                <div class="pull-left">
			                    <a href="{{ url('kukaradmin/banners') }}" class="btn btn-warning">Batal</a>
			                </div>

			                <div class="pull-right">
			                    <input type="submit" class="btn btn-success" value="Simpan" />
			                </div>
			                <div class="clearfix"></div>
			            </div><!-- /.box-body -->
			        </div><!--box-->
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</section>

@section('js')
<script src="{{ asset('b/jquery-ui-1.11.4/jquery-ui.min.js') }}"></script>
<script src="{{ asset('b/js/jquery-ui-timepicker-addon.js') }}"></script>
<script>
	$(document).ready(function(){
		$('#startDate,#lastDate').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
		});
		
	});	
	$(document).ready(function(){
		$('#startTime,#lastTime').timepicker({
			timeFormat: "HH:mm",
		});
		
	});	
	function readURL(input) {
		var value = input.value;
		$('#input-append img').attr({'src': value});
		$('#modal').hide();
		$('#delete-image a').show();
		
	}
	$(document).ready(function () {
	$('#delete-thumbnail').on('click', function () {
		$('#input-append img').attr({'src': ''});
		$('#fieldID4').val('');
		$('#delete-thumbnail').hide();
	})
})
</script>
@endsection

@endsection