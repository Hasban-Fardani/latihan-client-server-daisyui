@extends('layouts.admin')
@section('title', 'Kategori')
@section('content')
<div class="flex gap-4 mt-4">
    <div class="lg:w-1/3">
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
    <div class="lg:w-2/3">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
