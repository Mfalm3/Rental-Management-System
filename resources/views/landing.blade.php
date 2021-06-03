<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Rental management system. Manage properties, agents and tenants">
    <meta name="author" content="https://github.com/Mfalm3">
    <meta name="keywords" content="Rental Management System, Laravel, Property Management system, PHP">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app')['name'] }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="antialiased">
<!-- header -->
<header class="fixed top-0 z-10 w-screen bg-gray-50">
    <nav class="">
        <ul class="hidden flex flex-col sm:flex-row mt-1 sm:p-2 sm:mr-4 sm:flex text-center">
            <li class="p-4 sm:mx-32 sm:mr-auto"><a href="">Logo</a></li>
            <li class="p-4"><a href="#">Home</a></li>
            <li class="p-4"><a href="#">About</a></li>
            <li class="p-4"><a href="#">Contact Us</a></li>
            @if (Route::has('login'))
                @auth
                    <li class="p-4">
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 underline">Dashboard</a>
                    </li>
                @else
                    <li class="p-4">
                        <a href="{{ route('login') }}" class="text-gray-700 underline">Login</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="p-4">
                            <a href="{{ route('register') }}" class="text-gray-700 underline">Register</a>
                        </li>
                    @endif
                @endauth
            @endif
        </ul>
    </nav>
</header>

<!-- header -->


<!-- main -->
<main>
    <!-- hero -->
    <section>
        <div class="hero min-h-screen">
            <div class="absolute top-0 left-0 w-full h-full bg-gray-600 bg-opacity-50 flex justify-center content-center text-center">
                <p class="z-20 m-auto text-white text-4xl">Get Your Dream House Today</p>
            </div>
        </div>
    </section>
    <!-- hero -->

    <!-- property listing -->
    <section>
        <div class="flex flex-wrap m-5">
            @if($ads->count())
                @foreach($ads as $ad)
                    <x-adlistcard :ad="$ad" />
                @endforeach
                    <p class="items-center"> {{ $ads->links() }} </p>
            @else
                <div class="flex justify-center">
                    <p class="text-center">No Ads posted yet</p>
                </div>
            @endif
        </div>
    </section>
    <!-- property listing -->
</main>
<!-- main -->


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
