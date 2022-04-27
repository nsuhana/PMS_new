@extends('base2')

@section('content')

<div class="shadow card mb-3">
    <div class="container m-0 p-0"
        style="background-image: url({{url('img/corner-3.png')}}); background-position: right top; background-repeat: no-repeat; background-size: 100% 100%;">
        <div class="card-body d-flex align-content-end flex-wrap align-items-center" style="height: 150px;">
            <span class="p-3"></span>
            <a href="/projek/{{$project->id}}" class="text-decoration-none text-dark"><h1 style="text-transform:uppercase;">{{ $project->tajuk_projek }}</h1></a>
            <span class="m-3">Status Kemajuan Kerja Projek</span>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ProjekModal" tabindex="-1" aria-labelledby="ProjekModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ProjekModalLabel"></h5>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div id="page" class="m-0">
            </div>
        </div>
    </div>
</div>

<style>
    .sub-aktiviti {
        /* text-indent: 15px; */
        margin-left: 15px;
    }

    .truncated {
        white-space: nowrap;
        width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .truncated__mini {
        white-space: nowrap;
        width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .truncated__mini__2 {
        white-space: nowrap;
        width: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    tr:hover {
        cursor: pointer;
    }
</style>

<div id="success__message"></div>

<div class="shadow card mb-3">
    <div class="card-body">
        <div class="container tbl_user_data" style="overflow-x:scroll;">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th rowspan="2" width="29px">Bil</th>
                        <th rowspan="2">Fasa Projek</th>
                        <th colspan="2">Rancang</th>
                        <th colspan="2">Sebenar</th>
                        <th rowspan="2">%<br>Rancang</th>
                        <th rowspan="2">%<br>Sebenar</th>
                        <th rowspan="2">Status</th>
                        <th rowspan="2">Catatan</th>
                        <th rowspan="2" width="29px" onClick="create()"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg></th>
                    </tr>
                    <tr>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Tamat</th>
                        <th>Tarikh Mula</th>
                        <th>Tarikh Tamat</th>
                    </tr>
                </thead>
                <tbody id="read">
                    <tr>
                        <th colspan="100%">Loading...</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@if (Route::has('login'))
@auth
@if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
<script>
    $(document).ready(function($)
    {
        read();
    });

    // Read; Render table
    function read() {
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/read", {}, function(data, status) {
            $("#read").html(data);   
        });

    }

    // Create; Render create modal
    function create() {
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/create", {}, function(data, status) {
            $("#ProjekModalLabel").html('Tambah Fasa Projek')
            $("#page").html(data);
            $("#ProjekModal").modal('show');
        });
    }

    function createKumpulanFasa(id) {
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/create", {}, function(data, status) {
            $("#ProjekModalLabel").html('Tambah Kumpulan Fasa Projek')
            $("#page").html(data);
            $("#ProjekModal").modal('show');
        });
    }

    function createSubKumpulanFasa(id, id2) {
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/sub-kumpulan-fasa/create", {}, function(data, status) {
            $("#ProjekModalLabel").html('Tambah Sub Kumpulan Fasa Projek')
            $("#page").html(data);
            $("#ProjekModal").modal('show');
        });
    }

    //Store: Simpan Fasa Projek Data
    function store() {
        var data = {
            'project_id': {!! $project->id !!},
            'nama_fasa_projek': $('.nama_fasa_projek').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/store",
            data: data,
            datatype: "json",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-success');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }

    function storeKumpulanFasa(id) {
        var data = {
            'project_id': {!! $project->id !!},
            'fasa_id': id,
            'nama_aktiviti': $('.nama_aktiviti').val(),
            'tarikh_mula_rancang' : $('.tarikh_mula_rancang').val(),
            'tarikh_tamat_rancang' : $('.tarikh_tamat_rancang').val(),
            'peratus_rancang' : $('.peratus_rancang').val(),
            'tarikh_mula_sebenar' : $('.tarikh_mula_sebenar').val(),
            'tarikh_tamat_sebenar' : $('.tarikh_tamat_sebenar').val(),
            'peratus_sebenar' : $('.peratus_sebenar').val(),
            'status' : $('.status').val(),
            'catatan' : $('.catatan').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/store",
            data: data,
            datatype: "json",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-success');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }

    function storeSubKumpulanFasa(id, id2) {
        var data = {
            'project_id': {!! $project->id !!},
            'fasa_id': id,
            'nama_aktiviti': $('.nama_aktiviti').val(),
            'tarikh_mula_rancang' : $('.tarikh_mula_rancang').val(),
            'tarikh_tamat_rancang' : $('.tarikh_tamat_rancang').val(),
            'peratus_rancang' : $('.peratus_rancang').val(),
            'tarikh_mula_sebenar' : $('.tarikh_mula_sebenar').val(),
            'tarikh_tamat_sebenar' : $('.tarikh_tamat_sebenar').val(),
            'peratus_sebenar' : $('.peratus_sebenar').val(),
            'status' : $('.status').val(),
            'catatan' : $('.catatan').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/sub-kumpulan-fasa/store",
            data: data,
            datatype: "json",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-success');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }

    //Store: Simpan Fasa Projek Data
    function update(id) {
        var data = {
            'project_id': {!! $project->id !!},
            'nama_fasa_projek': $('.nama_fasa_projek').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/update",
            data: data,
            datatype: "json",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-success');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }

    function updateKumpulanFasa(id, id2) {
        var data = {
            'project_id': {!! $project->id !!},
            'fasa_id': id,
            'nama_aktiviti': $('.nama_aktiviti').val(),
            'tarikh_mula_rancang' : $('.tarikh_mula_rancang').val(),
            'tarikh_tamat_rancang' : $('.tarikh_tamat_rancang').val(),
            'peratus_rancang' : $('.peratus_rancang').val(),
            'tarikh_mula_sebenar' : $('.tarikh_mula_sebenar').val(),
            'tarikh_tamat_sebenar' : $('.tarikh_tamat_sebenar').val(),
            'peratus_sebenar' : $('.peratus_sebenar').val(),
            'status' : $('.status').val(),
            'catatan' : $('.catatan').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/update",
            data: data,
            datatype: "json",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-success');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }

    function updateSubKumpulanFasa(id, id2, id3) {
        var data = {
            'project_id': {!! $project->id !!},
            'fasa_id': id,
            'kumpulan_fasa_id': id2,
            'sub_kumpulan_fasa_id': id3,
            'nama_aktiviti': $('.nama_aktiviti').val(),
            'tarikh_mula_rancang' : $('.tarikh_mula_rancang').val(),
            'tarikh_tamat_rancang' : $('.tarikh_tamat_rancang').val(),
            'peratus_rancang' : $('.peratus_rancang').val(),
            'tarikh_mula_sebenar' : $('.tarikh_mula_sebenar').val(),
            'tarikh_tamat_sebenar' : $('.tarikh_tamat_sebenar').val(),
            'peratus_sebenar' : $('.peratus_sebenar').val(),
            'status' : $('.status').val(),
            'catatan' : $('.catatan').val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/sub-kumpulan-fasa/"+id3+"/update",
            data: data,
            datatype: "json",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-success');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }

    function destroy(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/delete",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-danger');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }

    function destroyKumpulanFasa(id, id2) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/delete",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-danger');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }
    function destroySubKumpulanFasa(id, id2, id3) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/sub-kumpulan-fasa/"+id3+"/delete",
            success: function (response) {
                $('#err__message').html('');
                if(response.status==400) {
                    $.each(response.error, function(key, err_values) {
                        $('#err__message').append('<li>'+err_values+'</li>');
                    });
                }
                else {
                    $('#success__message').html('');
                    $('#success__message').addClass('alert alert-danger');
                    $('#success__message').text(response.message);
                    $("#ProjekModal").modal('hide');
                    read();
                }
            },
        });
    }
</script>

@else
<script>
    $(document).ready(function($)
    {
        read();
    });

    // Read; Render table
    function read() {
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/read", {}, function(data, status) {
            $("#read").html(data);   
        });

    }

</script>

@endif
@endauth
@endif

@endsection