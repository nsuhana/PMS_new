<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\user_project;
use App\Models\editor_comment;
use App\Models\project_card;
use App\Models\card_view;
use App\Models\status_kemajuan_kewangan_projek;
use App\Models\status_kemajuan_kerja_projek;
use App\Models\kumpulan_fasa;
use App\Models\sub_kumpulan_fasa;

use Illuminate\Support\Facades\Auth;


class RestoreProjectController extends Controller
{
    public function index() {

        $projek = project::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate('20');

        $view = 'admin.projek.trash.index';
        return view($view,[
            'project' => $projek,
        ]);
    }

    public function restoreProjek($id) {

        // ========= [user_project] ===========
        user_project::onlyTrashed()->where('project_id', $id)->restore();
        // ========= [editor_comment] ===========
        editor_comment::onlyTrashed()->where('project_id', $id)->restore();
        // ========= [status-kemajuan-kewangan] ===========
        status_kemajuan_kewangan_projek::onlyTrashed()->where('project_id', $id)->restore();
        // ========= [project_card] ===========
        $id_p_card = project_card::onlyTrashed()->where('project_id', $id)->select('id')->get();
        card_view::onlyTrashed()->whereIn('card_id', $id_p_card)->restore();
        project_card::onlyTrashed()->where('project_id', $id)->restore();
        // ========= [status-kemajuan-kerja] ===========
        $id_fasa = status_kemajuan_kerja_projek::onlyTrashed()->where('project_id', $id)->select('id')->get();
        $id_k_fasa = kumpulan_fasa::onlyTrashed()->whereIn('fasa_projek_id', $id_fasa)->select('id')->get();
        sub_kumpulan_fasa::onlyTrashed()->whereIn('kumpulan_fasa_id', $id_k_fasa)->restore();
        kumpulan_fasa::onlyTrashed()->whereIn('fasa_projek_id', $id_fasa)->restore();
        status_kemajuan_kerja_projek::onlyTrashed()->where('project_id', $id)->restore();
        // ========= [project] ===========
        project::onlyTrashed()->find($id)->restore();

        \LogActivity::addToLog(Auth::user()->name.' restore a project from trash');

        return redirect('/admin/projek/'.$id);
    }

    public function forceDestroyProjek($id) {

        // ========= [user_project] ===========
        user_project::onlyTrashed()->where('project_id', $id)->forcedelete();
        // ========= [editor_comment] ===========
        editor_comment::onlyTrashed()->where('project_id', $id)->forcedelete();
        // ========= [status-kemajuan-kewangan] ===========
        status_kemajuan_kewangan_projek::onlyTrashed()->where('project_id', $id)->forcedelete();
        // ========= [project_card] ===========
        $id_p_card = project_card::onlyTrashed()->where('project_id', $id)->select('id')->get();
        card_view::onlyTrashed()->whereIn('card_id', $id_p_card)->forcedelete();
        project_card::onlyTrashed()->where('project_id', $id)->forcedelete();
        // ========= [status-kemajuan-kerja] ===========
        $id_fasa = status_kemajuan_kerja_projek::onlyTrashed()->where('project_id', $id)->select('id')->get();
        $id_k_fasa = kumpulan_fasa::onlyTrashed()->whereIn('fasa_projek_id', $id_fasa)->select('id')->get();
        sub_kumpulan_fasa::onlyTrashed()->whereIn('kumpulan_fasa_id', $id_k_fasa)->forcedelete();
        kumpulan_fasa::onlyTrashed()->whereIn('fasa_projek_id', $id_fasa)->forcedelete();
        status_kemajuan_kerja_projek::onlyTrashed()->where('project_id', $id)->forcedelete();
        // ========= [project] ===========
        project::onlyTrashed()->find($id)->forcedelete();

        \LogActivity::addToLog(Auth::user()->name.' delete a project from trash');

        return redirect('/admin/projek/deleted');

    }
}
