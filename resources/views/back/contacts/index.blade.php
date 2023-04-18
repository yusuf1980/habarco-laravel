@extends('layouts.back.index')

@section('title', 'Admin | Contacts')

@section('content')

	<section class="content-header">
      	<h1>
        	Kontak Pesan
        	<small><a href="{{url('kukaradmin/contacts/create')}} " class="btn btn-xs btn-default">Tambah Baru</a></small>
      	</h1>
  	</section>

  	<section class="content">
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools">
              	{!! Form::open(['action'=>['ContactsController@search'],'method' => 'GET','role'=>'search']) !!}
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
                  <th>Pengirim</th>
                  <th>Email</th>
                  <th>telp</th>
                  <th>Judul</th>
                  <th>Tanggal Kirim</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                @if($contacts->count() == 0)
                	<tr><td>Tidak ada pesan.</td></tr>
                @else
	                @foreach($contacts as $contact)
	                <tr>
	                  <td><a href="{{url('kukaradmin/contacts/'.$contact->id)}}">{{$contact->name}}</a></td>
	                  <td><a href="{{url('kukaradmin/contacts/'.$contact->id)}}">{{$contact->email}}</a></td>
	                  <td>{{$contact->telp}} </td>
	                  <td>{{$contact->title}} </td>
	                  <td>{{ $carbon->createFromTimeStamp(strtotime($contact->created_at))->diffForHumans() }}</td>
	                  @if($contact->status == 1)
	                  <td><span class="label label-warning">Belum Dibaca</span></td>
	                  @else
	                  <td><span class="label label-success">Terbaca</span></td>
	                  @endif
	                  <td>
		                  <a href="{{ url('kukaradmin/contacts/delete/'.$contact->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
		                  	<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Pesan"></i>
		                  </a>
	                  </td>
	                </tr>
	                @endforeach
                @endif
              </table>
              <p> {{$contacts->render()}} </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

@endsection