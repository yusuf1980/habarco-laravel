@extends('layouts.back.index')

@section('title', 'Admin | Create Page')

@section('content')

@section('cssin')
<link rel="stylesheet" href="{{asset('b/plugins/iCheck/all.css')}}">
<link rel="stylesheet" href="{{asset('b/plugins/select2/select2.min.css')}}">
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
</style>
@endsection
	<section class="content-header">
      <h1>
        Tambah Halaman Baru
      </h1>
    </section>

    @if (Session::has('flash_notification.message'))
		<div class="alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			{{ Session::get('flash_notification.message') }}
		</div>
	@endif

	<section class="content">
		{!! Form::open(['route' => 'pages.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
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
			                <a href="{{ url('kukaradmin/pages') }}" class="btn btn-warning">Batal</a>
			            </div>
			            <div class="clearfix"></div>  
				    </div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-info">
					<div class="box-header with-border">
		                <h3 class="box-title">Publikasi</h3>
		            </div>
		            <div class="box-body">
		            	<div class="clearfix"></div>
		            	
		            	<div class="keterangan">
		            		<div class="col-md-12">
		            			<div class="form-group">
		            				<i class="fa fa-fire" aria-hidden="true"></i> Status: 
					                <label>
					                  <input type="radio" value="0" name="publish" class="minimal-red" checked>
					                  Draft
					                </label>
					                <label>
					                  <input type="radio" value="1" name="publish" class="minimal-red">
					                  Publikasi
					                </label>
				              	</div>
				            </div>
		            	</div>
		            </div>
		            <div class="box-footer">
						<div class="pull-left">
							
			                <a href="{{ url('kukaradmin/pages/delete') }}" class="delete">Hapus Halaman ini</a>
			                
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
		                <h3 class="box-title">Meta</h3>
		            </div>
		            <div class="box-body">
		            	<div class="clearfix"></div>
						
						<p>Meta Deskripsi: </p>
		            	<div class="form-group{{ $errors->has('metadescription') ? ' has-error' : '' }}">
			        		<div class="col-lg-12">
			        			{!! Form::textarea('metadescription', old('deskripsi'), array('class' => 'form-control',' rows'=>3)) !!}
						        @if ($errors->has('metadescription'))
								    <span class="help-block">
								        <strong>{{ $errors->first('metadescription') }}</strong>
								    </span>
								@endif
					        </div>
					    </div><!--form control-->
					    <p>Meta Keyword: </p>
					    <div class="form-group{{ $errors->has('metakeyword') ? ' has-error' : '' }}">
			        		<div class="col-lg-12">
						        <input class="form-control" placeholder="Meta Keyword. Contoh: berita, kaltim, dll" name="metakeyword" type="text" value="{{old('metakeyword')}}">
						        @if ($errors->has('metakeyword'))
								    <span class="help-block">
								        <strong>{{ $errors->first('metakeyword') }}</strong>
								    </span>
								@endif
					        </div>
					    </div><!--form control-->
		            </div>
		        </div>
		    </div>

    	</div>
    	{!! Form::close() !!}
	</section>

@section('js')
<script type="text/javascript" src="{{ asset('b/tinymce/tinymce.min.js') }}"></script>
<script src="{{asset('b/plugins/iCheck/icheck.min.js')}}"></script>
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
$(document).ready(function () {
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    $(".select2").select2();
});
</script>
@endsection


@endsection