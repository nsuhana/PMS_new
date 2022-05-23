@extends('admin.base')

@section('content')

<div class="m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/user">User</a></li>
                <li>Tambah</li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="d-flex bd-highlight align-items-center">
            <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">Tambah</h1>
        </div>
    </div>

    <div class="row">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
    </div>

    <div class="shadow card my-4">
        <div class="card-body">
            <div class="row">
                <form action="/admin/user" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <h5 class="fw-bold">Latar Belakang Pengguna</h5>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="username" class="form-label">Username</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="username" name="username" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-8">
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="col-8">
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                        </div>
                        <div class="col-8">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="" class="form-label">Status Pengguna</label>
                        </div>
                        <div class="col-8">
                            @if (Auth::user()->isSuperUser())
                            <div class="form-label">
                                <input type="checkbox" name="superuser" id="superuser" value="1"
                                    class="form-check-input">
                                <label for="superuser" class="form-check-label mx-2">Pentadbir Kontrak</label>
                                <input type="checkbox" name="admin" id="admin" value="1"
                                    class="form-check-input">
                                <label for="admin" class="form-check-label mx-2">Pemilik Projek/PMO</label>
                                <input type="checkbox" name="staffuser" id="staffuser" value="1"
                                    class="form-check-input">
                                <label for="staffuser" class="form-check-label mx-2">Penyemak Bayaran</label>
                            </div>
                            @elseif (Auth::user()->isNotSuperUser())
                            <div class="form-label">
                                <input type="checkbox" name="admin" id="admin" value="1"
                                    class="form-check-input">
                                <label for="admin" class="form-check-label mx-2">Pemilik Projek/PMO</label>
                                <input type="checkbox" name="staffuser" id="staffuser" value="1"
                                    class="form-check-input">
                                <label for="staffuser" class="form-check-label mx-2">Penyemak Bayaran</label>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="col-10"></div>
                        <div class="col-2 fill">
                            <button class="btn btn-primary" style="width: 100%;" type="submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
