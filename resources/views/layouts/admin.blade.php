<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen overflow-hidden">
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col min-h-screen">
            <!-- Page content here -->
            <div class="flex-1 p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">
                        @yield('title')
                    </h2>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost avatar w-max flex">
                            <span>
                                {{ auth()->user()->name }}
                            </span>
                            <div class="w-10 rounded-full">
                                <img src="{{asset('image/user-icon.svg')}}" alt="user image">
                            </div>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-red-500 text-white     rounded-box w-52">
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @yield('content')
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>
            </div>

            <footer class="footer footer-center p-4 bg-gray-800 text-white">
                <aside>
                    <p>Copyright © 2024 - All right reserved by Otoparts</p>
                </aside>
            </footer>
        </div>
        <div class="drawer-side">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-64 min-h-full bg-red-500 text-white">
                <li></li>
                <!-- Sidebar content here -->
                <li><a href="{{ route('page.index') }}">Home</a></li>
                <li><a href="{{ route('page.admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('page.admin.spareparts') }}">Spareparts</a></li>
                <li><a href="{{ route('page.admin.categories') }}">Kategori</a></li>
                <li><a href="{{ route('page.admin.customer') }}">Customer</a></li>
                <li><a href="{{ route('page.admin.transaction') }}">Transaksi</a></li>
            </ul>

        </div>
    </div>
</body>
</html>