@extends('layouts.back.index')

@section('title', 'Admin | Users')

@section('content')
	<style>
		.table-responsive td a {
			margin-right: 15px;
		}
	</style>

	<section class="content-header">
      <h1>
        Pengguna
        <small><a href="{{url('kukaradmin/users/create')}} " class="btn btn-xs btn-default">Tambah Baru</a></small>
      </h1>
    </section>

    <section class="content">
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools">
              	{!! Form::open(['action'=>['UsersController@search'],'method' => 'GET','role'=>'search']) !!}
                <div class="input-group input-group-sm" style="width: 150px;">
                	
	                  <input type="text" name="s" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                
                </div>
                {!! Form::close() !!}
              </div>
            </div>

            	@if (Session::has('flash_notification.message'))
                    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        {{ Session::get('flash_notification.message') }}
                    </div>
                @endif

            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Pengguna</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Hak Akses</th>
                  <th>Created</th>
                  <th>Actions</th>
                </tr>
                @foreach($users as $user)
                <tr>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    @if($user->suspended == 0)
                    <span class="label label-success">Aktif</span>
                    @else
                    <span class="label label-warning">Banned</span>
                    @endif
                  </td>
                  <td>{{$user->role}} </td>
                  <td>{{ $carbon->createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}</td>
                  <td>
                  	  <a href="{{ url('kukaradmin/users') }}/{{ $user->id }}/edit" class="btn btn-xs btn-primary">
	                  		<i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title data-original-title="Edit"></i>
	                  </a>
                      <a href="{{ url('kukaradmin/users') }}/{{ $user->id }}/changepassword" class="btn btn-xs btn-primary">
                        <i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title data-original-title="Ubah Password"></i>
                      </a>
	                  	
                      @if($user->id != 1)
                      @if($user->suspended == 0)
                      <a href="{{ url('kukaradmin/users/banned') }}/{{ $user->id }}" class="btn btn-xs btn-warning" onclick="return banned_confirm();">
	                  		<i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title data-original-title="Banned User"></i>
	                  	</a>
                      @else 
                      <a href="{{ url('kukaradmin/users/banned') }}/{{ $user->id }}" class="btn btn-xs btn-info">
                        <i class="fa fa-pause" data-toggle="tooltip" data-placement="top" title data-original-title="Aktifkan User"></i>
                      </a>
                      @endif
                      </a>
	                  	<a href="{{ url('kukaradmin/users/delete') }}/{{ $user->id }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
	                  		<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus User"></i>
	                  	</a>
                      @endif
                  </td>
                </tr>
                @endforeach
                <!--tr>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr-->
              </table>
              <p> {{$users->render()}} </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

@section('js')
<script>
  function banned_confirm(link) {
    var msg = confirm('Anda yakin untuk banned user ini?');
    if(msg == false) {
      return false;
    }
  }
</script>
@endsection

@endsection