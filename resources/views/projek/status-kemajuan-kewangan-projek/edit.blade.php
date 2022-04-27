<td>
    <input class="edit__input form-control input__tahun" type="text" value="{{ $kewangan->tahun }}" maxlength="4"
        size="4" id="tahun" name="tahun">
</td>
<td>
    <select name="bulan" id="bulan" class="edit__input form-control input__bulan">
        <option value="Jan" {{ $kewangan->bulan === "Jan" ? 'selected' : '' }}>Jan</option>
        <option value="Feb" {{ $kewangan->bulan === "Feb" ? 'selected' : '' }}>Feb</option>
        <option value="Mac" {{ $kewangan->bulan === "Mac" ? 'selected' : '' }}>Mac</option>
        <option value="Apr" {{ $kewangan->bulan === "Apr" ? 'selected' : '' }}>Apr</option>
        <option value="Mei" {{ $kewangan->bulan === "Mei" ? 'selected' : '' }}>Mei</option>
        <option value="Jun" {{ $kewangan->bulan === "Jun" ? 'selected' : '' }}>Jun</option>
        <option value="Jul" {{ $kewangan->bulan === "Jul" ? 'selected' : '' }}>Jul</option>
        <option value="Ogos" {{ $kewangan->bulan === "Ogos" ? 'selected' : '' }}>Ogos</option>
        <option value="Sep" {{ $kewangan->bulan === "Sep" ? 'selected' : '' }}>Sep</option>
        <option value="Okt" {{ $kewangan->bulan === "Okt" ? 'selected' : '' }}>Okt</option>
        <option value="Nov" {{ $kewangan->bulan === "Nov" ? 'selected' : '' }}>Nov</option>
        <option value="Dec" {{ $kewangan->bulan === "Dec" ? 'selected' : '' }}>Dec</option>
    </select>
</td>
<td>
    <div class="d-flex align-items-center currency">RM&nbsp;
        <input class="edit__input form-control" type="number" value="{{ $kewangan->nilai_kontrak }}" maxlength="12"
            size="12" id="nilai_kontrak" name="nilai_kontrak">
    </div>
</td>
<td>
    <div class="d-flex align-items-center currency">RM&nbsp;
        <input class="edit__input form-control" type="number" value="{{ $kewangan->jadual_tuntutan }}" maxlength="12"
            size="12" id="jadual_tuntutan" name="jadual_tuntutan">
    </div>
</td>
<td>
    <div class="d-flex align-items-center currency">RM&nbsp;
        <input class="edit__input form-control" type="number" value="{{ $kewangan->telah_dituntut }}" maxlength="12"
            size="12" id="telah_dituntut" name="telah_dituntut">
    </div>
</td>
<td>
    <div class="d-flex align-items-center currency">RM&nbsp;
        <input class="edit__input form-control" type="number" value="{{ $kewangan->belum_dituntut }}" maxlength="12"
            size="12" id="belum_dituntut" name="belum_dituntut">
    </div>
</td>
<td>
    <div class="d-flex align-items-center currency">RM&nbsp;
        <input class="edit__input form-control" type="number" value="{{ $kewangan->telah_dibayar }}" maxlength="12"
            size="12" id="telah_dibayar" name="telah_dibayar">
    </div>
</td>
<td>
    <div class="d-flex align-items-center currency">RM&nbsp;
        <input class="edit__input form-control" type="number" value="{{ $kewangan->belum_dibayar }}" maxlength="12"
            size="12" id="belum_dibayar" name="belum_dibayar">
    </div>
</td>
<td>
    <input class="edit__input form-control date" style="width: 140px;" type="date" value="{{ $kewangan->tarikh }}"
        maxlength="12" size="12" id="tarikh" name="tarikh">
</td>
<td>
    <div class="d-flex mx-1">
        <button class="btn_edit btn btn-outline-primary" style="font-size: 10px; display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
              </svg>
        </button>
        <button class="btn_delete btn btn-outline-danger ms-1" style="font-size: 5px; display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
              </svg>
        </button>
        <button class="btn_cancel btn btn-outline-secondary" style="font-size: 12px;">Cancel</button>
        <button class="btn_save btn btn-outline-primary ms-1" style="font-size: 5px;" onClick="update({{ $kewangan->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-save"
            viewBox="0 0 16 16">
            <path
                d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
        </svg>
        </button>
    </div>
</td>

