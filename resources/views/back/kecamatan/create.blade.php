@extends('layouts.back.index')

@section('title', 'Admin | Create Info Kecamatan')

@section('content')

@section('cssin')

@endsection

@section('css')

<style>
	.keterangan {
		margin-top: 10px;
	}
	.keterangan i {
		margin-right: 5px;
	}
	.delete {
		color: #a00;
	}
	.kategori .box-body {
		height: 250px;
		overflow-y: auto;
		overflow-x: hidden;
	}
	/*.kategori .nav-tabs-custom .tab-content {
		height: 250px;
		overflow-y: auto;
		overflow-x: hidden;
	}*/
	.kategori ul li {
		list-style-type: none;
	}
	.optionOne {
		padding-left: 15px;
	}
	.optionTwo {
		padding-left: 30px;
	}
	.optionThree {
		padding-left: 45px;
	}
	.input-append {
		
	}
	
	.modal .modal-body iframe{
		width: 100%;
		height: 400px;
	}
	#delete-image a{
		display: none;
	}
	.hidden-label {
		display: none;
	}
	.tambah {
		margin-top: 10px;
	}
</style>
@endsection
	<section class="content-header">
      <h1>
        Tambah Kecamatan Baru
      </h1>
    </section>

    @if (Session::has('flash_notification.message'))
		<div class="alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			{{ Session::get('flash_notification.message') }}
		</div>
	@endif

	<section class="content">
		{!! Form::open(['route' => 'kecamatans.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
    	<div class="row">
    		<div class="col-md-8">
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			        		<div class="col-lg-12">
						        <input class="form-control input-lg" id="focus" placeholder="Masukkan judul disini" name="judul" type="text" value="{{old('judul')}}" required>
						        @if ($errors->has('judul'))
								    <span class="help-block">
								        <strong>{{ $errors->first('judul') }}</strong>
								    </span>
								@endif
					     	</div>
					    </div><!--form control-->
					    <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			                <div class="col-lg-12">
								{!! Form::textarea('deskripsi', old('deskripsi'), array('class' => 'form-control', ' rows'=>15, 'id'=>'tiny')) !!}
			                    @if ($errors->has('deskripsi'))
							        <span class="help-block">
							           <strong>{{ $errors->first('deskripsi') }}</strong>
							        </span>
							    @endif
			                </div>
			            </div><!--form control-->
					</div>
					<div class="box-footer">
						<div class="pull-left">
			                <a href="{{ url('kukaradmin/kecamatans') }}" class="btn btn-warning">Batal</a>
			            </div>
			            <div class="clearfix"></div>  
				    </div>
				</div>
				<div class="box box-success">
					<div class="box-header with-border">
		                <h3 class="box-title">Gambar Map</h3>
		            </div>
		            <div class="box-body">
						<div class="input-append" id="input-append" >
						  <input name="image"  id="fieldID4" type="hidden" value="" onchange="readURL(this)">
						  <img id="blah" src="" alt="" ></img>
						  <div class="clearfix"></div>
						  <a id="modal" href="" data-toggle="modal" data-target="#myModal" style="margin-bottom: 10px;">Tambahkan Gambar Map</a>
						  <div id="delete-image" style="margin-top:10px">
								<a href="javascript:void[0]" id="delete-thumbnail">Hapus Gambar Map</a>
						  </div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-info">
		            <div class="box-body">
		            	<div class="clearfix"></div>
		            </div>
		            <div class="box-footer">
						<div class="pull-left">
							
			                <a href="{{ url('kukaradmin/kecamatans/delete') }}" class="delete">Hapus Info Kecamatan ini</a>
			                
			            </div>
			            <div class="pull-right">
			                <button type="submit" class="btn btn-primary">Simpan</button>
			            </div>
			            <div class="clearfix"></div>  	
				    </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-info">
					<div class="box-header with-border">
		                <h3 class="box-title">Informasi</h3>
		            </div>
		            <div class="box-body">
		            	<div class="clearfix"></div>
						<p>Kategori</p>
						<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
							<div class="col-sm-12">
								<select class="form-control" name="category" id="">
									<option value="">Pilih kategori</option>
									@foreach($category as $child)
										<option value="{{$child->id}}">{{$child->title}}</option>
									@endforeach
								</select>
								@if ($errors->has('category'))
									<span class="help-block">
									    <strong>{{ $errors->first('category') }}</strong>
									</span>
								@endif
							</div>
						</div><!--form control-->

						<p>Input Informasi: </p>
		            	<div class="form-group search">
			        		<div class="col-lg-12 tambah">
			        			<input style="width:85%; float:left" class="form-control" placeholder="Kunci" name="info[]" type="text" value=""><button class="btn btn-default btn-xs delete-form pull-right" onClick="return deleteForm(event)">Del</button>
						        <input class="form-control" placeholder="Nilai" name="nilai[]" type="text" value="">
					        </div>

					    </div><!--form control-->
					    <button class="btn btn-default btn-xs tambah pull-left" onClick="return tambah(event)"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Input</button>
		            </div>
		        </div>
		    </div>
			

    	</div>
    	{!! Form::close() !!}
	</section>

<div class="modal fade" id="myModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Gambar Fitur</h4>
    </div>
    <div class="modal-body">
      <iframe src="{{url('filemanager/dialog.php?type=2&field_id=fieldID4&fldr=&akey='.$coki)}}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	

@section('js')
<script type="text/javascript" src="{{ asset('b/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">	
tinymce.init({
   selector : "textarea#tiny",
   menubar: false,

   plugins : ["advlist autolink image charmap link", "searchreplace code", "media table contextmenu paste textcolor responsivefilemanager wordcount hr"],
   toolbar : "undo redo | styleselect | bold italic table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink hr | image media responsivefilemanager code | forecolor backcolor",
   
   image_advtab: true ,
   relative_urls: false, 
   
   external_filemanager_path:"{!! str_finish(asset('filemanager'),'/') !!}",
   filemanager_title        :"Manajemen Media" , // bisa diganti terserah anda
   external_plugins         : { "filemanager" : "{{ asset('filemanager/plugin.min.js') }}"},
   filemanager_access_key: "{{$coki}}" 
   
});
</script>
<script>
	function tambah(e){
		e.preventDefault();
		var parent = $(e.target).parent();
			parent.children('.search').append('<div class="col-lg-12 tambah"><input style="width:85%; float:left" class="form-control" name="info[]" type="text" value="" placeholder="Kunci"><button class="btn btn-default btn-xs delete-form pull-right" onClick="return deleteForm(event)">Del</button><input type="text" name="nilai[]" value="" class="form-control" placeholder="Nilai"></div>');
	}
	function deleteForm(e){
		var parent = $(e.target).parent();
			parent.remove();
	}
	$(document).ready(function () {
		$('#delete-thumbnail').on('click', function () {
			$('#input-append img').attr({'src': ''});
			$('#fieldID4').val('');
			$('#modal').show();
			$('#delete-thumbnail').hide();
		})
	})
	function readURL(input) {
		var value = input.value;
		$('#input-append img').attr({'src': value, width: 300});
		$('#modal').hide();
		$('#delete-image a').show();
	}
</script>
@endsection


@endsection