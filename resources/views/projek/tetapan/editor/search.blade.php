<div class="p-3 my-2" style="overflow: auto; max-height: 250px; width: 100%;">
    @foreach ($results as $result)
    <div class="row my-4 align-items-center">
        <div class="col-2">
            @if ($result->profile->profile_pic)
            <img src="{{ url('images/' . $result->profile->profile_pic) }}"
                class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..." width="40" height="40">
            @else
            <img src="/images/default.jpg" class="rounded mx-auto d-block rounded-circle image___profilepic" alt="..."
                width="40" height="40">
            @endif
        </div>
        <div class="col-8">
            <div class="row">
                <span class="text-decoration-none text-dark text-capitalize"
                    href="/admin/user/{{ $result->id }}"><strong style="font-size: 14px;">
                        {{ $result->name }}
                        @if($result->id == Auth::user()->id)
                        (You)
                        @endif
                    </strong>
                </span>
            </div>
            <div class="row">
                <small>{{ $result->email }}</small>
            </div>
        </div>
        <div class="col-2">
            <div class="dropdown">
                @if ($result->user_project->where('project_id', $project->id)->isEmpty())
                <button onClick="addEditor({{$result->id}})"  class="btn btn-primary d-flex align-items-center" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    Add
                </button>
                @else
                <button class="btn btn-outline-primary d-flex align-items-center" type="button" disabled>
                    Added
                </button>
                @endif

            </div>
        </div>
    </div>
    @endforeach


</div>