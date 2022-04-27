@extends('admin.base')

@section('content')

<div class="container m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/user">User</a></li>
                <li>Trash</li>
            </ul>
        </nav>
    </div>
    <div class="row my-4">
        <div class="col-xs-12 col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="p-0 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                          </svg>
                    <span class="mx-2">Info</span>
                    </div>
                </div>
                <div class="card-body">
                    Some items may have been severely damaged and cannot be restore. 
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="row">
                <div class="col-12">
                    <div class="container px-0 m-0 d-flex justify-content-between align-items-center">
                        <h4>Select user to restore</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th style="width:20px;">Bil</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th style="width: 200px;">Deleted at</th>
                                <th style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    <div class="text-capitalize">{{$user->name}}</div>
                                </td>
                                <td>
                                    <div class="text-capitalize">{{$user->email}}</div>
                                </td>
                                <td>
                                    <span>{{$user->deleted_at}}</span>
                                </td>
                                <td style="width:auto">
                                    <div class="d-flex align-items-center">
                                        <form action="/admin/user/{{$user->id}}/restore" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                                        </form>
                                        <form action="/admin/user/{{$user->id}}/permanent-delete" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-outline-danger mx-2 btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $users->links() }}
        </div>
    </div>
</div>

<script>

</script>

@endsection