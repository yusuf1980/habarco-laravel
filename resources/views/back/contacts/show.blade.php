@extends('layouts.back.index')

@section('title', 'Admin | Show Message')

@section('content')

	<section class="content-header">
      <h1>
        Pesan
      </h1>
    </section>
	<form class="form-horizontal">
    <section class="content">
    	<div class="row">
			<div class="col-md-12">
				<div class="box box-warning">
					<div class="box-body">
						<div class="form-group">
							<label for="judul" class="col-sm-2 control-label">Judul Pesan</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" value="{{ $contact->title }}">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Pengirim</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" value="{{$contact->name}}">
							</div>
						</div>
						<div class="form-group">
							<label for="teslp" class="col-sm-2 control-label">No Telp.</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" value="{{$contact->telp}}">
							</div>
						</div>
						<div class="form-group">
							<label for="teslp" class="col-sm-2 control-label">Dikirim pada</label>
							<div class="col-sm-10">
								<input class="form-control" type="text" value="{{$carbon->createFromTimeStamp(strtotime($contact->created_at))->format('d-m-Y H:i:s') }} / {{ $carbon->createFromTimeStamp(strtotime($contact->created_at))->diffForHumans() }}">
							</div>
						</div>
						<div class="form-group">
							<label for="teslp" class="col-sm-2 control-label">Isi Pesan</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="5">{{$contact->description}}</textarea>
							</div>
						</div>
						<p>*Isi Pesan Kontak ini tidak dapat diedit.</p>
					</div>
					<div class="box box-info">
			            <div class="box-body">
			                <div class="pull-left">
			                    <a href="{{ url('kukaradmin/contacts') }}" class="btn btn-info">Kembali</a>
			                </div>
			                <div class="clearfix"></div>
			            </div><!-- /.box-body -->
			        </div><!--box-->
				</div>
			</div>
		</div>
    </section>
    </form>


@endsection