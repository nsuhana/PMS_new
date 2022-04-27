<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\vendor;
use App\Models\user;
use App\Models\user_project;
use App\Models\vendor_profile;
use App\Models\project_card;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;

use Illuminate\Support\Facades\Gate;

use PDF;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



use Illuminate\Support\Facades\Route;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // dd(Route::current()->getPrefix());

        if ($this->isAdminRequest()) {
            $request->validate([
                'filter_projek_status' => ['nullable', Rule::in(['aktif', 'tidak aktif', 'selesai'])],
                'filter_projek_skop' => ['nullable', Rule::in(['pembekalan', 'perkhidmatan'])],
                'filter_tahun' => ['nullable'],
                'filter_publish' => ['nullable', Rule::in(['0', '1'])],
                'sortBy' => ['nullable', Rule::in(['tajuk_projek', 'pemilik_projek', 'nama_pembekal_dilantik', 'recently_added'])],
                'keyword' => ['nullable', 'string'],
            ]);

            $x = $request->filter_projek_status;
            $y = $request->filter_projek_skop;
            $z1 = ($request->filter_tahun).'-12-31';
            $z2 = ($request->filter_tahun).'-01-01';
            $w = $request->filter_publish;
            $a = $request->sortBy;
            $b = addslashes($request->keyword);

            $projek = Project::when($request->filter_projek_status != null, function ($q) use ($x) {
                return $q->where('status', $x);
            }, function ($q) {
                return $q;
            })->when($request->filter_projek_skop != null, function ($q) use ($y) {
                return $q->where('skop_projek', $y);
            }, function ($q) {
                return $q;
            })->when($request->filter_publish != null, function ($q) use ($w) {
                return $q->where('publish', $w);
            }, function ($q) {
                return $q;
            })->when($request->filter_tahun != null, function ($q) use ($z1, $z2){
                return $q->where('tempoh_mula_kontrak', '<=', $z1)->where('tempoh_tamat_kontrak', '>=', $z2);
                // return $q->where('tempoh_mula_kontrak', '<=', $z1)->where('tempoh_tamat_kontrak', '<=', $z2);
            }, function ($q) {
                return $q;
            })->when($request->sortBy != null, function ($q) use ($a) {
                return $q->when($a === 'nama_pembekal_dilantik', function ($q2) use ($a) {
                    return $q2->join('vendors','vendors.id', '=', 'projects.vendor_id')->orderBy('nama_pembekal_dilantik')->select('projects.*');
                }, function ($q2) use ($a){
                    return $q2->when( $a === 'recently_added', function ($q3) use ($a) {
                        return $q3->orderBy('id', 'desc');
                    }, function ($q3) use ($a) {
                        return $q3->orderBy($a);
                    });
                });
            }, function ($q) {
                return $q->orderBy('tajuk_projek');
            })->when($request->keyword != null, function ($q) use ($b) {
                return $q->join('vendors','vendors.id', '=', 'projects.vendor_id')->where('tajuk_projek', 'LIKE', '%'.$b.'%')->orWhere('pemilik_projek', 'LIKE', '%'.$b.'%')->orWhere('nama_pembekal_dilantik', 'LIKE', '%'.$b.'%')->select('projects.*');
            }, function ($q) {
                return $q;
            })->paginate(20);
    
            $view = 'admin.projek.index';

            return view($view, [
                'project' => $projek,
                'filter_projek_status' => $request->filter_projek_status,
                'filter_projek_skop' => $request->filter_projek_skop,
                'sortBy' => $request->sortBy,
                'keyword' => addslashes($request->keyword),
                'filter_tahun' => $request->filter_tahun,
                'filter_publish' => $request->filter_publish,
            ]);
        }
        else {
            $request->validate([
                'filter_ownership' =>  ['nullable', Rule::in(['owner', 'editor'])],
                'filter_projek_status' => ['nullable', Rule::in(['aktif', 'tidak aktif', 'selesai'])],
                'filter_projek_skop' => ['nullable', Rule::in(['pembekalan', 'perkhidmatan'])],
            ]);

            $x = $request->filter_projek_status;
            $y = $request->filter_projek_skop;
            $z = $request->filter_ownership;

            $projek = Project::join('user_projects','user_projects.project_id', '=', 'projects.id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->when($request->filter_ownership != null, function ($q) use ($z) {
                return $q->where('user_projects.user_role_project', $z);
            }, function ($q) {
                return $q;
            })->when($request->filter_projek_status != null, function ($q) use ($x) {
                return $q->where('projects.status', $x);
            }, function ($q) {
                return $q;
            })->when($request->filter_projek_skop != null, function ($q) use ($y) {
                return $q->where('projects.skop_projek', $y);
            }, function ($q) {
                return $q;
            })->select('projects.*')
            ->orderBy('projects.tajuk_projek')
            ->paginate(10);

            $view = 'projek.index';

            return view($view, [
                'projects' => $projek,
                'filter_projek_status' => $request->filter_projek_status,
                'filter_projek_skop' => $request->filter_projek_skop,
                'filter_ownership' => $request->filter_ownership,
            ]);
        }

    }

    public function create()
    {
        $view = $this->isAdminRequest() ? 'admin.projek.create' : 'projek.create';
        // $projek = project::all();
        $vendor = vendor::where('status', '1')->orderBy('nama_pembekal_dilantik')->get();
        return view($view, [
            'vendor' => $vendor,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tajuk_projek' => ['required', 'string', 'max:225', 'unique:projects'],
            'pemilik_projek' => ['required', 'string', 'max:225'],
            'rujukan_projek' => ['required', 'mimes:pdf', ],
            'nama_pembekal_dilantik' => ['required', 'string', 'max:225'],
            'kos_projek_sebelum_sst' => ['required', 'numeric', 'between:0,999999999999.99'],
            'kos_projek_selepas_sst' => ['required', 'numeric', 'between:0,999999999999.99'],
            'bon_pelaksanaan_projek' => ['required', 'numeric', 'between:0,999999999999.99'],
            'tempoh_mula_kontrak' => ['required', 'string'],
            'tempoh_tamat_kontrak' => ['required', 'string'],
            'skop_projek' => ['required', Rule::in(['pembekalan', 'perkhidmatan'])],
            'publish' => ['required', Rule::in(['1', '0'])],
            'description' => ['required', 'string'],
        ]);

        if($request->nama_pembekal_dilantik) {
            $id_pembekal_dilantik = vendor::where('nama_pembekal_dilantik', $request->nama_pembekal_dilantik)->first();    
            if($id_pembekal_dilantik === null) {

                $vendor = vendor::create([
                    'nama_pembekal_dilantik' => $request->nama_pembekal_dilantik,
                ]);
                $vendor_profile = vendor_profile::create([
                    'vendor_id' => $vendor->id,
                ]);    
                $id_pembekal_dilantik = $vendor->id;
            }
            else {
                $id_pembekal_dilantik = $id_pembekal_dilantik->id;
            }
        }

        if($request->rujukan_projek) {

            $newRujukanName = time() . '-' . $request->tajuk_projek . '.' . $request->rujukan_projek->extension();

            $request->rujukan_projek->move(public_path('documents/rujukan'), $newRujukanName);
    
        }

        $projek = project::create([
            'vendor_id' => $id_pembekal_dilantik,
            'tajuk_projek' => $request->tajuk_projek,
            'pemilik_projek' => $request->pemilik_projek,
            'rujukan_projek'=> $newRujukanName,
            'kos_projek_sebelum_sst' => $request->kos_projek_sebelum_sst,
            'kos_projek_selepas_sst' => $request->kos_projek_selepas_sst,
            'bon_pelaksanaan_projek' => $request->bon_pelaksanaan_projek,
            'tempoh_mula_kontrak' => $request->tempoh_mula_kontrak,
            'tempoh_tamat_kontrak' => $request->tempoh_tamat_kontrak,
            'skop_projek' => $request->skop_projek,
            'publish' => $request->publish,
            'description' => $request->description,
        ]);

        $user_project = user_project::create([
            'user_id' => Auth::user()->id,
            'project_id' => $projek->id,
            'user_role_project' => 'owner',
        ]);
        
        \LogActivity::addToLog(Auth::user()->name.' created a projek ['.$projek->tajuk_projek.']');

        $view = $this->isAdminRequest() ? '/admin/projek' : '/projek';
        return redirect($view.'/'.$projek->id);
    }

    public function show(project $projek)
    {

        if(Auth::check()) {
            if ($this->isAdminRequest()) {
                $view = 'admin.projek.detail';
                $user_project = user_project::where('project_id',$projek->id)->orderBy('user_role_project', 'desc')->get();

                return view($view, [
                    'project' => $projek,
                ]);
            }

            // dd($projek->user_project->whereIn('user_id', Auth::user()->id)->where('user_role_project', 'owner')->isNotEmpty());
            if (Auth::user()->isAdministrator() || $projek->user_project->whereIn('user_id', Auth::user()->id)->where('user_role_project', 'owner')->isNotEmpty()) {
                $view = 'projek.detail';
                $kandungan_projek = project_card::where('project_id',$projek->id)->get();
                return view($view, [
                    'project' => $projek,
                    'kandungan_projek' => $kandungan_projek,
                ]);

            }
            else {
                if ($projek->user_project->whereIn('user_id', Auth::user()->id)->where('user_role_project', 'editor')->isNotEmpty()) {
                    $view = 'projek.detail';
                    $kandungan_projek = project_card::where('project_id', $projek->id)
                    ->where('publish', '1')
                    ->join('card_views', 'card_views.card_id', '=', 'project_cards.id') 
                    ->where('editor', '1')
                    ->select('project_cards.*')
                    ->get();
    
                    return view($view, [
                        'project' => $projek,
                        'kandungan_projek' => $kandungan_projek,
                    ]);
                }

                if (Auth::user()->isStaff()) {

                    $view = 'projek.detail';
                    $kandungan_projek = project_card::where('project_id', $projek->id)
                    ->where('publish', '1')
                    ->join('card_views', 'card_views.card_id', '=', 'project_cards.id') 
                    ->where('staff', '1')
                    ->select('project_cards.*')
                    ->get();
    
                    return view($view, [
                        'project' => $projek,
                        'kandungan_projek' => $kandungan_projek,
                    ]);
                }

                if (Auth::user()->isNormalUser()) {

                    if ($projek->publish === 0) {
                        return abort(404);
                    }

                    $view = 'projek.detail';
                    $kandungan_projek = project_card::where('project_id', $projek->id)
                    ->where('publish', '1')
                    ->join('card_views', 'card_views.card_id', '=', 'project_cards.id') 
                    ->where('normal_user', '1')
                    ->select('project_cards.*')
                    ->get();
    
                    return view($view, [
                        'project' => $projek,
                        'kandungan_projek' => $kandungan_projek,
                    ]);
                }
            }
        }
        else {

            if ($projek->publish === 0) {
                return abort(404);
            }

            $view = 'projek.detail';
            $kandungan_projek = project_card::where('project_id', $projek->id)
            ->where('publish', '1')
            ->join('card_views', 'card_views.card_id', '=', 'project_cards.id') 
            ->where('guest', '1')
            ->select('project_cards.*')
            ->get();

            return view($view, [
                'project' => $projek,
                'kandungan_projek' => $kandungan_projek,
            ]);
        }

    }

    public function edit(project $projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $view = $this->isAdminRequest() ? 'admin.projek.edit' : 'projek.edit';
        $vendor = vendor::where('status', '1')->orderBy('nama_pembekal_dilantik')->get();
        return view($view, [
            'project' => $projek,
            'vendor' => $vendor,
        ]);


    }

    public function update(Request $request, project $projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $request->validate([
            'tajuk_projek' => ($request->tajuk_projek == $projek->tajuk_projek) ? ['required', 'string', 'max:225'] : ['required', 'string', 'max:225','unique:projects'],
            'pemilik_projek' => ['required', 'string', 'max:225'],
            'rujukan_projek' => ['nullable', 'mimes:pdf', ],
            'nama_pembekal_dilantik' => ['required', 'string', 'max:225'],
            'kos_projek_sebelum_sst' => ['required', 'numeric', 'between:0,999999999999.99'],
            'kos_projek_selepas_sst' => ['required', 'numeric', 'between:0,999999999999.99'],
            'bon_pelaksanaan_projek' => ['required', 'numeric', 'between:0,999999999999.99'],
            'tempoh_mula_kontrak' => ['required', 'string'],
            'tempoh_tamat_kontrak' => ['required', 'string'],
            'skop_projek' => ['required', Rule::in(['pembekalan', 'perkhidmatan'])],
            'status' => ['nullable', Rule::in(['aktif', 'tidak aktif', 'selesai'])],
        ]);

        if($request->nama_pembekal_dilantik) {
            $id_pembekal_dilantik = vendor::where('nama_pembekal_dilantik', $request->nama_pembekal_dilantik)->first();    
            if($id_pembekal_dilantik === null) {

                $vendor = vendor::create([
                    'nama_pembekal_dilantik' => $request->nama_pembekal_dilantik,
                ]);
                $vendor_profile = vendor_profile::create([
                    'vendor_id' => $vendor->id,
                ]);    
                $id_pembekal_dilantik = $vendor->id;
            }
            else {
                $id_pembekal_dilantik = $id_pembekal_dilantik->id;
            }
        }

        if ($request->rujukan_projek) {
            $newRujukanName = time() . '-' . $request->tajuk_projek . '.' . $request->rujukan_projek->extension();

            $request->rujukan_projek->move(public_path('documents/rujukan'), $newRujukanName);
        }

        $projek->tajuk_projek           = $request->tajuk_projek;
        $projek->vendor_id              = $id_pembekal_dilantik;
        $projek->pemilik_projek         = $request->pemilik_projek;
        $projek->rujukan_projek         = ($request->rujukan_projek)? $newRujukanName : $projek->rujukan_projek;
        $projek->kos_projek_sebelum_sst = $request->kos_projek_sebelum_sst;
        $projek->kos_projek_selepas_sst = $request->kos_projek_selepas_sst;
        $projek->bon_pelaksanaan_projek = $request->bon_pelaksanaan_projek;
        $projek->tempoh_mula_kontrak    = $request->tempoh_mula_kontrak;
        $projek->tempoh_tamat_kontrak   = $request->tempoh_tamat_kontrak;
        $projek->skop_projek            = $request->skop_projek;
        $projek->status                 = $request->status ? $request->status: $projek->status;
        $projek->publish                = $request->publish;

        $projek->save();

        \LogActivity::addToLog(Auth::user()->name.' edit a projek ['.$projek->tajuk_projek.']');

        $view = $this->isAdminRequest() ? '/admin/projek/' : '/projek/';
        return redirect($view . $projek->id);

    }

    public function destroy(project $projek)
    {

        if (! Gate::allows('projek-owner', $projek)) {
            abort(403);
        }

        \LogActivity::addToLog(Auth::user()->name.' delete a projek ['.$projek->tajuk_projek.']');

        // ========= [user_project] ===========
        foreach ( $projek->user_project as $user_projek) {
            if($user_projek->user_role_project === 'editor') {
                $user_projek->forcedelete();
            }
        }
        $user_projek->delete();
        // ========= [project_card] ===========
        foreach ( $projek->project_card as $projek_card) {
            $projek_card->card_view->delete();
        }
        $projek->project_card()->delete();
        // ========= [status-kemajuan-kerja] ===========
        foreach ( $projek->status_kemajuan_kerja_projek as $fasa) {
            foreach ($fasa->kumpulan_fasa as $k_fasa) {
                $k_fasa->sub_kumpulan_fasa()->delete();
            }
            $fasa->kumpulan_fasa()->delete();
        }
        $projek->status_kemajuan_kerja_projek()->delete();
        // ========= [status-kemajuan-kewangan] ===========
        $projek->status_kemajuan_kewangan_projek()->delete();
        // ========= [editor_comment] ===========
        $projek->editor_comment()->delete();
        // ========= [bookmark] ===========
        $projek->bookmark()->forcedelete();
        // ========= [project] ===========
        $projek->delete();
        
        return redirect("/admin/projek");
    }

    public function unpublishProjek(project $projek) {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $projek->publish = 0;

        $projek->save();

        \LogActivity::addToLog(Auth::user()->name.' unpublish a projek ['.$projek->tajuk_projek.']');
        
        return redirect('admin/projek/' . $projek->id);
    }


}
