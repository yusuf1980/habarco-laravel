@extends('layouts.back.index')

@section('title', 'Admin | Second Menu')

@section('content')

@section('cssin')
<link rel="stylesheet" href="{{asset('b/jquery-ui-1.11.4/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('b/plugins/iCheck/all.css')}}">
<link rel="stylesheet" href="{{asset('b/plugins/select2/select2.min.css')}}">

@endsection
<style>
	.listg ul li {
		list-style-type: none;
	}
	.listg .form-group {
		height: 170px;
		overflow-y: auto;
		overflow-x: hidden;
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
	
	  .portlet {
	    margin: 0 1em 1em 0;
	    padding: 0.3em;
	  }
	  .portlet-header {
	    padding: 0.2em 0.3em;
	    margin-bottom: 0.5em;
	    position: relative;
	  }
	  /*.portlet-toggle {
	    position: absolute;
	    top: 50%;
	    right: 0;
	    margin-top: -8px;
	  }*/
	  .portlet-content {
	    padding: 0.4em;
	  }
	  .portlet-placeholder {
	    border: 1px dotted black;
	    margin: 0 1em 10px 0;
	    height: 42px;
	    width: 100%;
	  }
	.box-body .box {
		margin-bottom: 10px;
	}
	.collapsed-box {
		cursor: move;
	}
	.overlay {
		display: none;
	}
	.overlay-link {
		display: none;
	}
	.overlay-category {
		display: none;
	}
</style>
	<section class="content-header">
      <h1>
        Top Menu
      </h1>
    </section>

    @if (Session::has('flash_notification.message'))
		<div class="alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			{{ Session::get('flash_notification.message') }}
		</div>
	@endif

	<section class="content">
		<div class="row">
    		<div class="col-md-4">
				<div class="box box-solid">
		            <div class="box-header with-border">
		              <!--h3 class="box-title">Collapsible Accordion</h3-->
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		              	<div class="box-group" id="accordion">
		                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
		                	<div class="panel box box-primary">
		                  		<div class="box-header with-border">
		                    		<h4 class="box-title">
		                      		<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
		                        	Halaman
		                      		</a>
		                    		</h4>
		                  		</div>
			                  	<div id="collapseOne" class="panel-collapse collapse in">
				                    <div class="box-body listg">
				                     	<div class="form-group">
								            <ul>
								            	<li>
								            		<label>
								            			<input name="home" type="checkbox" class="minimal" value="/">
								            			Home
								            		</label>
								            	</li>
								            	<li>
								            		<label>
								            			<input name="contact" type="checkbox" class="minimal" value="contact/contact-us">
								            			Contact Us
								            		</label>
								            	</li>
								            	@foreach($pages as $page)
								            	<li>
									            	<label>
											            <input name="page" type="checkbox" class="minimal" value="{{$page->id}}">
											            {{$page->title}}
											        </label>
										        </li>
										        @endforeach
								            </ul>
								        </div>
				                    </div>
				                    <div class="overlay">
						              <i class="fa fa-refresh fa-spin"></i>
						            </div>
				                    <div class="box-footer">
				                    	<div class="pull-right">
											<button class="btn btn-default" id="page">Tambah ke Menu</button>
				                    	</div>
				                    </div>
			                  	</div>
		                	</div>
		                	<div class="panel box box-danger">
		                  		<div class="box-header with-border">
		                    		<h4 class="box-title">
		                      			<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
		                        		Link
		                      			</a>
		                    		</h4>
		                  		</div>
		                  		<div id="collapseTwo" class="panel-collapse collapse">
		                    		<div class="box-body ">
		                      			<div class="form-group">
							    			<label for="url">URL</label>
							    			<input type="text" class="form-control" id="url" value="http://" placeholder="Alamat Link">
							  			</div>
							  			<div class="form-group">
							    			<label for="nameLink">Teks Link</label>
							    			<input type="text" class="form-control" id="nameLink" placeholder="Nama Link">
							  			</div>
		                    		</div>
		                    		<div class="overlay">
						              <i class="fa fa-refresh fa-spin"></i>
						            </div>
		                    		<div class="box-footer">
		                    			<div class="pull-right">
											<button class="btn btn-default" id="custom">Tambah ke Menu</button>
		                    			</div>
		                    		</div>
		                  		</div>
		                	</div>
		                	<div class="panel box box-success">
		                  		<div class="box-header with-border">
		                    		<h4 class="box-title">
		                      			<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
		                        		Kategori
		                      			</a>
		                    		</h4>
		                  		</div>
		                  		<div id="collapseThree" class="panel-collapse collapse">
		                    		<div class="box-body listg">
		                    			
		                      			<div class="form-group">
						            		<ul>
								            	@foreach($categories as $category)
								            	@if(empty($category->parent))
								            	<li>
									            	<label>
											            <input name="category" type="checkbox" class="minimal" value="{{$category->id}}">
											            {{$category->title}}
											        </label>
										        </li>
										        @endif
										        	@foreach($category->childs as $child)
														<li class="optionOne">
											            	<label>
													            <input name="category" type="checkbox" class="minimal" value="{{$child->id}}">
													            {{$child->title}}
													        </label>
												        </li>
												        @foreach($child->childs as $childs)
															<li class="optionTwo">
												            	<label>
														            <input name="category" type="checkbox" class="minimal" value="{{$child->id}}">
														            {{$child->title}}
														        </label>
													        </li>
													        @foreach($child->childs as $child)
																<li class="optionThree">
													            	<label>
															            <input name="category" type="checkbox" class="minimal" value="{{$child->id}}">
															            {{$child->title}}
															        </label>
														        </li>
												        	@endforeach
											        	@endforeach
										        	@endforeach
										        @endforeach
						            		</ul>
						        		</div>
						        		
		                    		</div>
		                    		<div class="overlay">
						              <i class="fa fa-refresh fa-spin"></i>
						            </div>
		                    		<div class="box-footer">
		                    			<div class="pull-right">
											<button class="btn btn-default" id="category">Tambah ke Menu</button>
		                    			</div>
		                    		</div>
		                  		</div>
		                	</div>
		              	</div>
		            </div>
		            <!-- /.box-body -->
		         </div>
			</div><!-- end col-md-4 -->
			{!! Form::open(['url' => 'kukaradmin/secondmenu/update', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
			<div class="col-md-8">
				<div class="box box-danger">
					<div class="box-header with-border">
		                <h3 class="box-title">Struktur Menu</h3><span class="pull-right"><input class="btn btn-primary" type="submit" value="Simpan"></span>
		            </div>
					<div class="box-body">
						
						<div class="col-md-8 boc">
							@foreach($menus as $menu)
							<div class="box box-default collapsed-box box-solid" id="box">
					            <div class="box-header with-border">
					              	<h5 class="box-title">{{$menu->title}}</h5> 
					              	@if($menu->format == 'category')
					              		<span>(Kategori)</span>
					              	@elseif($menu->format == 'page')
					              		<span>(Halaman)</span>
					              	@else
					              		<span>(Custom)</span>
					              	@endif

					              	<div class="box-tools pull-right">
					                	<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"> OPEN</i></button>
					              	</div>
					            </div>
					            <div class="box-body">
					            	
					            	<input type="hidden" value="{{$menu->id}}" name="id[]" class="id">
					            	<input type="hidden" value="{{$menu->format}}" name="format[]">
					            	<input type="hidden" value="{{$menu->type}}" id="type">
					            	@if($menu->format == 'category' || $menu->format == 'page')
					            		<input type="hidden" value="{{$menu->url}}" name="url[]">
					            	@endif
					            	@if($menu->format == 'custom')
					            	<div class="col-sm-12">
					              		URL
					              		<div class="clearfix"></div>
					              		<input type="text" name="url[]" value="{{$menu->url}}" placeholder="Nama">
					              	</div>
					            	@endif
					              	<div class="col-sm-6">
					              		Nama
					              		<div class="clearfix"></div>
					              		<input type="text" name="nama[]" value="{{$menu->title}}" placeholder="Nama">
					              	</div>
					              	<div class="col-sm-6">
					              		Tittle Attribute
					              		<div class="clearfix"></div>
					              		<input type="text" name="titleattribute[]" value="{{$menu->title_attr}}" placeholder="Title Attribute">
					              	</div>
					              	<div class="col-sm-6" style="margin-top:10px">
					              		<a href="javascript: void[0]" class="hapus" style="color:red;">Hapus</a>
					              	</div>
					              	
					            </div>    
					        </div>
					        
					        @endforeach
					    </div>
					    <p>Klik, tahan, dan pindahkan menu sesuai urutan yang anda inginkan. Klik icon plus di sebelah kanan untuk pengaturan lebih lanjut.</p>
					    <p><i>Title Attribute:</i> Keterangan yang muncul ketika kursor berada pada Nama menu tersebut.</p>
				    </div>
				</div>
			</div><!-- end col-md-8 -->
			{!! Form::close() !!}
		</div><!-- end row -->
	</section>

@section('js')
<script src="{{asset('b/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('b/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('b/jquery-ui-1.11.4/jquery-ui.min.js')}}"></script>
<script src="{{asset('b/js/jquery.ui.touch-punch.js')}}"></script>
<script>
	$(document).ready(function () {
		$('.box').on('click', '.hapus', function (e) {
			e.preventDefault();
			var x = $(e.target).parent().parent().parent();
			var id = $(this).parent('div').parent('div').children('.id').val();
			 $.ajax({
				url: "{{ url('kukaradmin/menu/delete') }}",
				data: {id: id},
				dataType: 'json',
				cache: false,
				success: function(data){
					if(data.result == 'success'){
						x.remove();
					}
				}
			});
			
		});
	});
	$(document).ready(function () {
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	      checkboxClass: 'icheckbox_minimal-blue',
	      radioClass: 'iradio_minimal-blue'
	    });
	});
	$( function() {
	    $( ".boc" ).sortable({
	        connectWith: ".collapsed-box",
	        handle: ".box-header",
	        cancel: ".portlet-toggle",
	        placeholder: "portlet-placeholder ui-corner-all",
	        sort: function(event, ui) {
                var $target = $(event.target);
                if (!/html|body/i.test($target.offsetParent()[0].tagName)) {
                    var top = event.pageY - $target.offsetParent().offset().top - (ui.helper.outerHeight(true) + 80 / 2);
                    ui.helper.css({'top' : top + 'px'});
                }
            }
	    });
	 
	    $( ".portlet" )
	      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
	      .find( ".box-header" )
	        .addClass( "ui-widget-header ui-corner-all" )
	        .prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
	 
	    $( ".portlet-toggle" ).on( "click", function() {
	      var icon = $( this );
	      icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
	      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
	    });
	 });
	$(document).ready(function () {
		$('#page').on('click', function () {
			var data = $('input[name=page]:checked').serializeArray();
			var type = $('#type').val();
			var home = $('input[name=home]:checked').val();
			var contact = $('input[name=contact]:checked').val();

			//if(data.length < 1){
			//	alert('Silahkan centang pilihan anda terlebih dahulu.');
			//}else {
				$('.overlay').show();
				$.ajax({
					url: "{{url('kukaradmin/menu/ajaxpage')}}",
					data: {page: data, type:type, home:home, contact:contact},
					dataType: 'json',
					cache: false,
					success: function(data) {
						var append = "";	
						for(var i=0;i<data.length;i++){
							append += '<div class="box box-default collapsed-box box-solid" id="box"><div class="box-header with-border">';
							append += '<h5 class="box-title">'+data[i].title+'</h5><span> (Halaman)</span>';
							append += '<div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button></div>';
							append += '</div>';
							append += '<div class="box-body">';
							append += '<input type="hidden" value="'+data[i].id+'" name="id[]" class="id"><input type="hidden" value="'+data[i].format+'" name="format[]"><input type="hidden" value="'+data[i].url+'" name="url[]">';
							append += '<div class="col-sm-6">Nama<div class="clearfix"></div><input type="text" name="nama[]" value="'+data[i].title+'" placeholder="Nama"></div>';
							append += '<div class="col-sm-6">Tittle Attribute<div class="clearfix"></div><input type="text" name="titleattribute[]" value="'+data[i].title_attr+'" placeholder="Title Attribute"></div>';
							append += '<div class="col-sm-6" style="margin-top:10px"><a href="" class="hapus" style="color:red;">Hapus</a></div>';
							append += '</div></div>';
						}
										
						$(".boc").append(append);

						//console.log(data);

						$('.overlay').hide();
					},
					error: function() {
				        alert('Terjadi error. Ulangi lagi.');
				        $('.overlay').hide();
				    },  
				});
				
			//}
		});
	});
	$(document).ready(function () {
		$('#custom').on('click', function () {
			var url = $('#url').val();
			var name = $('#nameLink').val();
			var type = $('#type').val();
			if(url == '' || name == ''){
				alert('Url dan nama harus diisi!');
			}
			else if(!url.match(/^(?:http:\/\/|www)/) && !url.match(/^(?:https:\/\/|www)/)) {
			  alert('Url harus dimulai dengan http:// atau https://');
			}
			else if(name.length <= 3) {
				alert('Nama harus lebih dari 3 karakter');
			}
			else {
				$('.overlay').show();
				$.ajax({
					url: "{{url('kukaradmin/menu/ajaxlink')}}",
					data: {url: url, type:type, name:name},
					dataType: 'json',
					cache: false,
					success: function(data) {
						var append = "";	
						for(var i=0;i<data.length;i++){
							append += '<div class="box box-default collapsed-box box-solid" id="box"><div class="box-header with-border">';
							append += '<h5 class="box-title">'+data[i].title+'</h5><span> (Custom)</span>';
							append += '<div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button></div>';
							append += '</div>';
							append += '<div class="box-body">';
							append += '<input type="hidden" value="'+data[i].id+'" name="id[]" class="id"><input type="hidden" value="'+data[i].format+'" name="format[]"><div class="col-sm-12">URL<div class="clearfix"></div><input type="text" name="url[]" value="'+data[i].url+'" placeholder="Nama"></div>';
							append += '<div class="col-sm-6">Nama<div class="clearfix"></div><input type="text" name="nama[]" value="'+data[i].title+'" placeholder="Nama"></div>';
							append += '<div class="col-sm-6">Tittle Attribute<div class="clearfix"></div><input type="text" name="titleattribute[]" value="'+data[i].title_attr+'" placeholder="Title Attribute"></div>';
							append += '<div class="col-sm-6" style="margin-top:10px"><a href="" class="hapus" style="color:red;">Hapus</a></div>';
							append += '</div></div>';
						}
										
						$(".boc").append(append);

						//console.log(data);

						$('.overlay').hide();
					},
					error: function() {
				        alert('Terjadi error. Ulangi lagi.');
				        $('.overlay').hide();
				    },
				});
			}
			
		});
	});
	$(document).ready(function () {
		$('#category').on('click', function () {
			var category = $('input[name=category]:checked').serializeArray();
			var type = $('#type').val();

			
				$('.overlay').show();
				$.ajax({
					url: "{{url('kukaradmin/menu/ajaxcategory')}}",
					data: {category: category, type:type},
					dataType: 'json',
					cache: false,
					success: function(data) {
						var append = "";	
						for(var i=0;i<data.length;i++){
							append += '<div class="box box-default collapsed-box box-solid" id="box"><div class="box-header with-border">';
							append += '<h5 class="box-title">'+data[i].title+'</h5><span> (Kategori)</span>';
							append += '<div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i> OPEN</button></div>';
							append += '</div>';
							append += '<div class="box-body">';
							append += '<input type="hidden" value="'+data[i].id+'" name="id[]" class="id"><input type="hidden" value="'+data[i].format+'" name="format[]"><input type="hidden" value="'+data[i].url+'" name="url[]">';
							append += '<div class="col-sm-6">Nama<div class="clearfix"></div><input type="text" name="nama[]" value="'+data[i].title+'" placeholder="Nama"></div>';
							append += '<div class="col-sm-6">Tittle Attribute<div class="clearfix"></div><input type="text" name="titleattribute[]" value="'+data[i].title_attr+'" placeholder="Title Attribute"></div>';
							append += '<div class="col-sm-6" style="margin-top:10px"><a href="" class="hapus" style="color:red;">Hapus</a></div>';
							append += '</div></div>';
						}
										
						$(".boc").append(append);
						
						$('.overlay').hide();
					},
					error: function() {
				        alert('Terjadi error. Refresh halaman dan Ulangi lagi.');
				        $('.overlay').hide();
				    },  
				});
				
		});
	});
</script>
@endsection

@endsection