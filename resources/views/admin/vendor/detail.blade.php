@extends('admin.base')

@section('content')

<div class="container m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/vendor">Vendor</a></li>
                <li><span class="text-capitalize">{{ $vendor->nama_pembekal_dilantik }}</span></li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="d-flex bd-highlight align-items-center">
            <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">{{ $vendor->nama_pembekal_dilantik }}</h1>
            <h1 class="d-flex flex-shrink-1 bd-highlight">
                <a href="/admin/vendor/{{ $vendor->id }}/edit"
                    class="btn btn-outline-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg>
                    <span class="mx-2">Edit</span>
                </a>
                <button type="button" class="ms-2 btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Hapus</h5>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <p>
                                    Anda Pasti hapus maklumat vendor ini?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <form action="/admin/vendor/{{ $vendor->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </h1>
        </div>
    </div>
    <hr>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

    <div class="row">
        <div class="col-xs-12 col-md-3 my-4 p-4">
            <div class="m-5">
                @if ( $vendor->vendor_profile->vendor_avatar )
                <img src="{{ url('images/' . $vendor->vendor_profile->vendor_avatar) }}"
                    class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..." width="200"
                    height="200">
                @else
                <img src="https://picsum.photos/200" class="rounded mx-auto d-block rounded-circle image___profilepic"
                    alt="..." width="200" height="200">
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-md-9 my-4 p-4">
            <div class="row border">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about"
                            type="button" role="tab" aria-controls="about" aria-selected="true">About</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Project</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="more-tab" data-bs-toggle="tab" data-bs-target="#more" type="button"
                            role="tab" aria-controls="more" aria-selected="false">More</button>
                    </li>
                </ul>
                <div class="tab-content my-4" id="myTabContent" style="height: auto;">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        @if ( $vendor->description )
                        {!! $vendor->description !!}
                        @else
                        <i>{{__('Belum dikemaskini...')}}</i>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        @if ($vendor->project->isNotEmpty())
                        <table class="table table-bordered table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th style="width: 10px;"></th>
                                    <th>Tajuk Projek</th>
                                    <th>Skop</th>
                                    <th>Status</th>
                                    <th>Terbit</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($vendor->project as $projek)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a class="text-capitalize" href="/admin/projek/{{$projek->id}}">
                                        {{$projek->tajuk_projek}}
                                    </a>
                                </td>
                                <td>
                                    <span class="text-capitalize">{{$projek->skop_projek}}</span>
                                </td>
                                <td>
                                    @if ( $projek->status === 'aktif' )
                                    <span class="badge rounded-pill bg-primary">Aktif</span>
                                    @elseif ( $projek->status === 'selesai' )
                                    <span class="badge rounded-pill bg-success">Selesai</span>
                                    @elseif ( $projek->status === 'tidak aktif' )
                                    <span class="badge rounded-pill bg-secondary">Tidak Aktif</span>
                                    @else
                                    <span class="badge rounded-pill bg-secondary">Undefined</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($projek->publish === 1)
                                    <span class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                    </span>
                                @else
                                    <span class="text-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                          </svg>
                                    </span>
                                @endif
                                </td>
                            </tr>
                            @endforeach        
                            </tbody>
                        </table>
                        @endif

                    </div>
                    <div class="tab-pane fade p-5" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table table-bordered table-light">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center" colspan="100%">
                                        Butiran perhubungan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th width="20%">Telefon</th>
                                    <td>{{ $vendor->vendor_profile->telefon }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Faks</th>
                                    <td>{{ $vendor->vendor_profile->faks }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Alamat</th>
                                    <td>{{ $vendor->vendor_profile->alamat }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">Laman Web</th>
                                    <td>{{ $vendor->vendor_profile->website }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="more" role="tabpanel" aria-labelledby="more-tab">
                        <div class="m-4">
                            <div class="row my-2">
                                <h2>Miscellaneous details</h2>
                            </div>
                            <div class="row my-2">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Created on</th>
                                            <td>{{date('l, jS \of F, Y, h:i:s A', strtotime($vendor->created_at));}}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Updated on</th>
                                            <td>{{date('l, jS \of F, Y, h:i:s A', strtotime($vendor->updated_at));}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row my-2">
                                <form action="/admin/vendor/{{ $vendor->id }}/status" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex align-items-center justify-content-center">
                                        @if ($vendor->status === 1)
                                        <button type="submit" class="btn btn-outline-secondary">Deactivate Vendor</button>
                                        @else
                                        <button type="submit" class="btn btn-outline-primary">Activate Vendor</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection