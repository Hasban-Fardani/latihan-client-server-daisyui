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
                @if($errors->any())
                <div role="alert" class="alert alert-error justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ $errors->first() }}</span>
                    <div>
                        <a href="">X</a>
                    </div>
                </div>
                @endif
                @if(session('success'))
                <div role="alert" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                    <div>
                        <a href="">X</a>
                    </div>
                </div>
                @endif
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">
                        @yield('title')
                    </h2>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost avatar flex rounded-full !h-10">
                            <span>
                                {{ auth()->user()->name }}
                            </span>
                            <div class="w-10 rounded-full">
                                <img src="{{asset('images/person-circle.svg')}}" alt="user image">
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
        <div class="drawer-side min-h-full">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <ul class="menu p-4 w-64 min-h-full bg-red-500 text-white">
                <li></li>
                <!-- Sidebar content here -->
                <li><a href="{{ route('page.index') }}">Home</a></li>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('page.admin.spareparts') }}">Spareparts</a></li>
                <li><a href="{{ route('categories.index') }}">Kategori</a></li>
                <li><a href="{{ route('customers.index') }}">Customer</a></li>
                <li><a href="{{ route('page.admin.transaction') }}">Transaksi</a></li>
            </ul>

        </div>
    </div>

    @stack('javascript')
</body>
</html>
