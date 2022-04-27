@extends('base')

@section('content')

<div class="container m-4">
    <div class="row">
        <div class="d-flex bd-highlight align-items-center">
            <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">{{ $vendor->nama_pembekal_dilantik }}</h1>
            @if (Route::has('login'))
            @auth
            @if (Auth::user()->isNotNormalUser())                
            <h1 class="flex-shrink-1 bd-highlight">
                <a href="/admin/vendor/{{ $vendor->id }}/edit"
                    class="btn btn-outline-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg>
                    <span class="mx-2">Edit</span>
                </a>
            </h1>
            @endif
            @endif
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12 col-md-3 my-4 p-4">
            @if ( $vendor->vendor_profile->vendor_avatar )
            <img src="{{ url('images/' . $vendor->vendor_profile->vendor_avatar) }}"
                class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..."
                style="width:13vw; height: 13vw;">
            @else
            <img src="https://picsum.photos/200" class="rounded mx-auto d-block rounded-circle image___profilepic"
                alt="..." style="width:13vw; height: 13vw;">
            @endif
        </div>
        <div class="col-xs-12 col-md-9 ps-2">
            <div class="row border shadow card card-body p-0 pt-2" width="100">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about"
                            type="button" role="tab" aria-controls="about" aria-selected="true">{{__('About')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">{{__('Projek')}}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">{{__('Contact')}}</button>
                    </li>
                </ul>
                <div class="tab-content my-4" id="myTabContent" style="">
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
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($vendor->project as $projek)
                            @if ($projek->publish === 1)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a class="text-capitalize" href="/projek/{{$projek->id}}">
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
                            </tr>
                            @endif
                            @endforeach        
                            </tbody>
                        </table>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table table-bordered table-light">
                            <thead class="table-dark">
                                <tr>
                                    <th class="text-center" colspan="100%">
                                        {{__('Butiran perhubungan')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th width="20%">{{__('Telefon')}}</th>
                                    <td>{{ $vendor->vendor_profile->telefon }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">{{__('Faks')}}</th>
                                    <td>{{ $vendor->vendor_profile->faks }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">{{__('Alamat')}}</th>
                                    <td>{{ $vendor->vendor_profile->alamat }}</td>
                                </tr>
                                <tr>
                                    <th width="20%">{{__('Laman Web')}}</th>
                                    <td>{{ $vendor->vendor_profile->website }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection