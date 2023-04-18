@extends('layouts.back.index')

@section('title', 'Admin | Edit User')

@section('content')
	
	<section class="content-header">
      <h1>
        Edit Pengguna
        <!--small>Tambah Baru</small-->
      </h1>
    </section>

    <section class="content">
		{!! Form::model($user, ['route' => ['users.update', $user->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) !!}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Pengguna</h3>
        
				<div class="box-body">
	                <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
	                    <label for="nama" class="col-lg-2 control-label">Nama</label>
	                    <div class="col-lg-10">
	                        <input class="form-control" placeholder="Nama" name="nama" type="text" value="{{ $user->name }}" required>
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
	                        <input class="form-control" placeholder="E-mail" name="email" type="text" id="email" value="{{ $user->email }}" required>
	                         @if ($errors->has('email'))
					            <span class="help-block">
					                <strong>{{ $errors->first('email') }}</strong>
					            </span>
					        @endif
	                    </div>
	                </div><!--form control-->
					@can('administrator')
	                <div class="form-group{{ $errors->has('suspended') ? ' has-error' : '' }}">
	                    <label class="col-lg-2 control-label">Status</label>
	                    <div class="col-lg-1">
	                        <div class="radio">
			                    <label>
			                      {!! Form::radio('suspended', 1, $user->suspended,['id'=>'suspended']) !!} Suspended
			                    </label>
			                  </div>
			                  <div class="radio">
			                    <label>
			                      {!! Form::radio('suspended', 0, $user->suspended,['id'=>'suspended']) !!} Aktif
			                    </label>
			                  </div>
	                    </div>
	                </div><!--form control-->

	                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
						{!! Form::label('role', 'Hak Akses', array('class' => 'col-md-2 control-label')) !!}
						<div class="col-md-4">
							{!! Form::select('role', array('contributor' => 'Contributor', 'author' => 'Author', 'editor'=>'Editor', 'administrator'=>'Administrator'), $user->role, ['class' => 'form-control']); !!}
							@if ($errors->has('role'))
					            <span class="help-block">
					                <strong>{{ $errors->first('role') }}</strong>
					            </span>
					        @endif
						</div>
					</div>
	                @endcan
	            </div>
	        </div>
	    </div>

	    <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                	@can('administrator')
                    <a href="{{ url('kukaradmin/users') }}" class="btn btn-danger btn-xs">Batal</a>
                    @else
                    <a href="{{ url('kukaradmin/dashboard') }}" class="btn btn-danger btn-xs">Batal</a>
                    @endcan
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