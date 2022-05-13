@extends('admin.base')

@section('content')

<style>
    /* The snackbar - position it at the bottom and in the middle of the screen */
    #snackbar {
        visibility: hidden;
        /* Hidden by default. Visible on click */
        min-width: 250px;
        /* Set a default minimum width */
        margin-left: -125px;
        /* Divide value of min-width by 2 */
        background-color: #333;
        /* Black background color */
        color: #fff;
        /* White text color */
        text-align: center;
        /* Centered text */
        border-radius: 2px;
        /* Rounded borders */
        padding: 16px;
        /* Padding */
        position: fixed;
        /* Sit on top of the screen */
        z-index: 9999999999;
        /* Add a z-index if needed */
        left: 50%;
        /* Center the snackbar */
        top: 30px;
        /* 30px from the bottom */
    }

    /* Show the snackbar when clicking on a button (class added with JavaScript) */
    #snackbar.show {
        visibility: visible;
        /* Show the snackbar */
        /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    /* Animations to fade the snackbar in and out */
    @-webkit-keyframes fadein {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            top: 30px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            top: 30px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }
</style>

<div class="container m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/projek">Projek</a></li>
                <li><span class="text-capitalize">{{ $project->tajuk_projek }}</span></li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="d-flex bd-highlight align-items-center">
            <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">{{ $project->tajuk_projek }}</h1>
            <h1 class="d-flex flex-shrink-1 bd-highlight">
                <a href="/admin/projek/{{ $project->id }}/edit"
                    class="btn btn-outline-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path
                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                    </svg>
                    <span class="mx-2">Edit</span>
                </a>
                <button type="button" class="ms-2 btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path
                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                    </svg>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Hapus</h5>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <p>
                                    It is not recommend to delete a project as it will deleted it and all of its content permanently, how about
                                    unpublish it instead?
                                </p>
                                @if ($project->publish === 1)
                                <form action="/admin/projek/{{$project->id}}/unpublish" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-primary btn-lg" type="submit">
                                            Unpublish Project
                                        </button>
                                    </div>
                                </form>
                                @else
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-outline-primary btn-lg" type="button" data-bs-dismiss="modal">
                                        Stay Unpublish
                                    </button>
                                </div>
                                @endif
                            </div>
                            <div class="modal-footer">
                                <form action="/admin/projek/{{ $project->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-outline-secondary mx-2"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-outline-danger d-flex align-items-center"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                            </svg>
                                            <span class="mx-2">Delete</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6 mb-2">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-about-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-about" type="button" role="tab" aria-controls="nav-about"
                                    aria-selected="true">About</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Manage</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-about" role="tabpanel"
                                aria-labelledby="nav-about-tab">
                                <div class="p-2">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <thead class="table-dark">
                                                <tr>
                                                    <th colspan="100%">
                                                        <div>Latar Belakang Projek</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <th>
                                                    <div>Tajuk Projek</div>
                                                </th>
                                                <td>
                                                    <div class="text-capitalize">{{ $project->tajuk_projek }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Pemilik Projek</div>
                                                </th>
                                                <td>
                                                    <div class="text-capitalize">{{ $project->pemilik_projek }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Rujukan Projek</div>
                                                </th>
                                                <td>
                                                    <div><a href="/documents/rujukan/{{ $project->rujukan_projek }}">{{
                                                            $project->rujukan_projek }}</a></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Nama Pembekal Dilantik</div>
                                                </th>
                                                <td>
                                                    <div class="text-capitalize"><a
                                                            href="/admin/vendor/{{ $project->vendor_id }}">{{
                                                            $project->vendor->nama_pembekal_dilantik }}</a></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Kos Projek (Sebelum SST)</div>
                                                </th>
                                                <td>
                                                    <div>RM {{ $project->kos_projek_sebelum_sst }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Kos Projek (Selepas SST)</div>
                                                </th>
                                                <td>
                                                    <div>RM {{ $project->kos_projek_selepas_sst }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Bon Pelaksanaan Projek</div>
                                                </th>
                                                <td>
                                                    <div>RM {{ $project->bon_pelaksanaan_projek }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Tempoh Mula Kontrak</div>
                                                </th>
                                                <td>
                                                    <div>
                                                        {{date('F j, Y', strtotime($project->tempoh_mula_kontrak));}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Tempoh Tamat Kontrak</div>
                                                </th>
                                                <td>
                                                    <div>
                                                        {{date('F j, Y', strtotime($project->tempoh_tamat_kontrak));}}
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Skop Projek</div>
                                                </th>
                                                <td>
                                                    <div class="text-capitalize">{{ $project->skop_projek }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Status terbit</th>
                                                <td>
                                                    <div>
                                                        @if ($project->publish === 1)
                                                        <span class="badge rounded-pill bg-primary">Terbit</span>
                                                        @else
                                                        <span class="badge rounded-pill bg-secondary">Tidak Terbit</span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div>Status Projek</div>
                                                </th>
                                                <td>
                                                    <div>
                                                        @if ( $project->status === 'ikut jadual' )
                                                        <span class="badge rounded-pill bg-primary">Ikut Jadual</span>
                                                        @elseif ( $project->status === 'dalam perlaksanaan' )
                                                        <span class="badge rounded-pill bg-success">Dalam Perlaksanaan</span>
                                                        @elseif ( $project->status === 'projek lewat' )
                                                        <span class="badge rounded-pill bg-danger">Projek Lewat</span>
                                                        @elseif ( $project->status === 'projek sakit' )
                                                        <span class="badge rounded-pill bg-secondary">Projek Sakit</span>
                                                        @else
                                                        <span class="badge rounded-pill bg-secondary">Undefined</span>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah Kandungan</th>
                                                <td>
                                                    <div>{{$project->project_card->count()}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Jumlah komen</th>
                                                <td>
                                                    <div>{{$project->editor_comment->count()}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <div class="d-flex align-items-center">
                                                        <span>Site</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                            fill="currentColor" class="bi bi-box-arrow-up-right mx-2"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                                            <path fill-rule="evenodd"
                                                                d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                                        </svg>
                                                    </div>
                                                </th>
                                                <td>
                                                    <a href="/projek/{{$project->id}}"
                                                        class="text-capitalize">{{$project->tajuk_projek}}</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div id="index"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <iframe src="/documents/rujukan/{{ $project->rujukan_projek }}" frameborder="0"
                            style="width: 100%; height:500px; ">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The actual snackbar/toast -->
<div id="snackbar"></div>

<script>
    $(document).ready(function($)
    {
        index();
    });

    function index() {
        $.get("/admin/projek/{{$project->id}}/editor", {}, function(data, status) {
            $("#index").html(data);   
        });
    }

    function read() {
        $.get("/admin/projek/{{$project->id}}/editor/read", {}, function(data, status) {
            $("#read").html(data);   
        });
    }

    function search() {
        var data2 = {
            'keyword' : $('.search__keyword').val(),
        };
        console.log(data2.keyword);
        $.get("/admin/projek/{{$project->id}}/editor/search?keyword="+data2.keyword, {}, function(data, status) {
            $("#result").html(data);   
        });
    }

    function hideHapusCollabModal(id) {
        var x = '#hapusCollabModal'+id;
        $(x).modal('hide');
    }

    function hideTukarOwnerCollabModal(id) {
        var x = '#tukarOwnerCollabModal'+id;
        $(x).modal('hide');
    }

    function hideMainModal() {
        var x = '#collabModal';
        $(x).modal('hide');
        var y = $('.btn__del_collab').attr('data-updated');
        if(y === 'true') {
            index();
        }
    }

    function changeOwnerCollab(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/admin/projek/{{$project->id}}/editor/"+id+"/update-status",
            success: function (response) {
                $('#snackbar').html('');
                if(response.status==200) {
                    $('.btn__del_collab').attr('data-updated', 'true')
                    $('#snackbar').html(response.message);
                    hideTukarOwnerCollabModal(id)
                    read();
                    mySnackbar();
                }
            },
        });
    }

    function addEditor(id){
        var data = {
            'id' : id,
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/admin/projek/{{$project->id}}/editor/store",
            data: data,
            datatype: "json",
            success: function (response) {
                $('#snackbar').html('');
                if(response.status==200) {
                    $('.btn__del_collab').attr('data-updated', 'true');
                    $('#snackbar').html(response.message);
                    read();
                    mySnackbar();
                }
            },
        });
    }

    function destroyCollab(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/admin/projek/{{$project->id}}/editor/"+id+"/delete",
            success: function (response) {
                $('#snackbar').html('');
                if(response.status==200) {
                    $('.btn__del_collab').attr('data-updated', 'true')
                    $('#snackbar').html(response.message);
                    hideHapusCollabModal(id);
                    read();
                    mySnackbar();
                }
            },
        });
    }

    function mySnackbar() {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }

</script>

@endsection