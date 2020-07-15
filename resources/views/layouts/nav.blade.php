<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <div class="navbar-header" style="background: #222;">
        <a class="navbar-brand" href="/home">
          <b>
              <img src="{{ asset('img/logo.png') }}" alt="homepage" style="width: 95%" class="light-logo">
          </b>
          <a class="navbar-brand" href="/home"><b>
           </b>
         </a>
      </div>
      <div class="navbar-collapse" style="background: url(https://www.maretoplaza.com/themes/maretotheme/img/top-deco.png);background-repeat: repeat-x;">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"> <a class="nav-link sidebartoggler d-md-block waves-effect waves-dark" href="javascript:void(0)">
          <i class="fas fa-bars"></i></a> </li>
      </ul>
          <ul class="navbar-nav my-lg-0">
            <li class="nav-item right-side-toggle">
              <a class="nav-link  waves-effect waves-light" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
              </a>
            </li>
        </ul>
      </div>
  </nav>
</header>
<aside class="left-sidebar" style="background: #222;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div class="text-center">
                    <a href="{{ route('editAsesor',Auth()->user()->id) }}" class="u-dropdown link hide-menu text-white">
                      {{Auth()->user()->name}}
                    </a>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          @if (Auth()->user()->role == 1)
          <ul id="sidebarnav">
            <li class="nav-small-cap text-white">--- ADMINISTRACIÓN</li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('home') }}"><i id="icon-nav" class="text-white fas fa-home"></i><span class="hide-menu txtMenu">Inicio</span></a>
            </li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('clients') }}"><i id="icon-nav" class="text-white fas fa-user"></i><span class="hide-menu txtMenu">Gestion de Clientes</span></a>
            </li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('emails') }}"><i id="icon-nav" class="text-white fas fa-mail-bulk"></i><span class="hide-menu txtMenu">Gestion de Correos</span></a>
            </li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('asesors') }}"><i id="icon-nav" class="text-white fas fa-users"></i></i><span class="hide-menu txtMenu">Gestion de Asesores</span></a>
            </li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('contracs') }}"><i id="icon-nav" class="text-white fas fa-id-badge"></i><span class="hide-menu txtMenu">Gestion Contratos</span></a>
            </li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('task') }}"><i id="icon-nav" class="text-white fas fa-tags"></i><span class="hide-menu txtMenu">Gestion Tareas</span></a>
            </li>
         </ul>
         @else
           <ul id="sidebarnav">
            <li class="nav-small-cap text-white">--- ADMINISTRACIÓN</li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('home') }}"><i id="icon-nav" class="text-white fas fa-home"></i><span class="hide-menu txtMenu">Inicio</span></a>
            </li>
            <li>
              <a class="waves-effect waves-dark text-white" href="{{ route('clients') }}"><i id="icon-nav" class="text-white fas fa-user"></i><span class="hide-menu txtMenu">Gestion de Clientes</span></a>
            </li>
           </ul>
         @endif
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
