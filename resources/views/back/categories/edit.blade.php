@extends('layouts.back.index')

@section('title', 'Admin | Edit Category')

@section('content')
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
</style>
	<section class="content-header">
      <h1>
        Edit Kategori
      </h1>
    </section>

    <section class="content">
		{!! Form::model($category, ['route' => ['category.update', $category->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Kategori</h3>
            </div>
				
				<div class="box-body">
					<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
			            <label for="nama" class="col-lg-2 control-label">Nama</label>
			            <div class="col-lg-10">
			            <input class="form-control" placeholder="Nama" name="nama" type="text" value="{{$category->title}}" required>
			            @if ($errors->has('nama'))
						    <span class="help-block">
						        <strong>{{ $errors->first('nama') }}</strong>
						    </span>
						@endif
			        	</div>
			        </div><!--form control-->

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
							<select name="kategori" class="form-control select2">!!}
								<option value="">Tidak Ada</option>
								
								@foreach($categories as $child)
									@if(empty($child->parent))
										<?php $id = []; 
											foreach($child->childs as $c){
												$id[] = $c->id;
											}
										?>
										@if($child->id == $category->id)
											<option value="{{$child->id}}" disabled>{{$child->title}}</option>
										@elseif(in_array($category->id, $id))
											<option value="{{$child->id}}" selected="selected">{{$child->title}}</option>
										@else
											<option value="{{$child->id}}">{{$child->title}}</option>
										@endif

										@foreach($child->childs as $child2)
											<?php $id = []; 
												foreach($child2->childs as $c){
													$id[] = $c->id;
												}
											?>
											@if($child2->id == $category->id))
												<option class="optionChild" value="{{$child2->id}}" disabled>{{$child2->title}}</option>
											@elseif(in_array($category->id, $id))
												<option class="optionChild" value="{{$child2->id}}" selected="selected">{{$child2->title}}</option>
											@else
												<option class="optionChild" value="{{$child2->id}}">{{$child2->title}}</option>
											@endif

											@foreach($child2->childs as $child)
												<?php $id = []; 
													foreach($child->childs as $c){
														$id[] = $c->id;
													}
												?>
												@if($child->id == $category->id)
												<option class="optionChildtwo" value="{{$child->id}}" disabled>{{$child->title}}</option>
												@elseif(in_array($category->id, $id))
													<option class="optionChildtwo" value="{{$child->id}}" selected="selected">{{$child->title}}</option>
												@else
												<option class="optionChildtwo" value="{{$child->id}}">{{$child->title}}</option>
												@endif
												
												@foreach($child->childs as $child3)
													<option class="optionChildthree" disabled="disabled">{{$child3->title}}</option>
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
						{!! Form::textarea('deskripsi', $category->description, array('class' => 'form-control', ' rows'=>5)) !!}
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
	                    <a href="{{ url('kukaradmin/category') }}" class="btn btn-warning">Batal</a>
	                </div>
	                <div class="pull-right">
	                    <button type="submit" class="btn btn-primary">Update Kategori</button>
	                </div>
	                <div class="clearfix"></div>
		          	
		        </div>
            
        </div>
        {!! Form::close() !!}
    </section>

@section('js')
<script src="{{asset('b/js/jscolor.min.js')}}"></script>
@endsection

@endsection