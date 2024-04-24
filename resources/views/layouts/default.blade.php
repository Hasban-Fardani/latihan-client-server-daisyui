<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen overflow-hidden flex flex-col">
    <div class="navbar bg-red-500 text-white">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-red-500 text-white rounded-box w-52">
                    <li><a href="{{ route('page.index') }}">Home</a></li>
                    <li><a href="{{ route('page.spareparts') }}">Parts</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl">Otoparts</a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            </button>
            @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10">
                        <img src="{{asset('image/user-icon.svg')}}" alt="user image">
                    </div>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-red-500 text-white     rounded-box w-52">
                    <li>
                        @can('admin')
                        <a class="justify-between" href="{{route('page.admin.dashboard')}}">
                            Dashboard
                        </a>
                        @endcan
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a class="btn btn-ghost" href="{{ route('page.login') }}">Login</a>
            @endauth
        </div>
    </div>
    <main class="px-8 lg:px-52 py-10 flex-1">
        @yield('content')
    </main>
    <footer class="footer footer-center p-4 bg-gray-800 text-white">
        <aside>
            <p>Copyright © 2024 - All right reserved by Otoparts</p>
        </aside>
    </footer>
</body>
</html>
