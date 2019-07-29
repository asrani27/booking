
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
        <p class="app-sidebar__user-name">
          @if(Auth::user()->anggota == null)
          {{Auth::user()->name}}
          @else
          {{Auth::user()->anggota->nama}}
          @endif
        </p>
          <p class="app-sidebar__user-designation"></p>
        </div>
      </div>
      <ul class="app-menu">
        @if(Auth::user()->hasRole('admin'))
        <li><a class="app-menu__item {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Beranda</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('anggotaplaza*')) ? 'active' : '' }}" href="{{url('anggotaplaza')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Daftar Anggota Plaza </span></a></li>
        <li><a class="app-menu__item {{ (request()->is('komunitas*')) ? 'active' : '' }}" href="{{url('komunitas')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Daftar Komunitas</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('agendakomunitas*')) ? 'active' : '' }}" href="{{url('agendakomunitas')}}"><i class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">Jadwal Agenda Komunitas </span></a></li>
        <li><a class="app-menu__item {{ (request()->is('agendapemko*')) ? 'active' : '' }}" href="{{url('agendapemko')}}"><i class="app-menu__icon fa fa-institution"></i><span class="app-menu__label">Jadwal Plaza</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('pesertakegiatan*')) ? 'active' : '' }}" href="{{url('pesertakegiatan')}}"><i class="app-menu__icon fa fa-address-card"></i><span class="app-menu__label">Peserta Kegiatan</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('setting/waktu')) ? 'active' : '' }}" href="{{url('setting/waktu')}}"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Setting Waktu</span></a></li>
        <li><a class="app-menu__item" href="{{url('logout')}}"><i class="app-menu__icon fa fa-window-close"></i><span class="app-menu__label">Logout</span></a></li>
        @elseif(Auth::user()->hasRole('anggota'))
        <li><a class="app-menu__item {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Beranda</span></a></li>
          @if(Auth::user()->anggota->masterkomunitas->first() == null)

          @else
        <li><a class="app-menu__item {{ (request()->is('komunitasku*')) ? 'active' : '' }}" href="{{url('komunitasku')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Komunitas Saya</span></a></li>
          @endif
        <li><a class="app-menu__item {{ (strpos(Route::currentRouteName(), 'pesan') === 0) ? 'active' : '' }}" href="{{route('pesan')}}"><i class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">Pesan Tempat Plaza</span></a></li>
        <li><a class="app-menu__item {{ (strpos(Route::currentRouteName(), 'profil') === 0) ? 'active' : '' }}" href="{{route('profil')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profil</span></a></li>  
        <li><a class="app-menu__item" href="{{url('logout')}}"><i class="app-menu__icon fa fa-window-close"></i><span class="app-menu__label">Logout</span></a></li> 
        @elseif(Auth::user()->hasRole('pengelola'))
        <li><a class="app-menu__item {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Beranda</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('agendapemko*')) ? 'active' : '' }}" href="{{url('agendapemko')}}"><i class="app-menu__icon fa fa-institution"></i><span class="app-menu__label">Jadwal Plaza</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('pesertakegiatan*')) ? 'active' : '' }}" href="{{url('pesertakegiatan')}}"><i class="app-menu__icon fa fa-address-card"></i><span class="app-menu__label">Peserta Kegiatan</span></a></li>
        <li><a class="app-menu__item {{ (strpos(Route::currentRouteName(), 'profil') === 0) ? 'active' : '' }}" href="{{route('profil')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Ganti Password</span></a></li>  
        <li><a class="app-menu__item" href="{{url('logout')}}"><i class="app-menu__icon fa fa-window-close"></i><span class="app-menu__label">Logout</span></a></li> 
        @endif
      </ul>
    </aside>