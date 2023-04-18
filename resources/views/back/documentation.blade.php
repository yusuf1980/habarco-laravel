@extends('layouts.back.index')

@section('content')
<style>
	.box-document {
		background-color: #fff;
		width: 100%;
		padding: 10px;
	}
	.nav>li>a {
		padding: 5px 5px;
	}
	.affix {
	  	top: 20px;
	  	
	}
	.nav .active .nav {
	  display: block;
	}
</style>

	<section class="content-header">
      	<h1>
        	Dokumentasi/Tutorial
      	</h1>
    </section>

	<section class="content">
      	<div class="row">
      		<div class="col-md-4 col-xs-12 pull-right scrollspy">
      			<ul id="nav" class="nav hidden-xs hidden-sm box-document" data-spy="affix">
      				<li><a href="#ikhtisar">Ikhtisar</a></li>
                              @can('administrator')
      				<li><a href="#pengguna">Pengguna</a></li>
                              @endcan
      				<li><a href="#kategori">Kategori</a></li>
      				<li><a href="#label">Label</a></li>
      				<li><a href="#berita">Berita</a></li>
      				<li><a href="#halaman">Halaman</a></li>
      				<li><a href="#info-kecamatan">Info Kecamatan</a></li>
      				<li><a href="#iklan">Iklan</a></li>
                              @can('administrator')
      				<li><a href="#kontak-pesan">Kontak Pesan</a></li>
                              @endcan
      				<li><a href="#menu">Menu / Navigasi</a></li>
                              @can('administrator')
                              <li><a href="#tampilan">Tampilan</a></li>
                              <li><a href="#pengaturan">Pengaturan</a></li>
                              @endcan
	      		</ul>
      		</div>
      		<div class="col-md-8 col-xs-12 pull-left">
      			<div class="box box-primary">
      				<div class="box-body">
      					<div id="ikhtisar">
      						<h3><u>Ikhtisar</u></h3>
      						<p>
      							Dokumentasi ini merupakan tutorial sederhana untuk mengelola dan memanajemen website ini, sehingga dapat memahami dengan baik atau apabila tidak ingat cara penggunaannya, seperti fungsi masing-masing widget. 
      						</p>
      					</div>
                                    @can('administrator')
      					<div id="pengguna">
      						<h3><u>Pengguna</u></h3>
      						<p>
      							Pengguna untuk mengelola pengguna atau user yang dapat mengisi konten atau berita, atau pengaturan website lainnya tergantung hak akses
      							yang diberikan kepada seorang pengguna.
      						</p>
      						<h5><b>Halaman Semua Pengguna</b></h5>
      						Pada halaman ini menampilkan seluruh pengguna yang telah diinput oleh Administrator. <br>
      						Menampilkan:
      						<ul>
      							<li>Nama Pengguna</li>
      							<li>Email</li>
      							<li>Status pengguna sedang aktif atau disuspended.</li>
      							<li>Hak Akses</li>
      							<li>Created: Tanggal dibuatnya pengguna</li>
      							<li>Action: aksi yang dapat dilakukan Administrator terhadap pengguna tersebut.
      								<ol>
      									<li>Tombol paling kiri untuk mengedit pengguna.</li>
      									<li>Selanjutnya untuk mengubah password</li>
      									<li>Untuk mengubah password</li>
      									<li>Paling kanan untuk Menghapus pengguna</li>
      								</ol>
      							</li>
      						</ul>
      						<h5><b>Hak Akses Pengguna</b></h5>
      						<ol>
      							<li>Administrator
      								<ul>
      									<li>Memiliki hak akses tak terbatas, Administrator dapat melakukan semua pengelolaan di dalam website</li>
      								</ul>
      							</li>
      							<li>
      								Editor: 
      								<ul>
      									<li>Tidak dapat menambah pengguna atau mengedit pengguna lain.</li>
      									<li>Tidak dapat mengedit isi "Pengaturan".</li>
      									<li>Tidak dapat mengedit Menu/Navigasi Website</li>
      									<li>Tidak dapat melihat kontak pesan email yang telah dikirim pengunjung website.</li>
      									<li>Tidak dapat melakukan pengaturan seluruh Tampilan.</li>
      									<li>Dapat menambah kategori.</li>
      									<li>Dapat melakukan semua pengelolaan konten berita atau artikel.</li>
      									<li>Seperti mempublikasikan berita pengguna lain dan menghapus berita.</li>
      									<li>Dapat menambahkan gambar</li>
      									<li>Dapat menambahkan iklan dan mengedit iklan.</li>
      									<li>Dapat mengedit dan menambahkan "Info Kecamatan"</li>
      								</ul>
      							</li>
      							<li>
      								Author/Penulis:
      								<ul>
      									<li>Hanya dapat melihat beritanya sendiri.</li>
      									<li>Dapat mengedit beritanya.</li>
      									<li>Dapat menambahkan gambar, tetapi tidak dapat menambahkan file</li>
      									<li>Dapat memilih kategori yang telah ada untuk berita, tetapi tidak dapat menambahkan kategori baru.</li>
      									<li>Tidak dapat mempublikasi berita.</li>
      									<li>Tidak dapat mengedit berita yang telah dipublikasi oleh Administrator atau Editor.</li>
      									<li>Tidak dapat mengatur headline news</li>
      									<li>Tidak dapat mengatur Breaking News</li>
      								</ul>
      							</li>
      							<li>
      								Contributor:
      								<ul>
      									<li>Hanya dapat menambahkan berita, tetapi hanya tersimpan pada draft, sama seperti Author</li>
      									<li>Tidak dapat menambahkan gambar/foto, publikasi, headline, breaking, dan tidak dapat
      										memilih kategori.</li>
      								</ul>
      							</li>
      						</ol>
      					</div>
                                    @endcan
      					<div id="kategori">
      						<h3><u>Kategori</u></h3>
      						<p>
      							Guna mempermudah pengelompokkan berita atau artikel yaitu menggunakan kategori-kategori atau label. Perbedaanya,
      							kategori memiliki induk katagori atau anak kategori dalam pengelompokkannya, sedangkan label tidak. Untuk kategori,
      							sebaiknya tidak banyak menggunakan banyak kategori dalam satu berita, berbeda dengan label, ia dapat digunakan lebih banyak
      							untuk mengelompokkan berita ke dalam label yang sesuai dengan isi berita.
							</p>
							<p>
								Cara mengelola kategori cukup mudah. Klik link kategori, pada kolom/sidebar kiri terdapat kolom penambahan kategori, sedangkan
								pada kolom sebelah kanan untuk mengelola kategori seperti mengedit maupun menghapus kategori.
								
								<h5><b>Penambahan Kategori</b></h5>
								<ol>
									<li>Nama: nama kategori yang akan ditambahkan</li>
									<li>Induk: pilih nama induk kategori apabila kategori tersebut ingin memimiliki induk kategori.</li>
									<li>Deskripsi: Bersifat opsional, tetapi sebaiknya diisi karena kategori ini dihubungkan dengan SEO (Search Engine Optimize),
									Silahkan googling, tentang SEO.</li>
									<li>Klik tombol "Tambah Kategori".</li>
								</ol> 
								<h5><b>Edit Kategori</b></h5>
								Untuk mengedit kategori klik link kategori pada sidebar sebelah kanan. Untuk cara penggunaanya kurang 
								lebih sama seperti menambah kategori.
								<h5><b>Hapus Kategori</b></h5>
								Untuk menghapus kategori anda tinggal klik tombol pada kolom hapus di baris kategori tersebut. 
							</p>
      					</div>
      					<div id="label">
      						<h3><u>Label</u></h3>
      						<p>
      							Seperti dijelaskan pada kategori di atas, label lebih bersifat fleksibel meskipun tidak memiliki induk ataupun anak
      							kalimat. Lantaran dalam satu berita atau artikel dapat memilih label lebih banyak yang sesuai dengan isi
      							berita.
      						</p>
      						<h5><b>Penambahan Kategori</b></h5>
      						Penambahan dan edit label kurang lebih sama dengan kategori di atas. Perbedaanya label tidak memiliki pilihan induk 
      						atau anak label.
      					</div>
      					<div id="berita">
      						<h3><u>Berita</u></h3>
      						<p>
      							Berita atau konten merupakan salah satu isi utama pada suatu portal informasi.
      						</p>
      						<h5><b>Tambah Berita dan Edit Berita</b></h5>
      						<p>Untuk menambah berita anda dapat memilih Tambah Berita Baru baik pada sidebar kiri utama atau pada halaman Semua Berita paling atas. <br>
      							<ul>
      								<li>Judul: Adalah judul berita.</li>
      								<li>Isi Berita: Anda dapat mengisi berita seperti menggunakan aplikasi office komputer Anda.</li>
      								<li>Meta Deskripsi: Sebagai SEO deskripsi pada halaman pencarian search engine seperti Google.</li>
      								<li>Meta Keyword: Kata kunci pada mesin pencari, menggunakan koma untuk memisah kata kunci.</li>
      								<li>Publikasi
      									<ol>
      										<li>Status: Status berita akan disimpan sebagai draft atau akan dipublikasikan.</li>
      										<li>Headnews: Dipilih apabila berita masuk sebagai kepala berita, letaknya berada pada halaman home/beranda/utama paling atas sebelah kanan.</li>
      										<li>Breaking News: Dipilih apabila ingin menampilkan pada teks berjalan yang letaknya berada paling atas di bawah navigasi.</li>
      										<li>Pada footer/kaki Publikasi, terdapat tombol simpan untuk menyimpan konten ke database.</li>
      									</ol>
      								</li>
      								<li>Kategori: pilih kategori yang telah dibuat sebelumnya, tetapi apabila belum ada, anda langsung dapat membuat kategori baru
      									dengan mengklik link "Tambah Kategori Baru". Masukkan nama kategori dan pilih induk kategori, apabila tidak memiliki induk kategori kosongkan saja.</li>
      								<li>Untuk label kurang lebih sama seperti kategori, tetapi lebih cocok untuk pengelompokkan berita dengan pilihan label lebih banyak.</li>
      								<li>Di bawah Label terdapat "Thumbnail Gambar", diinput apabila ingin menampilkan gambar thumbnail atau gambar kecil pada halaman utama atau halaman kategori depan.</li>
      							</ul>
      						</p>
      						<h5><b>Menambah Gambar atau File</b></h5>
      						<p>
      							Selain menambah gambar thumbnail, pada konten atau isi deskripsi berita dapat ditambahkan gambar, foto, ataupun file. File 
      							dapat diunggah maksimal 50Mb, dan khusus untuk 
      							gambar meskipun dapat maksimal 50Mb tetapi sebaiknya tidak lebih dari 4Mb, apabila lebih dari 4MB gambar tidak dapat otomatis di resize lebih kecil sehingga tetap
      							seperti ukuran aslinya. Untuk file tidak ada masalah.
      						</p>
      						<h5><b>Menghapus Berita</b></h5>
      						Menghapus berita bisa melalui halaman semua berita atau pada halaman edit berita.
      					</div>
      					<div id="halaman">
      						<h3><u>Halaman</u></h3>
      						<p>
      							Halaman sekilas mirip konten berita atau artikel. Halaman bersifat statis atau hanya tampil pada satu halaman saja. 
      							Dan hanya dapat dimunculkan pada Header/kepala Website menggunakan pengaturan "Menu" setelah halaman dibuat. Halaman tidak
      							memilik kategori.
      						</p>
      						<p>Halaman / Page ini seperti Halaman About Us/Tentang kami, dan sebagainya.</p>
      						<p>Untuk pembuatan dan editing seperti pada <a href="#berita">Berita</a>. </p>
      					</div>
      					<div id="info-kecamatan">
      						<h3><u>Info Kecamatan</u></h3>
      						<p>
      							Info Kecamatan merupakan data kecamatan yang letaknya di halaman (bukan halaman admin) pada halaman kategori yang merupakan anak dari 
      							kategori Kecamatan.
      						</p>
      						<p>
      							Cara menginputnya kurang lebih seperti mengisi <a href="#berita">Berita</a>, tetapi pada sidebar/kolom kanan terdapat
      							pemilihan kategori dan input informasi kecamatan. 
      						</p>
      						<ul>
      							<li>Kategori: untuk memilih penempatan info kecamatan ini, akan ditempatkan di anak kategori kecamatan yang dipilih.</li>
      							<li>Input Informasi: teridir dari 2 inputan setiap info
      								<ul>
      									<li>Atas: Kata Kunci info, misalnya "Camat"</li>
      									<li>Bawah: Isi dari info tersebut, misalnya "Nama Camat".</li>
      								</ul>
      							</li>
      							<li>Info ini bisa ditambahkan lebh dari satu. Caranya dengan mengklik tombol "Tambah Input" dibawahnya. Dan 
      								dapat dihapus dengan mengklik tombol "Del" disebelah kanannya.</li>
      							<li>Klik tombol Simpan di atas kanan halaman untuk menyimpan info kecamatan.</li>
      						</ul>
      					</div>
      					<div id="iklan">
      						<h3><u>Iklan</u></h3>
      						<p>
      							Halaman pengelolaan iklan ini untuk menambahkan iklan, tetapi penempatan iklan apa saja akan akan ditampilkan hanya melalui 
      							halaman <a href="#tampilan">"Tampilan"</a>, meskipun iklan telah di approve atau publikasi.
      						</p>
      						<h5><b>Menginput Iklan</b></h5>
      						Secara umum pengisian atau penginputan iklan, tetapi mungkin ada beberapa yang perlu dipahami.
      						<ul>
      							<li><strong>Link:</strong> untuk tautan atau link ketika gambar iklan yang berada di halaman depan (bukan admin) diarahkan.
      								Biasanya kehalaman website pengiklan.</li>
      							<li><strong>Tanggal Mulai dan Berakhir: </strong>Tanggal mulai aktifnya iklan yang terdiri dari 2 inputan, inputan tanggal dan waktu, sama juga untuk
      								Tanggal Berakhir iklan. Iklan akan otomatis berhenti ketika tanggal berhenti telah terlewati.</li>
      						</ul>
      					</div>
                                    @can('administrator')
      					<div id="kontak-pesan">
      						<h3><u>Kontak Pesan</u></h3>
      						<p>
      							Kontak pesan merupakan informasi atau data dari pengunjung website yang telah mengirimkan atau mengisi data melalui
      							halaman Contact Us.
      						</p>
      					</div>

      					<div id="menu">
      						<h3><u>Menu / Navigasi</u></h3>
      						<p>
      							Merupakan pengaturan untuk menampilkan link/navigasi yang ingin ditampilkan pada header/kepala website.
      							<br>
      							Terdiri dari 2 menu, yaitu Menu atas dan Menu Kedua.
      						</p>
      						<ul>
      							<li><strong>Menu Atas</strong>: Menu yang berada paling atas website.</li>
      							<li><strong>Menu Kedua: </strong>Menu yang berada di bawah Menu Atas.</li>
      						</ul>
      						<p>
      							Baik menu atas maupun menu kedua, pada sidebar / kolom kiri memiliki isi yang sama.
      							Kolom kiri tersebut terdiri dari pilihan pada halaman, kategori, atau menggunakan link. 
      						</p>
      						<p>
      							Cara menggunakannya, apabila ingin menambahkan pada menu, pilih halaman, link, atau kategori.
      							Untuk halaman dan kategori, centang salah satu atau lebih yang akan ditampilkan pada menu.
      							<br>Klik tombol "Tambah ke Menu".
      							<br>Sedangkan untuk <strong>Link</strong>, isi Url dan Nama teks Link. Biasanya link untuk 
      							menampilkan link website lain pada website ini.
      							<br>Setelah itu edit nama dan title attribute link menu yang telah pindah ke kolom kanan. Title
      							Attribute merupakan keterangan yang muncul ketika kursor berada pada Nama menu tersebut.
      						</p>
      					</div>
                                    <div id="tampilan">
                                          <h3><u>Tampilan</u></h3>
                                          <p>
                                                Tampilan disini maksudnya pengaturan untuk tampilan sidebar atau kolom yang ada disebelah kiri atau kanan pada
                                                halaman depan/frontend (bukan halaman admin). Tetapi untuk iklan ada juga untuk yang diatas dan tengah. Jadi untuk mengatur posisi pemilihan widget dan menaruh pada posisi
                                                sesuai keinginan pada tempat dan kolom yang telah ditentukan. <br>
                                                Yang dilingkari di bawah ini merupakan sidebar.
                                                <img style="width:100%" src="{{asset('b/img/documentation/sidebar.jpg')}}" alt="">
                                          </p>
                                          <p>
                                                Pengaturan tampilan terbagi 3, pertama untuk halaman home/beranda, halaman tampilan berita, tampilan halaman default,
                                                dan tampilan kecamatan. <br>
                                                <ol>
                                                      <li><strong>Tampilan Beranda:</strong> Pengaturan sidebar/kolom halaman utama website ketika website pertama kali dikunjungi.
                                                            <ul> Tampilan Beranda/Home memiliki 6 tempat yang dapat diisi dengan widget:
                                                                  <li id="930-atas"><strong>Iklan 930 Atas</strong>
                                                                        <img src="{{asset('b/img/documentation/Iklan-930-atas-.jpg')}}" alt="">
                                                                        <br>
                                                                        Untuk menampilkan iklan dengan maksimal 930px atau dibawahnya. Untuk ditampilkan pada halaman depan:
                                                                        <img style="width:100%" src="{{asset('b/img/documentation/ads-top.jpg')}}" alt="">
                                                                  </li>
                                                                  <li id="930-tengah"><strong>Iklan 930 Tengah</strong> Sama seperti di atas, untuk iklan maksimal lebar 930px yang hasil letaknya 
                                                                        berada di tengah halaman home/beranda.</li>
                                                                  <li><strong>Sidebar Kiri Atas:</strong> yang berada pada konten yang terletak pada kiri atas konten. Tempat menampilkan widget-widget termasuk iklan 250.</li>
                                                                  <li><strong>Sidebar Kanan Atas:</strong> terletak di sebelah kanan tepat di bawah tempat <a href="#930-atas">Iklan 930 Atas</a>. Dapat
                                                                        diisi dengan iklan 300.<br>
                                                                        <img style="width:100%" src="{{asset('b/img/documentation/sidebar-kanan-atas.jpg')}}" alt="">
                                                                  </li>
                                                                  <li id="sidebar-kiri-bawah"><strong>Sidebar Kiri Bawah:</strong> Kolom di bawah Iklan <a href="#930-tengah">930 Tengah</a>.</li>
                                                                  <li><strong>Sidebar Tengah Bawah: </strong></li>
                                                                  <li><strong>Sidebar Kanan Bawah</strong></li>
                                                            </ul>
                                                      </li>
                                                      <li><strong>Tampilan Berita: </strong> Pengaturan sidebar/kolom halaman berita/artikel ketika berita diklik pengunjung.
                                                            <ul>
                                                                  <li>Hanya memiliki 2 tempat, yaitu Iklan 930 Atas dan sidebar/kolom kanan</li>
                                                                  <li>Kolom/sidebar kanan dapat juga diisi dengan iklan 300</li>
                                                            </ul>
                                                      </li>
                                                      <li><strong>Tampilan Hal Default: </strong> Pengaturan sidebar/kolom pada halaman kategori, page/halaman, dan halaman lainnya.
                                                            <ul>
                                                                  <li>Terdiri dari 3 tempat, Iklan 930 Atas, Sidebar Kiri dan Sidebar Kanan.</li>
                                                            </ul>
                                                      </li>
                                                      <li><strong>Tampilan Kecamatan: </strong>Pengaturan sidebar/kolom pada halaman dari anak kategori kecamatan. Sama
                                                            seperti Tampilan Hal Default, Tampilan kecamatan memiliki 3 tempat widget.</li>
                                                </ol>
                                          </p>
                                          <p>
                                                Cara pengaturan untuk tampilan kolom pada masing-masing tempat tersebut sama.
                                          </p>
                                          <p>
                                                Widget adalah jenis tampilan yang dapat dipilih agar dapat tampil pada sidebar/kolom. Jenis widget disini ada berbagai macam termasuk
                                                untuk menampilkan iklan yang telah dibuat pada <a href="#iklan">Halaman Iklan (Admin)</a>
                                          </p>
                                          <ul>
                                                <li><strong>Iklan 250, Iklan 300, dan Iklan 930: </strong>
                                                      <p>
                                                            <img style="width:100%" src="{{asset('b/img/documentation/Iklan-250.jpg')}}" alt="">
                                                      </p>
                                                      <p>
                                                            Yaitu untuk menampilkan iklan.
                                                      </p>
                                                      <ul>Untuk menampilkan iklan selebar 250, 300 atau 930:
                                                            <li>Klik iklan 250 dan pilih pada sidebar mana ingin ditampilkan</li>
                                                            <li>Untuk mengambil iklan dari <a href="#iklan">Iklan</a> pada Format Input Iklan pilih
                                                                  "Dipilih".</li>
                                                            <li>Cari iklan yang telah dibuat sebelumnya pada <a href="#iklan">Iklan</a> dengan mengetikkan
                                                                  nama iklan yang sudah dibuat tersebut.</li>
                                                            <li>Iklan ini dapat diisi dengan banyak iklan dengan mengklik tombol "Tambah Input" dibawah pencarian iklan.</li>
                                                            <li>Apabila iklan lebih dari satu atau banyak, iklan yang tampil akan muncul secara acak setiap kali halaman tersebut dikunjungi.</li>
                                                      </ul>
                                                </li>
                                                <li><strong>Widget News</strong>
                                                      <p>
                                                            Widget News untuk menampilkan berita dari salah satu kategori. Tampilannya akan seperti ini: <br>
                                                            <img src="{{asset('b/img/documentation/widget-news.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                                <li><strong>Widget Kecamatan</strong>
                                                      <p>
                                                            Widget Kecamatan untuk menampilkan kategori-kategori dari anak kategori kecamatan. Tampilannya akan seperti ini: <br>
                                                            <img src="{{asset('b/img/documentation/widget-kecamatan.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                                <li><strong>Widget Lifestyle</strong>
                                                      <p>
                                                            Menampilkan berita dari salah satu kategori. Widget Lifstyle isinya sama dengan Widget News, hanya tampilan atasnya saja berbeda. Tampilannya akan seperti ini: <br>
                                                            <img src="{{asset('b/img/documentation/widget-lifestyle.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                                <li><strong>Widget List Populer Post</strong>
                                                      <p>
                                                            Untuk menampilkan berita paling populer, secara default terpopuler untuk 30 hari terakhir. Tampilannya akan seperti ini: <br>
                                                            <img src="{{asset('b/img/documentation/widget-list-populer.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                                <li><strong>Widget Tab News</strong>
                                                      <p>
                                                            Menampilkan berita dari salah satu kategori. Hanya untuk halaman Home/Beranda, letaknya hanya cocok ditempatkan pada <a href="#sidebar-kiri-bawah">Sidebar Kiri Bawah</a>. Tampilannya akan seperti ini: <br>
                                                            <img style="width:100%" src="{{asset('b/img/documentation/widget-tabs-news.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                                <li><strong>Widget Facebook</strong>
                                                      <p>
                                                            Untuk menampilkan streaming Facebook Fans Like. Tampilannya akan seperti ini: <br>
                                                            <img src="{{asset('b/img/documentation/wiget-facebook.jpg')}}" alt="">
                                                      </p>
                                                      <p>
                                                            Masukkan nama halaman facebook fans like anda pada inputannya tanpa http atau nama facebooknya, cukup nama fans pagenya yang bisa diambil pada
                                                            halaman facebook seperti ini: <br>
                                                            <img style="width:100%" src="{{asset('b/img/documentation/sample-facebook.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                                <li><strong>Widget Photo Post</strong>
                                                      <p>
                                                            Untuk menampilkan berita dari salah satu kategori. Tampilannya akan seperti ini: <br>
                                                            <img src="{{asset('b/img/documentation/widget-photo-post.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                                <li><strong>Widget List Image News</strong>
                                                      <p>
                                                            Terdiri dari 2 tab. Pertama Berita Terpopler, dan kedua berita terbaru. Tampilannya akan seperti ini: <br>
                                                            <img src="{{asset('b/img/documentation/widget-image-news-populer.jpg')}}" alt="">
                                                            <img src="{{asset('b/img/documentation/widget-image-news-terbaru.jpg')}}" alt="">
                                                      </p>
                                                </li>
                                          </ul>
                                    </div>
                                    <div id="pengaturan">
                                          <h3><u>Pengaturan</u></h3>
                                          <p>Untuk pengaturan secara umum website. Terdiri dari:
                                                <ol><strong>Pengaturan Umum:</strong>
                                                      <li><strong>Nama Website</strong>: tampil pada Logo website.</li>
                                                      <li><strong>Slogan: </strong>tampil dibawah nama logo.</li>
                                                      <li><strong>Meta Title: </strong> Judul website yang akan tampil pada judul pencarian website mesin pencari seperti google.</li>
                                                      <li><strong>Meta Keyword: </strong> Kata kunci utama website untuk SEO pencari mesin pencari seperti google.</li>
                                                      <li><strong>Meta Deskripsi: </strong>Deskripsi singkat website yang akan tampil pada website mesin pencari.</li>
                                                      <li><strong>Facebook,Twitter, Google Plus, dan Instagram: </strong>Sebagai link website pertemanan yang terdapat pada widget sosial dan footer(paling bawah sebelah kanan) webesite.
                                                            Bersifat opsional, apabila tidak diisi otomatis logo link tidak ada.</li>
                                                      <li><strong>Goole Analytic: </strong>Untuk menempatkan skrip Api Google Analytic.</li>
                                                      <li><strong>Jumlah News Feed Home Page: </strong>Jumlah berita yang tampil pada halaman utama/beranda.
                                                            <br>
                                                            <img style="width:100%" src="{{asset('b/img/documentation/news-feed.jpg')}}" alt="">
                                                      </li>
                                                </ol>
                                                <ul><strong>Email Penerima:</strong>
                                                      <li>Merupakan penerima email ketika Formulir Kontak pada Contact Us diisi oleh pengunjung.</li>
                                                </ul>
                                                <ul><strong>Kategori Footer:</strong>
                                                      <li>Terdapat 2 tempat kategori.</li>
                                                      <li>Untuk menampilkan anak kategori dari salah satu kategori.</li>
                                                      <li>Input Nama: nama yang akan tampil pada judul.</li>
                                                      <li>Nomor Id: Id kategori yang anak kategorinya ingin ditampilkan.</li>
                                                      <li>
                                                            <img style="width:100%" src="{{asset('b/img/documentation/kategori-footer.jpg')}}" alt="">
                                                      </li>
                                                </ull>
                                          </p>
                                    </div>
                                    @endcan
      				</div>
      			</div>
      		</div>
      	</div>
    </section>
        


@section('js')
<script>
$('#nav').affix({
    offset: {
        top: $('#nav').offset().top
    }
});
</script>
@endsection
@endsection