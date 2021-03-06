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
                            <li><a href="/starrecords/musics">Music</a></li>
                            <li><a href="/starrecords/videos">Videos</a></li>
                            <li class="current-item"><a href="/starecords/photos">Pictures</a></li>
                            <li><a href="/starrecords/tours">Tour</a></li>
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
                <h2 class="title mt-70">Photo Gallery</h2>
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
<div class="container">
    <div class="row poca-portfolio">
    @forelse ($photos as $photo)

              <!-- Single gallery Item -->
              <div class="col-12 col-md-6 single_gallery_item wow fadeInUp" data-wow-delay="0.2s">
                <!-- Welcome Music Area -->
                <div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
                  <div class="poca-music-thumbnail">
                    <img src="{{asset($photo->url)}}" alt="">
                  </div>
                  <div class="poca-music-content text-center">
                  <p>{{$photo->caption}}</p>

                    <div class="likes-share-download d-flex align-items-center justify-content-between">
                    <form action="{{$photo->path().'/like'}}" method="POST" id="like-{{$photo->id}}">
                            @method('PATCH')
                            @csrf
                                <a onclick="document.getElementById('like-{{$photo->id}}').submit()" style="cursor:pointer;"><i class="fa fa-heart" aria-hidden="true"></i> Like ({{$photo->likes}})</a>
                            </form>
                      <div>
                        @if (auth()->user()->isAdmin())
                        <form action="{{$photo->path()}}" method="POST" id="del-{{$photo->id}}">
                            @method('DELETE')
                            @csrf
                                <a onclick="document.getElementById('del-{{$photo->id}}').submit()" style="cursor:pointer;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </form>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>

    @empty
        <p class="lead text-center d-block w-100">No picture has been added.</p>
    @endforelse
    </div>
</div>

@endsection
