@extends('base')

@section('content')


<style>
    .flex-container {
        /* display: flex; */
        /* flex-wrap: wrap; */
        /* justify-content: space-between; */
        /* width: 100%; */
    }

    .flex-item {
        height: 175px;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .flex-expandable {
        display: none;
        width: 100%;
        margin-bottom: 15px;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="ProjekModal" tabindex="-1" aria-labelledby="ProjekModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Tulis Ulasan')}}</h5>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <form action="/projek/{{$project->id}}/ulasan" method="POST">
                @csrf
                <div class="modal-body">
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
                    <small>{{__('Ulasan projek')}} ({{__('Maksimum 100 patah perkataan')}})</small>
                    <textarea type="text" class="form-control" id="mytextarea" rows=3 name="comment"></textarea>
                    <div class="row d-flex align-items-center my-3">
                        <div class="col-4">
                            <label class="small" for="peratus">{{__('Fasa projek kini')}}</label>
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <input type="text" class="form-control w-100" name="fasa" id="fasa">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center my-3">
                        <div class="col-4">
                            <label class="small" for="peratus">{{__('Peratus siap kini')}}</label>
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <input type="number" class="form-control w-50" name="peratus" id="peratus" 
                            min="0"
                            max="100"
                            step="1"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            <span class="mx-2">%</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Tutup')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Simpan')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($project->publish === 0)
    <div class="alert alert-warning d-flex align-items-center">
        {{__('teks_detail_projek_unpublish')}}
        <a class="d-flex align-items-center" href="/projek/{{$project->id}}/tetapan">
            <span class="mx-2">{{__('Tetapan')}}</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
          </svg>
        </a>
    </div>
@endif

<div class="shadow card mb-3">
    <div class="container m-0 p-0"
        style="background-image: url({{url('img/corner-2.png')}}); background-position: right top; background-repeat: no-repeat; background-size: 100% 100%;">
        @if (Route::has('login'))
        @auth
        <div class="card-body d-flex justify-content-end">
            <div class="m-2">
            @if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
                <a href="" class="text-decoration-none text-dark mx-1" data-bs-toggle="modal" data-bs-target="#ProjekModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                      </svg>
                </a>
                <a href="/projek/{{$project->id}}/tetapan" class="text-decoration-none text-dark mx-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                </a>
            @endif
            </div>
        </div>
        @endauth
        @endif
        <div class="card-body d-flex align-content-end flex-wrap align-items-center" style="height: 150px;">
            <a class="text-dark text-decoration-none d-flex align-items-center" data-bs-toggle="collapse"
                href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <h1 style="text-transform:uppercase;">{{ $project->tajuk_projek }}</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
            </a>
        </div>
    </div>

    <div class="collapse bg-light" id="collapseExample">
        <div class="card card-body">
            <div>
                {!! $project->description !!}
            </div>
            <p>
                <a href="/projek/{{ $project->id }}/status-kemajuan-kerja-projek"
                    class="btn btn-outline-primary">Status Kemajuan Projek</a>
                <a href="/projek/{{ $project->id }}/status-kemajuan-kewangan-projek"
                    class="btn btn-outline-primary">Status Kewangan Projek</a>
            </p>
        </div>
    </div>
</div>

<div class="row flex-container">
    <div class="col-sm-12 col-md-4 flex-item" data-target="0">
        <div class="shadow card bg-primary">
            <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                aria-expanded="false" aria-controls="collapseExample2">
                <div class="card-body d-flex justify-content-center align-items-center " style="height: 175px;">
                    <h5>Info</h5>
                </div>
            </a>
        </div>
    </div>

    <div class="flex-expandable" data-target="0">
        <div class="bg-light">
            <div class="card card-body">
                <div class="row mb-3 d-flex justify-content-between align-items-center">
                    <div class="col-auto">
                        <h5>{{__('Latar Belakang Projek')}}</h5>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    @if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
                    <div class="col-auto">
                        <a href="/projek/{{$project->id}}/edit" class="text-decoration-none"><span class="text-warning p-2"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                </svg></span>{{__('Edit')}}</a>
                    </div>
                    @endif
                    @endauth
                    @endif
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="">{{__('Tajuk Projek')}}</label>
                    </div>
                    <div class="col-8">
                        <p class="text-capitalize">: {{ $project->tajuk_projek }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p class="">{{__('Pemilik Projek')}}</label>
                    </div>
                    <div class="col-8">
                        <p class="text-capitalize">: {{ $project->pemilik_projek }}</p>
                    </div>
                </div>

                @if (Route::has('login'))
                @auth
                @if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
                <div class="row">
                    <div class="col-4">
                        <p class="">{{__('Rujukan Projek')}}</label>
                            <i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Surat Setuju Terima format .pdf sahaja">
                            </i>
                    </div>
                    <div class="col-8">
                        <p class="text-capitalize">: <a href="/documents/rujukan/{{ $project->rujukan_projek }}"
                                class="text-decoration-none">document.pdf</a></p>
                    </div>
                </div>
                @endif
                @endauth
                @endif

                <div class="row">
                    <div class="col-4">
                        <p class="">{{__('Nama Pembekal Dilantik')}}</label>
                    </div>
                    <div class="col-8">
                        <p class="text-capitalize">: <a class="text-decoration-none"
                                href="/vendor/{{ $project->vendor_id }}">{{ $project->vendor->nama_pembekal_dilantik}}</a></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p class="">{{__('Kos Projek')}}</label>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-4">
                                <p class="mx-1">{{__('Sebelum SST')}}</label>
                            </div>
                            <div class="col-4">
                                <p>: RM {{ $project->kos_projek_sebelum_sst }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="mx-1">{{__('Selepas SST')}}</label>
                            </div>
                            <div class="col-4">
                                <p>: RM {{ $project->kos_projek_selepas_sst }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p class="">{{__('Bon Pelaksanaan Projek')}}</label>
                    </div>
                    <div class="col-8">
                        <p>: RM {{ $project->bon_pelaksanaan_projek }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p class="">{{__('Tempoh Kontrak')}}</p>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-4">
                                <p>{{__('Tarikh Mula')}}</p>
                            </div>
                            <div class="col-4">
                                <p>: {{date('d-m-Y', strtotime($project->tempoh_mula_kontrak));}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p>{{__('Tarikh Tamat')}}</p>
                            </div>
                            <div class="col-4">
                                <p>: {{date('d-m-Y', strtotime($project->tempoh_tamat_kontrak));}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <p>{{__('Skop Projek')}}</label>
                    </div>
                    <div class="col-8">
                        <p class="text-capitalize">: {{ $project->skop_projek }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ( $kandungan_projek as $kandungan )
    <div class="col-sm-12 col-md-4 flex-item" data-target="{{ $kandungan->id }}">
        <div 
        @if ($kandungan->publish === 1)
        class="shadow card bg-primary"           
        @else
        class="shadow card bg-secondary"
        @endif
        >
            <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#collapseExample2" role="button"
                aria-expanded="false" aria-controls="collapseExample2">
                <div class="card-body d-flex justify-content-center align-items-center"
                    style="height: 175px; text-align: center;">
                    <h5 class="text-capitalize">{{ $kandungan->tajuk_besar }}
                    @if ($kandungan->publish === 0)
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                        </svg>
                    @endif
                    </h5>
                </div>
            </a>
        </div>
    </div>
    <div class="flex-expandable" data-target="{{ $kandungan->id }}">
        <div class="bg-light">
            <div class="card card-body">
                <div class="row mb-3 d-flex justify-content-between align-items-center">
                    <div class="col-auto">
                        <h5 class="text-capitalize">{{ $kandungan->tajuk_besar }}</h5>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    @if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
                    <div class="col-auto dropdown show">
                        <a class="nav-link text-dark" href="#" id="DropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path
                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="DropdownMenuLink" style="text-align: left;">
                            <a class="dropdown-item"
                                href="/projek/{{ $project->id }}/kandungan/{{ $kandungan->id }}/edit">Edit</a>
                            <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $kandungan->id }}">{{__('Hapus')}}</button>
                        </div>
                    </div>
                    @endif
                    @endauth
                    @endif
                </div>
                <div class="container p-0 m-0">
                    {!! $kandungan->content !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal{{ $kandungan->id }}" tabindex="-1" aria-labelledby="deleteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteLabel">{{__('Anda Pasti?')}}</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    --}}
                </div>
                <div class="modal-body">
                    {{__('Delete kandungan ini secara kekal?')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Tutup')}}</button>
                    <form action="/projek/{{ $project->id }}/kandungan/{{ $kandungan->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @if (Route::has('login'))
    @auth
    @if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
    <div class="col-sm-12 col-md-4 flex-item">
        <div class="shadow card bg-transparent" style="border: 2px dashed 
        #0275d8;">
            <a class="text-decoration-none text-primary" href="/projek/{{ $project->id }}/kandungan/create">
                <div class="card-body d-flex justify-content-center align-items-center" style="height: 175px;">
                    <h5>{{__('Tambah Baru')}} +</h5>
                </div>
            </a>
        </div>
    </div>
    @endif
    @endauth
    @endif
</div>

<script>
    //click event to expand the expandable
    $('.flex-item').on('click', function() {

        if($(this).hasClass('active')) {
            $('.flex-item').removeClass('active');
            $('.flex-expandable').slideUp();
        }
        else {
            //hide previous opened expandables
            $('.flex-item').removeClass('active');
            $('.flex-expandable').slideUp();
            //get target data
            var target = $(this).attr('data-target');
            //toggle the container
            var $triggered = $(this);
            var $triggeredElement = $('.flex-expandable[data-target=' + target + ']');
            positionExpandableElement($triggered, $triggeredElement);
            $triggered.addClass('active');
            $triggeredElement.slideDown();
        }

    });

    //we need to check on resize how many items are pe row, if it changes, trigger a click on a already opened item, so it positions itself at the right position
    // var containerWidth = $('.flex-container').outerWidth();
    // var itemWidth = $('.flex-item').outerWidth();
    // var itemsPerRow = ~~(containerWidth / itemWidth);
    // $(window).resize(function() {
    //     containerWidth = $('.flex-container').outerWidth();
    //     itemWidth = $('.flex-item').outerWidth();
    //     var newItemsPerRow = ~~(containerWidth / itemWidth);
    //     if (itemsPerRow != newItemsPerRow) {
    //         itemsPerRow = newItemsPerRow;
    //         $('.flex-item.active').trigger('click');
    //     }
    // })

    if($(window).width() < 720) {
        var itemsPerRow = 1;
    }
    else {
        var itemsPerRow = 3;
    }
    $(window).resize(function() {
        if($(window).width() < 720) {
            var newitemsPerRow = 1;
        }
        else {
            var newitemsPerRow = 3;

        }
        if(newitemsPerRow != itemsPerRow) {
            itemsPerRow = newitemsPerRow;
            $('.flex-item.active').trigger('click');
        }
    });

    function positionExpandableElement(triggered, element) {
        /*first determine at which position your expandable element has to be, should be the first element of next row from triggered element.
        For this we need to know how many elements currently are in a row. Then you can position it after that element*/

        //get the item number where you have to insert after
        var allFlexItems = $('.flex-item');
        var itemsData = []; //we need an array of data-targets to get the number of element from the array index
        $.each(allFlexItems, function(key, el) {
            itemsData.push($(el).attr('data-target'));
        });
        var elNumber = $.inArray($(triggered).attr('data-target'), itemsData)
        console.log('elNumber:'+elNumber);
        //elNumber now tells us the position of the element that got triggered
        //now we can calculate where we have to insert our expandable
        var rowNumber = Math.floor(elNumber / itemsPerRow);
        console.log('rowNumber:'+rowNumber);
        var insertAfter = (itemsPerRow * rowNumber) + itemsPerRow - 1; //we add itemsPerRow because we allways need to skip the first row, -1 because array starts at 0
        console.log('insertAfter:'+insertAfter);

        //now that we now the last items number (even in responsive), we can insert our expandable on click after that element
        if(insertAfter == allFlexItems.length) {
            $(element).insertAfter($('.flex-item')[insertAfter-1]);
        }
        else {
            $(element).insertAfter($('.flex-item')[insertAfter]);
        }
        
    }

</script>

@endsection