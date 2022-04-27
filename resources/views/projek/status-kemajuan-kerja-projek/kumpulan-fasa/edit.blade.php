<div class="modal-body">
    <ul id="err__message" class="text-danger"></ul>
    <div class="row mb-1">
        <div class="col-6">
            <label for="nama_aktiviti" class="col-form-label">Nama Aktiviti</label>
        </div>
        <div class="col-6">
            <input type="text" class="form-control nama_aktiviti" value="{{ $kumpulan_fasan->tajuk_kumpulan }}" id="nama_aktiviti" name="nama_aktiviti">
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center mb-1">
        <h6>
            Tarikh Rancang
        </h6>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="tarikh_mula_rancang" class="col-form-label">Tarikh Mula Rancang</label>
        </div>
        <div class="col-6">
            <input type="date" class="form-control tarikh_mula_rancang" value="{{ $kumpulan_fasan->tarikh_mula_rancang }}" id="tarikh_mula_rancang" name="tarikh_mula_rancang">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="tarikh_tamat_rancang" class="col-form-label">Tarikh Tamat Rancang</label>
        </div>
        <div class="col-6">
            <input type="date" class="form-control tarikh_tamat_rancang" value="{{ $kumpulan_fasan->tarikh_tamat_rancang }}" id="tarikh_tamat_rancang" name="tarikh_tamat_rancang">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="peratus_rancang" class="col-form-label">Peratus Rancang</label>
        </div>
        <div class="col-3">
            <input type="number" class="form-control peratus_rancang" value="{{ $kumpulan_fasan->peratus_rancang }}" min="0" max="100" id="peratus_rancang" name="peratus_rancang">
        </div>
        <div class="col-3">
            <label for="peratus_rancang" class="col-form-label">%</label>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-center mb-1">
        <h6>
            Tarikh Sebenar
        </h6>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="tarikh_mula_sebenar" class="col-form-label">Tarikh Mula Sebenar</label>
        </div>
        <div class="col-6">
            <input type="date" class="form-control tarikh_mula_sebenar" value="{{ $kumpulan_fasan->tarikh_mula_sebenar }}" id="tarikh_mula_sebenar" name="tarikh_mula_sebenar">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="tarikh_tamat_sebenar" class="col-form-label">Tarikh Tamat Sebenar</label>
        </div>
        <div class="col-6">
            <input type="date" class="form-control tarikh_tamat_sebenar" value="{{ $kumpulan_fasan->tarikh_tamat_sebenar }}" id="tarikh_tamat_sebenar" name="tarikh_tamat_sebenar">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="peratus_sebenar" class="col-form-label">Peratus Sebenar</label>
        </div>
        <div class="col-3">
            <input type="number" class="form-control peratus_sebenar" value="{{ $kumpulan_fasan->peratus_sebenar }}" min="0" max="100" id="peratus_sebenar" name="peratus_sebenar">
        </div>
        <div class="col-3">
            <label for="peratus_sebenar" class="col-form-label">%</label>
        </div>
    </div>
    <hr>
    <div class="row mb-1">
        <div class="col-6">
            <label for="status" class="col-form-label">Status</label>
        </div>
        <div class="col-6">
            <input type="text" list="statusComboBox" value="{{ $kumpulan_fasan->status }}" class="form-control status" id="status" name="status"/>
            <datalist id="statusComboBox">
                <option>Selesai</option>
                <option>Dalam Tindakan</option>
                <option>Belum Mula</option>
            </datalist>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="catatan" class="col-form-label">Catatan</label>
        </div>
        <div class="col-6">
            <input type="text" class="form-control catatan" value="{{ $kumpulan_fasan->catatan }}" min="0" max="100" id="catatan" name="catatan">
        </div>
    </div>

</div>
<div class="modal-footer">
    <button  onClick="destroyKumpulanFasa({{ $fasan->id }},{{ $kumpulan_fasan->id }})" type="button" class="btn btn-outline-danger ms-auto m-0 btn_delete" data-bs-dismiss="modal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill"
            viewBox="0 0 16 16">
            <path
                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
        </svg>
    </button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button type="button" onClick="updateKumpulanFasa({{ $fasan->id }},{{ $kumpulan_fasan->id }})" class="btn btn-primary">Simpan</button>
</div>