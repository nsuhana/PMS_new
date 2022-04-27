<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models;

class HomeDashboardController extends Controller
{
    public function index() {

        $view = 'dashboard';

        // ============== 1st row ============

        // ============== 6th row ============
        if(Auth::check() && Auth::user()->isNotSuperUser()) {
            $project = Models\project::join('user_projects','user_projects.project_id', '=', 'projects.id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->select('projects.*')
            ->orderBy('projects.updated_at', 'desc')
            ->take(6)
            ->get();
            //$jumlah_projek = Models\userProject::count();
            $jumlah_projek = Models\project::join('user_projects','user_projects.project_id', '=', 'projects.id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->count();
            $jumlah_projek_selesai = Models\project::join('user_projects','user_projects.project_id', '=', 'projects.id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->where('status', 'selesai')->count();
            // ============== 2nd row ============
            $jumlah_pembekal = Models\project::join('user_projects','user_projects.project_id', '=', 'projects.id')
            ->join('vendors','vendors.id', '=', 'projects.vendor_id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->count();
            $jumlah_bon = Models\project::join('user_projects','user_projects.project_id', '=', 'projects.id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->sum('bon_pelaksanaan_projek');
            $jumlah_nilai_kontrak = Models\status_kemajuan_kewangan_projek::join('user_projects','user_projects.project_id', '=', 'status_kemajuan_kewangan_projeks.project_id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->sum('nilai_kontrak');
            $jumlah_telah_dibayar = Models\status_kemajuan_kewangan_projek::join('user_projects','user_projects.project_id', '=', 'status_kemajuan_kewangan_projeks.project_id')
            ->where('user_projects.user_id', Auth::user()->id)
            ->sum('telah_dibayar');
            // ============== 3rd row ============
            // @pembekalan
            $jumlah_pembekalan = Models\project::where('skop_projek', 'pembekalan')->count();
            $pembekalan_aktif = Models\project::where('skop_projek', 'pembekalan')->where('status', 'aktif')->count();
            $pembekalan_tidak_aktif = Models\project::where('skop_projek', 'pembekalan')->where('status', 'tidak aktif')->count();
            $pembekalan_selesai = Models\project::where('skop_projek', 'pembekalan')->where('status', 'selesai')->count();
            //@perkhidmatan
            $jumlah_perkhidmatan = Models\project::where('skop_projek', 'perkhidmatan')->count();
            $perkhidmatan_aktif = Models\project::where('skop_projek', 'perkhidmatan')->where('status', 'aktif')->count();
            $perkhidmatan_tidak_aktif = Models\project::where('skop_projek', 'perkhidmatan')->where('status', 'tidak aktif')->count();
            $perkhidmatan_selesai = Models\project::where('skop_projek', 'perkhidmatan')->where('status', 'selesai')->count();
            // ============== 4th row ============
            $random_projek = Models\project::join('user_projects','user_projects.project_id', '=', 'projects.id')
            ->where('user_projects.user_id', Auth::user()->id)->inRandomOrder()->where('publish', '1')->first();
            // ============== 5th row ============
            $pembekalan_lebih_5 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'pembekalan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','>=', 500000)
            ->count();

            $pembekalan_kurang_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'pembekalan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<=', 200000)
            ->count();

            $pembekalan_antara_5_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'pembekalan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<', 500000)
            ->having('sum_n_k','>', 200000)
            ->count();

            $perkhidmatan_lebih_5 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'perkhidmatan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','>=', 500000)
            ->count();

            $perkhidmatan_kurang_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'perkhidmatan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<=', 200000)
            ->count();

            $perkhidmatan_antara_5_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'perkhidmatan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<', 500000)
            ->having('sum_n_k','>', 200000)
            ->count();

        }
        else {
            $project = Models\project::inRandomOrder()->where('publish', '1')->take(6)->get();

            $jumlah_projek = Models\project::count();
            $jumlah_projek_selesai = Models\project::where('status', 'selesai')->count();
            // ============== 2nd row ============
            $jumlah_pembekal = Models\vendor::count();
            $jumlah_bon = Models\project::sum('bon_pelaksanaan_projek');
            $jumlah_nilai_kontrak = Models\status_kemajuan_kewangan_projek::sum('nilai_kontrak');
            $jumlah_telah_dibayar = Models\status_kemajuan_kewangan_projek::sum('telah_dibayar');
            // ============== 3rd row ============
            // @pembekalan
            $jumlah_pembekalan = Models\project::where('skop_projek', 'pembekalan')->count();
            $pembekalan_aktif = Models\project::where('skop_projek', 'pembekalan')->where('status', 'aktif')->count();
            $pembekalan_tidak_aktif = Models\project::where('skop_projek', 'pembekalan')->where('status', 'tidak aktif')->count();
            $pembekalan_selesai = Models\project::where('skop_projek', 'pembekalan')->where('status', 'selesai')->count();
            //@perkhidmatan
            $jumlah_perkhidmatan = Models\project::where('skop_projek', 'perkhidmatan')->count();
            $perkhidmatan_aktif = Models\project::where('skop_projek', 'perkhidmatan')->where('status', 'aktif')->count();
            $perkhidmatan_tidak_aktif = Models\project::where('skop_projek', 'perkhidmatan')->where('status', 'tidak aktif')->count();
            $perkhidmatan_selesai = Models\project::where('skop_projek', 'perkhidmatan')->where('status', 'selesai')->count();
            // ============== 4th row ============
            $random_projek = Models\project::inRandomOrder()->where('publish', '1')->first();
            // ============== 5th row ============
            $pembekalan_lebih_5 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'pembekalan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','>=', 500000)
            ->count();

            $pembekalan_kurang_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'pembekalan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<=', 200000)
            ->count();

