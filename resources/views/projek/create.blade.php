@extends('base')

@section('content')
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <div class="shadow card mb-3 pb-5"
        style="background-image: url({{ url('img/corner-3.png') }}); background-position: right top; background-repeat: no-repeat;">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-10">
                    <h3>{{ __('Tambah Projek Baru') }}</h3>
                    <p class="mb-0 text-muted">{{ __('teks_create_projek') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="shadow card">
        <div class="card-body">
            <div class="row">
                <form action="/projek" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <h5>{{ __('Latar Belakang Projek') }}</h5>
                    </div>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="tajuk_projek" class="form-label">{{ __('Tajuk Projek') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <input type="text" id="tajuk_projek" name="tajuk_projek" class="form-control"
                                value="{{ old('tajuk_projek') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="pemilik_projek" class="form-label">{{ __('Pemilik Projek') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <input type="text" id="pemilik_projek" name="pemilik_projek" class="form-control"
                                value="{{ old('pemilik_projek') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="pengurus_projek" class="form-label">{{ __('Pengurus Projek') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <input type="text" id="pengurus_projek" name="pengurus_projek" class="form-control"
                                value="{{ old('pengurus_projek') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="rujukan_kontrak" class="form-label">{{ __('Rujukan Kontrak') }}</label>
                            <i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Surat Setuju Terima format .pdf sahaja">
                            </i>
                        </div>
                        <div class="col-md-8 col-12">
                            <input type="file" id="rujukan_kontrak" name="rujukan_kontrak" class="form-control"
                                accept="application/pdf">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="" class="form-label">{{ __('Nama Pembekal Dilantik') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <input type="text" list="namaPembekal" name="nama_pembekal_dilantik" class="form-control"
                                value="{{ old('nama_pembekal_dilantik') }}" />
                            <datalist id="namaPembekal">
                                @foreach ($vendor as $vendor)
                                    <option value="{{ $vendor->nama_pembekal_dilantik }}">
                                @endforeach
                            </datalist>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="" class="form-label">{{ __('Kos Kontrak') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="row mb-3">
                                <div class="col-md-4 col-6">
                                    <label for="kos_kontrak_tidak_termasuk_caj_perkhidmatan"
                                        class="form-label">{{ __('Tidak termasuk caj perkhidmatan') }} (RM)</label>
                                </div>
                                <div class="col-md-4 col-6">
                                    <input type="number" id="kos_kontrak_tidak_termasuk_caj_perkhidmatan"
                                        name="kos_kontrak_tidak_termasuk_caj_perkhidmatan" class="form-control" step=".01"
                                        value="{{ old('kos_kontrak_tidak_termasuk_caj_perkhidmatan') }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <label for="kos_kontrak_termasuk_caj_perkhidmatan"
                                        class="form-label">{{ __('Termasuk caj perkhidmatan') }} (RM)</label>
                                </div>
                                <div class="col-md-4 col-6">
                                    <input type="number" id="kos_kontrak_termasuk_caj_perkhidmatan"
                                        name="kos_kontrak_termasuk_caj_perkhidmatan" class="form-control" step=".01"
                                        value="{{ old('kos_kontrak_termasuk_caj_perkhidmatan') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="bon_pelaksanaan_projek"
                                class="form-label">{{ __('Bon Pelaksanaan Projek') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <input type="number" id="bon_pelaksanaan_projek" name="bon_pelaksanaan_projek"
                                class="form-control" step=".01" value="{{ old('bon_pelaksanaan_projek') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="tempoh_sah_bon" class="form-label">{{ __('Tempoh Sah Bon') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <input type="date" class="form-control" name="tempoh_sah_bon" id="tempoh_sah_bon"
                                value="{{ old('tempoh_sah_bon') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="" class="form-label">{{ __('Tempoh Kontrak') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="row">
                                <div class="col-6">
                                    <label for="tempoh_mula_kontrak"
                                        class="form-label">{{ __('Tarikh Mula') }}</label>
                                    <input type="date" name="tempoh_mula_kontrak" id="tempoh_mula_kontrak"
                                        class="form-control mt-2" value="{{ old('tempoh_mula_kontrak') }}">
                                </div>
                                <div class="col-6">
                                    <label for="tempoh_tamat_kontrak"
                                        class="form-label">{{ __('Tarikh Tamat') }}</label>
                                    <input type="date" name="tempoh_tamat_kontrak" id="tempoh_tamat_kontrak"
                                        class="form-control mt-2" value="{{ old('tempoh_tamat_kontrak') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="skop_projek" class="form-label">{{ __('Skop Projek') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="skop_projek" id="Pembekalan"
                                    value="pembekalan" checked>
                                <label class="form-check-label" for="Pembekalan">
                                    {{ __('Pembekalan') }}
                                </label>
                            </div>
                            <div class="form-group my-2">
                                <input class="form-check-input" type="radio" name="skop_projek" id="perkhidmatan"
                                    value="perkhidmatan">
                                <label class="form-check-label" for="perkhidmatan">
                                    {{ __('Perkhidmatan') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            {{ __('Deskripsi Projek') }}
                        </div>
                        <div class="col-md-8 col-12">
                            <textarea type="text" class="form-control" id="mytextarea" rows=3 name="description">
            </textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="publish" class="form-label">{{ __('Terbitkan') }}</label>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="d-flex align-items-center">
                                <div class="form-group">
                                    <input class="form-check-input" type="radio" name="publish" id="publish_true" value="1"
                                        checked>
                                    <label class="form-check-label" for="publish_true">
                                        {{ __('Ya') }}
                                    </label>
                                </div>
                                <div class="form-group mx-5">
                                    <input class="form-check-input" type="radio" name="publish" id="publish_false"
                                        value="0">
                                    <label class="form-check-label" for="publish_false">
                                        {{ __('Tidak') }}
                                        <span class="small text-muted">({{ __('Simpan di draft') }})</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="col-10"></div>
                        <div class="col-2 fill">
                            <button class="btn btn-primary" style="width: 100%;"
                                type="submit">{{ __('Simpan') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
