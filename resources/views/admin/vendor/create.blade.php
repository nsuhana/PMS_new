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
    tinymce.init({
        selector: '#mytextarea',
        relative_urls: false,
        remove_script_host: false,
        });
</script>

<div class="m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li><a href="/admin/vendor">Vendor</a></li>
                <li>Tambah</li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="d-flex bd-highlight align-items-center">
            <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">Tambah</h1>
        </div>
    </div>
    <form action="/admin/vendor" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-md-3 my-4 p-4">
                <div class="row my-4">
                    <div class="mx-auto image___container">
                        <img src="https://picsum.photos/200"
                            class="rounded mx-auto d-block rounded-circle image___profilepic bg-dark" id="output"
                            style="width: 200px; height: 200px;">
                        <div class="middle">
                            <input id="upload" type="file" name="image" accept="image/png, image/gif, image/jpeg"
                                onchange="loadFile(event)" />
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
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                </div>
            </div>
            <div class="col-xs-12 col-md-9 my-4 p-4">
                <div class="card card-body p-4">
                    <div class="row mb-3">
                        <h5 class="fw-bold">About</h5>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label class="form-label" for="nama_pembekal">Nama Pembekal</label>
                        </div>
                        <div class="col-8"><input class="form-control" type="text" name="nama_pembekal"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label class="form-label" for="description">Description</label></div>
                        <div class="col-8"><textarea class="form-control" name="description" cols="30"
                                rows="15" id="mytextarea"></textarea>
                            </div>
                    </div>
                    <div class="row mb-3">
                        <h5 class="fw-bold">Contact Information</h5>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label class="form-label" for="no_telefon">No Telefon</label></div>
                        <div class="col-8"><input class="form-control" type="text" name="no_telefon"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label class="form-label" for="faks">Faks</label></div>
                        <div class="col-8"><input class="form-control" type="text" name="faks"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label class="form-label" for="alamat">Alamat Pejabat</label></div>
                        <div class="col-8"><input class="form-control" type="text" name="alamat"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4"><label class="form-label" for="website">Laman Web</label></div>
                        <div class="col-8"><input class="form-control" type="text" name="website"></div>
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