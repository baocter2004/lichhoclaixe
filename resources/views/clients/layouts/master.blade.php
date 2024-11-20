<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('clients.layouts.partials.css')
</head>

<body>
    <header>
        <!-- Topbar Start -->
        <div class="container-fluid">
            @include('clients.layouts.partials.topbar')
        </div>
        <!-- Topbar End -->


        <!-- Navbar Start -->
        <div class="container-fluid mb-5">
            @include('clients.layouts.partials.navbar')
        </div>
        <!-- Navbar End -->
    </header>

    <div class="container-fluid">
        @yield('content')
    </div>


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
       @include('clients.layouts.partials.footer')
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    @include('clients.layouts.partials.script')
</body>

</html>
