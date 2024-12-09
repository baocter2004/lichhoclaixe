<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @include('auth.layouts.partials.css')
</head>

<body class="bg-gradient-primary">
    <h1 class="text-center text-dark">@yield('title')</h1>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <!-- place footer here -->
    </footer>
    @include('auth.layouts.partials.script')
</body>

</html>
