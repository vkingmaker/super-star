@extends('layouts.app')

@section('header')
    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="pocaNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ url('/starrecords') }}"><span style="color:#fff;">Lee-Nation</span><span style="width:0.5rem; height:0.5rem; display:inline-block;border-radius:50%;background:red;margin-left:0.2rem;"></span></a>

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
                                <li class="current-item"><a href="/starrecords">Dashboard</a></li>
                                <li><a href="./music.html">Music</a></li>
                                <li><a href="/starrecords/videos">Videos</a></li>
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

        <!-- ***** Breadcrumb Area Start ***** -->
        <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/2.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <h2 class="title mt-70">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>

    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcumb--con">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-cog"></i class="breadcrumb-item active" aria-current="dashboard">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->
    @endsection
    <!-- ***** Header Area End ***** -->
@section('content')

 <!-- ***** Featured Music Area Start ***** -->
<div class="poca-featured-music-area mt-50">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="poca-music-area box-shadow d-flex align-items-center flex-wrap border" data-animation="fadeInUp" data-delay="900ms">
            <div class="poca-music-thumbnail">
              <img src="./img/bg-img/4.jpg" alt="">
            </div>
            <div class="poca-music-content">
              <span class="music-published-date">December 9, 2018</span>
              <h2>Olurun Maje</h2>
              <div class="music-meta-data">
                <p>By <a href="#" class="music-author">Dbanj</a> | <a href="#" class="music-catagory">Afro pop</a> | <a href="#" class="music-duration">00:02:56</a></p>
              </div>
              <!-- Music Player -->
              <div class="poca-music-player">
                <audio preload="auto" controls>
                  <source src="audio/dummy-audio.mp3">
                </audio>
              </div>
              <!-- Likes, Share & Download -->
              <div class="likes-share-download d-flex align-items-center justify-content-between">
                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
                <div>
                  <a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
                  <a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Featured Music Area End ***** -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md">
            <!-- Button trigger modal -->
            <div style="display: flex; justify-content: space-between;">
                <button type="button" class="btn btn-primary add-video-btn"
                    style="width: 250px;height: 70px;border-radius: 100px;" data-toggle="modal"
                    data-target="#musicModal">
                    Add Music
                </button>
                <button type="button" class="btn btn-primary add-video-btn"
                    style="width: 250px;height: 70px;border-radius: 100px;" data-toggle="modal"
                    data-target="#videoModal">
                    Add Video
                </button>
                <button type="button" class="btn btn-primary add-video-btn"
                    style="width: 250px;height: 70px;border-radius: 100px;" data-toggle="modal"
                    data-target="#pictureModal">
                    Add Picture
                </button>
                <button type="button" class="btn btn-primary add-video-btn"
                    style="width: 250px;height: 70px;border-radius: 100px;" data-toggle="modal"
                    data-target="#tourModal">
                    Tour
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Video</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">
                                <!-- Form -->
                                <form action="/starrecords/videos" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="title" class="form-control mb-30"
                                                placeholder="title">
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="url" class="form-control mb-30"
                                                placeholder="video url">
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="thumb_nail" class="form-control mb-30"
                                                placeholder="thumbnail">
                                        </div>
                                        <div class="modal-footer" style="border-top: none;right:-5px;width:100%;">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="musicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add music</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">
                                <!-- Form -->
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="title" class="form-control mb-30"
                                                placeholder="title">
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="url" class="form-control mb-30"
                                                placeholder="url">
                                        </div>
                                        <div class="modal-footer" style="border-top: none;right:-5px;width:100%;">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Picture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">
                                <!-- Form -->
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="text" name="url" class="form-control mb-30"
                                                placeholder="url">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="caption" class="form-control mb-30"
                                                placeholder="caption"></textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top: none;right:-5px;width:100%;">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="tourModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Tour</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="contact-form">
                                <!-- Form -->
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="date" name="date" class="form-control mb-30"
                                                placeholder="Date">
                                        </div>
                                        <div class="col-12">
                                            <textarea name="venue" class="form-control mb-30"
                                                placeholder="Venue"></textarea>
                                        </div>
                                        <div class="modal-footer" style="border-top: none;right:-5px;width:100%;">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
