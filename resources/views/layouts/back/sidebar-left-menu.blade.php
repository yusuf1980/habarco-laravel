<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{--Auth::user()->name--}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div-->
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview {{ Request::is('kukaradmin/dashboard')?'active':'' }}">
          <a href="{{url('kukaradmin/dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>
        
        <li class="treeview {{ Request::is('kukaradmin/posts')?'active':'' }}{{ Request::is('kukaradmin/posts/create')?'active':'' }}">
          <a href="#">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Berita</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li {{ Request::is('kukaradmin/posts')?'class=active':'' }}><a href="{{url('kukaradmin/posts')}} "><i class="fa fa-circle-o"></i> Semua Berita</a></li>
            <li {{ Request::is('kukaradmin/posts/create')?'class=active':'' }}><a href="{{url('kukaradmin/posts/create')}} "><i class="fa fa-circle-o"></i> Tambah Berita Baru</a></li>
          </ul>
        </li>
        
        @can('editor')
        <li {{ Request::is('kukaradmin/category')?'class=active':'' }}>
          <a href="{{url('kukaradmin/category')}}">
            <i class="fa fa-th-list" aria-hidden="true"></i> <span> Kategori </span>
          </a>
        </li>
        <li {{ Request::is('kukaradmin/labels')?'class=active':'' }}>
          <a href="{{url('kukaradmin/labels')}}">
            <i class="fa fa-th-list" aria-hidden="true"></i> <span> Label </span>
          </a>
        </li>
        <li class="treeview {{ Request::is('kukaradmin/pages')?'active':'' }}{{ Request::is('kukaradmin/pages/create')?'active':'' }}">
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span>Halaman</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li {{ Request::is('kukaradmin/pages')?'class=active':'' }}><a href="{{url('kukaradmin/pages')}} "><i class="fa fa-circle-o"></i> Semua Halaman</a></li>
            <li {{ Request::is('kukaradmin/pages/create')?'class=active':'' }}><a href="{{url('kukaradmin/pages/create')}} "><i class="fa fa-circle-o"></i> Tambah Halaman Baru</a></li>
          </ul>
        </li>
        <!--li class="treeview {{ Request::is('kukaradmin/kecamatans')?'active':'' }}{{ Request::is('kukaradmin/kecamatans/create')?'active':'' }}">
          <a href="#">
            <i class="fa fa-map" aria-hidden="true"></i> <span>Info Kecamatan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li {{ Request::is('kukaradmin/kecamatans')?'class=active':'' }}><a href="{{url('kukaradmin/kecamatans')}} "><i class="fa fa-circle-o"></i> Semua Kecamatan</a></li>
            <li {{ Request::is('kukaradmin/kecamatans/create')?'class=active':'' }}><a href="{{url('kukaradmin/kecamatans/create')}} "><i class="fa fa-circle-o"></i> Tambah Kecamatan Baru</a></li>
          </ul>
        </li-->
        @endcan
        
        <li class="treeview {{ Request::is('kukaradmin/users')?'active':'' }}{{ Request::is('kukaradmin/users/create')?'active':'' }}{{ Request::is('kukaradmin/users/'.Auth::user()->id.'/edit')?'active':'' }}{{ Request::is('kukaradmin/users/'.Auth::user()->id.'/changepassword')?'active':'' }}">
          <a href="#">
            <i class="fa fa-users" aria-hidden="true"></i> <span>Pengguna</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            @can('administrator')
            <li {{ Request::is('kukaradmin/users')?'class=active':'' }}><a href="{{url('kukaradmin/users')}} "><i class="fa fa-circle-o"></i> Semua Pengguna</a></li>
            <li {{ Request::is('kukaradmin/users/create')?'class=active':'' }}><a href="{{url('kukaradmin/users/create')}} "><i class="fa fa-circle-o"></i> Tambah Pengguna</a></li>
            @endcan
            <li {{ Request::is('kukaradmin/users/'.Auth::user()->id.'/edit')?'class=active':'' }}><a href="{{ url('kukaradmin/users/'.Auth::user()->id.'/edit') }}"><i class="fa fa-circle-o"></i> Profile </a></li>
            <li {{ Request::is('kukaradmin/users/'.Auth::user()->id.'/changepassword')?'class=active':'' }}><a href="{{ url('kukaradmin/users/'.Auth::user()->id.'/changepassword') }}"><i class="fa fa-circle-o"></i> Ganti Password </a></li>
          </ul>
        </li>

        @can('editor')
        <li class="treeview {{ Request::is('kukaradmin/banners')?'active':'' }}{{ Request::is('kukaradmin/banners/create')?'active':'' }}">
          <a href="#">
            <i class="fa fa-rocket" aria-hidden="true"></i> <span>Iklan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li {{ Request::is('kukaradmin/banners')?'class=active':'' }}><a href="{{url('kukaradmin/banners')}} "><i class="fa fa-circle-o"></i> Semua Iklan</a></li>
            <li {{ Request::is('kukaradmin/banners/create')?'class=active':'' }}><a href="{{url('kukaradmin/banners/create')}} "><i class="fa fa-circle-o"></i> Tambah Iklan</a></li>
          </ul>
        </li>
        @endcan
        
        @can('administrator')
        <li class="treeview {{ Request::is('kukaradmin/contacts')?'active':'' }}">
          <a href="{{url('kukaradmin/contacts')}}">
            <i class="fa fa-phone" aria-hidden="true"></i> <span>Kontak Pesan</span>
          </a>
        </li>
        <li class="treeview {{ Request::is('kukaradmin/topmenu')?'active':'' }}{{ Request::is('kukaradmin/secondmenu')?'active':'' }}">
          <a href="#">
            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i> <span>Menu</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li {{ Request::is('kukaradmin/topmenu')?'class=active':'' }}><a href="{{url('kukaradmin/topmenu')}} "><i class="fa fa-circle-o"></i> Menu Atas</a></li>
            <li {{ Request::is('kukaradmin/secondmenu')?'class=active':'' }}><a href="{{url('kukaradmin/secondmenu')}} "><i class="fa fa-circle-o"></i> Menu Kedua</a></li>
          </ul>
        </li>
        
        
        <li class="treeview {{ Request::is('kukaradmin/sethome')?'active':'' }}{{ Request::is('kukaradmin/setcategory')?'active':'' }}{{ Request::is('kukaradmin/setsingle')?'active':'' }}{{ Request::is('kukaradmin/setkecamatan')?'active':'' }}">
          <a href="#">
            <i class="fa fa-eye" aria-hidden="true"></i> <span>Tampilan</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li {{ Request::is('kukaradmin/sethome')?'class=active':'' }}><a href="{{url('kukaradmin/sethome')}} "><i class="fa fa-circle-o"></i> Tampilan Beranda</a></li>
            <li {{ Request::is('kukaradmin/setcategory')?'class=active':'' }}><a href="{{url('kukaradmin/setcategory')}} "><i class="fa fa-circle-o"></i> Tampilan Hal Default</a></li>
            <li {{ Request::is('kukaradmin/setsingle')?'class=active':'' }}><a href="{{url('kukaradmin/setsingle')}} "><i class="fa fa-circle-o"></i> Tampilan Berita</a></li>
            <li {{ Request::is('kukaradmin/setkecamatan')?'class=active':'' }}><a href="{{url('kukaradmin/setkecamatan')}} "><i class="fa fa-circle-o"></i> Tampilan Kecamatan</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('kukaradmin/setglobal')?'active':'' }}">
          <a href="{{url('kukaradmin/setglobal')}}">
            <i class="fa fa-gear" aria-hidden="true"></i> <span>Pengaturan</span>
          </a>
        </li>
        @endcan
        
        @can('editor')
        <li {{ Request::is('kukaradmin/documentation')?'class=active':'' }}><a href="{{url('kukaradmin/documentation')}}"><i class="fa fa-book"></i> <span>Dokumentasi</span></a></li>
        @endcan
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>