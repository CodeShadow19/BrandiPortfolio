<!DOCTYPE html>
<head>
    <!-- meta charec set -->
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- Page Title -->
    <title>Themefisher.Free Bootstrap3 based HTML5 Templates</title>
    <!-- Meta Description -->
    <meta name="description" content="Blue One Page Creative HTML5 Template">
    <meta name="keywords" content="one page, single page, onepage, responsive, parallax, creative, business, html5, css3, css3 animation">
    <meta name="author" content="Muhammad Morshed">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- CSS
    ================================================== -->
    <!-- Fontawesome Icon font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Twitter Bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- jquery.fancybox  -->
    <link rel="stylesheet" href="{{asset('css/jquery.fancybox.css')}}">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- media-queries -->
    <link rel="stylesheet" href="{{asset('css/media-queries.css')}}">

</head>

<body id="body">

    @include('layout.menu')
    @yield('content')

<!-- Essential jQuery Plugins
		================================================== -->
<!-- Main jQuery -->
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
<!-- Single Page Nav -->
<script src="{{asset('js/jquery.singlePageNav.min.js')}}"></script>
<!-- Twitter Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- jquery.fancybox.pack -->
<script src="{{asset('js/jquery.fancybox.pack.js')}}"></script>
<!-- jquery.mixitup.min -->
<script src="{{asset('js/jquery.mixitup.min.js')}}"></script>
<!-- jquery.parallax -->
<script src="{{asset('js/jquery.parallax-1.1.3.js')}}"></script>
<!-- jquery.countTo -->
<script src="{{asset('js/jquery-countTo.js')}}"></script>
<!-- jquery.appear -->
<script src="{{asset('js/jquery.appear.js')}}"></script>
<!-- Contact form validation -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
<!-- Google Map -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<!-- jquery easing -->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>
<!-- jquery easing -->
<script src="{{asset('js/wow.min.js')}}"></script>
<script>
    var wow = new WOW ({
            boxClass:     'wow',      // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset:       120,          // distance to the element when triggering the animation (default is 0)
            mobile:       false,       // trigger animations on mobile devices (default is true)
            live:         true        // act on asynchronously loaded content (default is true)
        }
    );
    wow.init();
</script>
<!-- Custom Functions -->
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>

