@extends('layouts.app')

@section('content')

@section('header')

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="pocaNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ url('/home') }}"><span style="color:#fff;">Lee-Nation</span><span style="width:0.5rem; height:0.5rem; display:inline-block;border-radius:50%;background:red;margin-left:0.2rem;"></span></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="./dashboard.html">Dashboard</a></li>
                                <li><a href="./music.html">Music</a></li>
                                <li class="current-item"><a href="./videos.html">Videos</a></li>
                                <li><a href="./pictures.html">Pictures</a></li>
                                <li><a href="./tour.html">Tour</a></li>
                                @guest
                                    <li>
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>


                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>

@endsection
<ul class="media-collection">
    <li class="mb-4">
      <a href="#">
       <img src="./img/bg-img/3.jpg" alt="">
        <p style="max-width:80%;" class="text-truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
          Placeat vitae sed deserunt sapiente illo libero, incidunt iusto quos qui inventore architecto suscipit culpa.
          Optio aut expedita, dolorem at commodi nemo!</p>
      </a>
    </li>
    <li class="mb-4">
      <a href="#">
       <img src="./img/bg-img/3.jpg" alt="">
        <p style="max-width:80%;" class="text-truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
          Placeat vitae sed deserunt sapiente illo libero, incidunt iusto quos qui inventore architecto suscipit culpa.
          Optio aut expedita, dolorem at commodi nemo!</p>
      </a>
    </li>
    <li class="mb-4">
      <a href="#">
       <img src="./img/bg-img/3.jpg" alt="">
        <p style="max-width:80%;" class="text-truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
          Placeat vitae sed deserunt sapiente illo libero, incidunt iusto quos qui inventore architecto suscipit culpa.
          Optio aut expedita, dolorem at commodi nemo!</p>
      </a>
    </li>
    <li class="mb-4">
      <a href="#">
       <img src="./img/bg-img/3.jpg" alt="">
        <p style="max-width:80%;" class="text-truncate">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
          Placeat vitae sed deserunt sapiente illo libero, incidunt iusto quos qui inventore architecto suscipit culpa.
          Optio aut expedita, dolorem at commodi nemo!</p>
      </a>
    </li>
  </ul>

@endsection
