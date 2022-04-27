@extends('admin.base')

@section('content')

<div class="container m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li>Vendor</li>
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
                    <form action="/admin/vendor" method="POST">
                        @csrf
                        @method('GET')
                        <div class="row">
                            <div class="class-label">
                                <label for="">By Status</label>
                            </div>
                            <div class="mx-2">
                                <div class="form-label m-0">
                                    <input class="form-check-input" type="radio" name="filter_status"
                                        id="filter_status1" value="" @if ($filter_status===null)
                                        checked @endif>
                                    <label class="form-check-label mx-2" for="filter_status1">
                                        All
                                    </label>
                                </div>
                                <div class="form-label m-0">
                                    <input class="form-check-input" type="radio" name="filter_status"
                                        id="filter_status2" value="1" @if ($filter_status==='1' )
                                        checked @endif>
                                    <label class="form-check-label mx-2" for="filter_status2">
                                        Aktif
                                    </label>
                                </div>
                                <div class="form-label m-0">
                                    <input class="form-check-input" type="radio" name="filter_status"
                                        id="filter_status3" value="0" @if ($filter_status==='0' )
                                        checked @endif>
                                    <label class="form-check-label mx-2" for="filter_status3">
                                        Tidak Aktif
                                    </label>
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
            <a href="/admin/vendor/deleted" class="btn btn-secondary my-2 d-flex align-items-center justify-content-center">
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
                        <h4>Select vendor to change</h4>
                        <a href="/admin/vendor/create" class="btn btn-primary my-2">+ Add New</a>
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
                                    style="background-color: #ffffff;" value="nama_pembekal_dilantik">Nama Pembekal</button>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="total_projek">Jumlah Projek</button>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="recently_added">Recently Added</button>
                            </div>
                            <div class="d-flex">
                                <form action="/admin/vendor" method="POST">
                                    @csrf
                                    @method('GET')
                                    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search...">
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
                                <th>Nama Pembekal</th>
                                <th width="10%">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($vendors as $vendor)

                            <tr>
                                <td>
                                    <div>
                                        <a href="/admin/vendor/{{ $vendor->id }}">{{ $vendor->nama_pembekal_dilantik }}
                                            @if ($vendor->project()->exists())
                                                ({{ $vendor->project()->count() }})
                                            @else
                                                (0)
                                            @endif
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    @if ( $vendor->status === 1 )
                                    <span class="badge rounded-pill bg-primary">Aktif</span>
                                    @elseif ( $vendor->status === 0 )
                                    <span class="badge rounded-pill bg-secondary">Tidak Aktif</span>
                                    @else
                                    <span class="badge rounded-pill bg-secondary">Undefined</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $vendors->appends(['filter_status' => $filter_status, 'sortBy' => $sortBy, 'keyword' => $keyword])->links() }}
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.btn_sorter', function(event) {
        var x = $(this).val();

        if (x === "nama_pembekal_dilantik") {
            location.href = '{!! route("vendor.index", ["sortBy" => "nama_pembekal_dilantik", "filter_status" => $filter_status]  ) !!}';
        }           
        else if (x === "total_projek") {
            location.href = '{!! route("vendor.index", ["sortBy" => "total_projek", "filter_status" => $filter_status]  ) !!}';
        }   
        else if (x === "recently_added") {
            location.href = '{!! route("vendor.index", ["sortBy" => "recently_added", "filter_status" => $filter_status]  ) !!}';
        }   
    });
    
</script>

@endsection