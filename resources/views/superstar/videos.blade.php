@extends('layouts.app')

@section('header')
<header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="pocaNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ url('/starrecords') }}"><span style="color:#fff;">Lee-Nation</span><span
                            style="width:0.5rem; height:0.5rem; display:inline-block;border-radius:50%;background:red;margin-left:0.2rem;"></span></a>

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
                                <li><a href="/starrecords">Dashboard</a></li>
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
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

    <div class="breadcumb-area bg-img bg-overlay mb-4" style="background-image: url(/img/bg-img/2.jpg);">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12">
              <h2 class="title mt-70">Trending Video</h2>
            </div>
          </div>
        </div>
      </div>

    <div class="breadcumb--con">
    <div class="container">
        <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        </div>
    </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->
@endsection
@section('content')
<ul class="media-collection">
    @foreach ($videos as $video)
    <li class="mb-3">
    <a href="{{$video->path()}}">
        <video width="100%" poster="{{$video->thumb_nail}}" controls>
            <source src="{{$video->url}}" type="video/mp4">
            Your browser does not support HTML5 video.
            </video>
        <p style="max-width:80%;" class="text-truncate">{{$video->title}}</p>
        </a>
    </li>
    @endforeach
    </ul>
@endsection
