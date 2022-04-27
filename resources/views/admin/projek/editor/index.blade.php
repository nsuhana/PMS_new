<div class="container">
    @foreach ($user_projects as $user_project)
    <div class="row my-4 align-items-center">
        <div class="col-2">
            @if ($user_project->user->profile->profile_pic)
            <img src="{{ url('images/' . $user_project->user->profile->profile_pic) }}"
                class="rounded mx-auto d-block rounded-circle image___profilepic"
                alt="..." width="50" height="50">
            @else
            <img src="https://i.pravatar.cc/50"
                class="rounded mx-auto d-block rounded-circle image___profilepic"
                alt="..." width="50" height="50">
            @endif
        </div>
        <div class="col-8">
            <div class="row">
                <a class="text-decoration-none text-dark text-capitalize"
                    href="/admin/user/{{ $user_project->user_id }}"><strong
                        style="font-size: 16px;">
                        {{ $user_project->user->name }}
                        @if($user_project->user_id == Auth::user()->id)
                        (You)
                        @endif
                    </strong>
                </a>
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
    @endforeach
    <div class="row">
        <div class="d-flex align-items-center justify-content-center">
            <a onClick="read()"
                class="text-decoration-none d-flex align-items-center fw-bold"
                data-bs-toggle="modal" data-bs-target="#collabModal"><svg class="mx-2"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                    fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path
                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    <path fill-rule="evenodd"
                        d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                </svg> Add collaborators</a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="collabModal" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="collabModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="collabModalLabel">Tambah Editor</h5>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn-close" onclick="hideMainModal()" aria-label="Close"></button>
                        </div>
                    </div>
                    <div id="read"></div>
                    <div class="modal-footer">
                        <button type="button" onclick="hideMainModal()" class="btn btn-secondary btn__del_collab" data-updated="false">Close</button>
                        <button type="submit" onclick="hideMainModal()" class="btn btn-primary">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>