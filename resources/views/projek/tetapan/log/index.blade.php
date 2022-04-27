<div class="modal-body">
    @foreach ($comment as $komen)
    <div class="card mb-2">
        <div class="card-body">
            <div class="d-flex flex-column">
                <div class="d-flex align-items-center justify-content-between">
                    <small class="">
                        {{date('d/m/Y', strtotime($komen->updated_at));}}
                    </small>
                    <div class="d-flex justify-content-end align-items-center">
                        <small class="mx-2">
                            @if ($komen->user != null)
                            By {{{$komen->user->name}}}                                
                            @else
                            By [{{__('Kosong')}}]
                            @endif
                        </small>
                        <form action="/projek/{{$project->id}}/ulasan/{{$komen->id}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-dark btn-sm" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
                <hr class="m-1">
                    <div class="w-100">
                        {{$komen->ulasan}}
                    </div>
                    <div class="d-flex flex-column w-50 text-secondary">
                        <small class="text-capitalize">
                            Peratus: <u>{{$komen->peratus_siap}}%</u>
                        </small>
                        <small class="text-capitalize">
                            Fasa sekarang: <u>{{$komen->fasa_sekarang}}</u>
                        </small>
                    </div>
            </div>
        </div>
    </div>
        {{-- {{$komen}} --}}
    @endforeach
</div>