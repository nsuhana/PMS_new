<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\project;
use App\Models\status_kemajuan_kewangan_projek;
use App\Http\Requests\Storestatus_kemajuan_kewangan_projekRequest;
use App\Http\Requests\Updatestatus_kemajuan_kewangan_projekRequest;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StatusKemajuanKewanganProjekController extends Controller
{
    public function index(project $projek)
    {
        return view('projek.status-kemajuan-kewangan-projek.index', [
            'project' => $projek,
        ]);
    }

    public function read(project $projek, status_kemajuan_kewangan_projek $status_kemajuan_kewangan_projek)
    {
        $kewangan = status_kemajuan_kewangan_projek::where('project_id', $projek->id)->get();

        return view('projek.status-kemajuan-kewangan-projek.read', [
            'project' => $projek,
            'kewangnan' => $kewangan,
        ]);
    }

    public function create(project $projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.status-kemajuan-kewangan-projek.create', [
            'project' => $projek,
        ]);
    }

    public function store(Request $request, project $projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'tahun' => ['required', 'numeric', 'between:0,9999'],
            'bulan' => ['required', 'string', Rule::in(['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogos', 'Sep', 'Okt', 'Nov', 'Dec'])],
            'nilai_kontrak' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'jadual_tuntutan' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'telah_dituntut' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'belum_dituntut' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'telah_dibayar' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'belum_dibayar' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'tarikh' => ['nullable', 'string'],
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' =>$validator->messages(),
                'title_message' => 'Error message!',
            ]);
        }
        else {

            status_kemajuan_kewangan_projek::create([
                'project_id' => $projek->id,
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'nilai_kontrak' => $request->nilai_kontrak,
                'jadual_tuntutan' => $request->jadual_tuntutan,
                'telah_dituntut' => $request->telah_dituntut,
                'belum_dituntut' => $request->belum_dituntut,
                'telah_dibayar' => $request->telah_dibayar,
                'belum_dibayar' => $request->belum_dibayar,
                'tarikh' => $request->tarikh,
            ]);

            \LogActivity::addToLog(Auth::user()->name.' create a new status kewangan kerja ['.$projek->tajuk_projek.']'); 

            return response()->json([
                'status'=>200,
                'message'=>'New data created!',
                'title_message' => 'Successful message',
            ]);
        }
    }

    public function show(project $projek, status_kemajuan_kewangan_projek $status_kemajuan_kewangan_projek)
    {
        return view('projek.status-kemajuan-kewangan-projek.detail', [
            'project' => $projek,
            'kewangan' => $status_kemajuan_kewangan_projek,
        ]);
    }

    public function edit(project $projek, status_kemajuan_kewangan_projek $status_kemajuan_kewangan_projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        return view('projek.status-kemajuan-kewangan-projek.edit', [
            'project' => $projek,
            'kewangan' => $status_kemajuan_kewangan_projek,
        ]);
    }

    public function update(Request $request, project $projek, status_kemajuan_kewangan_projek $status_kemajuan_kewangan_projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $validator = Validator::make($request->all(), [
            'tahun' => ['required', 'numeric', 'between:0,9999'],
            'bulan' => ['required', 'string', Rule::in(['Jan', 'Feb', 'Mac', 'Apr', 'Mei', 'Jun', 'Jul', 'Ogos', 'Sep', 'Okt', 'Nov', 'Dec'])],
            'nilai_kontrak' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'jadual_tuntutan' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'telah_dituntut' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'belum_dituntut' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'telah_dibayar' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'belum_dibayar' => ['nullable', 'numeric', 'between:0,999999999999.99'],
            'tarikh' => ['nullable', 'string'],
        ]);

        
        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'error' =>$validator->messages(),
            ]);
        }
        else {
            $status_kemajuan_kewangan_projek->tahun = $request->tahun;
            $status_kemajuan_kewangan_projek->bulan = $request->bulan;
            $status_kemajuan_kewangan_projek->nilai_kontrak = $request->nilai_kontrak;
            $status_kemajuan_kewangan_projek->jadual_tuntutan = $request->jadual_tuntutan;
            $status_kemajuan_kewangan_projek->telah_dituntut = $request->telah_dituntut;
            $status_kemajuan_kewangan_projek->belum_dituntut = $request->belum_dituntut;
            $status_kemajuan_kewangan_projek->telah_dibayar = $request->telah_dibayar;
            $status_kemajuan_kewangan_projek->belum_dibayar = $request->belum_dibayar;
            $status_kemajuan_kewangan_projek->tarikh = $request->tarikh;
            $status_kemajuan_kewangan_projek->save();

            \LogActivity::addToLog(Auth::user()->name.' edit a status kewangan kerja ['.$projek->tajuk_projek.']'); 

            return response()->json([
                'status'=>200,
                'message'=>'Data updated!',
            ]);
        }
    }

    public function destroy(project $projek, status_kemajuan_kewangan_projek $status_kemajuan_kewangan_projek)
    {

        if (! Gate::allows('projek-collaborator', $projek)) {
            abort(403);
        }

        $status_kemajuan_kewangan_projek->forcedelete();

        \LogActivity::addToLog(Auth::user()->name.' delete a status kewangan kerja ['.$projek->tajuk_projek.']'); 

        return response()->json([
            'status'=>200,
            'message'=>'Data deleted!',
            'title_message' => 'Message',
        ]);
    }
}
