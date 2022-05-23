@extends('base')

@section('content')

<div class="shadow card mt-3"
    style="background-image: url({{url('img/corner-2.png')}}); background-position: right top; background-repeat: no-repeat; background-size: 100% 100%;">
    <div class="card-header">
        <h3>Edit {{__('Projek')}}</h3>
    </div>



    <form action="/projek/{{ $project->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="tajuk_projek" class="form-label">{{__('Tajuk Projek')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <input type="text" id="tajuk_projek" name="tajuk_projek" class="form-control" value="{{ $project->tajuk_projek }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="pemilik_projek" class="form-label">{{__('Pemilik Projek')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <input type="text" id="pemilik_projek" name="pemilik_projek" class="form-control" value="{{ $project->pemilik_projek }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="pengurus_projek" class="form-label">{{__('Pengurus Projek')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <input type="text" id="pengurus_projek" name="pengurus_projek" class="form-control" value="{{ $project->pengurus_projek }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="rujukan_kontrak" class="form-label">{{__('Rujukan Kontrak')}}</label>
                    <i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                        title="Surat Setuju Terima format .pdf sahaja">
                    </i>
                </div>
                <div class="col-md-8 col-12">
                    <input type="file" id="rujukan_kontrak" name="rujukan_kontrak" class="form-control" accept="application/pdf">
                    <small class="mx-2">Current File: <a href="/documents/rujukan/{{ $project->rujukan_kontrak }}">{{ $project->rujukan_kontrak }}</a></small>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="nama_pembekal_dilantik" class="form-label">{{__('Nama Pembekal Dilantik')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <input type="text" list="namaPembekal" name="nama_pembekal_dilantik" class="form-control" value="{{ $project->vendor->nama_pembekal_dilantik }}"/>
                    <datalist id="namaPembekal">
                        @foreach ($vendor as $vendor)
                        <option value="{{ $vendor->nama_pembekal_dilantik }}">
                            @endforeach
                    </datalist>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="" class="form-label">{{__('Kos Kontrak')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <div class="row mb-3">
                        <div class="col-md-4 col-12">
                            <label for="kos_kontrak_tidak_termasuk_caj_perkhidmatan" class="form-label">{{__('Tidak termasuk caj perkhidmatan')}} (RM)</label>
                        </div>
                        <div class="col-md-4 col-12">
                            <input type="text" class="form-control" name="kos_kontrak_tidak_termasuk_caj_perkhidmatan" id="kos_kontrak_tidak_termasuk_caj_perkhidmatan" value="{{ $project->kos_kontrak_tidak_termasuk_caj_perkhidmatan }}" step=".01">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <label for="kos_kontrak_termasuk_caj_perkhidmatan" class="form-label">{{__('Termasuk caj perkhidmatan')}} (RM)</label>
                        </div>
                        <div class="col-md-4 col-12">
                            <input type="text" class="form-control" name="kos_kontrak_termasuk_caj_perkhidmatan" id="kos_kontrak_termasuk_caj_perkhidmatan" value="{{ $project->kos_kontrak_termasuk_caj_perkhidmatan }}" step=".01">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="bon_pelaksanaan_projek" class="form-label">{{__('Bon Pelaksanaan Projek')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <input type="text" class="form-control" name="bon_pelaksanaan_projek" id="bon_pelaksanaan_projek" value="{{ $project->bon_pelaksanaan_projek }}" step=".01">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="tempoh_sah_bon" class="form-label">{{__('Tempoh Sah Bon')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <input type="date" class="form-control" name="tempoh_sah_bon" id="tempoh_sah_bon" value="{{ $project->tempoh_sah_bon }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="" class="form-label">{{__('Tempoh Kontrak')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <div class="row">
                        <div class="col-6">
                            <label for="tempoh_mula_kontrak">{{__('Tarikh Mula')}}</label>
                            <input type="date" name="tempoh_mula_kontrak" id="tempoh_mula_kontrak" class="form-control mt-2" value="{{ $project->tempoh_mula_kontrak }}">
                        </div>
                        <div class="col-6">
                            <label for="tempoh_tamat_kontrak">{{__('Tarikh Tamat')}}</label>
                            <input type="date" name="tempoh_tamat_kontrak" id="tempoh_tamat_kontrak" class="form-control mt-2" value="{{ $project->tempoh_tamat_kontrak }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                    <label for="" class="form-label">{{__('Skop Projek')}}</label>
                </div>
                <div class="col-md-8 col-12">
                    <div class="form-label">
                        <input class="form-check-input" type="radio" name="skop_projek" id="Pembekalan"
                            value="pembekalan" 
                            @if ( $project->skop_projek === "pembekalan" )
                                checked 
                            @endif>
                        <label class="form-check-label" for="Pembekalan">
                            {{__('Pembekalan')}}
                        </label>
                    </div>
                    <div class="form-label">
                        <input class="form-check-input" type="radio" name="skop_projek" id="perkhidmatan"
                            value="perkhidmatan"
                            @if ( $project->skop_projek === "perkhidmatan" )
                            checked 
                            @endif>
                        <label class="form-check-label" for="perkhidmatan">
                            {{__('Perkhidmatan')}}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-4 col-12">
                  <label for="publish" class="form-label">{{__('Terbitkan')}}</label>
                </div>
                <div class="col-md-8 col-12">
                  <div class="d-flex align-items-center">
                    <div class="form-group">
                      <input class="form-check-input" type="radio" name="publish" id="publish_true" value="1"
                      @if ( $project->publish === 1 )
                      checked 
                      @endif>
                      <label class="form-check-label" for="publish_true">
                        {{__('Ya')}}
                      </label>
                    </div>
                    <div class="form-group mx-5">
                      <input class="form-check-input" type="radio" name="publish" id="publish_false" value="0"
                      @if ( $project->publish === 0 )
                      checked 
                      @endif>
                      <label class="form-check-label" for="publish_false">
                        {{__('Tidak')}} 
                        <span class="small text-muted">({{__('Simpan di draft')}})</span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-8 col-12"></div>
                <div class="col-2 fill">
                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary" style="width: 100%;"
                        type="button">{{__('Kembali')}}</a>
                </div>
                <div class="col-2 fill">
                    <button class="btn btn-primary" style="width: 100%;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">{{__('Submit')}}</button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('Anda Pasti?')}}</h5>
                    </div>
                    <div class="modal-body">
                        {{__('Sebarang perubahan tidak boleh dikembalikan.')}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Tutup')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Teruskan Simpan')}}</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

@endsection