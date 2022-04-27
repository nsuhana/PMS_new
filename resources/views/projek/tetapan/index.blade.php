@extends('base')

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

<script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script>

<div class="d-flex align-items-center">
    <a href="/projek/{{{$project->id}}}" class="text-dark ms-2">
        <h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
        </h3>
    </a>
    <h1>{{__('Tetapan Projek')}}</h1>
</div>
<hr>
<div class="d-flex flex-column">
    <h5>{{__('Deskripsi Projek')}}</h5>
    <form action="/projek/{{$project->id}}/tetapan/update-description" method="POST">
        @csrf
        @method('get')
        <div class="d-flex flex-column">
            <textarea type="text" class="form-control" id="mytextarea" rows=3 name="description">{!!$project->description!!}</textarea>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary my-2">{{__('Simpan')}}</button>
            </div>
        </div>
    </form>
    <hr>
    @if ($project->publish === 1)
    <h5>{{__('Nyahterbitkan')}} </h5>
    <div>
        {{__('teks_setting_nyahterbit')}}
    </div>
    <div class="my-2">
        <form action="/projek/{{$project->id}}/tetapan/update-status-publish" method="POST">
            @csrf
            @method('get')
            <button class="btn btn-outline-secondary">{{__('Nyahterbitkan projek')}}</button>
        </form>
    </div>
    @else
    <h5>{{__('Terbitkan')}} </h5>
    <div>
        {{__('teks_setting_terbit')}}
    </div>
    <div class="my-2">
        <form action="/projek/{{$project->id}}/tetapan/update-status-publish" method="POST">
            @csrf
            @method('get')
            <button class="btn btn-outline-primary">{{__('Terbitkan projek')}}</button>
        </form>
    </div>
    @endif
    <hr>
    <h5>{{__('Pengurus Projek')}}</h5>
    <div id="index"></div>
    <hr>
    <h5>{{__('Tukar Status Projek')}}</h5>
    <form action="/projek/{{$project->id}}/tetapan/update-status-projek" method="POST">
        @csrf
        @method('get')
        <div class="d-flex align-items-md-center flex-md-row flex-column">
            <div>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            </div>
            <select name="status" id="status" class="form-select mx-md-3 mx-0 mb-2 mb-md-0" style="padding-left: 9px; padding-right: 27px; background-position: right 0.75rem center !important;">
                <option value="selesai"
                @if ($project->status === 'selesai')
                selected
                @endif>{{__('Selesai')}}</option>
                <option value="aktif" 
                @if ($project->status === 'aktif')
                selected
                @endif>{{__('Aktif')}}</option>
                <option value="tidak aktif"
                @if ($project->status === 'tidak aktif')
                selected
                @endif>{{__('Tidak Aktif')}}</option>
            </select>
            <button class="btn btn-primary" type="submit">{{__('Tukar')}}</button>
        </div>
    </form>
    <hr>
    <h5>{{__('Log Komen')}}</h5>
    <div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
    </div>
    <div class="my-2">
        <button class="btn btn-outline-primary" onClick="lihatLog({{$project->id}})">{{__('Lihat Log Komen')}}</button>
    </div>

</div>

<div class="mb-5"></div>

<!-- The actual snackbar/toast -->
<div id="snackbar"></div>

<!-- Modal -->
<div class="modal fade" id="lihatLogModal" tabindex="-1" aria-labelledby="lihatLogModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="lihatLogModalLabel">Log komen editor</h5>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
        <div id="log__index"></div>
      </div>
    </div>
</div>

<script>
    function lihatLog(id) {
        $.get("/projek/{{$project->id}}/ulasan", {}, function (data, status){
            $('#log__index').html(data);
            $('#lihatLogModal').modal('show');
        });
    };
</script>

<script>
    $(document).ready(function($)
    {
        index();
    });

    function index() {
        $.get("/projek/{{$project->id}}/tetapan/editor", {}, function(data, status) {
            $("#index").html(data);   
        });
    };

    function read() {
        $.get("/projek/{{$project->id}}/tetapan/editor/read", {}, function(data, status) {
            $("#read").html(data);   
        });
    }

    function search() {
        var data2 = {
            'keyword' : $('.search__keyword').val(),
        };
        console.log(data2.keyword);
        $.get("/projek/{{$project->id}}/tetapan/editor/search?keyword="+data2.keyword, {}, function(data, status) {
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
            url: "/projek/{{$project->id}}/tetapan/editor/"+id+"/update-status",
            success: function (response) {
                $('#snackbar').html('');
                if(response.status==200) {
                    $('.btn__del_collab').attr('data-updated', 'true')
                    $('#snackbar').html(response.message);
                    hideTukarOwnerCollabModal(id)
                    read();
                    mySnackbar();
                }
                else {
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
            url: "/projek/{{$project->id}}/tetapan/editor/store",
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
            url: "/projek/{{$project->id}}/tetapan/editor/"+id+"/delete",
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