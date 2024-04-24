@extends('layouts.admin')
@section('title', 'Kostumer')
@section('content')
<div class="flex gap-4 mt-4">
    <!-- Open the modal using ID.showModal() method -->
    <dialog id="detail_customer_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-xl">Detail User</h3>
            <div class="flex mt-4  justify-between">
                <div>
                    <h4 class="font-semibold text-lg">Name</h4>
                    <p id="username"></p>
                </div>
                <div>
                    <h4 class="font-semibold text-lg">Phone</h4>
                    <p id="userphone"></p>
                </div>
            </div>
            <h4 class="mt-2 font-semibold text-lg">Address</h4>
            <p id="useraddress"></p>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
    <dialog id="edit_customer_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Edit User</h3>
            <form action="{{ route('customers.update', 100000000) }}" method="post" id="editCustomer" name="editCustomer" class="mt-4">
                @csrf
                @method('PUT')                
                <div class="flex gap-4">
                    <input type="text" name="name" id="edit-username" class="input input-bordered"/>
                    <input type="text" name="phone" id="edit-userphone" class="input input-bordered"/>
                </div>
                <textarea name="address" id="edit-useraddress" cols="60" rows="3" class="textarea textarea-bordered mt-2"></textarea>
            </form>
            <div class="modal-action">
                <button type="submit" form="editCustomer">submit</button>
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
    <div class="lg:w-1/3">
        <form action="{{ route('customers.store')}}" method="post" class="border p-4">
            @csrf
            <h3 class="text-xl font-semibold">Tambahkan Customer</h3>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Nama</span>
                </div>
                <input type="text" class="input input-bordered input-sm" name="name">
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Telepon</span>
                </div>
                <input type="text" class="input input-bordered input-sm" name="phone">
            </label>
            <label class="form-control">
                <div class="label">
                    <span class="label-text">Alamat</span>
                    <span class="label-text-alt">(optional)</span>
                </div>
                <textarea name="address" class="textarea textarea-bordered" cols="30" rows="5"></textarea>
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
                            <th>phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <button onclick="showDetail('{{$customer->name}}', '{{$customer->phone}}', `{{$customer->address}}`)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                        </svg>
                                    </button>
                                    <button onclick="edit('{{$customer->id}}', '{{$customer->name}}', '{{$customer->phone}}', `{{$customer->address}}`)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@push('javascript')
<script>
    function showDetail(name, phone, address) {
        document.getElementById('username').innerText = name;
        document.getElementById('userphone').innerText = phone;
        document.getElementById('useraddress').innerText = address;
        detail_customer_modal.showModal();
    }

    function edit(id, name, phone, address) {
        let form = document.getElementById('editCustomer');
        form.action = form.action.replace('100000000', id);

        document.getElementById('edit-username').value = name;
        document.getElementById('edit-userphone').value = phone;
        document.getElementById('edit-useraddress').value = address;
        edit_customer_modal.showModal();
    }

</script>
@endpush