            $pembekalan_antara_5_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'pembekalan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<', 500000)
            ->having('sum_n_k','>', 200000)
            ->count();

            $perkhidmatan_lebih_5 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'perkhidmatan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','>=', 500000)
            ->count();

            $perkhidmatan_kurang_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'perkhidmatan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<=', 200000)
            ->count();

            $perkhidmatan_antara_5_2 = Models\project::join('status_kemajuan_kewangan_projeks', 'status_kemajuan_kewangan_projeks.project_id', '=', 'projects.id')
            ->where('projects.skop_projek', 'perkhidmatan')
            ->groupBy('projects.id')
            ->select(DB::raw('sum(status_kemajuan_kewangan_projeks.nilai_kontrak) as sum_n_k'))
            ->having('sum_n_k','<', 500000)
            ->having('sum_n_k','>', 200000)
            ->count();
        }

        return view($view,[
            // 1st row
            'jumlah_projek' => $jumlah_projek,
            'jumlah_projek_selesai' => $jumlah_projek_selesai,
            // 2nd row
            'jumlah_pembekal' => $jumlah_pembekal,
            'jumlah_telah_dibayar' => $jumlah_telah_dibayar,
            'jumlah_bon' => $jumlah_bon,
            'jumlah_nilai_kontrak' => $jumlah_nilai_kontrak,
            // 3rd row
            // @pembekalan
            'jumlah_pembekalan' => $jumlah_pembekalan,
            'pembekalan_aktif' => $pembekalan_aktif,
            'pembekalan_tidak_aktif' => $pembekalan_tidak_aktif,
            'pembekalan_selesai' => $pembekalan_selesai,
            // @perkhidmatan
            'jumlah_perkhidmatan' => $jumlah_perkhidmatan,
            'perkhidmatan_aktif' => $perkhidmatan_aktif,
            'perkhidmatan_tidak_aktif' => $perkhidmatan_tidak_aktif,
            'perkhidmatan_selesai' => $perkhidmatan_selesai,
            // 4th row
            'random_projek' => $random_projek,
            // 5th row
            'pembekalan_lebih_5' => $pembekalan_lebih_5,
            'pembekalan_kurang_2' => $pembekalan_kurang_2,
            'pembekalan_antara_5_2' => $pembekalan_antara_5_2,
            'perkhidmatan_lebih_5' => $perkhidmatan_lebih_5,
            'perkhidmatan_kurang_2' => $perkhidmatan_kurang_2,
            'perkhidmatan_antara_5_2' => $perkhidmatan_antara_5_2,
            // 6th row
            'projects' => $project,
        ]);
    }
}
