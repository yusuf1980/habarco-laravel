
@extends('layouts.front.index')

@section('title', 'Contact Us')

@section('css')
	<link rel="stylesheet" href="{{asset('f/bootstrap/css/bootstrap.min.css')}}">
@endsection

@section('content')
<?php 
	$single = $setting->where('key', 'category')->first();
	$set = unserialize($single->value);
	$kontak = unserialize($contact->value);
?>
<?php $twitter = $setting->where('key', 'twitter')->first(); ?>

@section('body')<body class="kp-blog">@endsection
		@if (Session::has('flash_notification.message'))
            <div style="text-align:center;font-size:18px;font-weight: 700;" class="alert alert-{{ Session::get('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('flash_notification.message') }}
            </div>
        @endif
<div id="content" class="container clearfix">
				<?php $ads_top = $set['ads-top']; ?>
				
				@foreach($ads_top as $side)
					<?php 
						  $d = strrpos($side, '-');
						  $frontWord = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $backWord= substr($side, $d+1);
					?>
					@include('front.include.'.$frontWord, ['value'=>$backWord])
				@endforeach
	<div id="main-content">
		<div class="col-area-3 pull-right">
			<div class="kp-breadcrumb">
				<ol class="breadcrumb">
				  <li><span>Halaman: </span></li>
				  <li class="active">Contact Us</li>
				</ol>
				<span></span>
			</div>
			<div class="page-content clearfix">	
				<article>
					<div class="social-sharethis-post">
						<div id="jumboShare"></div>	
						<a href="javascript: void(0)" class="btn"  id="copy-button" data-clipboard-text="{{url('contact/contact-us')}}" title="Copy link artikel ini">
							<i class="fa fa-files-o pull-left"></i>
						</a>

						<div class="clearfix"></div>
					</div>
					<div class="isi">
						@if($kontak['name'] != '')
						<h4>{{$kontak['name']}}</h4>
						@endif
						@if($kontak['address'] != '')
						<p>Alamat: {{$kontak['address']}}</p>
						@endif
						@if($kontak['telp'] != '')
						<p>Kontak Telp: 
							{{$kontak['telp']}}, 
						</p>
						@endif
						@if($kontak['email'] != '')
						<p>Kontak Email: 
							{{$kontak['email']}}, 
						</p>
						@endif
						<p>Atau Anda dapat mengisi form di bawah ini:</p>

						<p>
							{!! Form::open(['url' => 'contact/contact', 'method'=>'post']) !!}
								<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
								    <label for="exampleInputNama">Nama</label>
								    <input type="text" class="form-control" id="exampleInputNama" placeholder="Nama" name="nama" value="{{ old('nama') }}" required>
								    @if ($errors->has('nama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
								</div>
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								    <label for="exampleInputEmail1">Alamat Email</label>
								    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}" required>
									@if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
								</div>
								<div class="form-group{{ $errors->has('telp') ? ' has-error' : '' }}">
								    <label for="telp">No Telp (optional)</label>
								    <input type="text" class="form-control" id="telp" placeholder="Telp" name="telp" value="{{ old('telp') }}">
									@if ($errors->has('telp'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telp') }}</strong>
                                        </span>
                                    @endif
								</div>
								<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
								    <label for="judul">Judul</label>
								    <input type="text" class="form-control" id="judul" placeholder="Judul" name="judul" value="{{ old('judul') }}" required>
									@if ($errors->has('judul'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('judul') }}</strong>
                                        </span>
                                    @endif
								</div>
								<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
								    <label for="description">Deskripsi</label>
								    <textarea name="deskripsi" id="description" class="form-control" cols="30" rows="10" value="{{ old('deskripsi') }}" required></textarea>
									@if ($errors->has('deskripsi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('deskripsi') }}</strong>
                                        </span>
                                    @endif
								</div>
								<button type="submit" class="btn btn-success pull-right">Kirim</button>
							{!! Form::close() !!}
						</p>
					</div>
					
					<div class="clearfix"></div>
				</artickle>
			</div>
		</div>
		<div class="col-area-4 pull-left">
			
			<?php $ads_top = $set['sidebar-left']; ?>
				
				@foreach($ads_top as $side)
					<?php 
						  $d = strrpos($side, '-');
						  $frontWord = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $backWord= substr($side, $d+1);
					?>
					@include('front.include.'.$frontWord, ['value'=>$backWord])
				@endforeach

		</div>
		
	</div>
	<div id="sidebar" class="pull-left">
		
			<?php $ads_top = $set['sidebar']; ?>
				
				@foreach($ads_top as $side)
					<?php 
						  $d = strrpos($side, '-');
						  $frontWord = substr($side, 0, $d);
						  $h = strrpos($side, '-');
						  $backWord= substr($side, $d+1);
					?>
					@include('front.include.'.$frontWord, ['value'=>$backWord])
				@endforeach
	</div>
</div>

@section('js')
<script src="{{asset('f/js/jumboShare.js')}}"></script>
<script src="{{asset('f/js/clipboard.min.js')}}"></script>
<script src="{{asset('f/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection
@section('singlejs')
<script>
	$(document).ready(function(){
		$("#jumboShare").jumboShare({url:"{{url('contact/contact-us')}}", twitterUsername: "{{$twitter->value}}" });
	});
	(function(){
		var clipboard = new Clipboard('#copy-button');

		clipboard.on('success', function(e) {
		    jQuery('#alert-copy').fadeIn();
			    setTimeout(function(){ jQuery('#alert-copy').fadeOut(); }, 3000);
			});

	})();
</script>

@endsection

@endsection