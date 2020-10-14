<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">

        <a href="#" class="logo text-white">
            <h4>SENASOFT-2020 </h4>
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

        <div class="container-fluid">
        
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div style="width: 60px; height: 60px"class="avatar">
                             <img src="{{ asset('assets/img/1.jpg') }}" alt="..." class="avatar-img rounded-circle">    
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="u-text">
                                        {{-- <h3>{{ Auth::user()->name }}</h3>
                                        <p class="text-muted">{{ Auth::user()->email }}</p> --}}
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="text-center">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                                        <i class="fas fa-sign-out-alt"></i>
                                            {{ __('Salir') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </div>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>