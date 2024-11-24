<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'BlessfullHalls') }}</title>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-700">BlessfullHalls</a>
            <div>
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-gray-900 px-3">Home</a>
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-3">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 px-3">Register</a>
                @else
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900 px-3">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-gray-900 px-3">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-6 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white shadow-md mt-auto">
        <div class="container mx-auto px-4 py-6 text-center text-gray-600">
            &copy; {{ date('Y') }} BlessfullHalls. All rights reserved.
        </div>
    </footer>

    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

    @yield('scripts')

</body>
</html>
