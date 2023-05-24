<!doctype html>
<html class="no-js" lang="en">

@include('template_landingpages.header')

<body>
    <!--[if IE]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    {{-- PRELOADER, NAVBAR, HERO SECTION --}}
    @include('template_landingpages.navbar')

    @yield('content')

    {{-- THIS FOOTER --}}
    @include('template_landingpages.footer')

</body>

</html>
