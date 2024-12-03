<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Học lái xe</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('clients.layouts.partials.css')
</head>

<body>
    <!-- Navbar Start -->

    @include('clients.layouts.partials.navbar')

    <!-- Navbar End -->

    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a> --}}

    @include('clients.layouts.partials.script')
</body>

</html>
