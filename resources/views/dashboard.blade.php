@extends('base')
@section('stylesheet')
    <link rel="stylesheet" href="{{ url('circle-percentage.css') }}">
@endsection

@section('content')

    <script>
        FusionCharts.ready(function() {
            var revenueChart = new FusionCharts({
                type: 'doughnut2d',
                renderAt: 'chart-container',
                width: '800',
                height: '450',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "{{ __('Jumlah Projek Berdasarkan Status dan Skop') }}",
                        // "subCaption": "Last year",
                        "numberPrefix": "",
                        "bgColor": "#ffffff",
                        "startingAngle": "310",
                        "showLegend": "1",
                        "defaultCenterLabel": "{{ $jumlah_pembekalan }}",
                        "centerLabel": "{{ __('Jumlah') }} $label: $value",
                        "centerLabelBold": "1",
                        "showTooltip": "0",
                        "decimals": "0",
                        "theme": "fusion"
                    },
                    "data": [{
                            "label": "{{ __('Ikut Jadual') }}",
                            "value": "{{ $pembekalan_ikut_jadual }}"
                        },
                        {
                            "label": "{{ __('Dalam Perlaksanaan') }}",
                            "value": "{{ $pembekalan_dalam_perlaksanaan }}"
                        },
                        {
                            "label": "{{ __('Projek Lewat') }}",
                            "value": "{{ $pembekalan_projek_lewat }}"
                        },
                        {
                            "label": "{{ __('Projek Sakit') }}",
                            "value": "{{ $pembekalan_projek_sakit }}"
                        }
                    ]
                }
            }).render();
        });
    </script>

    <div class="d-flex flex-column" style="width: 100%">

        @if (Auth::check())
            <div class="card card-body text-capitalize">{{ __('Selamat datang') }}, {{ Auth::user()->name }}</div>
        @endif

        @if ($random_projek)
            {{-- 1st row --}}
            <div class="d-flex align-items-center justify-content-between mb-2" style="height: 200px;">
                <div class="w-100 d-flex flex-column align-items-center justify-content-center text-center">
                    <span>{{ __('Jumlah Projek Didaftar') }}</span>
                    <h2 class="count2">{{ $jumlah_projek }}</h2>
                </div>
                <div class="vr my-3"></div>
                <div class="w-100 d-flex flex-column align-items-center justify-content-center text-center">
                    <span>{{ __('Jumlah Projek Selesai') }}</span>
                    <h2 class="count2">{{ $jumlah_projek_selesai }}</h2>
                </div>
            </div>
            {{-- 2nd row --}}
            <div class="d-flex flex-md-row flex-column align-items-center justify-content-between mb-4">
                <div class="card p-5 mx-2 mb-2 mb-md-0" style="width: 100%; height: 150px;">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center">
                            <span>{{ __('Pembekal Dilantik') }}</span>
                            <h4 class="count2">{{ $jumlah_pembekal }}</h4>
                        </div>
                    </div>
                </div>
                <div class="card p-5 mx-2 mb-2 mb-md-0" style="width: 100%; height: 150px;">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center">
                            <span>{{ __('Jumlah Telah Dibayar') }}</span>
                            <h4><span class="mx-1">RM</span><span
                                    class="count">{{ $jumlah_telah_dibayar }}</span></h4>
                        </div>
                    </div>
                </div>
                <div class="card p-5 mx-2 mb-2 mb-md-0" style="width: 100%; height: 150px;">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center">
                            <span>{{ __('Nilai Kontrak Semua Projek') }}</span>
                            <h4><span class="mx-1">RM</span><span
                                    class="count">{{ $jumlah_nilai_kontrak }}</span></h4>
                        </div>
                    </div>
                </div>
                <div class="card p-5 mx-2 mb-2 mb-md-0" style="width: 100%; height: 150px;">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center justify-content-center text-center">
                            <span>{{ __('Jumlah Bon Semua Projek') }}</span>
                            <h4><span class="mx-1">RM</span><span
                                    class="count">{{ $jumlah_bon }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 3rd row --}}
            <div class="d-flex flex-md-row flex-column mb-3">
                <div class="card mx-2 mb-2 mb-md-0 d-none d-md-block" style="width: 100%">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="d-flex justify-content-end">
                                <select name="" id="btn__sorter" class="form-select" onChange="read()"
                                    style="width: 150px; padding-left: 9px; padding-right: 27px; background-position: right 0.75rem center !important;">
                                    <option value="pembekalan">{{ __('Pembekalan') }}</option>
                                    <option value="perkhidmatan">{{ __('Perkhidmatan') }}</option>
                                </select>
                            </div>
                            <div id="chart-container"></div>
                        </div>
                    </div>
                </div>
                <div class="card d-none d-md-block" style="width: 500px;">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <p class="m-0">{{ __('Tajuk Projek') }}</p>
                            <h3 class="text-capitalize">{{ $random_projek->tajuk_projek }}</h3>
                            <small>{{ __('Pemilik Projek') }}</small>
                            <h6 class="text-capitalize">{{ $random_projek->pemilik_projek }}</h6>
                            <small>{{ __('Nama Pembekal Dilantik') }}</small>
                            <a href="/vendor/{{ $random_projek->vendor_id }}" class="text-decoration-none text-dark">
                                <h6 class="text-capitalize">{{ $random_projek->vendor->nama_pembekal_dilantik }}</h6>
                            </a>
                            <small>{{ __('Skop') }}</small>
                            <h6 class="text-capitalize">{{ $random_projek->skop_projek }}</h6>
                            <small>{{ __('Status') }}</small>
                            <h6 class="text-capitalize">{{ $random_projek->status }}</h6>
                            <small>{{ __('Deskripsi Projek') }}</small>
                            <h6 class="">{!! $random_projek->description !!}</h6>

                            <div class="d-flex justify-content-center w-100 my-2">
                                @if ($random_projek->editor_comment->isNotEmpty())
                                    <div role="progressbar"
                                        aria-valuenow="{{ $random_projek->editor_comment->last()->peratus_siap }}"
                                        aria-valuemin="0" aria-valuemax="100"
                                        style="--value:{{ $random_projek->editor_comment->last()->peratus_siap }}">
                                    </div>
                                @else
                                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                        style="--value:0"></div>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center w-100">
                                <small>{{ __('Fasa Sekarang') }}</small>
                            </div>
                            <div class="d-flex justify-content-center w-100">
                                @if ($random_projek->editor_comment->isNotEmpty())
                                    <h6 class="text-capitalize">
                                        {{ $random_projek->editor_comment->last()->fasa_sekarang }}
                                    </h6>
                                @else
                                    <h6 class="text-capitalize">Initiation</h6>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="/projek/{{ $random_projek->id }}"
                            class="text-decoration-none small">{{ __('Lanjut') }}</a>
                    </div>
                </div>
            </div>

            {{-- 4th row --}}
            <div class="d-flex align-items-stretch justify-content-between mb-2 flex-column flex-md-row">
                <div class="card mx-2 mb-2 mb-md-0 flex-md-fill d-none d-md-block">
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
                <div class="card mx-2 flex-fill mb-2 mb-md-0 d-none d-md-block">
                    <div class="card-header p-3">{{ __('Projek') }}</div>
                    <div class="card-body pt-0 pb-0">
                        @foreach ($projects as $projek)
                            <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
                                <div class="col-10 ps-card">
                                    <a class="text-decoration-none"
                                        href="/projek/{{ $projek->id }}">{{ $projek->tajuk_projek }}</a>
                                    <br>
                                    <small class="text-muted">{{ $projek->vendor->nama_pembekal_dilantik }}</small>
                                </div>
                                <div class="col-2 pe-card ps-2">
                                    @if ($projek->editor_comment->isNotEmpty())
                                        <div role="progressbar2"
                                            aria-valuenow="{{ $projek->editor_comment->last()->peratus_siap }}"
                                            aria-valuemin="0" aria-valuemax="100"
                                            style="--value:{{ $projek->editor_comment->last()->peratus_siap }}">
                                        </div>
                                    @else
                                        <div role="progressbar2" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                            style="--value:0"></div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        @if (Auth::check() && Auth::user()->isNotNormalUser())
                            <a class="btn btn-sm btn-link d-block w-100 py-2 text-decoration-none"
                                href="/projek">{{ __('Lihat semua projek') }}<svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-chevron-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </a>
                        @else
                            <a class="btn btn-sm btn-link d-block w-100 py-2 text-decoration-none"
                                href="/search/home">{{ __('Cari projek') }}<svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-chevron-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger my-3">
                <span>{{ __('Tiada data untuk dipaparkan.') }}</span>
            </div>
        @endif

    </div>

    <script>
        function read() {
            var item = {
                'option': $('#btn__sorter').val() ? $('#btn__sorter').val() : '',
            };

            if (item.option == "pembekalan") {
                FusionCharts.ready(function() {
                    var revenueChart = new FusionCharts({
                        type: 'doughnut2d',
                        renderAt: 'chart-container',
                        width: '550',
                        height: '450',
                        dataFormat: 'json',
                        dataSource: {
                            "chart": {
                                "caption": "{{ __('Jumlah Projek Berdasarkan Status dan Skop') }}",
                                // "subCaption": "Last year",
                                "numberPrefix": "",
                                "bgColor": "#ffffff",
                                "startingAngle": "310",
                                "showLegend": "1",
                                "defaultCenterLabel": "{{ $jumlah_pembekalan }}",
                                "centerLabel": "{{ __('Jumlah') }} $label: $value",
                                "centerLabelBold": "1",
                                "showTooltip": "0",
                                "decimals": "0",
                                "theme": "fusion"
                            },
                            "data": [{
                                    "label": "{{ __('Ikut Jadual') }}",
                                    "value": "{{ $pembekalan_ikut_jadual }}"
                                },
                                {
                                    "label": "{{ __('Dalam Perlaksanaan') }}",
                                    "value": "{{ $pembekalan_dalam_perlaksanaan }}"
                                },
                                {
                                    "label": "{{ __('Projek Lewat') }}",
                                    "value": "{{ $pembekalan_projek_lewat }}"
                                },
                                {
                                    "label": "{{ __('Projek Sakit') }}",
                                    "value": "{{ $pembekalan_projek_sakit }}"
                                }
                            ]
                        }
                    }).render();
                });
            } else {
                FusionCharts.ready(function() {
                    var revenueChart = new FusionCharts({
                        type: 'doughnut2d',
                        renderAt: 'chart-container',
                        width: '550',
                        height: '450',
                        dataFormat: 'json',
                        dataSource: {
                            "chart": {
                                "caption": "{{ __('Jumlah Projek Berdasarkan Status dan Skop') }}",
                                // "subCaption": "Last year",
                                "numberPrefix": "",
                                "bgColor": "#ffffff",
                                "startingAngle": "310",
                                "showLegend": "1",
                                "defaultCenterLabel": "{{ $jumlah_perkhidmatan }}",
                                "centerLabel": "{{ __('Jumlah') }} $label: $value",
                                "centerLabelBold": "1",
                                "showTooltip": "0",
                                "decimals": "0",
                                "theme": "fusion"
                            },
                            "data": [{
                                    "label": "{{ __('Ikut Jadual') }}",
                                    "value": "{{ $perkhidmatan_ikut_jadual }}"
                                },
                                {
                                    "label": "{{ __('Dalam Perlaksanaan') }}",
                                    "value": "{{ $perkhidmatan_dalam_perlaksanaan }}"
                                },
                                {
                                    "label": "{{ __('Projek Lewat') }}",
                                    "value": "{{ $perkhidmatan_projek_lewat }}"
                                },
                                {
                                    "label": "{{ __('Projek Sakit') }}",
                                    "value": "{{ $perkhidmatan_projek_sakit }}"
                                }
                            ]
                        }
                    }).render();
                });
            }
        }
    </script>

    <script>
        var options = {
            series: [{
                name: 'Pembekalan',
                data: ['{{ $pembekalan_lebih_5 }}', '{{ $pembekalan_antara_5_2 }}',
                    '{{ $pembekalan_kurang_2 }}'
                ]
            }, {
                name: 'Perkhidmatan',
                data: ['{{ $perkhidmatan_lebih_5 }}', '{{ $perkhidmatan_antara_5_2 }}',
                    '{{ $perkhidmatan_kurang_2 }}'
                ]
            }],
            chart: {
                type: 'bar',
                height: 430
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            dataLabels: {
                enabled: true,
                offsetX: -6,
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['#fff']
            },
            tooltip: {
                shared: true,
                intersect: false
            },
            xaxis: {
                type: 'category',
                categories: ['\u2265 500,000', '500,000 - 200,000', '\u2264 200,000'],
            },
            title: {
                text: '{{ __('Jumlah Projek berdasarkan Nilai Kontrak') }}',
                align: 'center',
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

    <style>
        .apexcharts-toolbar {
            display: none;
        }

    </style>

    <script>
        $(document).ready(function($) {
            incrementAnimation();
            incrementAnimation2();
        });

        function incrementAnimation() {
            $('.count').each(function() {
                $(this).prop('counter', 0).animate({
                    counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'easeOutExpo',
                    step: function(step) {
                        $(this).text('' + step.format());
                    }
                });
            });
        }

        Number.prototype.format = function(n) {
            // var r = new RegExp('\\d(?=(\\d{3})+' + (n > 0 ? '\\.' : '$') + ')', 'g');
            // return this.toFixed(Math.max(0, Math.floor(n))).replace(r, '$&,');
            return this.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        };

        function incrementAnimation2() {
            $('.count2').each(function() {
                $(this).prop('counter', 0).animate({
                    counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'easeOutExpo',
                    step: function(step) {
                        $(this).text('' + step.format2());
                    }
                });
            });
        }

        Number.prototype.format2 = function(n) {
            // var r = new RegExp('\\d(?=(\\d{3})+' + (n > 0 ? '\\.' : '$') + ')', 'g');
            // return this.toFixed(Math.max(0, Math.floor(n))).replace(r, '$&,');
            return this.toLocaleString('en-US', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
        };
    </script>

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
            --fg: #369;
            --bg: #def;
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

        div[role="progressbar2"] {
            --size: 50px;
            --fg: #369;
            --bg: #def;
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

        div[role="progressbar2"]::before {
            counter-reset: percentage var(--value);
            content: counter(percentage) '%';
        }

    </style>

@endsection
