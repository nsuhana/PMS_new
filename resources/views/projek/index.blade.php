@extends('base')

@section('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="shadow card mb-3 pb-2"
  style="background-image: url({{url('img/corner-1.png')}}); background-position: right top; background-repeat: no-repeat;">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-10">
        <h3>{{__('Projek')}}</h3>
        <p class="mb-0 text-muted">
          {{__('teks_index_projek')}}</p>
      </div>
    </div>
    <div class="row mt-3">
      <a href="/projek/create" class="text-primary text-small text-decoration-none">{{__('Tambah Projek Baru')}}<svg
          xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right"
          viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
          </path>
        </svg></a>
    </div>
  </div>
</div>

<div class="shadow card mb-3">
  <div class="card-header row d-flex justify-content-between align-items-center m-0">
    <div class="col-auto p-0">
      <h5>{{__('Projek Overview')}}</h5>
    </div>
    <div class="col-auto">

      <div class="dropdown">
        <a class="btn btn-dark dropdown-toggle d-flex align-items-center justify-content-between" href="#"
          id="toggleFilter" role="button" data-toggle="dropdown" style="width: 180px;" aria-haspopup="true" aria-expanded="false">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel"
              viewBox="0 0 16 16">
              <path
                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
            </svg>
            Filter
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="toggleFilter">
          <form action="/projek" method="POST">
            @csrf
            @method('get')
            <div class="mt-2 d-flex flex-column">
              <div class="class-label">
                <label for="">{{__('Ikut hak milik')}}</label>
              </div>
              <div class="mx-2">
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_ownership" id="filter_ownership1"
                    value="" @if ($filter_ownership === null)
                        checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_ownership1">
                    {{__('Semua')}}
                  </label>
                </div>
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_ownership" id="filter_ownership2"
                    value="owner" @if ($filter_ownership === 'owner')
                        checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_ownership2">
                    {{__('Milik Saya')}}
                  </label>
                </div>
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_ownership" id="filter_ownership3"
                    value="editor" @if ($filter_ownership === 'editor')
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_ownership3">
                    {{__('Bukan Milik Saya')}}
                  </label>
                </div>
              </div>
            </div>

            <div class="mt-2 d-flex flex-column">
              <div class="class-label">
                <label for="">{{__('Ikut status')}}</label>
              </div>
              <div class="mx-2">
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_projek_status" id="filter_projek_status1"
                    value="" @if ($filter_projek_status === null)
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_projek_status1">
                    {{__('Semua')}}
                  </label>
                </div>
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_projek_status" id="filter_projek_status2"
                    value="aktif" @if ($filter_projek_status === 'aktif')
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_projek_status2">
                    {{__('Aktif')}}
                  </label>
                </div>
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_projek_status" id="filter_projek_status3"
                    value="selesai" @if ($filter_projek_status === 'selesai')
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_projek_status3">
                    {{__('Selesai')}}
                  </label>
                </div>
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_projek_status" id="filter_projek_status4"
                    value="tidak aktif" @if ($filter_projek_status === 'tidak aktif')
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_projek_status4">
                    {{__('Tidak Aktif')}}
                  </label>
                </div>
              </div>
            </div>

            <div class="mt-2 d-flex flex-column">
              <div class="class-label">
                <label for="">{{__('Ikut skop')}}</label>
              </div>
              <div class="mx-2">
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_projek_skop" id="filter_projek_skop1"
                    value="" @if ($filter_projek_skop === null)
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_projek_skop1">
                    {{__('Semua')}}
                  </label>
                </div>
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_projek_skop" id="filter_projek_skop2"
                    value="pembekalan" @if ($filter_projek_skop === 'pembekalan')
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_projek_skop2">
                    {{__('Pembekalan')}}
                  </label>
                </div>
                <div class="form-label m-0">
                  <input class="form-check-input" type="radio" name="filter_projek_skop" id="filter_projek_skop3"
                    value="perkhidmatan" @if ($filter_projek_skop === 'perkhidmatan')
                    checked
                    @endif>
                  <label class="form-check-label mx-2" for="filter_projek_skop3">
                    {{__('Perkhidmatan')}}
                  </label>
                </div>
              </div>
            </div>

            <div class="mt-2 d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">{{__('Teruskan')}}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @if ($projects->isEmpty())
  <div class="card-body">
    <div class="row">
      <p class="text-muted">
        {{__('Tiada projek...')}}
      </p>
    </div>
  </div>
  @else
  <div class="card-body p-0">
    <ul class="list-group list-group-flush">
      @foreach ($projects as $project)
      <li class="list-group-item">
        <div class="row align-items-center">
          <div class="col-6 ps-card">
            <a class="text-decoration-none text-capitalize" href="/projek/{{ $project->id }}">{{$project->tajuk_projek}}</a>
            <br>
            <small class="text-muted"><a class="text-decoration-none text-muted text-capitalize"
                href="/vendor/{{ $project->vendor_id }}">{{ $project->vendor->nama_pembekal_dilantik }}</a></small>
          </div>
          <div class="col-5 pe-card ps-2">
            @if ($project->editor_comment->isNotEmpty())
            <div class="progress" style="height:5px;">
              <div class="progress-bar" style="width: {{$project->editor_comment->last()->peratus_siap}}%;" role="progressbar" aria-valuenow="{{$project->editor_comment->last()->peratus_siap}}" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <div class="small"><strong>{{$project->editor_comment->last()->peratus_siap}}</strong>% {{__('siap')}}</div>
            @else
            <div class="progress" style="height:5px;">
              <div class="progress-bar" style="width: 0%;" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                aria-valuemax="100"></div>
            </div>
            <div class="small"><strong>0</strong>% {{__('siap')}}</div>
            @endif
          </div>
          <div class="col-1">
            <div class="dropdown">
              <a class="nav-link text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-three-dots" viewBox="0 0 16 16">
                  <path
                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
                </svg>
              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" style="right: 0">
                <a class="dropdown-item" href="/projek/{{ $project->id }}">{{__('Lanjut')}}</a>
                {{-- <a class="dropdown-item" href="">Sembunyi</a> --}}
              </div>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
  <div class="card-footer d-flex align-items-center justify-content-between">
    {{$projects->appends(['filter_projek_status' => $filter_projek_status, 'filter_projek_skop' => $filter_projek_skop, 'filter_ownership' => $filter_ownership])->links()}}
  </div>
  @endif
</div>

{{-- <div class="shadow card mb-3">
  <div class="card-body">
    <div class="row">
      <h5 class="d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
      </svg>
      <span class="mx-2">Kalendar Peristiwa</span>
    </h5>
    </div>
    <div class="row">
      <p class="text-muted">
        Tiada peristiwa akan datang...
      </p>
    </div>
  </div>
</div> --}}

@endsection