@extends('layouts.default')
@section('content')
<form action="{{ route('login') }}" method="POST" class="border p-4">
    <h2 class="text-center text-2xl font-bold">Login</h2>
    @csrf
    <label class="form-control">
        <div class="label">
            <span class="label-text">Email</span>
        </div>
        <input type="email" placeholder="email" name="email" class="input input-bordered">
    </label>
    <label class="form-control">
        <div class="label">
            <span class="label-text">Password</span>
        </div>
        <input type="password" placeholder="password" name="password" class="input input-bordered">
    </label>

    <button type="submit" class="btn bg-red-500 text-white mt-4">login</button>
</form>
@endsection