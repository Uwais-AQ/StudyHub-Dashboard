<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NSP') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f6f1; 
        }
        /* Custom Dark Color to match Bootstrap bg-dark */
        .bg-nsp-dark {
            background-color: #212529;
        }
        .nav-link-custom {
            color: #d1d5db; /* gray-300 */
            transition: color 0.3s ease;
        }
        .nav-link-custom:hover {
            color: #ffffff;
        }
    </style>
</head>
<body class="antialiased">
    <div id="app">
        <nav class="bg-nsp-dark shadow-sm py-4">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <a class="text-2xl font-bold tracking-tight text-white" href="{{ url('/') }}">
                    NSP
                </a>

                <div class="flex items-center space-x-6">
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link-custom font-medium" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="bg-gray-700 text-white px-5 py-2 rounded-xl text-sm font-semibold hover:bg-gray-600 transition" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        @endif
                    @else
                        <div class="flex items-center space-x-4">                            
                            <a class="border border-red-500 text-red-400 hover:bg-red-500 hover:text-white px-4 py-1.5 rounded-lg text-sm font-medium transition" 
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }} <span class="ml-1">⏻</span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="py-12">
            @yield('content')
        </main>
    </div>
</body>
</html>