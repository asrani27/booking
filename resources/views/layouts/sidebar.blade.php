
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Asrani</p>
          <p class="app-sidebar__user-designation">Backend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ (strpos(Route::currentRouteName(), 'home') === 0) ? 'active' : '' }}" href="{{route('home')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Beranda</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('agendakomunitas*')) ? 'active' : '' }}" href="{{url('agendakomunitas')}}"><i class="app-menu__icon fa fa-cubes"></i><span class="app-menu__label">Jadwal Agenda Komunitas </span></a></li>
        <li><a class="app-menu__item {{ (request()->is('agendapemko*')) ? 'active' : '' }}" href="{{url('agendapemko')}}"><i class="app-menu__icon fa fa-institution"></i><span class="app-menu__label">Jadwal Bersama Pemko</span></a></li>
        <li><a class="app-menu__item {{ (request()->is('pesertakegiatan*')) ? 'active' : '' }}" href="{{url('pesertakegiatan')}}"><i class="app-menu__icon fa fa-address-card"></i><span class="app-menu__label">Peserta Kegiatan</span></a></li>
        <li><a class="app-menu__item" href="{{url('logout')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>