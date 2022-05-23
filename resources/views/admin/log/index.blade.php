@extends('admin.base')

@section('content')

<style>
    .truncated {
        white-space: nowrap;
        width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .truncated__mini {
        white-space: nowrap;
        width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        overflow-wrap: break-word;
        word-wrap: break-word;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="hapusModalLabel">Are you sure?</h5>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
        </div>
        <div class="modal-body">
              You cannot retrives the logs once it has been deleted.
              <br>
            (Recommendation: download the logs to excel file first before clearing the logs)
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="/admin/log/delete" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Clear Log</button>              
            </form>
        </div>
      </div>
    </div>
  </div>

<div class="m-4">
    <div class="row">
        <nav>
            <ul class="breadcrumb">
                <li><a href="/admin">Home</a></li>
                <li>Aktiviti Log</li>
            </ul>
        </nav>
    </div>
    <div class="row my-4">
        <div class="col-xs-12 col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="p-0 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                          </svg>
                    <span class="mx-2">Info</span>
                    </div>
                </div>
                <div class="card-body">
                    Some activity may not be recorded into the log.
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-9">
            <div class="row">
                <div class="col-12">
                    <div class="container px-0 d-flex justify-content-between align-items-center my-3 my-md-2">
                        <h4>Hover on any row to view activity details.</h4>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-outline-secondary mx-2"  data-bs-toggle="modal" data-bs-target="#exampleModal">Empty log</button>
                            <a href="/admin/generate-pdf" target="_blank" class="btn btn-primary">Print to .Pdf</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th style="width:20px;">Bil</th>
                                <th>Subject</th>
                                <th>URL</th>
                                <th>Ip</th>
                                <th>Method</th>
                                <th>Agent</th>
                                <th>User_id</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $log)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    <div class="truncated">{{$log->subject}}</div>
                                </td>
                                <td>
                                    <div class="truncated__mini">{{$log->url}}</div>
                                </td>
                                <td>
                                    <div>{{$log->ip}}</div>
                                </td>
                                <td>
                                    <div>{{$log->method}}</div>
                                </td>
                                <td>
                                    <div class="truncated__mini">{{$log->agent}}</div>
                                </td>
                                <td>
                                    @if ($log->user_id === null)
                                        <div></div>
                                    @else
                                        <a href="/admin/user/{{{$log->user_id}}}" class="text-decoration-none"><div>{{$log->user->name}}</div></a>
                                    @endif
                                </td>
                                <td>
                                    <div class="truncated__mini">{{date('d/m/Y H:i:s', strtotime($log->created_at))}}</div>
                                </td>
                                <td style="width:auto">
                                    <div class="d-flex align-items-center">
                                        <form action="/admin/log/{{$log->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger mx-2 btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                  </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{ $logs->links() }}
    </div>
</div>

<script>
    $('tr').hover(function(){
        $(this).find('.truncated').css('white-space', 'normal').css('overflow','visible');
        $(this).find('.truncated__mini').css('white-space', 'normal').css('overflow','visible'); 
        $(this).find('.truncated__mini__2').css('white-space', 'normal').css('overflow','visible'); 
        }, function(){
        $(this).find('.truncated').css('white-space', 'nowrap').css('overflow','hidden');
        $(this).find('.truncated__mini').css('white-space', 'nowrap').css('overflow','hidden');
        $(this).find('.truncated__mini__2').css('white-space', 'nowrap').css('overflow','hidden');
    });
</script>

@endsection