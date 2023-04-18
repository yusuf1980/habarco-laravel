@extends('layouts.back.index')

@section('content')
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
        <small>Wamet.Com</small>
      </h1>
    </section>

    @if (Session::has('flash_notification.message'))
      <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                {{ Session::get('flash_notification.message') }}
            </div>
          </div>
      </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-newspaper-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Berita</span>
              <span class="info-box-number">Publish: {{$publish}}</span>
              <span class="info-box-number">Draf: {{$draft}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pesan Belum Dibaca</span>
              <span class="info-box-number">{{$countcontact}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Iklan</span>
              <span class="info-box-number">{{$countbanner}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengguna</span>
              <span class="info-box-number">{{$countuser}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <h3>Selamat Datang di halaman Admin Warta Mahakam Etam <small><a href="{{url('kukaradmin/posts/create')}}">Buat Berita</a></small></h3>
      
      <div class="row">
          <div class="col-md-6">
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-newspaper-o"></i>

                  <h3 class="box-title">Draft Cepat</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                  <!-- /. tools -->
                </div>
                {!! Form::open(['route' => 'post.savedraft', 'role' => 'form', 'method' => 'post']) !!}
                <div class="box-body">
                    <div class="form-group">
                      <input type="text" class="form-control" name="judul" placeholder="Judul" value="{{old('judul')}}">
                    </div>
                    <div>
                      <textarea class="textarea" name="deskripsi" placeholder="Isi Berita/Artikel" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('deskripsi')}}</textarea>
                    </div>
                  
                </div>
                <div class="box-footer clearfix">
                  <button type="submit" class="pull-right btn btn-default">Simpan Konsep
                    <i class="fa fa-arrow-circle-right"></i></button>
                </div>
                @if (count($errors) > 0)
                <ul style="color:red">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                {!! Form::close() !!}
              </div>
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Iklan Terakhir Dimuat</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    @foreach($banners as $banner)
                    <li class="item">
                      <div class="product-img">
                        <img src="{{asset('img/banner/thumbnail/'.$banner->image)}}" alt="{{$banner->title}}">
                      </div>
                      <div class="product-info">
                        <a href="{{url('kukaradmin/banners/'.$banner->id.'/edit')}}" class="product-title">{{$banner->title}}
                          @if($banner->published == 1)
                          <span class="label label-success pull-right">Aprove</span>
                          @else
                          <span class="label label-danger pull-right">Pending</span>
                          @endif
                        </a>
                            <span class="product-description">
                              {{$banner->instansi}}
                            </span>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{url('kukaradmin/banners')}}" class="uppercase">Lihat Semua Iklan</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Pesan Kontak</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Pengirim</th>
                        <th>Email</th>
                        <th>Subjek</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($contacts as $contact)
                      <tr>
                        <td><a href="{{url('kukaradmin/contacts/'.$contact->id.'/edit')}}">{{$contact->name}}</a></td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->title}}</td>
                      </tr>
                      @endforeach
                      
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="{{url('kukaradmin/contacts')}}" class="btn btn-sm btn-info btn-flat pull-left">Semua Pesan</a>
                </div>
                <!-- /.box-footer -->
              </div>
          </div>      
          <div class="col-md-6">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Artikel Terpopuler</h3>
                  {!! Form::open(['route' => 'dashboard', 'role' => 'form', 'method' => 'get']) !!}
                  <select name="period">
                      <option value="one_day_stats">Hari ini</option>
                      <option value="seven_days_stats" {{ Request::is('kukaradmin/dashboard?period=seven_days_stats')? 'selected' : '' }}>7 hari terakhir</option>
                      <option value="thirty_days_stats"{{ Request::is('kukaradmin/dashboard?period=seven_days_stats')? 'selected' : '' }}>30 hari terakhir</option>
                      <option value="all_time_stats">Semua Waktu</option>
                  </select>
                  <input type="submit" value="Ganti Periode">
                  {!! Form::close() !!}
                  
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    @if($period == 'one_day_stats') Populer Hari Ini
                    @elseif($period == 'seven_days_stats') Populer 7 hari terakhir
                    @elseif($period == 'thirty_days_stats') Populer 30 hari terakhir
                    @elseif($period == 'all_time_stats') Populer Semua Waktu
                    @endif
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Dibaca</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($item as $i)
                      <tr>
                        <td><a href="{{url('kukaradmin/posts/'.$i->trackable->id.'/edit')}}">{{$i->trackable->title}}</a></td>
                        <td>{{$i->one_day_stats}} kali</td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
              </div>
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Artikel Terakhir Dimuat</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($posts as $post)
                      <tr>
                        <td><a href="{{url('kukaradmin/posts/'.$post->id.'/edit')}}">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>
                          @if($post->published == 0)
                            <span class="label label-warning">Draft</span>
                          @else
                            <span class="label label-success">Publikasi</span>
                          @endif
                        </td>
                      </tr>
                      @endforeach
                      
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="{{url('kukaradmin/posts')}}" class="btn btn-sm btn-primary btn-flat pull-left">Semua Berita</a>
                </div>
                <!-- /.box-footer -->
              </div>
              
          </div>
      </div>  
      
    </section>
    <!-- /.content -->
  
@section('js')
<script src="{{asset('b/js/pages/dashboard2.js')}}"></script>
<script src="{{--asset('b/js/demo.js')--}}"></script>
@endsection
@endsection