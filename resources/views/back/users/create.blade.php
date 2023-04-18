@extends('layouts.back.index')

@section('title', 'Admin | Create User')

@section('content')
	
	<section class="content-header">
      <h1>
        Tambah Pengguna Baru
        <!--small>Tambah Baru</small-->
      </h1>
    </section>

    <section class="content">
		{!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah User</h3>
        
				<div class="box-body">
	                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
	                    <label for="nama" class="col-lg-2 control-label">Nama</label>
	                    <div class="col-lg-10">
	                        <input class="form-control" id="focus" placeholder="Nama" name="nama" type="text" value="{{ old('nama') }}" required>
	                         @if ($errors->has('nama'))
					            <span class="help-block">
					                <strong>{{ $errors->first('nama') }}</strong>
					            </span>
					        @endif
	                    </div>
	                </div><!--form control-->

	                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                    <label for="email" class="col-lg-2 control-label">E-mail</label>
	                    <div class="col-lg-10">
	                        <input class="form-control" placeholder="E-mail" name="email" type="text" id="email" value="{{ old('email') }}" required>
	                         @if ($errors->has('email'))
					            <span class="help-block">
					                <strong>{{ $errors->first('email') }}</strong>
					            </span>
					        @endif
	                    </div>
	                </div><!--form control-->

	                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                    <label for="password" class="col-lg-2 control-label">Password</label>
	                    <div class="col-lg-10">
	                        <input class="form-control" name="password" type="password" value="{{ old('password') }}" id="password" required>
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
	                <div class="form-group{{ $errors->has('suspended') ? ' has-error' : '' }}">
	                    <label class="col-lg-2 control-label">Status</label>
	                    <div class="col-lg-1">
	                        <div class="radio">
			                    <label>
			                      <input type="radio" name="suspended" id="optionActive1" value="1">
			                      Suspended
			                    </label>
			                  </div>
			                  <div class="radio">
			                    <label>
			                      <input type="radio" name="suspended" id="optionsActive2" value="0" checked>
			                      Aktif
			                    </label>
			                  </div>
	                    </div>
	                </div><!--form control-->

	                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
						{!! Form::label('role', 'Hak Akses', array('class' => 'col-md-2 control-label')) !!}
						<div class="col-md-4">
							<select name="role" class="form-control">
								<!--option value="subscriber">Subscriber</option-->
								<option value="contributor">Contributor</option>
								<option value="author">Author</option>
								<option value="editor">Editor</option>
								<option value="administrator">Administrator</option>
							</select>
							@if ($errors->has('role'))
					            <span class="help-block">
					                <strong>{{ $errors->first('role') }}</strong>
					            </span>
					        @endif
						</div>
					</div>
	                
	            </div>
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