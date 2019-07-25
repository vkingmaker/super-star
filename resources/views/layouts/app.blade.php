<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Poca - Podcast &amp; Audio Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>super star</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('favicon.ico')}}">



    <style>
        .media-collection {
            width: 95%;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
        }

        .media-collection li {
            list-style-type: none;
            width: calc((100% - 40px) / 4);
            display: inline-block;
            margin-right:10px;
            height:250px;
            overflow:hidden;
        }

        .media-collection li:not(:nth-child(4n)){
            margin-right:8px;
        }

        .media-collection a {

            text-decoration: none;
        }
        video{
            width: 100%;
            height:87%;
            object-fit: inherit;
        }
        .modal-backdrop{
            z-index: -1 !important;
        }
    </style>

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-thumbnail">
            <img src="{{asset('img/core-img/preloader.png')}}" alt="">
        </div>
    </div>

    @yield('header')

        <!-- ***** Contact Area Start ***** -->
        <section class="poca-contact-area mt-50 mb-100">

         @yield('content')

        </section>

    <!-- ******* All JS ******* -->
    <!-- jQuery js -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- All js -->
    <script src="{{asset('js/poca.bundle.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('js/default-assets/active.js')}}"></script>

</body>

</html>
