@extends('base')

@section('content')

<div class="shadow card mt-3"
    style="background-image: url({{url('img/corner-2.png')}}); background-position: right top; background-repeat: no-repeat; background-size: 100% 100%;">
    <div class="card-header d-flex align-items-center">
        <h3>{{__('Tambah Kandungan Baru')}}</h3>
        <small class="mx-3">{{ $projek->tajuk_projek }}</small>
    </div>
    <form action="/projek/{{ $projek->id }}/kandungan" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="tajuk_besar" class="form-label">{{__('Tajuk Besar')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <input type="text" class="form-control" id="tajuk_besar" name="tajuk_besar">
                </div>
            </div>

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

            <div class="row mb-3">
                <div class="col-12">
                    <textarea type="text" class="form-control" id="mytextarea" rows=15 name="kandungan">
                    </textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                  <label for="publish" class="form-label">{{__('Terbitkan')}}</label>
                </div>
                <div class="col-md-8 col-12">
                  <div class="d-flex flex-column flex-md-row">
                    <div class="form-group mx-md-0 mx-2">
                      <input class="form-check-input" type="radio" name="publish" id="publish_true" value="1" checked>
                      <label class="form-check-label" for="publish_true">
                        {{__('Ya')}}
                      </label>
                    </div>
                    <div class="form-group mx-md-5 mx-2">
                      <input class="form-check-input" type="radio" name="publish" id="publish_false" value="0">
                      <label class="form-check-label" for="publish_false">
                        {{__('Tidak')}}
                        <span class="small text-muted">({{__('Simpan di draft')}})</span>
                      </label>
                    </div>
                  </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="publish" class="form-label">{{__('Boleh dilihat oleh')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <div class="d-flex flex-column flex-md-row">
                        <div class="form-group mx-2 mx-md-0">
                            <input type="checkbox" name="staff" id="staff" value="1"
                            class="form-check-input" checked>
                            <label for="staff" class="form-check-label mx-2">{{__('Staf')}}</label>
                        </div>
                        <div class="form-group mx-2">
                            <input type="checkbox" name="editor" id="editor" value="1"
                            class="form-check-input" checked>
                            <label for="editor" class="form-check-label mx-2">{{__('Editor')}}</label>
                        </div>
                        <div class="form-group mx-2">
                            <input type="checkbox" name="normal_user" id="normal_user" value="1"
                            class="form-check-input" checked>
                            <label for="normal_user" class="form-check-label mx-2">{{__('Pengguna bukan staf')}}</label>
                        </div>
                        <div class="form-group mx-2">
                            <input type="checkbox" name="guest" id="guest" value="1"
                            class="form-check-input" checked>
                            <label for="guest" class="form-check-label mx-2">{{__('Orang Awam')}}</label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            {{-- <a class="btn btn-primary float-right" href="/">Kembali</a> --}}
            <div class="row">
                <div class="col-8"></div>
                <div class="col-2 fill">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary" style="width: 100%;"
                        type="button">{{__('Kembali')}}</a>
                </div>
                <div class="col-2 fill">
                    <button class="btn btn-primary" style="width: 100%;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">{{__('Simpan')}}</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('Anda Pasti?')}}</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                        {{__('Anda boleh mengubah kandungan kemudian nanti.')}} 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Tutup')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Simpan')}}</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

@endsection