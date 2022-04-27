<td>
    <div class="row_data row_year" edit_type="click" col_name="">{{ $kewangan->tahun }}</div>
</td>
<td>
    <div class="row_data row_char" edit_type="click" col_name="">{{ $kewangan->bulan }}</div>
</td>
<td>
    <div style="float:left;" class="currency">RM&nbsp;</div>
    <div class="row_data row_number row_nilai_kontrak" edit_type="click" col_name="">{{ $kewangan->nilai_kontrak }}</div>
</td>
<td>
    <div style="float:left;" class="currency">RM&nbsp;</div>
    <div class="row_data row_number row_jadual_tuntutan" edit_type="click" col_name="">{{ $kewangan->jadual_tuntutan }}</div>
</td>
<td>
    <div style="float:left;" class="currency">RM&nbsp;</div>
    <div class="row_data row_number row_telah_tuntutan" edit_type="click" col_name="">{{ $kewangan->telah_dituntut }}</div>
</td>
<td>
    <div style="float:left;" class="currency">RM&nbsp;</div>
    <div class="row_data row_number row_belum_tuntutan" edit_type="click" col_name="">{{ $kewangan->belum_dituntut }}</div>
</td>
<td>
    <div style="float:left;" class="currency">RM&nbsp;</div>
    <div class="row_data row_number row_telah_dibayar" edit_type="click" col_name="">{{ $kewangan->telah_dibayar }}</div>
</td>
<td>
    <div style="float:left;" class="currency">RM&nbsp;</div>
    <div class="row_data row_number row_belum_dibayar" edit_type="click" col_name="">{{ $kewangan->belum_dibayar }}</div>
</td>
<td>
    <div class="row_data" col_name="">{{ $kewangan->tarikh }}</div>
</td>
<td>
    <div class="d-flex mx-1">
        <button class="btn_edit btn btn-outline-primary" style="font-size: 10px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
        </button>
        <button class="btn_delete btn btn-outline-danger ms-1" style="font-size: 5px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
        </button>
        <button class="btn_cancel btn btn-outline-secondary" style="font-size: 12px; display:none;">Cancel</button>
        <button class="btn_save btn btn-outline-primary ms-1" style="font-size: 5px; display:none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-save"
            viewBox="0 0 16 16">
            <path
                d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
        </svg>
        </button>
    </div>
</td>

