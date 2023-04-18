@extends('layouts.front.index')

@section('content')

@section('body')
<body>
@endsection

<div id="content" class="container clearfix">
	
	<div class="page-404 clearfix">
		<section class="error-404 clearfix">
            <div class="left-col">
                <p>404</p>
            </div><!--left-col-->
            <div class="right-col">
                <h1>Halaman tidak ditemukan...</h1>
                <p>Kami mohon maaf, tetapi kami tidak dapat menemukan halaman yang anda cari. Hal ini mungkin ada kesalahan tetapi sekarang kami mengetahuinya jadi kami akan mencoba memperbaikinya. Sementara itu, anda bisa kembali ke halaman homepage / beranda depan.</p>
                <ul class="arrow-list">
                    <li><a href="{{url('/')}}">Kembali ke Homepage</a></li>
                </ul>
            </div><!--right-col-->
        </section><!--error-404-->
	</div>
	<!-- page-404 -->
</div>

@endsection

