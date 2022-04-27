@extends('base2')

@section('content')

<style>
    /* The snackbar - position it at the bottom and in the middle of the screen */
    #snackbar {
        visibility: hidden;
        /* Hidden by default. Visible on click */
        min-width: 250px;
        /* Set a default minimum width */
        margin-left: -125px;
        /* Divide value of min-width by 2 */
        background-color: #333;
        /* Black background color */
        color: #fff;
        /* White text color */
        text-align: center;
        /* Centered text */
        border-radius: 2px;
        /* Rounded borders */
        padding: 16px;
        /* Padding */
        position: fixed;
        /* Sit on top of the screen */
        z-index: 9999999999;
        /* Add a z-index if needed */
        left: 50%;
        /* Center the snackbar */
        top: 30px;
        /* 30px from the bottom */
    }

    /* Show the snackbar when clicking on a button (class added with JavaScript) */
    #snackbar.show {
        visibility: visible;
        /* Show the snackbar */
        /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    /* Animations to fade the snackbar in and out */
    @-webkit-keyframes fadein {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 30px;
            opacity: 1;
        }
    }

    @keyframes fadein {
        from {
            top: 0;
            opacity: 0;
        }

        to {
            top: 30px;
            opacity: 1;
        }
    }

    @-webkit-keyframes fadeout {
        from {
            top: 30px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }

    @keyframes fadeout {
        from {
            top: 30px;
            opacity: 1;
        }

        to {
            top: 0;
            opacity: 0;
        }
    }
</style>

<div class="shadow card mb-3">
    <div class="container m-0 p-0"
        style="background-image: url({{url('img/corner-3.png')}}); background-position: right top; background-repeat: no-repeat; background-size: 100% 100%;">
        <div class="card-body d-flex align-content-end flex-wrap align-items-center" style="height: 150px;">
            <span class="p-3"></span>
            <a href="/projek/{{$project->id}}" class="text-decoration-none text-dark"><h1 style="text-transform: uppercase;">{{ $project->tajuk_projek }}</h1></a>
            <span class="m-3">Status Kewangan Projek</span>
        </div>
    </div>
</div>

<!-- Flexbox container for aligning the toasts -->
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center">
    <div class="toast border" role="alert" aria-live="assertive" aria-atomic="true"
        style="position:fixed; z-index: 1;">
        <div class="toast-header">
            <strong class="me-auto title__message"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body border">
            <ul id="err__message" class="text-danger"></ul>
            <div id="success__message"></div>
        </div>
    </div>
</div>

<div id="snackbar"></div>

<div class="shadow card mb-3">
    <div class="card-body">
        <div class="container">
            <button class="btn btn-primary btn_add" onClick="create()">{{__('Tambah Baru')}} +</button>
        </div>
    </div>
    <div class="card-body">
        <div class="container tbl_user_data" style="overflow-x:scroll;">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th colspan="6">Tuntutan</th>
                        <th colspan="3">Bayaran</th>
                        <th style="width: 100px;" rowspan="2">Action</th>
                    </tr>
                    <tr>
                        <th style="width: 60px;">Tahun</th>
                        <th style="width: 60px;">Bulan</th>
                        <th style="width: 120px;">Nilai Kontrak <br>(Tanpa SST)</th>
                        <th style="width: 120px;">Jadual Tuntutan</th>
                        <th style="width: 120px;">Telah Dituntut</th>
                        <th style="width: 120px;">Belum Dituntut</th>
                        <th style="width: 120px;">Telah Dibayar</th>
                        <th style="width: 120px;">Belum Dibayar</th>
                        <th style="width: 160px;">Tarikh</th>
                    </tr>
                </thead>

                <tbody id="read">
                    <tr>
                        <th colspan="100%">
                            Loading...
                        </th>
                    </tr>
                </tbody>

                <tfoot class="table-dark">
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Nilai Kontrak<br>(Tanpa SST)</th>
                        <th>Jadual Tuntutan</th>
                        <th>Telah Dituntut</th>
                        <th>Belum Dituntut</th>
                        <th>Telah Dibayar</th>
                        <th>Belum Dibayar</th>
                        <th>Tarikh</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th rowspan=2></th>
                        <th colspan=2>
                            <div style="float:left;">Jumlah RM&nbsp;</div>
                            <div class="row_jumlah_nilai_kontrak"></div>
                        </th>
                        <th>
                            <div style="float:left;">RM&nbsp;</div>
                            <div class="row_jumlah_jadual_tuntutan"></div>
                        </th>
                        <th>
                            <div style="float:left;">RM&nbsp;</div>
                            <div class="row_jumlah_telah_tuntutan"></div>
                        </th>
                        <th>
                            <div style="float:left;">RM&nbsp;</div>
                            <div class="row_jumlah_belum_tuntutan"></div>
                        </th>
                        <th>
                            <div style="float:left;">RM&nbsp;</div>
                            <div class="row_jumlah_telah_dibayar">
                        </th>
                        <th>
                            <div style="float:left;">RM&nbsp;</div>
                            <div class="row_jumlah_belum_dibayar">
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th class="d-none"></th>
                        <th colspan=2>%</th>
                        <th>
                            <div class="row_percent_jadual_tuntutan" style="float:left;">wqeqwe</div>
                            <div>%</div>
                        </th>
                        <th>%</th>
                        <th>%</th>
                        <th>%</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</div>

@if (Route::has('login'))
@auth
@if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
    <script>
        $(document).ready(function($) {
            read();
        });

        function read() {
            $.get("/projek/{{$project->id}}/status-kemajuan-kewangan-projek/read", {}, function(data, status) {
                $("#read").html(data);
                number2Decimal();
                hideCurrency();
                kiraTotalFooter();
                hideHeaderCell();
            });

        }

        $(document).on('click', '.btn_cancel', function(event) {
            event.preventDefault();
            var tbl_row = $(this).closest('tr');
            var row_id = tbl_row.attr('row_id');

            tbl_row.find('.btn_save').hide();
            tbl_row.find('.btn_cancel').hide();
            $('.btn_edit').show();
            $('.btn_delete').show();

            $.get("/projek/{{$project->id}}/status-kemajuan-kewangan-projek/"+row_id+"/detail", {}, function(data, status) {
                tbl_row.html(data);
                hideCurrency();
                kiraTotalFooter();
                hideHeaderCell();
                number2DecimalRow(tbl_row);
            });
        });

        $(document).on('click', '.btn_edit', function(event) {
            event.preventDefault();
            var tbl_row = $(this).closest('tr');
            var row_id = tbl_row.attr('row_id');

            tbl_row.find('.btn_save').show();
            tbl_row.find('.btn_cancel').show();
            $('.btn_edit').hide();
            $('.btn_delete').hide();


            $(document).find('tbody tr td:first-child')
            .each(function(){
                $(this).removeClass('d-none')
                .attr('rowspan','1');
            });

            $.get("/projek/{{$project->id}}/status-kemajuan-kewangan-projek/"+row_id+"/edit", {}, function(data, status) {
                tbl_row.html(data);
            });
        });

        function create() {
            $('.btn_edit').hide();
            $('.btn_delete').hide();
            $.get("/projek/{{$project->id}}/status-kemajuan-kewangan-projek/create", {}, function(data, status) {
                $('tbody').append(data);
            });
        }

        function cancelCreate() {
            read();
        }

        function store() {
            var data = {
                'project_id': {!! $project->id !!},
                'tahun': $('#tahun').val(),
                'bulan' : $('#bulan').val(),
                'nilai_kontrak' : $('#nilai_kontrak').val(),
                'jadual_tuntutan' : $('#jadual_tuntutan').val(),
                'telah_dituntut' : $('#telah_dituntut').val(),
                'belum_dituntut' : $('#belum_dituntut').val(),
                'telah_dibayar' : $('#telah_dibayar').val(),
                'belum_dibayar' : $('#belum_dibayar').val(),
                'tarikh' : $('#tarikh').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "get",
                url: "/projek/{{$project->id}}/status-kemajuan-kewangan-projek/store",
                data: data,
                datatype: "json",
                success: function (response) {
                    $('#err__message').html('');
                    $('#success__message').html('');
                    if(response.status==400) {
                        $('.title__message').text(response.title_message);
                        $('.toast').removeClass('border-success');
                        $('.toast').addClass('border-danger');
                        $('.toast-header').addClass('text-danger');
                        $.each(response.error, function(key, err_values) {
                            $('#err__message').append('<li>'+err_values+'</li>');
                        });
                        $('.toast').toast('show');
                    }
                    else {
                        // $('.title__message').text(response.title_message);
                        // $('.toast').addClass('border-success');
                        // $('.toast').removeClass('border-danger');
                        // $('.toast-header').removeClass('text-danger');
                        // $('#success__message').text(response.message);
                        // $('.toast').toast('show');
                        // read();

                        $('#snackbar').html(response.message);
                        read();
                        mySnackbar();
                    }
                },
            });
        }

        function update(id) {
            var data = {
                'project_id': {!! $project->id !!},
                'id': id,
                'tahun': $('#tahun').val(),
                'bulan' : $('#bulan').val(),
                'nilai_kontrak' : $('#nilai_kontrak').val(),
                'jadual_tuntutan' : $('#jadual_tuntutan').val(),
                'telah_dituntut' : $('#telah_dituntut').val(),
                'belum_dituntut' : $('#belum_dituntut').val(),
                'telah_dibayar' : $('#telah_dibayar').val(),
                'belum_dibayar' : $('#belum_dibayar').val(),
                'tarikh' : $('#tarikh').val(),
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "get",
                url: "/projek/{{$project->id}}/status-kemajuan-kewangan-projek/"+id+"/update",
                data: data,
                datatype: "json",
                success: function (response) {
                    $('#err__message').html('');
                    $('#success__message').html('');
                    if(response.status==400) {
                        $('.title__message').text(response.title_message);
                        $('.toast').removeClass('border-success');
                        $('.toast').addClass('border-danger');
                        $('.toast-header').addClass('text-danger');
                        $.each(response.error, function(key, err_values) {
                            $('#err__message').append('<li>'+err_values+'</li>');
                        });
                        $('.toast').toast('show');
                    }
                    else {
                        // $('.title__message').text(response.title_message);
                        // $('.toast').addClass('border-success');
                        // $('.toast').removeClass('border-danger');
                        // $('.toast-header').removeClass('text-danger');
                        // $('#success__message').text(response.message);
                        // $('.toast').toast('show');
                        // read();

                        $('#snackbar').html(response.message);
                        read();
                        mySnackbar();
                    }
                },
            });
        }

        function destroy(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "get",
                url: "/projek/{{$project->id}}/status-kemajuan-kewangan-projek/"+id+"/delete",
                success: function (response) {
                    $('#err__message').html('');
                    $('#success__message').html('');
                    if(response.status==400) {
                        $('.title__message').text(response.title_message);
                        $('.toast').removeClass('border-success');
                        $('.toast').addClass('border-danger');
                        $('.toast-header').addClass('text-danger');
                        $.each(response.error, function(key, err_values) {
                            $('#err__message').append('<li>'+err_values+'</li>');
                        });
                        $('.toast').toast('show');
                    }
                    else {
                        // $('.title__message').text(response.title_message);
                        // $('.toast').removeClass('border-success');
                        // $('.toast').addClass('border-danger');
                        // $('.toast-header').addClass('text-danger');
                        // $('#success__message').text(response.message);
                        // $('.toast').toast('show');
                        // read();

                        $('#snackbar').html(response.message);
                        read();
                        mySnackbar();
                    }
                },
            });
        }

        function hideHeaderCell() {
            table = document.querySelector('tbody');

            let headerCell = null;

            for (let row of table.rows) {
                firstCell = row.cells[0];

                if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
                    headerCell = firstCell;
                } else {
                    headerCell.rowSpan++;
                    firstCell.setAttribute('class','d-none');
                }
            }
        }

        function hideCurrency() {
            $('.currency').each(function() {
                if ($(this).siblings().text() == ''){
                    $(this).hide();
                }
            });
        }

        function kiraTotalFooter () {
            nilaiKontrak = 0;
            $(document).find('.row_nilai_kontrak')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    nilaiKontrak = nilaiKontrak+text
                };
            });
            $(document).find('.row_jumlah_nilai_kontrak').html(
                parseFloat(nilaiKontrak).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jadualTuntutan = 0;
            $(document).find('.row_jadual_tuntutan')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jadualTuntutan = jadualTuntutan+text
                };
            });
            $(document).find('.row_jumlah_jadual_tuntutan').html(
                parseFloat(jadualTuntutan).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );
            $(document).find('.row_percent_jadual_tuntutan').html(
                parseFloat((jadualTuntutan/nilaiKontrak)*100).toFixed(1)
            );

            jumlah = 0;
            $(document).find('.row_telah_tuntutan')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_telah_tuntutan').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jumlah = 0;
            $(document).find('.row_belum_tuntutan')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_belum_tuntutan').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jumlah = 0;
            $(document).find('.row_telah_dibayar')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_telah_dibayar').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jumlah = 0;
            $(document).find('.row_belum_dibayar')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_belum_dibayar').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );
        }

        function number2Decimal() {
                $('.row_number').each(function(){
                if($(this).text() != ''){
                    text = $(this).html();
                    $(this).html(
                    parseFloat(text).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
                    );
                }
            });
        }

        function number2DecimalRow(row) {
                $(row).find('.row_number').each(function(){
                if($(this).text() != ''){
                    text = $(this).html();
                    $(this).html(
                    parseFloat(text).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
                    );
                }
            });
        }
    </script>
