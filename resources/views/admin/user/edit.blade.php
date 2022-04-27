@extends('admin.base')

@section('content')

<style>
    .image___container {
        position: relative;
        width: 100%;
    }

    .image___profilepic {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .1s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .image___container:hover .image___profilepic {
        opacity: 0.3;
    }

    .image___container:hover .middle {
        opacity: 1;
    }

    .text {
        color: white;
        font-size: 16px;
        padding: 16px 32px;
        text-transform: uppercase;
        text-decoration: none;
    }

    #upload {
        display: none
    }
</style>

<script>
    $(function(){
        $("#upload_link").on('click', function(e){
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });        
    });

</script>

<script>
    var editor_config = {
        path_absolute : "/",
        selector: '#mytextarea',
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
            } else {
            cmsURL = cmsURL + "&type=Files";
            }
    
            tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
                callback(message.content);
            }
            });
        }
    };

    tinymce.init(editor_config);
</script>

<div class="container m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/user">User</a></li>
                <li><a href="/admin/user/{{ $user->id }}" class="text-capitalize">{{ $user->name }}</a></li>
                <li>Edit</li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="d-flex bd-highlight align-items-center">
            <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">Edit</h1>
        </div>
    </div>
    <form action="/admin/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-md-3 my-4 p-4">
                <div class="row my-4">
                    <div class="mx-auto image___container">
                        @if ( $user->profile->vendor_avatar )
                        <img src="{{ url('images/' . $user->profile->vendor_avatar) }}"
                            class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..."
                            style="width: 200px; height: 200px;" id="output">
                        @else
                        <img src="https://i.pravatar.cc/200"
                            class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..."
                            style="width: 200px; height: 200px;" id="output">
                        @endif
                        <div class="middle">
                            <input id="upload" type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                value="{{ $user->profile->vendor_avatar }}" onchange="loadFile(event)" />
                            <a class="text-decoration-none" href="" id="upload_link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white"
                                    class="bi bi-camera-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                </svg>
                                <div class="text">
                                    Upload your photo
                                </div>
                            </a>
                        </div>
                        <script>
                            var loadFile=function(event){var output=document.getElementById('output');if(event.target.files[0]){output.src =URL.createObjectURL(event.target.files[0]);output.onload=function(){URL.revokeObjectURL(output.src)}}else{output.src = 'https://picsum.photos/200';}}
                        </script>
                    </div>
                </div>
                <div class="row">
                    <x-auth-validation-errors class="card card-body mb-4 text-danger" :errors="$errors" />
                </div>
            </div>
            <div class="col-xs-12 col-md-9 my-4 p-4">
                <div class="card card-body p-4">
                    <div class="row mb-3">
                        <h5 class="fw-bold">Latar Belakang Pengguna</h5>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="username" class="form-label">Username</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="username" name="username" class="form-control"
                                value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="email" class="form-label">Email</label>
                        </div>
                        <div class="col-8">
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="" class="form-label">Status Pengguna</label>
                        </div>
                        <div class="col-8 d-flex">
                            @if (Auth::user()->isSuperUser()) 
                                @if ($user->id === Auth::user()->id)    
                                    <!-- ********* --->
                                    <div class="form-group">
                                        <input type="checkbox" name="superuser" id="superuser" value="1"
                                        class="form-check-input" @if ( $user->role->superuser == '1' )
                                        checked
                                        disabled
                                        @endif
                                        >
                                        <input name="superuser" id="superuser" type="hidden" value="1">
                                        <label for="superuser" class="form-check-label mx-2">Superuser</label>
                                    </div>
                                    <!-- ********* --->
                                    <div class="form-group">
                                        <input type="checkbox" name="admin" id="admin" value="1"
                                        class="form-check-input" @if ( $user->role->admin == '1' )
                                        checked
                                        @endif
                                        >
                                        <label for="admin" class="form-check-label mx-2">Admin Privilege</label>
                                    </div>
                                    <!-- ********* --->
                                    <div class="form-group">
                                        <input type="checkbox" name="staffuser" id="staffuser" value="1"
                                        class="form-check-input" @if ( $user->role->staffuser == '1' )
                                        checked
                                        @endif
                                        >
                                        <label for="staffuser" class="form-check-label mx-2">staff User</label>
                                    </div>
                                    <!-- ********* --->
                                @else
                                    <!-- ********* --->
                                    <div class="form-group">
                                        <input type="checkbox" name="superuser" id="superuser" value="1"
                                        class="form-check-input" @if ( $user->role->superuser == '1' )
                                        checked
                                        @endif
                                        >
                                        <label for="superuser" class="form-check-label mx-2">Superuser</label>
                                    </div> 
                                    <!-- ********* --->
                                    <div class="form-group">
                                        <input type="checkbox" name="admin" id="admin" value="1"
                                        class="form-check-input" @if ( $user->role->admin == '1' )
                                        checked
                                        @endif
                                        >
                                        <label for="admin" class="form-check-label mx-2">Admin Privilege</label>
                                    </div>
                                    <!-- ********* --->
                                    <div class="form-group">
                                        <input type="checkbox" name="staffuser" id="staffuser" value="1"
                                        class="form-check-input" @if ( $user->role->staffuser == '1' )
                                        checked
                                        @endif
                                        >
                                        <label for="staffuser" class="form-check-label mx-2">staff User</label>
                                    </div>
                                    <!-- ********* --->
                                @endif                                
                            @else
                                @if ($user->isSuperUser())
                                    <!-- ********* --->
                                    <input name="superuser" id="superuser" type="hidden" value="1">
                                    @if($user->role->admin == '1')
                                    <input name="admin" id="admin" type="hidden" value="1">                                    
                                    @endif
                                    <!-- ********* --->
                                    @if($user->role->staffuser == '1')
                                    <input name="staffuser" id="staffuser" type="hidden" value="1">                                    
                                    @endif
                                    <!-- ********* --->
                                    <span class="text-danger">You do not have the authority to remove this user admin privilege</span>
                                @else
                                    @if ($user->id === Auth::user()->id)
                                        <!-- ********* --->
                                        <div class="form-group">
                                            <input type="checkbox" name="admin" id="admin" value="1"
                                            class="form-check-input" @if ( $user->role->admin == '1' )
                                            checked
                                            disabled
                                            @endif
                                            >
                                            <input name="admin" id="admin" type="hidden" value="1">
                                            <label for="admin" class="form-check-label mx-2">Admin Privilege</label>
                                        </div>
                                        <!-- ********* --->
                                        <div class="form-group">
                                            <input type="checkbox" name="staffuser" id="staffuser" value="1"
                                            class="form-check-input" @if ( $user->role->staffuser == '1' )
                                            checked
                                            @endif
                                            >
                                            <label for="staffuser" class="form-check-label mx-2">staff User</label>
                                        </div>
                                        <!-- ********* --->
                                    @else
                                        <!-- ********* --->
                                        <div class="form-group">
                                            <input type="checkbox" name="admin" id="admin" value="1"
                                            class="form-check-input" @if ( $user->role->admin == '1' )
                                            checked
                                            @endif
                                            >
                                            <label for="admin" class="form-check-label mx-2">Admin Privilege</label>
                                        </div>
                                        <!-- ********* --->
                                        <div class="form-group">
                                            <input type="checkbox" name="staffuser" id="staffuser" value="1"
                                            class="form-check-input" @if ( $user->role->staffuser == '1' )
                                            checked
                                            @endif
                                            >
                                            <label for="staffuser" class="form-check-label mx-2">staff User</label>
                                        </div>
                                        <!-- ********* --->
                                        
                                    @endif
                                @endif
                            @endif
                            
                        </div>
                    </div>

                    <div class="row mb-3">
                        <h5 class="fw-bold">Profile Pengguna</h5>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="fullname" class="form-label">Nama Penuh</label>
                        </div>
                        <div class="col-8">
                            <input type="text" id="fullname" name="fullname" class="form-control"
                                value="{{ $user->profile->fullname }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4"><label class="form-label" for="bio">Bio</label></div>
                        <div class="col-8"><textarea class="form-control" name="bio" id="mytextarea" cols="30"
                                rows="15">{{ $user->profile->bio }}</textarea></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection