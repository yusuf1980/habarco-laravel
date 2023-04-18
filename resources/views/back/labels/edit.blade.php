@extends('layouts.back.index')

@section('title', 'Admin | Edit Label')

@section('content')

	<section class="content-header">
      <h1>
        Edit Label
      </h1>
    </section>

    @if (Session::has('flash_notification.message'))
		<div class="alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			{{ Session::get('flash_notification.message') }}
		</div>
	@endif

	<section class="content">
		{!! Form::model($label, ['route' => ['labels.update', $label->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) !!}
		<div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Label</h3>
            </div>
				
			<div class="box-body">
				<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
			        <label for="nama" class="col-lg-2 control-label">Nama</label>
			        <div class="col-lg-10">
			        <input class="form-control" placeholder="Nama" name="nama" type="text" value="{{$label->title}}" required>
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
					{!! Form::textarea('deskripsi', $label->description, array('class' => 'form-control', ' rows'=>5)) !!}
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
	                <a href="{{ url('kukaradmin/labels') }}" class="btn btn-warning">Batal</a>
	            </div>
	            <div class="pull-right">
	                <button type="submit" class="btn btn-primary">Update Label</button>
	            </div>
	            <div class="clearfix"></div>  	
		    </div>
		</div>
		{!! Form::close() !!}
	</section>

@endsection