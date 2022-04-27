<div class="modal-body">
    <ul id="err__message" class="text-danger"></ul>
    <div class="row mb-1">
        <div class="col-4">
            <label for="" class="col-form-label">Nama Kumpulan Fasa</label>
        </div>
        <div class="col-8">
            <input type="text" class="form-control nama_fasa_projek" value="{{ $fasa->fasa_projek }}" id="nama_fasa_projek" name="nama_fasa_projek">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button onClick="destroy({{ $fasa->id }})" type="button" class="btn btn-outline-danger m-0 ms-auto" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
      </svg></button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button type="button" onClick="update({{ $fasa->id }})" class="btn btn-primary">Simpan</button>
</div>