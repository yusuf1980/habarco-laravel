@extends('layouts.back.index')

@section('title', 'Admin | Edit Password')

@section('content')
	
	<section class="content-header">
      <h1>
        Edit Password Pengguna
        <!--small>Tambah Baru</small-->
      </h1>
    </section>

    <section class="content">
    	{!! Form::open(['route' => ['update-password', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Ganti Password {{ $user->name }}</h3>
        
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                    <label for="password" class="col-lg-2 control-label">Password</label>
	                    <div class="col-lg-10">
	                        <input class="form-control" id="focus" name="password" type="password" value="{{ old('password') }}" id="password" required>
	                        @if ($errors->has('password'))
					            <span class="help-block">
					                <strong>{{ $errors->first('password') }}</strong>
					            </span>
					        @endif
	                    </div>
	                </div><!--form control-->

	                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	                    <label for="password_confirmation" class="col-lg-2 control-label">Ulangi Password</label>
	                    <div class="col-lg-10">
	                        <input class="form-control" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" id="password_confirmation" required>
	                        @if ($errors->has('password_confirmation'))
					            <span class="help-block">
					                <strong>{{ $errors->first('password_confirmation') }}</strong>
					            </span>
					        @endif
	                    </div>
	                </div><!--form control-->
	        </div>
	    </div>

	    <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    <a href="{{ url('kukaradmin/users') }}" class="btn btn-danger btn-xs">Batal</a>
                </div>

                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-xs" value="Simpan" />
                </div>
                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

		{!! Form::close() !!}

    </section>

@endsection