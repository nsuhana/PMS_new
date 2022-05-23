@extends('base')

@section('content')

<div class="m-4">
    <div class="row">
        <div class="d-flex bd-highlight align-items-center">
            <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">{{ $user->name }}</h1>
            <h1 class="d-flex flex-shrink-1 bd-highlight">
                @if (Auth::check())
                    @if (Auth::user()->id === $user->id)
                    <a href="/user/{{$user->id}}/tukar-kata-laluan" class="btn btn-outline-secondary mx-2" style="width: 150px;;">Tukar Password</a> 
                    <a href="/user/{{$user->id}}/edit" class="btn btn-outline-primary d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path
                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                        <span class="mx-2">Edit</span>
                    </a>
                    @endif                
                @endif
            </h1>
        </div>
    </div>
    <hr>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

    <div class="row">
        <div class="col-xs-12 col-md-12 p-4">
            <div class="m-5">
                @if ( $user->profile->profile_pic )
                <img src="{{ url('images/' . $user->profile->profile_pic) }}"
                    class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..." width="200"
                    height="200">
                @else
                <img src="https://i.pravatar.cc/200" class="rounded mx-auto d-block rounded-circle image___profilepic"
                    alt="..." width="200" height="200">
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-md-12 p-4">
            <div class="row border shadow card card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about"
                            type="button" role="tab" aria-controls="about" aria-selected="true">About</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="bio-tab" data-bs-toggle="tab" data-bs-target="#bio" type="button"
                            role="tab" aria-controls="bio" aria-selected="false">Bio</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="project-tab" data-bs-toggle="tab" data-bs-target="#project"
                            type="button" role="tab" aria-controls="project" aria-selected="false">Projek</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="more-tab" data-bs-toggle="tab" data-bs-target="#more" type="button"
                            role="tab" aria-controls="more" aria-selected="false">More</button>
                    </li>
                </ul>
                <div class="tab-content my-4" id="myTabContent" style="height: auto;">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="m-4">
                            <div class="row my-2">
                                <div class="col-2">
                                    <strong>Nama Penuh</strong>
                                </div>
                                <div class="col-10">
                                    @if( $user->profile->fullname )
                                    : {{ $user->profile->fullname }}
                                    @else
                                    : <i>Belum dikemaskini</i>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="row my-2">
                                <div class="col-2">
                                    <strong>Email</strong>
                                </div>
                                <div class="col-10">
                                    @if( $user->email )
                                    : {{ $user->email }}
                                    @else
                                    : <i>Belum dikemaskini</i>
                                    @endif
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="bio" role="tabpanel" aria-labelledby="bio-tab">
                        <div class="m-2">
                            @if ( $user->profile->bio )
                            {!! $user->profile->bio !!}
                            @else
                            <i>Belum dikemaskini</i>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="project-tab">
                        <div class="m-2">
                            @if ($user->user_project->isNotEmpty())
                            <table class="table table-bordered table-striped">
                                <thead class="table-primary">
                                    <tr>
                                        <th style="width: 10px;"></th>
                                        <th>Tajuk Projek</th>
                                        <th>Nama Pembekal</th>
                                        <th>Skop</th>
                                        <th>Status</th>
                                        <th>Terbit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($user->user_project as $bridge)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a class="text-capitalize" href="/projek/{{$bridge->project->id}}">
                                            {{$bridge->project->tajuk_projek}}
                                        </a>
                                    </td>
                                    <td>
                                        <a  class="text-capitalize" href="/vendor/{{$bridge->project->vendor_id}}">
                                        {{$bridge->project->vendor->nama_pembekal_dilantik}}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="text-capitalize">{{$bridge->project->skop_projek}}</span>
                                    </td>
                                    <td>
                                        @if ( $bridge->project->status === 'aktif' )
                                        <span class="badge rounded-pill bg-primary">Aktif</span>
                                        @elseif ( $bridge->project->status === 'selesai' )
                                        <span class="badge rounded-pill bg-success">Selesai</span>
                                        @elseif ( $bridge->project->status === 'tidak aktif' )
                                        <span class="badge rounded-pill bg-secondary">Tidak Aktif</span>
                                        @else
                                        <span class="badge rounded-pill bg-secondary">Undefined</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($bridge->project->publish === 1)
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
                    </div>
                    <div class="tab-pane fade" id="more" role="tabpanel" aria-labelledby="more-tab">
                        <div class="m-4">
                            <div class="row my-2">
                                <h2>Login activity</h2>
                            </div>
                            <div class="row my-2">
                                <table class="table">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Account created on</th>
                                            <td>{{date('l, jS \of F, Y, h:i:s A', strtotime($user->created_at));}}</td>
                                        </tr>
                                        <tr>
                                            {{-- <th>Last access to site</th> --}}
                                            <th>Last updated profile</th>
                                            <td>{{date('l, jS \of F, Y, h:i:s A', strtotime($user->updated_at));}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection