@extends('layouts.back.index')

@section('title', 'Admin | Edit News')

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
	@if($post->image == '' || $post->image == null)
	#delete-image a{
		display: none;
	}
	@endif
	.hidden-label {
		display: none;
	}
	@media (min-width: 992px){
		.kanan {
			float: right;
		}
	}
	

	
</style>
@endsection
	<section class="content-header">
      <h1>
        Tambah Berita Baru
      </h1>
    </section>

    @if (Session::has('flash_notification.message'))
		<div class="alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			{{ Session::get('flash_notification.message') }}
		</div>
	@endif
	
	<section class="content">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT', 'files'=>true]) !!}
    	<div class="row">
			<div class="col-md-8">
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			        		<div class="col-lg-12">
						        <input class="form-control input-lg" id="focus" placeholder="Masukkan judul disini" name="judul" type="text" value="{{$post->title}}" required>
						        @if ($errors->has('judul'))
								    <span class="help-block">
								        <strong>{{ $errors->first('judul') }}</strong>
								    </span>
								@endif
					        </div>
					    </div><!--form control-->
					    <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			                <div class="col-lg-12">
								{!! Form::textarea('deskripsi', $post->description, array('class' => 'form-control', ' rows'=>15, 'id'=>'tiny')) !!}
			                    @if ($errors->has('deskripsi'))
							        <span class="help-block">
							           <strong>{{ $errors->first('deskripsi') }}</strong>
							        </span>
							    @endif
			                </div>
			            </div><!--form control-->
			            @can('author')
			            <p>*Ukuran Upload khusus Gambar sebaiknya dibawah 4MB</p>
			            <br>
			            <p>Meta Deskripsi: Bersifat opsional, sebagai SEO untuk deskripsi berita ini pada mesin pencari. </p>
			            <div class="form-group{{ $errors->has('metadescription') ? ' has-error' : '' }}">
			        		<div class="col-lg-12">
			        			{!! Form::textarea('metadescription', $post->meta_description, array('class' => 'form-control',' rows'=>3)) !!}
						        @if ($errors->has('metadescription'))
								    <span class="help-block">
								        <strong>{{ $errors->first('metadescription') }}</strong>
								    </span>
								@endif
					        </div>
					    </div><!--form control-->
					    <p>Meta Keyword: Bersifat opsional, sebagai SEO untuk kata kunci berita ini pada mesin pencari. Gunakan koma (,) untuk memisahkan kata kunci.</p>
					    <div class="form-group{{ $errors->has('metakeyword') ? ' has-error' : '' }}">
			        		<div class="col-lg-12">
						        <input class="form-control" placeholder="Meta Keyword. Contoh: berita, kaltim, dll" name="metakeyword" type="text" value="{{$post->meta_keyword}}">
						        @if ($errors->has('metakeyword'))
								    <span class="help-block">
								        <strong>{{ $errors->first('metakeyword') }}</strong>
								    </span>
								@endif
					        </div>
					    </div><!--form control-->
					    @endcan
					</div>
					<div class="box-footer">
						<div class="pull-left">
			                <a href="{{ url('kukaradmin/posts') }}" class="btn btn-warning">Batal</a>
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
		            	@can('editor')
		            	<div class="keterangan">
		            		<div class="col-md-12">
		            			<div class="form-group">
		            				<i class="fa fa-fire" aria-hidden="true"></i> Status: 
					                <label>
					                  <input type="radio" value="0" name="publish" class="minimal-red" {{ $post->published==0? 'checked': '' }}>
					                  Draft
					                </label>
					                <label>
					                  <input type="radio" value="1" name="publish" class="minimal-red" {{ $post->published==1? 'checked': '' }}>
					                  Publikasi
					                </label>
				              	</div>
				            </div>
		            		<p>
		            			
							</p>
		            		<div class="col-md-12">
			            		<div class="form-group">
				            		<label>
					                  <input name="headnews" class="flat-red" type="checkbox" {{ $post->headnews==1? 'checked': '' }}> Headnews
					                </label>
				            	</div>
			            	</div>
			            	<div class="col-md-12">
			            		<div class="form-group">
				            		<label>
					                  <input name="breaking" class="breaking" type="checkbox" {{ $post->breaking==1? 'checked': '' }}> Breaking News (Teks Berjalan)
					                </label>
				            	</div>
			            	</div>
		            	</div>
		            	@endcan
		            </div>
		            <div class="box-footer">
		            	@can('editor')
						<div class="pull-left">
			                <a href="{{ url('kukaradmin/posts/delete/'.$post->id) }}" class="delete" onclick="return delete_confirm()">Hapus berita ini</a>
			            </div>
			            @endcan
			            <div class="pull-right">
			                <button type="submit" class="btn btn-primary">Simpan</button>
			            </div>
			            <div class="clearfix"></div>  	
				    </div>
				</div>
			</div>
			@can('author')
			<div class="col-md-4 kategori">
				<div class="box box-warning">
					<div class="box-header with-border">
		                <h3 class="box-title">Kategori</h3>
		            </div>
		            <div class="box-body" id="kategori">
		            	<!--div class="nav-tabs-custom">
				            <ul class="nav nav-tabs">
				              <li class="active"><a href="#tab_1" data-toggle="tab">Semua Kategori</a></li>
				              <li><a href="#tab_2" data-toggle="tab">Sering Digunakan</a></li>
				             </ul>
				            <div class="tab-content">
				              <div class="tab-pane active" id="tab_1"-->
				              <div class="form-group">
				              	<ul>
				              		<?php $categorypost =  $post->category()->pluck('id'); ?>
				              		<?php $id = []; 
													foreach($post->category as $c){
														$id[] = $c->id;
													}
												?>
				              	@foreach($categories as $category)
				              		@if(empty($category->parent))
				                	<li>
				                		<label>
						                  
						                  <input name="category[]" type="checkbox" class="minimal" value="{{$category->id}}" {{ in_array($category->id, $id) ? 'checked': '' }}>
						                  
						                </label>
				                		{{$category->title}}
				                	</li>
				                	@endif
				                	@foreach($category->childs as $child)
				                		<li class="optionOne">
					                		<label>
							                  <input name="category[]" type="checkbox" class="minimal" value="{{$child->id}}" {{ in_array($child->id, $id) ? 'checked': '' }}>
							                </label>
					                		{{$child->title}}
					                	</li>
					                	@foreach($child->childs as $child)
					                		<li class="optionTwo">
						                		<label>
								                  <input name="category[]" type="checkbox" class="minimal" value="{{$child->id}}" {{ in_array($child->id, $id) ? 'checked': '' }}>
								                </label>
						                		{{$child->title}}
						                	</li>
						                	@foreach($child->childs as $child)
						                		<li class="optionThree">
							                		<label>
									                  <input name="category[]" type="checkbox" class="minimal" value="{{$child->id}}" {{ in_array($child->id, $id) ? 'checked': '' }}>
									                </label>
							                		{{$child->title}}
							                	</li>
						                	@endforeach
					                	@endforeach
				                	@endforeach
				              	@endforeach
				              	</ul>
				              </div>

				            <!--/div>
				            <div class="tab-pane" id="tab_2">
				            	testing
				            </div>
				          </div-->
		            </div>
		            <div class="box-footer">
		            	@can('editor')
						<div class="pull-left">
			                <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus-circle" aria-hidden="true"></i>Tambah Kategori Baru</a>
			                <div class="collapse col-md-12" id="collapseExample"><br>
							  	<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
				                    <div class="col-xs-12 col-lg-12">
				                        <input id="name-category" class="form-control" placeholder="Nama" type="text" value="{{ old('nama') }}" onkeypress="notsubmit(event)">
				                         @if ($errors->has('nama'))
								            <span class="help-block">
								                <strong>{{ $errors->first('nama') }}</strong>
								            </span>
								        @endif
				                    </div>
				                </div><!--form control-->
				                <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
									<div class="col-xs-12 col-md-12">
										<select id="parent" class="form-control select2" style="width:100%">
											<option value="">-- Induk Kategori --</option>
											@foreach($categories as $category)
												@if(empty($category->parent))
													<option value="{{$category->id}}">{{$category->title}}</option>

													@foreach($category->childs as $child)
														<option class="optionChild" value="{{$child->id}}">{{$child->title}}</option>
														@foreach($child->childs as $child)
															<option class="optionChildtwo" value="{{$child->id}}">{{$child->title}}</option>
															
															@foreach($child->childs as $child)
																<option class="optionChildthree" disabled="disabled">{{$child->title}}</option>
															@endforeach
															
														@endforeach
													@endforeach
												@endif
											@endforeach
										</select>
										@if ($errors->has('category'))
								            <span class="help-block">
								                <strong>{{ $errors->first('category') }}</strong>
								            </span>
								        @endif
									</div>
									<div class="col-md-12" style="margin-top:10px;">
										<a href="javascript:void[0]" id="add-category" class="btn btn-default">Tambah Kategori Baru</a>
									</div>
									
								</div>
							</div>

			            </div>
			            <div class="clearfix"></div>  	
			            @endcan
				    </div>
				</div>
			</div>
			<div class="col-md-4" id="addLabel">
				<div class="box box-danger">
					<div class="box-header with-border">
		                <h3 class="box-title">Label</h3>
		            </div>
		            <div class="box-body">
		            	<div class="col-md-12">
			            	<div class="form-group">
				                <label>Label</label>
				                <select class="form-control select2" multiple="multiple" name="label[]" data-placeholder="Pilih Label">
				                	<?php $idlabel = []; 
													foreach($post->label as $c){
														$idlabel[] = $c->id;
													}
												?>
				                	@foreach($labels as $label)
				                		<option value="{{$label->id}}" {{ in_array($label->id, $idlabel) ? 'selected=selected': '' }}>{{$label->title}}</option>
				                	@endforeach
				                </select>
				            </div>
				            
			            </div>
		            </div>
		            <div class="box-footer">
		            	@can('editor')
		            	<div class="col-md-12">
		            		<a href="javascript: void[0]" id="show-label">Tambah Label</a>
				            <a class="hidden-label" id="a-label" href="javascript: void[0]">Batal</a>
				            <div class="form-group hidden-label">
								<input id="add-label" class="form-control" placeholder="Tambah Label? Input disini" type="text" value="" onkeypress="notsubmit(event)">
								<a href="javascript:void[0]" id="button-label" class="btn btn-default btn-sm" style="margin-top:10px">Tambah Label</a>
						    </div><!--form control-->
						</div>
						@endcan
		            </div>
		        </div>
		    </div>
		    
		    <div class="col-md-4 kanan">
				<div class="box box-success">
					<div class="box-header with-border">
		                <h3 class="box-title">Thumbnail Gambar</h3>
		            </div>
		            <div class="box-body">
						<div class="input-append" id="input-append" >
						  <input name="image"  id="fieldID4" type="hidden" value="{{$post->image != '' || $post->image != null ? asset('img/news/380x210/'.$post->image) : ''}}" onchange="readURL(this)">
						  @if($post->image != '' || $post->image != null)
						  <img class="img-responsive" id="blah" src="{{asset('img/news/380x210/'.$post->image)}}" alt="" ></img>
						  @else
						  <img class="img-responsive" id="blah" src="" alt="" ></img>
						  @endif
						  <div class="clearfix"></div>
						  <a id="modal" href="" data-toggle="modal" data-target="#myModal" style="margin-bottom: 10px;">Tambahkan Thumbnail Gambar</a>
						  <div id="delete-image" style="margin-top:10px">
								<a href="javascript:void[0]" id="delete-thumbnail">Hapus Gambar Thumbnail</a>
						  </div>
						  <p>*Sebaiknya tidak menggunakan gambar berdiri untuk thumbnail ini.</p>
						</div>
					</div>
				</div>
			</div>
			@endcan
			
    	</div>
    	{!! Form::close() !!}
		
		
    </section>
@can('author')
<div class="modal fade" id="myModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Gambar Fitur</h4>
    </div>
    <div class="modal-body">
    	
      <iframe src="{{url('filemanager/dialog.php?type=2&field_id=fieldID4&fldr=&akey='.$coki)}}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
      <!--iframe src="{{--url('kukaradmin/filemanager')--}}" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe-->
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	
@endcan

@section('js')
<script type="text/javascript" src="{{ asset('b/tinymce/tinymce.min.js') }}"></script>
<script src="{{asset('b/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('b/plugins/select2/select2.full.min.js')}}"></script>
<script type="text/javascript">	
tinymce.init({
   selector : "textarea#tiny",
   menubar: false,

   @can('author')
   plugins : ["advlist autolink image charmap link", "searchreplace code", "media table contextmenu paste textcolor responsivefilemanager wordcount hr"],
   toolbar : "undo redo | styleselect | bold italic table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link unlink hr | image media responsivefilemanager code | forecolor backcolor",
   @else
   plugins : ["advlist autolink image charmap link", "searchreplace code", "table contextmenu paste textcolor wordcount hr"],
   toolbar : "undo redo | styleselect | bold italic table | alignleft aligncenter alignright alignjustify | bullist numlist | link unlink hr | ",
   @endcan
   
   image_advtab: true ,
   relative_urls: false, 

   @can('author')
   external_filemanager_path:"{!! str_finish(asset('filemanager'),'/') !!}",
   filemanager_title        :"Manajemen Media" , // bisa diganti terserah anda
   external_plugins         : { "filemanager" : "{{ asset('filemanager/plugin.min.js') }}"},
   filemanager_access_key: "{{$coki}}" 
   @endcan
});
</script>
<script>
$(document).ready(function () {
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    $('input[type="checkbox"].breaking, input[type="radio"].breaking').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    $(".select2").select2();
});
</script>
@can('author')
<script>
	function notsubmit(event) {
		if(event.keyCode == 13){
			event.preventDefault();
		}
	}
	function readURL(input) {
		var value = input.value;
		$('#input-append img').attr({'src': value, width: 300});
		$('#modal').hide();
		$('#delete-image a').show();

		/*if(input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah')
					.attr('src', e.target.result)
					.width(300)
					.height(200);
			}

			reader.readAsDataURL(input.files[0])
		}*/
	}

