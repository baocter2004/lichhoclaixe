<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('client.layouts.partials.css')
</head>

<body>

    <div class="container">
        <!-- Navbar Start -->

        @include('client.layouts.partials.navbar')

        <!-- Navbar End -->

        @yield('content')

        <!-- Back to Top -->

        @include('client.layouts.partials.footer')

        @include('client.layouts.partials.script')
    </div>
</body>

</html>
