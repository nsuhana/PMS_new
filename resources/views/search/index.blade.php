@extends('base')

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

<!-- The actual snackbar/toast -->
<div id="snackbar"></div>

<div class="row">
    <div class="d-flex flex-column">
        <div class="d-flex align-items-center justify-content-between">
            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="collapse"
                data-bs-target="#filterToggle" aria-controls="filterToggle" aria-expanded="true"
                aria-label="Toggle navigation" href="#filterToggle" id="filterTrigger">
                Filter</button>
            <div class="d-flex align-items-center justify-content-end" style="width: auto;">
                <div style="width: 80px;">Sort By</div>
                <select onchange="read()" id="btn_sorter" name="btn_sorter" class="form-select"
                    style="padding-left: 9px; padding-right: 27px; background-position: right 0.75rem center !important;">
                    <option value="tajuk_projek">Tajuk Projek</option>
                    <option value="nama_pembekal_dilantik">Nama Pembekal</option>
                    <option value="recently_added">Recent</option>
                </select>
            </div>
        </div>
        <div class="collapse" id="filterToggle">
            <div class="m-4">
                <div class="d-flex align-items-center">
                    <div class="ms-2">Status: </div>
                    <select id="status" name="status" class="form-select ms-2"
                        style="padding-left: 9px; padding-right: 27px; background-position: right 0.75rem center !important; width: 100px;">
                        <option value="">Semua</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak aktif">Tidak Aktif</option>
                        <option value="selesai">Selesai</option>
                    </select>
                    <div class="ms-2">Skop Projek: </div>
                    <select id="skop_projek" name="skop_projek" class="form-select ms-2"
                        style="padding-left: 9px; padding-right: 27px; background-position: right 0.75rem center !important; width: 100px;">
                        <option value="">Semua</option>
                        <option value="pembekalan">Pembekalan</option>
                        <option value="perkhidmatan">Perkhidmatan</option>
                    </select>
                    <div class="ms-2">Tahun: </div>
                    <input type="text" class="form-control" style="width: 60px;" placeholder="2xxx.." name="tahun" id="tahun">
                    <button onClick="read()" class="ms-2 btn btn-outline-secondary"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </div>
            </div>
        </div>
    </div>

    <div id="read">
    </div>

</div>

{{-- data-bs-backdrop="static" --}}
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="detail"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function($)
    {
        changeDisplay();
        read();
    });

    function changeDisplay() {
        var x = '{!!$keyword!!}';
        $('#search').val(x);
    }
    
    function read(){
        var item = {
            'filter_projek_status' : $('#status').val() ? $('#status').val() : '',
            'filter_projek_skop' : $('#skop_projek').val() ? $('#skop_projek').val(): '',
            'filter_tahun' : $('#tahun').val() ? $('#tahun').val(): '',
            'sortBy' : $('#btn_sorter').val() ? $('#btn_sorter').val(): '',
            'keyword' : '{!!$keyword!!}',
        };

        $.get("/search/result", item, function(data, status) {
                $("#read").html(data);
            })
    }

    function detail(id) {
        var item = {
            'id' : id? id: '',
        }

        console.log(item);

        $.get("/search/detail", item, function(data, status) {
                $("#detail").html(data);
                 $("#detailModal").modal('show');
                 incrementAnimation();
            })
    }

    function mySnackbar() {
        // Get the snackbar DIV
        var x = document.getElementById("snackbar");

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }

    function pagination(url) {
        $.get(url, {}, function(data, status) {
                $("#read").html(data);
            })
    }

    function incrementAnimation(){
            $('.count').each(function () {
            $(this).prop('counter', 0).animate({
                counter: $(this).text()
            }, {
                duration: 1000,
                easing: 'easeOutExpo',
                step: function (step) {
                    $(this).text('' + step.format());
                }
            });
        });
    }
    
</script>

<script>
    Number.prototype.format = function(n) {
        // var r = new RegExp('\\d(?=(\\d{3})+' + (n > 0 ? '\\.' : '$') + ')', 'g');
        // return this.toFixed(Math.max(0, Math.floor(n))).replace(r, '$&,');
        return this.toLocaleString('en-US', {minimumFractionDigits:2,maximumFractionDigits:2});
    };


</script>

@endsection

<style>
    @keyframes growProgressBar {

        0%,
        33% {
            --pgPercentage: 0;
        }

        100% {
            --pgPercentage: var(--value);
        }
    }

    @property --pgPercentage {
        syntax: '<number>';
        inherits: false;
        initial-value: 0;
    }

    div[role="progressbar"] {
        --size: 12rem;
        /* --fg: #369; */
        --fg: #333;
        --bg: rgb(172, 172, 172);
        /* --bg: #def; */
        --pgPercentage: var(--value);
        animation: growProgressBar 1s 1 forwards;
        width: var(--size);
        height: var(--size);
        border-radius: 50%;
        display: grid;
        place-items: center;
        background:
            radial-gradient(closest-side, white 80%, transparent 0 99.9%, white 0),
            conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0);
        font-family: Helvetica, Arial, sans-serif;
        font-size: calc(var(--size) / 5);
        color: var(--fg);
    }

    div[role="progressbar"]::before {
        counter-reset: percentage var(--value);
        content: counter(percentage) '%';
    }
</style>