@extends('layouts.back.index')

@section('title', 'Admin | Labels')

@section('content')

	<section class="content-header">
      <h1>
        Label
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
		              	<table class="table edit table-hover">
		              		<tr>
		              			<th>Nama</th>
		              			<th>Slug</th>
		              			<th>Hapus</th>
		              		</tr>
		              		@foreach($labelpage as $label)
		              		<tr>
		              			<td><a href="{{url('kukaradmin/labels/'.$label->id.'/edit')}}">{{$label->title}}</a></td>
		              			<td>{{$label->slug}}</td>
		              			<td>
		              				<a href="{{ url('kukaradmin/labels/delete/'.$label->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
				                  		<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Label"></i>
				                  	</a>
		              			</td>
		              		</tr>
		              		@endforeach
		              	</table>
		              	<p>{{$labelpage->render()}}</p>
					</div>
          		</div>
    		</div>
    		<div class="col-xs-12 col-md-5 pull-left">
    			<div class="labels">
    				<h4>Populer Label</h4>
					<p>
						@foreach($labels as $label)
							<a href="{{url('kukaradmin/labels/'.$label->id.'/edit')}}">{{$label->title}}</a> 
						@endforeach
					</p>
    			</div>
    			

          		<div class="box">
          			<div class="box-header">
              			<h3 class="box-title">Tambah Label</h3>
					</div>
					
					{!! Form::open(['route' => 'labels.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
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
			            </div><!--form control-->
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
		            	<button type="submit" class="btn btn-primary pull-right">Tambah Label</button>
		            </div>
		            {!! Form::close() !!}
		        </div>
    		</div>
    	</div>
    </section>

@endsection