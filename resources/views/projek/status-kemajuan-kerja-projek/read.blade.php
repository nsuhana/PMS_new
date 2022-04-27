@foreach ($fasan as $fasa)
<tr class="header" fasa_projek_id="{{ $fasa->id }}">
    <th class="minimized_toggle">
        <div>{{ $loop->iteration }}</div>
    </th>
    <th class="edit-fasa-besar-modal" colspan="9">
        <div>{{ $fasa->fasa_projek }}</div>
    </th>
    <th class="tambah-aktiviti-data-modal" onClick="createKumpulanFasa({{ $fasa->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
            <path
                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
        </svg></th>
</tr>
@foreach ($kumpulan_fasan as $kumpulan_fasa)
@if ( $kumpulan_fasa->fasa_projek_id == $fasa->id )
<tr fasa_projek_id="{{ $fasa->id }}" kumpulan_fasa_id="{{ $kumpulan_fasa->id }}">
    <td class="edit-aktiviti-data-modal"></td>
    <td class="edit-aktiviti-data-modal">
        <div class="truncated">{{ $kumpulan_fasa->tajuk_kumpulan }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="">{{ $kumpulan_fasa->tarikh_mula_rancang }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="">{{ $kumpulan_fasa->tarikh_tamat_rancang }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="">{{ $kumpulan_fasa->tarikh_mula_sebenar }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="">{{ $kumpulan_fasa->tarikh_tamat_sebenar }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="">{{ $kumpulan_fasa->peratus_rancang }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="">{{ $kumpulan_fasa->peratus_sebenar }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="truncated__mini">{{ $kumpulan_fasa->status }}</div>
    </td>
    <td class="edit-aktiviti-data-modal">
        <div class="truncated__mini__2">{{ $kumpulan_fasa->catatan }}</div>
    </td>
    <td class="tambah-sub-aktiviti-data-modal" onClick="createSubKumpulanFasa({{ $fasa->id }}, {{ $kumpulan_fasa->id }})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path
                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg></td>
</tr>
@foreach ($sub_kumpulan_fasan as $sub_kumpulan_fasa)
@if ( $sub_kumpulan_fasa->kumpulan_fasa_id === $kumpulan_fasa->id )
<tr fasa_projek_id="{{ $fasa->id }}" kumpulan_fasa_id="{{ $kumpulan_fasa->id }}" sub_kumpulan_fasa_id="{{ $sub_kumpulan_fasa->id }}">
    <td class="edit-sub-aktiviti-data-modal"></td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="truncated sub-aktiviti">{{ $sub_kumpulan_fasa->tajuk_kumpulan }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="">{{ $sub_kumpulan_fasa->tarikh_mula_rancang }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="">{{ $sub_kumpulan_fasa->tarikh_tamat_rancang }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="">{{ $sub_kumpulan_fasa->tarikh_mula_sebenar }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="">{{ $sub_kumpulan_fasa->tarikh_tamat_sebenar }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="">{{ $sub_kumpulan_fasa->peratus_rancang }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="">{{ $sub_kumpulan_fasa->peratus_sebenar }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="truncated__mini">{{ $sub_kumpulan_fasa->status }}</div>
    </td>
    <td class="edit-sub-aktiviti-data-modal">
        <div class="truncated__mini__2">{{ $sub_kumpulan_fasa->catatan }}</div>
    </td>
    <td class="muted-square"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray"
            class="bi bi-square" viewBox="0 0 16 16">
            <path
                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
        </svg></td>
</tr>
@endif
@endforeach
@endif
@endforeach
@endforeach

@if (Route::has('login'))
@auth
@if ($project->user_project->whereIn('user_id', Auth::user()->id)->isNotEmpty() || Auth::user()->isAdministrator())
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
    
    $('.minimized_toggle').click(function(){
        $(this).parent().nextUntil('.header, script').slideToggle(0);
    });

    $('.edit-fasa-besar-modal').click(function(){
        id = $(event.target).parent().closest('tr').attr('fasa_projek_id');
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/edit", {}, function(data, status) {
            $("#ProjekModalLabel").html('Edit Fasa Projek')
            $("#page").html(data);
            $("#ProjekModal").modal('show');
        });
    });

    $('.edit-aktiviti-data-modal').click(function(){
        id = $(event.target).parent().closest('tr').attr('fasa_projek_id');
        id2 = $(event.target).parent().closest('tr').attr('kumpulan_fasa_id');
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/edit", {}, function(data, status) {
            $("#ProjekModalLabel").html('Edit Kumpulan Fasa Projek')
            $("#page").html(data);
            $("#ProjekModal").modal('show');
        });
    });

    $('.edit-sub-aktiviti-data-modal').click(function(){
        id = $(event.target).parent().closest('tr').attr('fasa_projek_id');
        id2 = $(event.target).parent().closest('tr').attr('kumpulan_fasa_id');
        id3 = $(event.target).parent().closest('tr').attr('sub_kumpulan_fasa_id');
        $.get("/projek/{{$project->id}}/status-kemajuan-kerja-projek/"+id+"/kumpulan-fasa/"+id2+"/sub-kumpulan-fasa/"+id3+"/edit", {}, function(data, status) {
            $("#ProjekModalLabel").html('Edit Sub Kumpulan Fasa Projek')
            $("#page").html(data);
            $("#ProjekModal").modal('show');
        });
    });
</script>
@else
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
    
    $('.minimized_toggle').click(function(){
        $(this).parent().nextUntil('.header, script').slideToggle(0);
    });
</script>
@endif
@endauth
@endif
