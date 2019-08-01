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
                            <li><a href="/starrecords/photos">Pictures</a></li>
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
            <h2 class="title mt-70">{{$video->title}}</h2>
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
<section class="poca-contact-area mt-50 mb-100">
        <div class="container">
          <div class="row">
            <div class="col-8">
              <div class="google-maps mb-100">
              <video width="100%" poster="{{$video->thumb_nail}}" controls>
                  <source src="mov_bbb.mp4" type="video/mp4">
                  <source src="mov_bbb.ogg" type="video/ogg">
                  Your browser does not support HTML5 video.
                </video>
            <p style="max-width:80%;">{{$video->title}}</p>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- Contact Form -->
            <div class="col-12 col-md-6 mt-2">
                    <div class="comment_area mb-50 clearfix">
                            <h5 class="title">{{count($video->viewers_feedback)}} Comments</h5>
                @forelse ($video->viewers_feedback->all() as $comment)

                        <ol>
                          <!-- Single Comment Area -->
                          <li class="single_comment_area">
                            <!-- Comment Content -->
                            <div class="comment-content d-flex">
                              <!-- Comment Author -->
                              <div class="comment-author">
                              <img src="{{asset('/img/bg-img/4.jpg')}}" alt="author">
                              </div>
                              <!-- Comment Meta -->
                              <div class="comment-meta">
                                <a href="#" class="post-date">27 Aug 2018</a>
                              <h5>{{auth()->user()->name}}</h5>
                              <p>{{$comment->comment}}</p>
                              </div>
                            </div>
                          </li>
                        </ol>

                      @empty
                      <p>No commnents yet</p>
                      @endforelse
                    </div>



                <div class="contact-form">
                  <h5 class="mb-30">Leave A Comment</h5>

                  <!-- Form -->
                  <form action="{{$video->path().'/comment'}}" method="post">
                      @csrf

                    <div class="row">
                      <div class="col-12">
                        <textarea name="comment" class="form-control mb-30" placeholder="Comment"></textarea>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn poca-btn mt-30">Post Comment</button>
                      </div>
                    </div>
                  </form>

                </div>

              </div>
            </div>
          </div>
      </section>
@endsection
