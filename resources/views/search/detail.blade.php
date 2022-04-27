<div class="modal-header">
    <h5 class="modal-title w-100 d-flex justify-content-center" id="detailModalLabel">Maklumat Projek</h5>
    <div class="d-flex justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
</div>
<div class="modal-body">
    @if ($projek->publish===0)
    <div class="alert alert-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
        <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
        <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
      </svg>
      <span class="mx-2">Projek ini tidak terbit untuk tatapan umum</span></div>        
    @endif
    <div class="d-flex">
        <div class="d-flex flex-column w-100">
            <div class="d-flex flex-fill flex-column m-1 rounded" style="border: 2px solid black">
                <div class="bg-dark text-white p-1">
                    <h5 class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        <span class="pe-2">
                            Tentang Projek
                        </span>
                    </h5>
                </div>
                <div class="container m-2">
                    <div>
                        <div>Nama Projek</div>
                        <h3 class="text-capitalize">
                            {{ $projek->tajuk_projek }}
                        </h3>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="d-flex">
                            <div class="d-flex flex-column w-50 p-2">
                                <a href="/vendor/{{$projek->vendor_id}}" style="text-decoration: none !important; color: inherit;">
                                    <div class="d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                            fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                                            <path
                                                d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                                        </svg>
                                        <div class="d-flex flex-column mx-2">
                                            <div>
                                                Vendor
                                            </div>
                                            <strong class="text-capitalize">
                                                {{ $projek->vendor->nama_pembekal_dilantik }}
                                            </strong>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-activity" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
                                    </svg>
                                    <div class="d-flex flex-column mx-2">
                                        <div>
                                            Status
                                        </div>
                                        <strong class="text-capitalize">
                                            {{ $projek->status }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column w-50 p-2">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                    <div class="d-flex flex-column mx-2">
                                        <div>
                                            Pemilik Projek
                                        </div>
                                        <strong class="text-capitalize">
                                            {{ $projek->pemilik_projek }}
                                        </strong>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-tag" viewBox="0 0 16 16">
                                        <path
                                            d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z" />
                                        <path
                                            d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z" />
                                    </svg>
                                    <div class="d-flex flex-column mx-2">
                                        <div>
                                            Skop
                                        </div>
                                        <strong class="text-capitalize">
                                            {{ $projek->skop_projek }}
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="small">
                            <div class="d-flex">
                                {{-- <div class="d-flex align-items-center justify-content-center w-50">
                                    <small class="w-100 text-center flex-fill mb-0">{!!$projek->description!!}</small>
                                </div> --}}
                                <div class="d-flex flex-column w-50">
                                    <div class="d-flex">
                                        <div class="w-50">Tarikh Mula:</div>
                                        <div class="w-50">{{date('d-m-Y', strtotime($projek->tempoh_mula_kontrak));}}</div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="w-50">Tarikh Tamat:</div>
                                        <div class="w-50">{{date('d-m-Y', strtotime($projek->tempoh_tamat_kontrak));}}</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <div class="d-flex flex-column m-1 rounded w-50" style="border: 2px solid black">
                    <div class="bg-dark text-white p-1">
                        <h5 class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                            </svg>
                            <span class="pe-2">
                                Ulasan Terkini
                            </span>
                        </h5>
                    </div>
                    <div class="m-2">
                        @if ($projek->editor_comment->isNotEmpty())
                            {{$projek->editor_comment->last()->ulasan}}
                        @else
                        <i>belum dikemaskini...</i>
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-column w-100 m-1 rounded" style="border: 2px solid black">
                    <div class="bg-dark text-white p-1">
                        <h5 class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                              </svg>
                            <span class="pe-2">
                                Deskripsi Projek
                            </span>
                        </h5>
                    </div>
                    <div class="m-2">
                        {!!$projek->description!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column">
            <div class="d-flex flex-column m-1 rounded" style="border: 2px solid black">
                <div class="bg-dark text-white p-1">
                    <h5 class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-percent" viewBox="0 0 16 16">
                            <path
                                d="M13.442 2.558a.625.625 0 0 1 0 .884l-10 10a.625.625 0 1 1-.884-.884l10-10a.625.625 0 0 1 .884 0zM4.5 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm7 6a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 1a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        <span class="pe-2">
                            Peratus
                        </span>
                    </h5>
                </div>
                <div class="container m-2">
                    @if ($projek->editor_comment->isNotEmpty())
                    <div role="progressbar" aria-valuenow="{{$projek->editor_comment->last()->peratus_siap}}" aria-valuemin="0" aria-valuemax="100" style="--value:{{$projek->editor_comment->last()->peratus_siap}}">
                    </div>
                    @else
                    <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="--value:0">
                    </div>
                    @endif

                </div>
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div>Fasa Sekarang</div>
                    @if ($projek->editor_comment->isNotEmpty())
                    <h3 class="text-capitalize">{{$projek->editor_comment->last()->fasa_sekarang}}</h3>
                    @else
                    <h3 class="text-capitalize">Initiation</h3>                        
                    @endif
                </div>
            </div>
            <div class="d-flex flex-column m-1 rounded" style="border: 2px solid black">
                <div class="bg-dark text-white p-1">
                    <h5 class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-currency-dollar" viewBox="0 0 16 16">
                            <path
                                d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                        </svg>
                        <span class="pe-2">
                            Kos
                        </span>
                    </h5>
                </div>
                <h5 class="d-flex align-items-center justify-content-center m-2">
                    <div>RM</div>
                    {{-- <h3 class="line-1 anim-typewriter">{{ $projek->bon_pelaksanaan_projek }}</h3> --}}
                    {{-- <h3>{{ $projek->bon_pelaksanaan_projek }}</h3> --}}
                    <span class="count">{{ $projek->bon_pelaksanaan_projek }}</span>
                </h5>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer" style="justify-content: center">
    <div>
        <a href="/projek/{{$projek->id}}" class="btn btn-outline-primary d-flex align-items-center w-100">
            <span class="mx-2">Lanjut</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                <path fill-rule="evenodd"
                    d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
            </svg>
        </a>
    </div>
</div>

{{-- </div> --}}