<!-- Navbar-->
<header class="main-header-top hidden-print">
    <a href="{{ url('/') }}" class="logo"><img class="img-fluid able-logo" src="{{ asset('images/codeelab.png') }}" alt="{{ config('app.name') }}"></a>
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
        <!-- Navbar Right Menu-->
        <div class="navbar-custom-menu f-right">
            <ul class="top-nav">
                <!--Notification Menu-->
                    
                        <!-- window screen -->
                        <li class="pc-rheader-submenu">
                            <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                                <i class="icon-size-fullscreen"></i>
                            </a>

                        </li>
                        <!-- User Menu-->
                        <li class="dropdown">
                            <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                                <span><img class="img-circle " src="{{ Auth::user()->foto }}" style="width:40px;" alt="User Image"></span>
                                <span><b> {{ Auth::user()->nombre }}</b> <i class="fas fa-angle-down"></i></span>

                            </a>
                            <ul class="dropdown-menu settings-menu">
                                <li><a href="#!"><i class="icon-settings"></i> Settings</a></li>
                                <li><a href="profile.html"><i class="icon-user"></i> Profile</a></li>
                                <li><a href="message.html"><i class="icon-envelope-open"></i> My Messages</a></li>
                                <li class="p-0">
                                    <div class="dropdown-divider m-0"></div>
                                </li>
                                <li><a href="lock-screen.html"><i class="icon-lock"></i> Lock Screen</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="icon-logout"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Side-Nav-->

        <aside class="main-sidebar hidden-print " >
            <section class="sidebar" id="sidebar-scroll">
                
                <div class="user-panel">
                    <div class="f-left image"><img src="{{ Auth::user()->foto }}" alt="{{ Auth::user()->nombre }}" class="img-circle"></div>
                    <div class="f-left info">
                        <p>{{ Auth::user()->nombre }} {{ Auth::user()->a_paterno }}</p>
                    </div>
                </div>
                <!-- Sidebar Menu-->
                <ul class="sidebar-menu">
                    <li class="nav-level">Menú</li>
                    <li class="active treeview">
                        <a class="waves-effect waves-dark" href="{{ url('/') }}">
                            <i class="icon-speedometer"></i><span> Inicio</span>
                        </a>                
                    </li>

                    <li class="nav-level">Administrador</li>

                    @can('users.index')
                    <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> Usuarios</span><i class="icon-arrow-down"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="waves-effect waves-dark" href="{{ route('users.index') }}"><i class="icon-arrow-right"></i> Listado de Usuarios</a></li>
                        </ul>
                    </li>
                    @endcan
                    
                    @can('roles.index')
                    <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> Roles</span><i class="icon-arrow-down"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="waves-effect waves-dark" href="{{ route('roles.index') }}"><i class="icon-arrow-right"></i> Listado de Roles</a></li>
                        </ul>
                    </li>
                    @endcan
                    
                    @can('products.index')
                    <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-book-open"></i><span> Productos</span><i class="icon-arrow-down"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="waves-effect waves-dark" href="{{ route('products.index') }}"><i class="icon-arrow-right"></i> Listado de Productos</a></li>
                        </ul>
                    </li>
                    @endcan

                    <li class="nav-level"></li>

                </ul>
            </section>
        </aside>
