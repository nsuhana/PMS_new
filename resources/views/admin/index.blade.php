@extends('admin.base')

@section('content')

<div class="container p-0 my-4">
    <div class="container px-0 py-4 m-0">
        <h4>Dashboard</h4>
    </div>

    <style>
        .grid-striped .row:nth-of-type(odd) {
    background-color: rgba(0,0,0,.05);
}
    </style>

    <div class="row">
        <div class="col-md-8 col-12">
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th colspan="100%">Authentication and Authorization</th>
                            </tr>
                        </thead>
                        <tbody class="bgCustom3">
                            <tr>
                                <td><div><a href="/admin/user" class="text-decoration-none">Users</a></div></td>
                                <td width="10%">
                                    <div>
                                        <a class="d-flex align-items-center text-decoration-none" href="/admin/user/create"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="mx-2 text-success bi bi-plus-lg"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                            </svg>
                                            Add</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th colspan="100%">About Projects</th>
                            </tr>
                        </thead>
                        <tbody class="bgCustom3">
                            <tr>
                                <td><div><a href="/admin/projek" class="text-decoration-none">Project</a></div></td>
                                <td width="10%">
                                    <div>
                                        <a class="d-flex align-items-center text-decoration-none" href="/admin/projek/create"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="mx-2 text-success bi bi-plus-lg"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                            </svg>
                                            Add</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><div><a href="/admin/vendor" class="text-decoration-none">Vendor</a></div></td>
                                <td width="10%">
                                    <div>
                                        <a class="d-flex align-items-center text-decoration-none" href="/admin/vendor/create"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="mx-2 text-success bi bi-plus-lg"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                            </svg>
                                            Add</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Recent actions</h3>
                        </div>
                        <div class="col text-right">
                            <a href="/admin/log" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="card-body container grid-striped">
                    <div class="row">
                        <div class="col-12">
                            <b>Referral</b>
                        </div>
                    </div>
                    @if ($logs->isEmpty())
                    <div class="row">
                        <div class="col-12">
                            No recent actions
                        </div>
                    </div>
                    @else
                        @foreach ($logs as $log)
                            <div class="row my-1">
                                <div class="col-7 text-truncate">
                                    {{{$log->subject}}}
                                </div>
                                <div class="col-5 text-start">
                                    {{{date('d/m/Y H:i:s', strtotime($log->created_at))}}}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>


</div>

@endsection