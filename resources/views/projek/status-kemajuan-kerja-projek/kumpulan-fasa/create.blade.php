<div class="modal-body">
    <ul id="err__message" class="text-danger"></ul>
    <div class="row mb-1">
        <div class="col-6">
            <label for="nama_aktiviti" class="col-form-label">Nama Aktiviti</label>
        </div>
        <div class="col-6">
            <input type="text" class="form-control nama_aktiviti" value="" id="nama_aktiviti" name="nama_aktiviti">
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
            <input type="date" class="form-control tarikh_mula_rancang" id="tarikh_mula_rancang" name="tarikh_mula_rancang">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="tarikh_tamat_rancang" class="col-form-label">Tarikh Tamat Rancang</label>
        </div>
        <div class="col-6">
            <input type="date" class="form-control tarikh_tamat_rancang" id="tarikh_tamat_rancang" name="tarikh_tamat_rancang">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="peratus_rancang" class="col-form-label">Peratus Rancang</label>
        </div>
        <div class="col-3">
            <input type="number" class="form-control peratus_rancang" min="0" max="100" id="peratus_rancang" name="peratus_rancang">
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
            <input type="date" class="form-control tarikh_mula_sebenar" id="tarikh_mula_sebenar" name="tarikh_mula_sebenar">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="tarikh_tamat_sebenar" class="col-form-label">Tarikh Tamat Sebenar</label>
        </div>
        <div class="col-6">
            <input type="date" class="form-control tarikh_tamat_sebenar" id="tarikh_tamat_sebenar" name="tarikh_tamat_sebenar">
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-6">
            <label for="peratus_sebenar" class="col-form-label">Peratus Sebenar</label>
        </div>
        <div class="col-3">
            <input type="number" class="form-control peratus_sebenar" min="0" max="100" id="peratus_sebenar" name="peratus_sebenar">
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
            <input type="text" list="statusComboBox" class="form-control status" id="status" name="status"/>
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
            <input type="text" class="form-control catatan" min="0" max="100" id="catatan" name="catatan">
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
    <button type="button" onClick="storeKumpulanFasa({{ $fasan->id }})" class="btn btn-primary">Simpan</button>
</div>