@extends('layouts.back.index')

@section('title', 'Admin | Categories')

@section('content')

@section('style')
<style>
	.optionChild {
	    padding-left: 30px;
	}
	.optionChildtwo {
		padding-left: 60px;
	}
	.optionChildthree {
		padding-left: 90px;
	}
	select option:disabled {
		color: #C6ACAC;
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
</style>
@endsection
	<section class="content-header">
      <h1>
        Kategori
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
    		
    		<div class="col-xs-12 col-md-7 pull-right">
          		<div class="box">
    				<div class="box-body table-responsive no-padding">
		              <table class="table edit">
		                <tr>
		                  <th>Nama</th>
		                  <th>Slug</th>
		                  <th>Hapus</th>
		                </tr>
		                @foreach($categories as $category)
		                	@if(empty($category->parent))
			                <tr>
			                  <td><a href="{{url('kukaradmin/category/'.$category->id.'/edit')}}">{{$category->title}} ({{$category->id}})</a></td>
			                  <td>{{$category->slug}}</td>
			                  <td><a href="{{ url('kukaradmin/category/delete/'.$category->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
			                  		<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Kategori"></i>
			                  	</a>
			                  </td>
			                </tr>
			                @endif
			                	@foreach($category->childs as $child)
			                		<tr>
					                  <td><span class="optionOne"><a href="{{url('kukaradmin/category/'.$child->id.'/edit')}}">-- {{$child->title}} ({{$child->id}}) </a></span></td>
					                  <td>{{$child->slug}}</td>
					                  <td><a href="{{ url('kukaradmin/category/delete/'.$child->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
					                  		<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Kategori"></i>
					                  	</a>
					                  </td>
					                </tr>
					                @foreach($child->childs as $child)
				                		<tr>
						                  <td><span class="optionTwo"><a href="{{url('kukaradmin/category/'.$child->id.'/edit')}}">---- {{$child->title}} ({{$child->id}})</a></span></td>
						                  <td>{{$child->slug}}</td>
						                  <td><a href="{{ url('kukaradmin/category/delete/'.$child->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
						                  		<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Kategori"></i>
						                  	</a>
						                  </td>
						                </tr>
						                @foreach($child->childs as $child)
					                		<tr>
							                  <td><span class="optionThree"><a href="{{url('kukaradmin/category/'.$child->id.'/edit')}}">------ {{$child->title}} ({{$child->id}})</a></span></td>
							                  <td>{{$child->slug}}</td>
							                  <td><a href="{{ url('kukaradmin/category/delete/'.$child->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
							                  		<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Kategori"></i>
							                  	</a>
							                  </td>
							                </tr>
					                	@endforeach
				                	@endforeach
			                	@endforeach
			                
		                @endforeach
		                
		              </table>
              
            		</div>
    			</div>
    		</div>
    		<div class="col-xs-12 col-md-5 pull-left">
          		<div class="box">
          			<div class="box-header">
              			<h3 class="box-title">Tambah Kategori</h3>
					</div>
					
					{!! Form::open(['route' => 'category.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
					<div class="box-body">
							<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
			                    <label for="nama" class="col-lg-2 control-label">Nama</label>
			                    <div class="col-lg-10">
			                        <input class="form-control" placeholder="Nama" name="nama" type="text" value="{{ old('nama') }}" required>
			                         @if ($errors->has('nama'))
							            <span class="help-block">
							                <strong>{{ $errors->first('nama') }}</strong>
							            </span>
							        @endif
			                    </div>
			                </div>
			                <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
			                    <label for="nama" class="col-lg-2 control-label">Warna</label>
			                    <div class="col-lg-10">
			                        {!! Form::text('color', null, ['class'=>'form-control jscolor','required','placeholder'=>'Pilih Warna']) !!}
			                         @if ($errors->has('color'))
							            <span class="help-block">
							                <strong>{{ $errors->first('color') }}</strong>
							            </span>
							        @endif
			                    </div>
			                </div>
			                <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
								{!! Form::label('induk', 'Induk', array('class' => 'col-md-2 control-label')) !!}
								<div class="col-md-10">
									<select name="kategori" class="form-control select2">
										<!--option value="subscriber">Subscriber</option-->
										<option value="">Tidak Ada</option>
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
							</div>
							<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
			                    <label for="deskripsi" class="col-lg-2 control-label">Deskripsi</label>
			                    <div class="col-lg-10">
									{!! Form::textarea('deskripsi', old('deskripsi'), array('class' => 'form-control', ' rows'=>5)) !!}
			                         @if ($errors->has('deskripsi'))
							            <span class="help-block">
							                <strong>{{ $errors->first('deskripsi') }}</strong>
							            </span>
							        @endif
			                    </div>
			                </div><!--form control-->
						
					</div>
					<div class="box-footer">
		            	<button type="submit" class="btn btn-primary pull-right">Tambah Kategori</button>
		            </div>
		            {!! Form::close() !!}
    			</div>
    		</div>
    	</div>
    </section>

@section('js')
<script src="{{asset('b/js/jscolor.min.js')}}"></script>
@endsection

@endsection 