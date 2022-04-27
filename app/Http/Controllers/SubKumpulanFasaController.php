<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project;
use App\Models\status_kemajuan_kerja_projek;
use App\Models\kumpulan_fasa;
use App\Models\sub_kumpulan_fasa;
use App\Http\Requests\Storesub_kumpulan_fasaRequest;
use App\Http\Requests\Updatesub_kumpulan_fasaRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SubKumpulanFasaController extends Controller
{
    public function create(project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek, kumpulan_fasa $kumpulan_fasa)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.status-kemajuan-kerja-projek.kumpulan-fasa.sub-kumpulan-fasa.create', [
            'project' => $projek,
            'fasan' => $status_kemajuan_kerja_projek,
            'kumpulan_fasan' => $kumpulan_fasa,
        ]);
    }

    public function store(Request $request, project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek, kumpulan_fasa $kumpulan_fasa)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'nama_aktiviti' => ['required', 'string', 'max:225'],
            'tarikh_mula_rancang' => ['nullable', 'string'],
            'tarikh_tamat_rancang' => ['nullable', 'string'],
            'peratus_rancang'  => ['nullable', 'numeric', 'between:0,100.00'],
            'tarikh_mula_sebenar'  => ['nullable', 'string'],
            'tarikh_tamat_sebenar' => ['nullable', 'string'],
            'peratus_sebenar'  => ['nullable', 'numeric', 'between:0,100.00'],
            'status'  => ['nullable', 'string', 'max:225'],
            'catatan' => ['nullable', 'string', 'max:225'],
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' =>$validator->messages(),
            ]);
        }
        else {
            sub_kumpulan_fasa::create([
                'kumpulan_fasa_id' => $kumpulan_fasa->id,
                'tajuk_kumpulan' => $request->nama_aktiviti,
                'tarikh_mula_rancang' => $request->tarikh_mula_rancang ,
                'tarikh_tamat_rancang' => $request->tarikh_tamat_rancang ,
                'peratus_rancang' => $request->peratus_rancang ,
                'tarikh_mula_sebenar' => $request->tarikh_mula_sebenar ,
                'tarikh_tamat_sebenar' => $request->tarikh_tamat_sebenar ,
                'peratus_sebenar' => $request->peratus_sebenar ,
                'status' => $request->status ,
                'catatan' => $request->catatan ,
            ]);

            \LogActivity::addToLog(Auth::user()->name.' create a Sub Kumpulan Fasa ['.$projek->tajuk_projek.']');

            return response()->json([
                'status'=>200,
                'message'=>'Data berjaya dimasukkan!',
            ]);
        }
    }

    public function edit(project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek, kumpulan_fasa $kumpulan_fasa, sub_kumpulan_fasa $sub_kumpulan_fasa)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.status-kemajuan-kerja-projek.kumpulan-fasa.sub-kumpulan-fasa.edit', [
            'project' => $projek,
            'fasan' => $status_kemajuan_kerja_projek,
            'kumpulan_fasan' => $kumpulan_fasa,
            'sub_kumpulan_fasan' => $sub_kumpulan_fasa,
        ]);
    }


    public function update(Request $request, project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek, kumpulan_fasa $kumpulan_fasa, sub_kumpulan_fasa $sub_kumpulan_fasa)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'nama_aktiviti' => ['required', 'string', 'max:225'],
            'tarikh_mula_rancang' => ['nullable', 'string'],
            'tarikh_tamat_rancang' => ['nullable', 'string'],
            'peratus_rancang'  => ['nullable', 'numeric', 'between:0,100.00'],
            'tarikh_mula_sebenar'  => ['nullable', 'string'],
            'tarikh_tamat_sebenar' => ['nullable', 'string'],
            'peratus_sebenar'  => ['nullable', 'numeric', 'between:0,100.00'],
            'status'  => ['nullable', 'string', 'max:225'],
            'catatan' => ['nullable', 'string', 'max:225'],
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' =>$validator->messages(),
            ]);
        }
        else {
            $sub_kumpulan_fasa->tajuk_kumpulan = $request->nama_aktiviti;
            $sub_kumpulan_fasa->tarikh_mula_rancang = $request->tarikh_mula_rancang;
            $sub_kumpulan_fasa->tarikh_tamat_rancang = $request->tarikh_tamat_rancang;
            $sub_kumpulan_fasa->tarikh_mula_sebenar = $request->tarikh_mula_sebenar;
            $sub_kumpulan_fasa->tarikh_tamat_sebenar = $request->tarikh_tamat_sebenar;
            $sub_kumpulan_fasa->peratus_rancang = $request->peratus_rancang;
            $sub_kumpulan_fasa->peratus_sebenar = $request->peratus_sebenar;
            $sub_kumpulan_fasa->status = $request->status;
            $sub_kumpulan_fasa->catatan = $request->catatan;
            $sub_kumpulan_fasa->save();

            \LogActivity::addToLog(Auth::user()->name.' edit a Sub Kumpulan Fasa ['.$projek->tajuk_projek.']');

            return response()->json([
                'status'=>200,
                'message'=>'Data updated!',
            ]);
        }
    }

    public function destroy(project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek, kumpulan_fasa $kumpulan_fasa, sub_kumpulan_fasa $sub_kumpulan_fasa)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $sub_kumpulan_fasa->forcedelete();

        \LogActivity::addToLog(Auth::user()->name.' delete a Sub Kumpulan Fasa ['.$projek->tajuk_projek.']');

        return response()->json([
            'status'=>200,
            'message'=>'Data deleted!',
        ]);
    }
}