$(document).ready(function () {
	$('#delete-thumbnail').on('click', function () {
		$('#input-append img').attr({'src': ''});
		$('#fieldID4').val('');
		$('#modal').show();
		$('#delete-thumbnail').hide();
	})

})
$(document).ready(function () {
	$('#add-category').on('click', function () {
		var category = $('#name-category').val().trim();
		var parent = $('#parent').val();
		if(category == '' || category.length < 3){
			alert('Kategori harus diisi dan minimal 3 karakter');
		}
		else {
			$.ajax({
				url: "{{url('kukaradmin/ajaxcategory')}}",
				data: {category: category, parent: parent},
				dataType: 'json',
				cache: false,
				success: function(data){
					if(data.status == 'error'){
						alert(data.message);
					}else {
						$('#kategori ul').prepend('<li><label><input name="category[]" checked type="checkbox" class="minimal" value="'+data.id+'"></label> '+data.name+'</li>')
						$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
					      checkboxClass: 'icheckbox_minimal-blue',
					      radioClass: 'iradio_minimal-blue'
					    });
						$('#name-category').val('');
						$('#parent').val('');
					}
				}
										
			});
		}
	});
});
$(document).ready(function () {
	$('#show-label').on('click', function(){
		$('.hidden-label').show();
		$('#show-label').hide();
	})
	$('#a-label').on('click', function(){
		$('.hidden-label').hide();
		$('#show-label').show();
	})
	/*$('#add-label').on('keyPress', function (event) {
		if(event.keyCode == 13) {
			event.preventDefault();
		}
	});*/
	$('#button-label').on('click', function () {
		var label = $('#add-label').val().trim();
		if(label == '' || label.length < 3){
			alert('Label harus diisi dan minimal 3 karakter');
		}else {
			$.ajax({
				url: "{{url('kukaradmin/ajaxlabel')}}",
				data: {label: label},
				dataType: 'json',
				cache: false,
				success: function(data){
					if(data.status == 'error'){
						alert(data.message);
					}else {
						$('#addLabel select').prepend('<option selected value="'+data.id+'">'+data.name+'</option>');
						$(".select2").select2();
						$('#add-label').val('');
					}
					
				}
										
			});
		}
	});
});
</script>
@endcan

@endsection

@endsection