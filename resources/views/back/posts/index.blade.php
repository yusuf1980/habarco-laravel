@extends('layouts.back.index')

@section('title', 'Admin | Posts')

@section('content')

  <style>
    .draft {
      color: red;
    }
    .publish {
      color: green;
    }
  </style>

	<section class="content-header">
      <h1>
        Berita
        <small><a href="{{url('kukaradmin/posts/create')}} " class="btn btn-xs btn-default">Tambah Baru</a></small>
      </h1>
  </section>

	<section class="content">
    	<div class="row">
			<div class="col-xs-12">
          		<div class="box">
            		<div class="box-header">
              			<h3 class="box-title"></h3>

              			<div class="box-tools">
              				{!! Form::open(['route'=>'search-posts','method' => 'GET']) !!}
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
                        <th>No</th>
              					<th>Judul</th>
              					<th>Penulis</th>
              					<th class="hidden-xs">Kategori</th>
              					<th class="hidden-xs">Status</th>
              					<th class="hidden-xs">Tanggal</th>
								        <th>view</th>
								        <th>action</th>
              				</tr>
                      <?php $no = 1 ?>
              				@foreach($posts as $post)
              				<tr>
                        <td>{{$no}} </td>
              					<td><a href="{{url('kukaradmin/posts/'.$post->id.'/edit')}}">{{$post->title}}</a></td>
              					<td>{{$post->user->name}}</td>
              					<td class="hidden-xs">
              						@foreach($post->category as $category)
              							{{$category->title}}
              						@endforeach
              					</td>
              					<td class="hidden-xs">
              						@if($post->published == 0)
                            <span class="draft">Draft</span>
                          @else
                            <span class="publish">Publikasi</span>
                          @endif
              					</td>
              					<td class="hidden-xs">
              						{{ $carbon->createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}
              					</td>
              					<td>{{$post->view}}</td>
              					<td>
              						<a href="{{ url('kukaradmin/posts/'.$post->id.'/edit')}}" class="btn btn-xs btn-primary">
	                  					<i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title data-original-title="Edit"></i>
	                  				</a>
	                  				<a href="{{ url('kukaradmin/posts/delete/'.$post->id) }}" class="btn btn-xs btn-danger" onclick="return delete_confirm();">
	                  					<i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Postingan"></i>
	                  				</a>
              					</td>
              				</tr>
                      <?php $no++ ?>
              				@endforeach
              			</table>
              			<p>{{$posts->render()}}</p>
              		</div>
            	</div>
            </div>
    	</div>
    </section>

@endsection