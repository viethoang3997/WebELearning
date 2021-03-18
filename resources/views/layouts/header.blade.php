<header class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-light navbar-expand-sm d-flex justify-content-md-center flex-md-column flex-xl-row pl-xl-5 pr-xl-5 pt-xl-3 pb-xl-3">
            <button class="navbar-toggler col-2" id="header-button" type="button" data-target="#collapsibleNavbar" data-toggle="collapse">
                <span class="fa fa-bars" id="icon"></span>
            </button>
            <img src="{{ asset('storage/image/Hapo_Learn.png') }}" class="col-xl-3 col-md-6 col-8 ml-xl-1 m-auto">
            <div class="collapse navbar-collapse col-xl-5 col-md-12 justify-content-xl-end justify-content-md-center px-md-0 ml-md-2" id="collapsibleNavbar">
                <ul class="navbar-nav hapo-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('index') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('course.index') }}">ALL COURSES</a>
                    </li>
                    @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginRegister">LOGIN/REGISTER</a>
                    </li>
                    @else
                    <li class="dropdown m-1">
                        <a href="#" class="dropdown-toggle text-decoration-none" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->role_id != App\User::ROLE_USER)
                            <li>
                                <a href="{{ route('admin.index') }}" class="text-decoration-none">
                                    <span><i class="fa fa-tasks" aria-hidden="true"></i> Manage</span>
                                </a>
                            </li>
                            @endif
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();" class="text-decoration-none">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show', Auth::id()) }}">PROFILE</a>
                    </li>
                    @endif
                </ul>
            </div> 
        </nav>
    </div>
</header>
@include('login_register')
