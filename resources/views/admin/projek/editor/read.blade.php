<div class="modal-body">
    <div class="row">
        <div class="col-12 d-flex">
            <input type="text" class="form-control p-10 search__keyword" name="keyword" id="keyword" placeholder="Input Email" style="height: 50px;">
            <button onClick="search()" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg></button>
        </div>
    </div>
    <div id="result">
        @foreach ($user_projects as $user_project)
        @if ($user_project->user_role_project === 'owner')
        <div class="row my-4 align-items-center">
            <div class="col-1">
                @if ($user_project->user->profile->profile_pic)
                <img src="{{ url('images/' . $user_project->user->profile->profile_pic) }}"
                    class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..." width="30" height="30">
                @else
                <img src="https://i.pravatar.cc/50" class="rounded mx-auto d-block rounded-circle image___profilepic"
                    alt="..." width="30" height="30">
                @endif
            </div>
            <div class="col-9">
                <div class="row">
                    <span class="text-decoration-none text-dark text-capitalize"
                        href="/admin/user/{{ $user_project->user_id }}"><strong style="font-size: 14px;">
                            {{ $user_project->user->name }}
                            @if($user_project->user_id ==
                            Auth::user()->id)
                            (You)
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="row">
                    <small>{{ $user_project->user->email }}</small>
                </div>
            </div>
            <div class="col-2">
                <div>
                    {{ $user_project->user_role_project }}
                </div>
            </div>
        </div>
        @else
        <div class="row my-4 align-items-center">
            <div class="col-1">
                @if ($user_project->user->profile->profile_pic)
                <img src="{{ url('images/' . $user_project->user->profile->profile_pic) }}"
                    class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..." width="30" height="30">
                @else
                <img src="https://i.pravatar.cc/30" class="rounded mx-auto d-block rounded-circle image___profilepic"
                    alt="..." width="30" height="30">
                @endif
            </div>
            <div class="col-8">
                <div class="row">
                    <span class="text-decoration-none text-dark text-capitalize"
                        href="/admin/user/{{ $user_project->user_id }}"><strong style="font-size: 14px;">
                            {{ $user_project->user->name }}
                            @if($user_project->user_id ==
                            Auth::user()->id)
                            (You)
                            @endif
                        </strong>
                    </span>
                </div>
                <div class="row">
                    <small>{{ $user_project->user->email }}</small>
                </div>
            </div>
            <div class="col-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Editor
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                        style="text-align: left;">
                        <a class="dropdown-item">Editor <span class="text-success" style="float: right;"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg></span> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#tukarOwnerCollabModal{{$user_project->id}}">Transfer Ownership</a>
                        <a class="dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#hapusCollabModal{{$user_project->id}}"><span
                                class="btn btn-outline-danger w-100 "><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg> Remove</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="hapusCollabModal{{$user_project->id}}" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="hapusCollabModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content shadow-lg">
                    <div class="modal-body">
                        Remove <b style="color: red;">{!! $user_project->user->name !!}</b> from group collaboration?
                        <div class="d-flex justify-content-end my-3">
                            <button type="button" style="margin-right: 10px;" class="btn btn-outline-secondary"
                                onClick="hideHapusCollabModal({{$user_project->id}})">Cancel</button>
                            <button type="button" onClick="destroyCollab({{$user_project->id}})"
                                class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash-fill mx-1" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2 -->
        <div class="modal fade" id="tukarOwnerCollabModal{{$user_project->id}}" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="tukarOwnerCollabModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content shadow-lg">
                    <div class="modal-body">
                        Set <b style="color: green;">{!! $user_project->user->name !!}</b> as project owner?
                        <div class="d-flex justify-content-end my-3">
                            <button type="button" style="margin-right: 10px;" class="btn btn-outline-secondary"
                                onClick="hideTukarOwnerCollabModal({{$user_project->id}})">No</button>
                            <button type="button" onClick="changeOwnerCollab({{$user_project->id}})"
                                class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill mx-1" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                  </svg>Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>