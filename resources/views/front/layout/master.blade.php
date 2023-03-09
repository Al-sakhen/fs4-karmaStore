<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('front.layout.partials.head')
</head>

<body id="{{ request()->routeIs('category') ? 'category' : '' }}">

    <!-- Start Header Area -->
    @include('front.layout.partials.header')
    <!-- End Header Area -->

    @yield('breadcrumb')


    @yield('content')


    <!-- start footer Area -->
    @include('front.layout.partials.footer')
    <!-- End footer Area -->

    @include('front.layout.partials.js')
</body>

</html>
