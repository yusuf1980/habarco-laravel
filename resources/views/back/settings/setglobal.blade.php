@extends('layouts.back.index')

@section('title', 'Admin | Global Setting')

@section('content')

@section('cssin')

@endsection

	<section class="content-header">
      <h1>
        Pengaturan
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
			{!! Form::open(['route' => 'saveglobal', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'files'=>'true']) !!}
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header with-border">
		                <h3 class="box-title">Pengaturan Umum</h3>
		            </div>
					<div class="box-body">
						<div class="form-group{{ $errors->has('sitename') ? ' has-error' : '' }}">
		                    <label for="sitename" class="col-sm-2 control-label">Nama Website</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama Website" name="sitename" type="text" value="{{ $settings->where('key','sitename')->first()->value }}" required>
		                         @if ($errors->has('sitename'))
						            <span class="help-block">
						                <strong>{{ $errors->first('sitename') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('slogan') ? ' has-error' : '' }}">
		                    <label for="slogan" class="col-sm-2 control-label">Slogan</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Slogan" name="slogan" type="text" value="{{ $settings->where('key','slogan')->first()->value }}">
		                         @if ($errors->has('slogan'))
						            <span class="help-block">
						                <strong>{{ $errors->first('slogan') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
		                    <label for="description" class="col-sm-2 control-label">Deskripsi Website</label>
		                    <div class="col-sm-10">
		                        {!! Form::textarea('description', $settings->where('key','description')->first()->value, array('class' => 'form-control',' rows'=>3)) !!}
		                         @if ($errors->has('description'))
						            <span class="help-block">
						                <strong>{{ $errors->first('description') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		                    <label for="title" class="col-sm-2 control-label">Meta Title</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Meta Title" name="title" type="text" value="{{ $settings->where('key','title')->first()->value }}">
		                         @if ($errors->has('title'))
						            <span class="help-block">
						                <strong>{{ $errors->first('title') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('meta_keyword') ? ' has-error' : '' }}">
		                    <label for="meta_keyword" class="col-sm-2 control-label">Meta Keyword</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Meta Title" name="meta_keyword" type="text" value="{{ $settings->where('key','meta_keyword')->first()->value }}">
		                         @if ($errors->has('meta_keyword'))
						            <span class="help-block">
						                <strong>{{ $errors->first('meta_keyword') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
		                    <label for="meta_description" class="col-sm-2 control-label">Meta Deskripsi</label>
		                    <div class="col-sm-10">
		                        {!! Form::textarea('meta_description', $settings->where('key','meta_description')->first()->value, array('class' => 'form-control',' rows'=>3)) !!}
		                         @if ($errors->has('meta_description'))
						            <span class="help-block">
						                <strong>{{ $errors->first('meta_description') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
		                    <label for="facebook" class="col-sm-2 control-label">Facebook</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama Facebook" name="facebook" type="text" value="{{ $settings->where('key','facebook')->first()->value }}">
		                         @if ($errors->has('facebook'))
						            <span class="help-block">
						                <strong>{{ $errors->first('facebook') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
		                    <label for="twitter" class="col-sm-2 control-label">Twitter</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama Twitter" name="twitter" type="text" value="{{ $settings->where('key','twitter')->first()->value }}">
		                         @if ($errors->has('twitter'))
						            <span class="help-block">
						                <strong>{{ $errors->first('twitter') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('google-plus') ? ' has-error' : '' }}">
		                    <label for="google-plus" class="col-sm-2 control-label">Google Plus</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama Google Plus" name="google-plus" type="text" value="{{ $settings->where('key','google-plus')->first()->value }}">
		                         @if ($errors->has('google-plus'))
						            <span class="help-block">
						                <strong>{{ $errors->first('google-plus') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
		                    <label for="instagram" class="col-sm-2 control-label">Instagram</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama Instagram" name="instagram" type="text" value="{{ $settings->where('key','instagram')->first()->value }}">
		                         @if ($errors->has('instagram'))
						            <span class="help-block">
						                <strong>{{ $errors->first('instagram') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('google_analytics') ? ' has-error' : '' }}">
		                    <label for="google_analytics" class="col-sm-2 control-label">Google Analytic</label>
		                    <div class="col-sm-10">
		                        {!! Form::textarea('google_analytics', $settings->where('key','google_analytics')->first()->value, array('class' => 'form-control',' rows'=>3)) !!}
		                         @if ($errors->has('google_analytics'))
						            <span class="help-block">
						                <strong>{{ $errors->first('google_analytics') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('news-feed-home') ? ' has-error' : '' }}">
		                    <label for="news-feed-home" class="col-sm-2 control-label">Jumlah News Feed Home Page</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Gunakan Angka" name="news-feed-home" type="text" value="{{ $settings->where('key','news-feed-home')->first()->value }}">
		                         @if ($errors->has('news-feed-home'))
						            <span class="help-block">
						                <strong>{{ $errors->first('news-feed-home') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
					</div>
					<div class="box box-info">
			            <div class="box-body">

			                <div class="pull-right">
			                    <input type="submit" class="btn btn-success" value="Simpan" />
			                </div>
			                <div class="clearfix"></div>
			            </div><!-- /.box-body -->
			        </div><!--box-->
				</div>
			</div>
			{!! Form::close() !!}
			
			{!! Form::model($settings, ['route' => 'setcontact.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
		                <h3 class="box-title">Alamat dan Kontak</h3>
		            </div>
					<div class="box-body">
		                <?php $contact = unserialize($settings->where('key','contact-us')->first()->value) ?>
		                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		                    <label for="name" class="col-sm-2 control-label">Nama Perusahaan</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Logo" name="name" type="text" value="{{$contact['name']}}">
		                         @if ($errors->has('name'))
						            <span class="help-block">
						                <strong>{{ $errors->first('name') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
		                    <label for="address" class="col-sm-2 control-label">Alamat</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Logo" name="address" type="text" value="{{$contact['address']}}">
		                         @if ($errors->has('address'))
						            <span class="help-block">
						                <strong>{{ $errors->first('address') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('telp') ? ' has-error' : '' }}">
		                    <label for="telp" class="col-sm-2 control-label">Telp.</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Telp, gunakan koma untuk memisahkan antara telp" name="telp" type="text" value="{{$contact['telp']}}">
		                         @if ($errors->has('telp'))
						            <span class="help-block">
						                <strong>{{ $errors->first('telp') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                    <label for="email" class="col-sm-2 control-label">Email</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Email, gunakan koma untuk memisahkan antara email" name="email" type="text" value="{{$contact['email']}}">
		                         @if ($errors->has('email'))
						            <span class="help-block">
						                <strong>{{ $errors->first('email') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->

					</div>
					<div class="box box-info">
			            <div class="box-body">
			                <div class="pull-left">
			                    <a href="{{ url('kukaradmin/dashboard') }}" class="btn btn-danger">Batal</a>
			                </div>

			                <div class="pull-right">
			                    <input type="submit" class="btn btn-success" value="Simpan" />
			                </div>
			                <div class="clearfix"></div>
			            </div><!-- /.box-body -->
			        </div><!--box-->
				</div>
			</div>
			{!! Form::close() !!}

			{!! Form::model($settings, ['route' => 'setemail.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
		                <h3 class="box-title">Email Penerima</h3>
		            </div>
					<div class="box-body">
		                <?php $getmail = unserialize($settings->where('key','terima-email')->first()->value) ?>
		                <div class="form-group{{ $errors->has('email1') ? ' has-error' : '' }}">
		                    <label for="email1" class="col-sm-2 control-label">Email 1</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Email 1" name="email1" type="text" value="{{$getmail[1]}}">
		                         @if ($errors->has('email1'))
						            <span class="help-block">
						                <strong>{{ $errors->first('email1') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('email2') ? ' has-error' : '' }}">
		                    <label for="email2" class="col-sm-2 control-label">Email 2</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Email 2" name="email2" type="text" value="{{$getmail[2]}}">
		                         @if ($errors->has('email2'))
						            <span class="help-block">
						                <strong>{{ $errors->first('email2') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->
		                <div class="form-group{{ $errors->has('email3') ? ' has-error' : '' }}">
		                    <label for="email3" class="col-sm-2 control-label">Email 3</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Email 3" name="email3" type="text" value="{{$getmail[3]}}">
		                         @if ($errors->has('email3'))
						            <span class="help-block">
						                <strong>{{ $errors->first('email3') }}</strong>
						            </span>
						        @endif
		                    </div>
		                </div><!--form control-->

					</div>
					<div class="box box-info">
			            <div class="box-body">
			                <div class="pull-left">
			                    <a href="{{ url('kukaradmin/dashboard') }}" class="btn btn-danger">Batal</a>
			                </div>

			                <div class="pull-right">
			                    <input type="submit" class="btn btn-success" value="Simpan" />
			                </div>
			                <div class="clearfix"></div>
			            </div><!-- /.box-body -->
			        </div><!--box-->
				</div>
			</div>
			{!! Form::close() !!}

			{!! Form::model($settings, ['route' => 'setfooter.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
		                <h3 class="box-title">Kategori Footer</h3>
		            </div>
					<div class="box-body">
		                
		                <?php $footer = unserialize($settings->where('key','footer-kategori')->first()->value) ?>

		                <div class="form-group">
		                    <label for="email1" class="col-sm-2 control-label">Kategori 1</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama" name="name1" type="text" value="{{$footer['kategori-1']['name']}}">
		                        <input class="form-control" placeholder="Nomor id" name="id1" type="text" value="{{$footer['kategori-1']['id']}}">
		                    </div>
		                </div><!--form control-->
		                <div class="form-group">
		                    <label for="email1" class="col-sm-2 control-label">Kategori 2</label>
		                    <div class="col-sm-10">
		                        <input class="form-control" placeholder="Nama" name="name2" type="text" value="{{$footer['kategori-2']['name']}}">
		                        <input class="form-control" placeholder="Nomor id" name="id2" type="text" value="{{$footer['kategori-2']['id']}}">
		                    </div>
		                </div><!--form control-->

					</div>
					<div class="box box-info">
			            <div class="box-body">
			                <div class="pull-left">
			                    <a href="{{ url('kukaradmin/dashboard') }}" class="btn btn-danger">Batal</a>
			                </div>

			                <div class="pull-right">
			                    <input type="submit" class="btn btn-success" value="Simpan" />
			                </div>
			                <div class="clearfix"></div>
			            </div><!-- /.box-body -->
			        </div><!--box-->
				</div>
			</div>
			{!! Form::close() !!}
		</div>
		
	</section>

@section('js')

@endsection

@endsection