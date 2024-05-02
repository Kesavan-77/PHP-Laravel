<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<x-style />
<body>
    <div class="container">
        <x-header name={{$name}} />
        <div class="main-content">
            <h2>@yield('page') Page</h2>
            <p>This is the @yield('page') page of our website. Feel free to explore!</p>
            @yield('feedback-form')
        </div>
        @yield('blogs')
    </div>
    <x-footer />
</body>
</html>
