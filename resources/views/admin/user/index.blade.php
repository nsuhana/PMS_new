@extends('admin.base')

@section('content')

<div class="container m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li>User</li>
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
                    <form action="/admin/user" method="POST">
                        @csrf
                        @method('GET')
                        <div class="row">
                            <div class="row">
                                <div class="class-label">
                                    <label for="">By Super User</label>
                                </div>
                                <div class="mx-2">
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_superuser"
                                            id="filter_superuser1" value="" @if ($filter_superuser===null) checked
                                            @endif>
                                        <label class="form-check-label mx-2 filter_superuser" for="filter_superuser1">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_superuser"
                                            id="filter_superuser2" value="1" @if ($filter_superuser==='1' ) checked
                                            @endif>
                                        <label class="form-check-label mx-2 filter_superuser" for="filter_superuser2">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_superuser"
                                            id="filter_superuser3" value="0" @if ($filter_superuser==='0' ) checked
                                            @endif>
                                        <label class="form-check-label mx-2 filter_superuser" for="filter_superuser3">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="class-label">
                                    <label for="">By Staff Status</label>
                                </div>
                                <div class="mx-2">
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_staffuser"
                                            id="filter_staffuser1" value="" @if ($filter_staffuser===null) checked
                                            @endif>
                                        <label class="form-check-label mx-2" for="filter_staffuser1">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_staffuser"
                                            id="filter_staffuser2" value="1" @if ($filter_staffuser==='1' ) checked
                                            @endif>
                                        <label class="form-check-label mx-2" for="filter_staffuser2">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_staffuser"
                                            id="filter_staffuser3" value="0" @if ($filter_staffuser==='0' ) checked
                                            @endif>
                                        <label class="form-check-label mx-2" for="filter_staffuser3">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="class-label">
                                    <label for="">By Account Status</label>
                                </div>
                                <div class="mx-2">
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_account_status"
                                            id="filter_account_status1" value="" @if ($filter_account_status===null)
                                            checked @endif>
                                        <label class="form-check-label mx-2" for="filter_account_status1">
                                            All
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_account_status"
                                            id="filter_account_status2" value="1" @if ($filter_account_status==='1' )
                                            checked @endif>
                                        <label class="form-check-label mx-2" for="filter_account_status2">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-label m-0">
                                        <input class="form-check-input" type="radio" name="filter_account_status"
                                            id="filter_account_status3" value="0" @if ($filter_account_status==='0' )
                                            checked @endif>
                                        <label class="form-check-label mx-2" for="filter_account_status3">
                                            Tidak Aktif
                                        </label>
                                    </div>
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
            <a href="/admin/user/deleted" class="btn btn-secondary my-2 d-flex align-items-center justify-content-center">
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
                        <h4>Select user to change</h4>
                        <a href="/admin/user/create" class="btn btn-primary my-2">+ Add New</a>
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
                                    style="background-color: #ffffff;" value="name">Username</button>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="email">Email</button>
                                <button class="btn text-dark mx-2 shadow-sm btn_sorter"
                                    style="background-color: #ffffff;" value="recently_added">Recently Added</button>
                            </div>
                            <div class="d-flex">
                                <form action="/admin/user" method="POST">
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
                                <th>Id Pengguna</th>
                                <th>Alamat Emel</th>
                                <th>Pentadbir Kontrak</th>
                                <th>Pemilik Projek/PMO</th>
                                <th>Penyemak Bayaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="read">
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="text-capitalize"><a href="/admin/user/{{ $user->id }}">{{ $user->name
                                            }}</a></div>
                                </td>
                                <td>
                                    <div>{{ $user->email }}</div>
                                </td>
                                <td>
                                    <div class="text-capitalize">
                                        @if ($user->role->superuser === 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                            class="bi bi-check" viewBox="0 0 16 16">
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                            class="bi bi-x" viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="text-capitalize">
                                        @if ($user->role->admin === 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                            class="bi bi-check" viewBox="0 0 16 16">
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                            class="bi bi-x" viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="text-capitalize">
                                        @if ($user->role->staffuser === 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                            class="bi bi-check" viewBox="0 0 16 16">
                                            <path
                                                d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                        </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                                            class="bi bi-x" viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if ( $user->status === 1 )
                                    <span class="badge rounded-pill bg-primary">Aktif</span>
                                    @elseif ( $user->status === 0 )
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
            {{ $users->appends(['filter_superuser' => $filter_superuser, 'filter_staffuser' => $filter_staffuser,
            'filter_account_status' => $filter_account_status, 'sortBy' => $sortBy, 'keyword' => $keyword])->links() }}
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.btn_sorter', function(event) {
        var x = $(this).val();

        if (x === "name") {
            location.href = '{!! route("user.index", ["sortBy" => "name", "filter_superuser" => $filter_superuser, "filter_staffuser" => $filter_staffuser, "filter_account_status" => $filter_account_status]  ) !!}';
        }
        else if(x === "email") {
            location.href = '{!! route("user.index", ["sortBy" => "email", "filter_superuser" => $filter_superuser, "filter_staffuser" => $filter_staffuser, "filter_account_status" => $filter_account_status]  ) !!}';
        }
        else if (x === "recently_added") {
            location.href = '{!! route("user.index", ["sortBy" => "recently_added", "filter_superuser" => $filter_superuser, "filter_staffuser" => $filter_staffuser, "filter_account_status" => $filter_account_status]  ) !!}';
        }
    });

</script>

@endsection
