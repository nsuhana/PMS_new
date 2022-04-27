@extends('base')

@section('content')

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

<div class="shadow card mt-3">
    <div class="card-header">
        <h3>Change Password</h3>
    </div>
    <form action="/user/{{ $user->id }}/tukar-kata-laluan" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('') --}}
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <label for="old_password" class="form-label w-50 mb-3">Kata Laluan Lama</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input type="password" id="old_password" name="old_password" class="form-control w-100" value="">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <label for="password" class="form-label w-100 mb-3">Kata Laluan Baru</label>
                        </div>
                        <div class="col-12">
                            <input type="password" id="password" name="password" class="form-control w-100" value="">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <label for="password_confirmation" class="form-label w-100 mb-3">Pengesahan Kata Laluan</label>
                        </div>
                        <div class="col-12">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control w-100" value="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-8"></div>
                <div class="col-2 fill">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary" style="width: 100%;"
                        type="button">Batal</a>
                </div>
                <div class="col-2 fill">
                    <button class="btn btn-primary" style="width: 100%;" type="submit">Tukar</button>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
