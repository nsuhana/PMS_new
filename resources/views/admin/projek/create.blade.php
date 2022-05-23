@extends('admin.base')

@section('content')
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <div class="m-4">
        <div class="row">
            <nav>
                <ul class="breadcrumb">
                    <li><a href="/admin">Home</a></li>
                    <li><a href="/admin/projek">Projek</a></li>
                    <li>Tambah</li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="d-flex bd-highlight align-items-center">
                <h1 class="w-100 bd-highlight" style="text-transform:uppercase;">Tambah</h1>
            </div>
        </div>

        <div class="row">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />
        </div>

        <div class="shadow card my-4">
            <div class="card-body">
                <div class="row">
                    <form action="/admin/projek" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <h5 class="fw-bold">Latar Belakang Projek</h5>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="tajuk_projek" class="form-label">Tajuk Projek</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="tajuk_projek" name="tajuk_projek" class="form-control" value="{{old('tajuk_projek')}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="pemilik_projek" class="form-label">Pemilik Projek</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="pemilik_projek" name="pemilik_projek" class="form-control" value="{{old('pemilik_projek')}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="pengurus_projek" class="form-label">Pengurus Projek</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="pengurus_projek" name="pengurus_projek" class="form-control" value="{{old('pengurus_projek')}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="rujukan_kontrak" class="form-label">Rujukan Kontrak</label>
                                <i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Surat Setuju Terima format .pdf sahaja">
                                </i>
                            </div>
                            <div class="col-8">
                                <input type="file" id="rujukan_kontrak" name="rujukan_kontrak" class="form-control"
                                    accept="application/pdf">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="" class="form-label">Nama Pembekal Dilantik</label>
                            </div>
                            <div class="col-8">
                                <input type="text" list="namaPembekal" name="nama_pembekal_dilantik"
                                    class="form-control" value="{{old('nama_pembekal_dilantik')}}"/>
                                <datalist id="namaPembekal">
                                    @foreach ($vendor as $vendor)
                                        <option value="{{ $vendor->nama_pembekal_dilantik }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="" class="form-label">Kos Kontrak</label>
                            </div>
                            <div class="col-8">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="kos_kontrak_tidak_termasuk_caj_perkhidmatan"
                                            class="form-label">Tidak termasuk caj perkhidmatan (RM)</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="kos_kontrak_tidak_termasuk_caj_perkhidmatan"
                                            name="kos_kontrak_tidak_termasuk_caj_perkhidmatan" class="form-control" value="{{old('kos_kontrak_tidak_termasuk_caj_perkhidmatan')}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <label for="kos_kontrak_termasuk_caj_perkhidmatan" class="form-label">Termasuk caj perkhidmatan (RM)</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" id="kos_kontrak_termasuk_caj_perkhidmatan"
                                            name="kos_kontrak_termasuk_caj_perkhidmatan" class="form-control" value="{{old('kos_kontrak_termasuk_caj_perkhidmatan')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="bon_pelaksanaan_projek" class="form-label">Bon Pelaksanaan Projek</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="bon_pelaksanaan_projek" name="bon_pelaksanaan_projek"
                                    class="form-control" value="{{old('bon_pelaksanaan_projek')}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="tempoh_sah_bon" class="form-label">Tempoh Sah Bon</label>
                            </div>
                            <div class="col-8">
                                <input type="date" id="tempoh_sah_bon" name="tempoh_sah_bon" class="form-control" value="{{old('tempoh_sah_bon')}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="" class="form-label">Tempoh Kontrak</label>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="tempoh_mula_kontrak" class="form-label">Tarikh Mula</label>
                                        <input type="date" name="tempoh_mula_kontrak" id="tempoh_mula_kontrak"
                                            class="form-control mt-2" value="{{old('tempoh_mula_kontrak')}}">
                                    </div>
                                    <div class="col-6">
                                        <label for="tempoh_tamat_kontrak" class="form-label">Tarikh Tamat</label>
                                        <input type="date" name="tempoh_tamat_kontrak" id="tempoh_tamat_kontrak"
                                            class="form-control mt-2" value="{{old('tempoh_tamat_kontrak')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="skop_projek" class="form-label">Skop Projek</label>
                            </div>
                            <div class="col-8">
                                {{-- <input type="text" class="form-control"> --}}
                                <div class="form-label">
                                    <input class="form-check-input" type="radio" name="skop_projek" id="Pembekalan"
                                        value="pembekalan" checked>
                                    <label class="form-check-label" for="Pembekalan">
                                        Pembekalan
                                    </label>
                                </div>
                                <div class="form-label">
                                    <input class="form-check-input" type="radio" name="skop_projek" id="perkhidmatan"
                                        value="perkhidmatan">
                                    <label class="form-check-label" for="perkhidmatan">
                                        Perkhidmatan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                Deskripsi Projek
                            </div>
                            <div class="col-8">
                                <textarea type="text" class="form-control" id="mytextarea" rows=3 name="description">
                          </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-4">
                                <label for="publish" class="form-label">Terbitkan</label>
                            </div>
                            <div class="col-8">
                                <div class="d-flex align-items-center">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_true"
                                            value="1" checked>
                                        <label class="form-check-label" for="publish_true">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-group mx-5">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_false"
                                            value="0">
                                        <label class="form-check-label" for="publish_false">
                                            Tidak
                                            <span class="small text-muted">(Simpan di draft)</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="col-10"></div>
                            <div class="col-2 fill">
                                <button class="btn btn-primary" style="width: 100%;" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