@else

    <script>
        $(document).ready(function($) {
            read();
        });

        function read() {
            $.get("/projek/{{$project->id}}/status-kemajuan-kewangan-projek/read", {}, function(data, status) {
                $("#read").html(data);
                number2Decimal();
                hideCurrency();
                kiraTotalFooter();
                hideHeaderCell();
                $('.btn_edit').hide();
                $('.btn_delete').hide();

            });

        }

        function hideHeaderCell() {
            table = document.querySelector('tbody');

            let headerCell = null;

            for (let row of table.rows) {
                firstCell = row.cells[0];

                if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
                    headerCell = firstCell;
                } else {
                    headerCell.rowSpan++;
                    firstCell.setAttribute('class','d-none');
                }
            }
        }

        function hideCurrency() {
            $('.currency').each(function() {
                if ($(this).siblings().text() == ''){
                    $(this).hide();
                }
            });
        }

        function kiraTotalFooter () {
            nilaiKontrak = 0;
            $(document).find('.row_nilai_kontrak')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    nilaiKontrak = nilaiKontrak+text
                };
            });
            $(document).find('.row_jumlah_nilai_kontrak').html(
                parseFloat(nilaiKontrak).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jadualTuntutan = 0;
            $(document).find('.row_jadual_tuntutan')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jadualTuntutan = jadualTuntutan+text
                };
            });
            $(document).find('.row_jumlah_jadual_tuntutan').html(
                parseFloat(jadualTuntutan).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );
            $(document).find('.row_percent_jadual_tuntutan').html(
                parseFloat((jadualTuntutan/nilaiKontrak)*100).toFixed(1)
            );

            jumlah = 0;
            $(document).find('.row_telah_tuntutan')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_telah_tuntutan').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jumlah = 0;
            $(document).find('.row_belum_tuntutan')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_belum_tuntutan').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jumlah = 0;
            $(document).find('.row_telah_dibayar')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_telah_dibayar').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );

            jumlah = 0;
            $(document).find('.row_belum_dibayar')
            .each(function(){
                text = $(this).html();
                text = text.replaceAll(',','');
                text = parseFloat(text);
                if ($.isNumeric(text)){
                    jumlah = jumlah+text
                };
            });
            $(document).find('.row_jumlah_belum_dibayar').html(
                parseFloat(jumlah).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
            );
        }

        function number2Decimal() {
                $('.row_number').each(function(){
                if($(this).text() != ''){
                    text = $(this).html();
                    $(this).html(
                    parseFloat(text).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
                    );
                }
            });
        }

        function number2DecimalRow(row) {
                $(row).find('.row_number').each(function(){
                if($(this).text() != ''){
                    text = $(this).html();
                    $(this).html(
                    parseFloat(text).toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2})
                    );
                }
            });
        }
    </script>


@endif
@endauth
@endif

<script>
    function mySnackbar() {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>

@endsection
