<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class PublicSearchController extends Controller
{
    function index(Request $request) {
        
        if($this->isPublicSearchRequest()) {
            $request->validate([
                'keyword' => ['nullable', 'string'],
            ]);
        }
        else {
            $request->validate([
                'keyword' => ['required', 'string'],
            ]);
        }
        
        $view = 'search.index';

        return view($view, [
            'keyword' => addslashes($request->keyword),
        ]);
    }

    function search(Request $request){
        $request->validate([
            'filter_projek_status' => ['nullable'],
            'filter_projek_skop' => ['nullable'],
            'filter_tahun' => ['nullable'],
            'sortBy' => ['nullable', Rule::in(['tajuk_projek', 'nama_pembekal_dilantik', 'recently_added'])],
            'keyword' => ['nullable', 'string'],
        ]);

        $x = $request->filter_projek_status;
        $y = $request->filter_projek_skop;
        $z1 = ($request->filter_tahun).'-12-31';
        $z2 = ($request->filter_tahun).'-01-01';
        $a = $request->sortBy;
        $b = $request->keyword;

        if($request->keyword == null || strlen($request->keyword) >= 3){

            $result = Project::when(!Auth::check(), function ($q) {
                return $q->where('projects.publish', '1');
            }, function ($q) {
                return $q->when(Auth::user()->isNormalUser(), function ($q2) {
                    return $q2->where('projects.publish', '1');
                }, function ($q2) {
                    return $q2;
                });
            })->when($request->filter_projek_status != null, function($q) use ($x) {
                return $q->where('projects.status', $x);            
            }, function ($q) {
                return $q;
            })->when($request->filter_projek_skop != null, function ($q) use ($y) {
                return $q->where('skop_projek', $y);
            }, function ($q) {
                return $q;
            })->when($request->filter_tahun != null, function ($q) use ($z1, $z2){
                return $q->where('tempoh_mula_kontrak', '<=', $z1)->where('tempoh_tamat_kontrak', '>=', $z2);
                // return $q->where('tempoh_mula_kontrak', '<=', $z1)->where('tempoh_tamat_kontrak', '<=', $z2);
            }, function ($q) {
                return $q;
            })->when($request->sortBy != null, function ($q) use ($a) {
                return $q->when($a === 'nama_pembekal_dilantik', function ($q2) use ($a) {
                    return $q2->join('vendors','vendors.id', '=', 'projects.vendor_id')->orderBy('nama_pembekal_dilantik')->select('projects.*');;
                    // return $q2;
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
                return $q->where('tajuk_projek', 'LIKE',  '%'.$b.'%');
            }, function ($q) use ($b) {
                return $q;
            })
            ->select('projects.id', 'vendor_id', 'tajuk_projek', 'tempoh_mula_kontrak', 'tempoh_tamat_kontrak', 'bon_pelaksanaan_projek', 'skop_projek', 'projects.status')
            ->paginate(20);
        }
        else if (strlen($request->keyword) < 3) {
            $result = collect([]);
        }
        else {
            $result = collect([]);
        }
        
        $view = 'search.read';

        return view($view, [
            'results' => $result,
        ]);
    }

    function show(Request $request) {
        $request->validate([
            'id' => ['nullable'],
        ]);

        $x = $request->id;

        $projek = project::where('id', $x)->first();

        $view = "search.detail";

        return view($view, [
            'projek' => $projek,
        ]);

    }
}
