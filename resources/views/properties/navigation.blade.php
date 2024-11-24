<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <!-- Add your CSS here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <header>
        <!-- Navigation bar -->
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{ route('properties.index') }}">Properties</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        @yield('content') <!-- Main content section -->
    </main>

    <footer>
        <!-- Footer content -->
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </footer>

    <!-- Add your JavaScript here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
