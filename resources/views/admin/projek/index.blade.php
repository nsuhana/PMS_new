@extends('admin.base')

@section('content')

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<div class="container m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li>Projek</li>
            </ul>
        </nav>
    </div>
    <div class="row my-4">
        <div class="col-xs-12 col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="p-0 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-funnel" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                        </svg>
                        Filter
                    </div>
                </div>
                <div class="card-body">
                    <form action="/admin/projek" method="POST">
                        @csrf
                        @method('GET')
                        <div class="row">
                            <div class="row">
                                <div class="class-label">
                                    <label for="">By Project Status</label>
                                </div>
                                <div class="mx-2">
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_status"
                                            id="filter_projek_status1" value="" @if($filter_projek_status===null )
                                            checked @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_status1">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_status"
                                            id="filter_projek_status2" value="ikut jadual" @if($filter_projek_status==='ikut jadual' ) checked @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_status2">
                                            Ikut Jadual
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_status"
                                            id="filter_projek_status3" value="dalam perlaksanaan" @if($filter_projek_status==='dalam perlaksanaan' ) checked @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_status3">
                                            Dalam Perlaksanaan
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_status"
                                            id="filter_projek_status4" value="projek lewat" @if($filter_projek_status==='projek lewat' ) checked @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_status4">
                                            Projek Lewat
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_status"
                                            id="filter_projek_status5" value="projek sakit" @if($filter_projek_status==='projek sakit' ) checked @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_status5">
                                            Projek Sakit
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="class-label">
                                    <label for="">By Publish</label>
                                </div>
                                <div class="mx-2">
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_publish"
                                            id="filter_publish1" value="" @if($filter_publish===null ) checked
                                            @endif>
                                        <label class="form-check-label mx-2" for="filter_publish1">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_publish"
                                            id="filter_publish2" value="1" @if($filter_publish==='1') checked @endif>
                                        <label class="form-check-label mx-2" for="filter_publish2">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_publish"
                                            id="filter_publish4" value="0" @if($filter_publish==='0' ) checked @endif>
                                        <label class="form-check-label mx-2" for="filter_publish4">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="class-label">
                                    <label for="">By Project Scope</label>
                                </div>
                                <div class="mx-2">
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_skop"
                                            id="filter_projek_skop1" value="" @if($filter_projek_skop===null ) checked
                                            @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_skop1">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_skop"
                                            id="filter_projek_skop2" value="pembekalan" @if($filter_projek_skop==='pembekalan' ) checked @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_skop2">
                                            Pembekalan
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_projek_skop"
                                            id="filter_projek_skop4" value="perkhidmatan" @if($filter_projek_skop==='perkhidmatan' ) checked @endif>
                                        <label class="form-check-label mx-2" for="filter_projek_skop4">
                                            Perkhidmatan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="class-label">
                                    <label for="">By Year</label>
                                </div>
                                <div class="mx-2 my-2 d-flex align-items-center">
                                    <input class="form-control" type="number" name="filter_tahun" id="filter_tahun" onkeypress="return event.charCode >= 48 && event.charCode <= 57" style="width:50%">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mx-auto">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="/admin/projek/deleted" class="btn btn-secondary my-2 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242-2.532-4.431zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24l2.552-4.467zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.498.498 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244l-1.716-3.004z"/>
              </svg>
              <span class="mx-2">Go to trashed</span>
            </a>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="row">
                <div class="col-12">
                    <div class="container px-0 m-0 d-flex justify-content-between align-items-center">
                        <h4>Select project to change</h4>
                        <a href="/admin/projek/create" class="btn btn-primary my-2">+ Add New</a>
                    </div>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-12">
                    <div class="card card-header">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="mx-2">Sort by</div>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="tajuk_projek">Tajuk Projek</button>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="nama_pembekal_dilantik">Nama
                                    Pembekal</button>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="pemilik_projek">Pemilik Projek</button>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="recently_added">Recently Added</button>
                            </div>
                            <div class="d-flex">
                                <form action="/admin/projek" method="POST">
                                    @csrf
                                    @method('GET')
                                    <input type="text" class="form-control" id="keyword" name="keyword"
                                        placeholder="Search...">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>Tajuk Projek</th>
                                <th>Nama Pembekal</th>
                                <th>Nama Pemilik</th>
                                <th>Skop Projek</th>
                                <th>Status Projek</th>
                                <th>Terbit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $projek)
                            <tr>
                                <td>
                                    <div class="text-capitalize"><a href="/admin/projek/{{ $projek->id }}">{{
                                            $projek->tajuk_projek }}</a></div>
                                </td>
                                <td>
                                    <div class="text-capitalize"><a href="/admin/vendor/{{ $projek->vendor_id }}">{{
                                            $projek->vendor->nama_pembekal_dilantik }}</a></div>
                                </td>
                                <td>
                                    <div class="text-capitalize">{{ $projek->pemilik_projek }}</div>
                                </td>
                                <td>
                                    <div class="text-capitalize">{{ $projek->skop_projek }}</div>
                                </td>
                                <td>
                                    @if ( $projek->status === 'ikut jadual' )
                                    <span class="badge rounded-pill bg-primary">Ikut Jadual</span>
                                    @elseif ( $projek->status === 'dalam perlaksanaan' )
                                    <span class="badge rounded-pill bg-success">Dalam Perlaksanaan</span>
                                    @elseif ( $projek->status === 'projek lewat' )
                                    <span class="badge rounded-pill bg-danger">Projek Lewat</span>
                                    @elseif ( $projek->status === 'projek sakit' )
                                    <span class="badge rounded-pill bg-secondary">Projek Sakit</span>
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
                </div>
            </div>
            {{ $project->appends(['filter_projek_status' => $filter_projek_status, 'filter_projek_skop' =>
            $filter_projek_skop, 'filter_publish' => $filter_publish, 'filter_tahun' => $filter_tahun, 'sortBy' => $sortBy, 'keyword' => $keyword])->links() }}
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.btn_sorter', function(event) {
        var x = $(this).val();

        if (x === "tajuk_projek") {
            location.href = '{!! route("projek.index", ["sortBy" => "tajuk_projek", "filter_projek_status" => $filter_projek_status, "filter_projek_skop" => $filter_projek_skop, "filter_publish" => $filter_publish, "filter_tahun" => $filter_tahun]) !!}';
        }   
        else if (x === "pemilik_projek") {
            location.href = '{!! route("projek.index", ["sortBy" => "pemilik_projek", "filter_projek_status" => $filter_projek_status, "filter_projek_skop" => $filter_projek_skop, "filter_publish" => $filter_publish, "filter_tahun" => $filter_tahun]) !!}';
        }
        else if (x === "nama_pembekal_dilantik") {
            location.href = '{!! route("projek.index", ["sortBy" => "nama_pembekal_dilantik", "filter_projek_status" => $filter_projek_status, "filter_projek_skop" => $filter_projek_skop, "filter_publish" => $filter_publish, "filter_tahun" => $filter_tahun]) !!}';
        }
        else if (x === "recently_added") {
            location.href = '{!! route("projek.index", ["sortBy" => "recently_added", "filter_projek_status" => $filter_projek_status, "filter_projek_skop" => $filter_projek_skop, "filter_publish" => $filter_publish, "filter_tahun" => $filter_tahun]) !!}';
        }
    });
    
</script>

@endsection