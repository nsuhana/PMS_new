<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project;
use App\Models\status_kemajuan_kerja_projek;
use App\Models\kumpulan_fasa;
use App\Models\sub_kumpulan_fasa;
use App\Http\Requests\Storestatus_kemajuan_kerja_projekRequest;
use App\Http\Requests\Updatestatus_kemajuan_kerja_projekRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StatusKemajuanKerjaProjekController extends Controller
{
    public function index(project $projek)
    {
        return view('projek.status-kemajuan-kerja-projek.index', [
            'project' => $projek,
        ]);
    }

    public function read(project $projek)
    {
        $fasa = status_kemajuan_kerja_projek::where('project_id', $projek->id)->get();
        $fasa_id = [];
        foreach ($fasa as $fasas) {
            array_push($fasa_id, $fasas->id);
        }
        $kumpulan_fasa =  kumpulan_fasa::whereIn('fasa_projek_id', $fasa_id)->get();
        $kumpulan_id = [];
        foreach ($kumpulan_fasa as $kumpulan_fasas) {
            array_push($kumpulan_id, $kumpulan_fasas->id);
        }
        $sub_kumpulan_fasa =  sub_kumpulan_fasa::whereIn('kumpulan_fasa_id', $kumpulan_id)->get();

        return view('projek.status-kemajuan-kerja-projek.read', [
            'project' => $projek,
            'fasan' => $fasa,
            'kumpulan_fasan' => $kumpulan_fasa,
            'sub_kumpulan_fasan' => $sub_kumpulan_fasa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(project $projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.status-kemajuan-kerja-projek.create', [
            'project' => $projek,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storestatus_kemajuan_kerja_projekRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, project $projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'nama_fasa_projek' => ['required', 'string', 'max:225'],
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' =>$validator->messages(),
            ]);
        }
        else {

            status_kemajuan_kerja_projek::create([
                'project_id' => $projek->id,
                'fasa_projek' => $request->nama_fasa_projek,
            ]);

            \LogActivity::addToLog(Auth::user()->name.' create a Fasa ['.$projek->tajuk_projek.']'); 

            return response()->json([
                'status'=>200,
                'message'=>'Data berjaya dimasukkan!',
            ]);
        }

    }

    public function show(status_kemajuan_kerja_projek $status_kemajuan_kerja_projek)
    {
        //
    }

    public function edit(project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek)
    {
        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.status-kemajuan-kerja-projek.edit', [
            'project' => $projek,
            'fasa' => $status_kemajuan_kerja_projek,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatestatus_kemajuan_kerja_projekRequest  $request
     * @param  \App\Models\status_kemajuan_kerja_projek  $status_kemajuan_kerja_projek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'nama_fasa_projek' => ['required', 'string', 'max:225'],
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' =>$validator->messages(),
            ]);
        }
        else {
            $status_kemajuan_kerja_projek->fasa_projek = $request->nama_fasa_projek;
            $status_kemajuan_kerja_projek->save();

            \LogActivity::addToLog(Auth::user()->name.' edit a Fasa ['.$projek->tajuk_projek.']'); 

            return response()->json([
                'status'=>200,
                'message'=>'Data updated!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\status_kemajuan_kerja_projek  $status_kemajuan_kerja_projek
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $projek, status_kemajuan_kerja_projek $status_kemajuan_kerja_projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        foreach($status_kemajuan_kerja_projek->kumpulan_fasa() as $k_fasa) {
            $k_fasa->forcedelete();
        }

        $status_kemajuan_kerja_projek->kumpulan_fasa()->forcedelete();

        $status_kemajuan_kerja_projek->forcedelete();

        \LogActivity::addToLog(Auth::user()->name.' delete a Fasa ['.$projek->tajuk_projek.']'); 

        return response()->json([
            'status'=>200,
            'message'=>'Data deleted!',
        ]);
    }
}
