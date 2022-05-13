@if ($results->isEmpty())
<div class="d-flex flex-column justify-content-center align-items-center" style="height: 300px;">
    <div class="my-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-search"
            viewBox="0 0 16 16">
            <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
    </div>
    <h4>
        No results found
    </h4>
    <div>
        Try different or more general keywords
    </div>
</div>
@else
<div class="row">
    @foreach ($results as $result)
    <div class="col-xs-12 col-sm-6 col-md-4 my-2">
        <div class="shadow-sm card card-body" style="min-height: 140px; max-height: 200px; cursor: pointer;"  onClick="detail({{ $result->id }})">
            <div class="d-flex flex-column" style="min-height: 140px; max-height: 200px;">
                <h5 class="text-capitalize">{{ $result->tajuk_projek }}</h5>
                <div class="d-flex flex-column" style="margin-top: auto">
                    <div class="d-flex align-items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-building" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                            <path
                                d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                        </svg>
                        <div class="text-capitalize mx-2"
                            style="text-overflow: ellipsis; width: 233px; overflow: hidden; white-space: nowrap;">{{
                            $result->vendor->nama_pembekal_dilantik }}</div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                            class="bi bi-tag-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                        </svg>
                        <div class="text-capitalize mx-2">{{ $result->skop_projek }}</div>
                    </div>
                    <div class="row small mb-2">
                        <div class="col-5">
                            Tarikh Mula:
                        </div>
                        <div class="col-7">
                            {{date('d-m-Y', strtotime($result->tempoh_mula_kontrak));}}
                        </div>
                        <div class="col-5">
                            Tarikh Tamat:
                        </div>
                        <div class="col-7">
                            {{date('d-m-Y', strtotime($result->tempoh_tamat_kontrak));}}
                        </div>
                    </div>
                    @if ( $result->status === 'ikut jadual' )
                    <span class="badge rounded-pill" style="margin-top: auto; background-color: #2684C4;">Ikut Jadual</span>
                    @elseif ( $result->status === 'dalam perlaksanaan' )
                    <span class="badge rounded-pill"
                        style="margin-top: auto; color: black; background-color: #9BCC5C">Dalam Perlaksanaan</span>
                    @elseif ( $result->status === 'projek lewat' )
                    <span class="badge rounded-pill bg-secondary" style="margin-top: auto;">Projek Lewat</span>
                    @elseif ( $result->status === 'projek sakit' )
                    <span class="badge rounded-pill bg-secondary" style="margin-top: auto;">Projek Sakit</span>
                    @else
                    <span class="badge rounded-pill bg-secondary" style="margin-top: auto;">Undefined</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- {{dd($results->hasPages()) }} --}}
    {{-- {{ $results->links() }} --}}

    {{-- {{dd($results->url(1))}} --}}

    @if ($results->hasPages())

    <ul class="pagination">

        <?php
        $interval = isset($interval) ? abs(intval($interval)) : 3 ;
        $from = $results->currentPage() - $interval;
        if($from < 1){
            $from = 1;
        }

        $to = $results->currentPage() + $interval;
        if($to > $results->lastPage()){
            $to = $results->lastPage();
        }
        ?>

        <!-- first/previous -->
        @if($results->currentPage() > 1)
        <li class="page-item">
            <a class="page-link" onClick="pagination('{{ $results->url(1) }}')" aria-label="First">
                <span aria-hidden="true">«</span>
            </a>
        </li>

        <li class="page-item">
            <a class="page-link" onClick="pagination('{{ $results->url($results->currentPage() - 1) }}')"
                aria-label="Previous">
                <span aria-hidden="true">‹</span>
            </a>
        </li>
        @endif

        <!-- links -->
        @for($i = $from; $i <= $to; $i++) <?php $isCurrentPage=$results->currentPage() == $i;
            ?>
            <li class="page-item" class="{{ $isCurrentPage ? 'active' : '' }}">
                <a class="page-link" onClick="pagination('{{ !$isCurrentPage ? $results->url($i) : '#' }}')">
                    {{ $i }}
                </a>
            </li>
            @endfor

            <!-- next/last -->
            @if($results->currentPage() < $results->lastPage())
                <li class="page-item">
                    <a class="page-link" onClick="pagination('{{ $results->url($results->currentPage() + 1) }}')"
                        aria-label="Next">
                        <span aria-hidden="true">›</span>
                    </a>
                </li>

                <li class="page-item">
                    <a class="page-link" onClick="pagination('{{ $results->url($results->lastpage()) }}')"
                        aria-label="Last">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
                @endif

    </ul>

    <div>
        <p class="text-sm text-gray-700 leading-5">
            {!! __('Showing') !!}
            @if ($results->firstItem())
            <span class="font-medium">{{ $results->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $results->lastItem() }}</span>
            @else
            {{ $results->count() }}
            @endif
            {!! __('of') !!}
            <span class="font-medium">{{ $results->total() }}</span>
            {!! __('results') !!}
        </p>
    </div>

    @endif


</div>
@endif