@extends('layouts.admin')
@section('title', 'Kategori')
@section('content')
<div class="flex gap-4 mt-4">
    <div class="lg:w-1/2">
        <form action="{{ route('categories.store')}}" method="post" class="border p-4">
            @csrf
            <h3 class="text-xl font-semibold">Buat Kategori</h3>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Nama</span>
                </div>
                <input type="text" class="input input-bordered input-sm" name="name">
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Slug</span>
                </div>
                <input type="text" class="input input-bordered input-sm" name="slug">
            </label>
            <button type="submit" class="btn mt-4 bg-red-500 text-white">Buat</button>
        </form>
    </div>
    <div class="lg:w-1/2">
        <div class="overflow-x-auto">
            <div class="border p-4">
                <table class="table table-zebra ">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama</th>
                            <th>Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
