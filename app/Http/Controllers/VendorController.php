<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\vendor;
use App\Models\project;
use App\Models\vendor_profile;
use App\Http\Requests\StorevendorRequest;
use App\Http\Requests\UpdatevendorRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreprojectRequest;
use App\Http\Requests\UpdateprojectRequest;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Validation\ValidationException;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'filter_status' => ['nullable', Rule::in(['0', '1'])],
            'sortBy' => ['nullable', Rule::in(['nama_pembekal_dilantik', 'total_projek', 'recently_added'])],
            'keyword' => ['nullable', 'string'],
        ]);

        $y = $request->filter_status;
        $a = $request->sortBy;
        $b = $request->keyword;

        $vendor = vendor::when($request->filter_status != null, function ($q) use ($y) {
            return $q->where('status', $y);
        }, function ($q) {
            return $q;
        })->when($request->sortBy != null, function ($q) use ($a) {
            return $q->when($a === 'total_projek', function ($q2) use ($a) {
                return $q2->withCount('project')->orderBy('project_count');
            }, function ($q2) use ($a) {
                return $q2->when($a === 'recently_added', function ($q3) use ($a) {
                    return $q3->orderBy('id', 'desc');                    
                }, function ($q3) use ($a) {
                    return $q3->orderBy($a);
                });
            });
        }, function ($q) {
            return $q->orderBy('nama_pembekal_dilantik');
        })->when($request->keyword != null, function ($q) use ($b) {
            return $q->where('nama_pembekal_dilantik', 'LIKE', '%'.$b.'%');
        }, function ($q) {
            return $q;
        })->paginate(20);

        $view = $this->isAdminRequest() ? 'admin.vendor.index' : 'vendor.index';

        return view($view, [
            'vendors' => $vendor,
            'filter_status' => $request->filter_status,
            'sortBy' => $request->sortBy, 
            'keyword' => $request->keyword,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = vendor::all();

        return view('admin.vendor.create', [
            'vendor' => $vendor,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorevendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pembekal' => ['required', 'string', 'max:255', 'unique:vendors,nama_pembekal_dilantik'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5048'],
            'no_pendaftaran_syarikat' => ['nullable','string', 'max:255'],  
            'maklumat_bank' => ['nullable','string', 'max:255'],
            'no_akaun_kewangan' => ['nullable','string', 'max:255'],
            'kelas' => ['nullable', Rule::in(['A', 'B', 'C', 'D'])],
            'bidang' => ['nullable','string', 'max:255'],
            'no_telefon' => ['nullable', 'numeric'],
            'faks' => ['nullable','numeric'],
            'alamat' => ['nullable','string', 'max:255'],
            'website' => ['nullable','string', 'max:255'],
        ]);

        if($request->image) {

            $newImageName = time() . '-' . $request->nama_pembekal . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);
    
        }

        // dd ($newImageName);

        // dd($request->all());


        $vendor = vendor::create([
            'nama_pembekal_dilantik' => $request->nama_pembekal,
            'description' => $request->description,
        ]);

        $vendor_profile = vendor_profile::create([
            'vendor_id' => $vendor->id,
            'vendor_avatar' => $request->image ? $newImageName : null,
            'no_pendaftaran_syarikat' => $request->no_pendaftaran_syarikat,
            'maklumat_bank'=> $request->maklumat_bank,
            'no_akaun_kewangan'=> $request->no_akaun_kewangan,
            'kelas' => $request->kelas,
            'bidang' => $request->bidang,
            'telefon' => $request->no_telefon, 
            'faks' => $request->faks,
            'alamat' => $request->alamat,
            'website' => $request->website,
        ]);

        \LogActivity::addToLog(Auth::user()->name.' create a vendor from admin panel ['.$vendor->nama_pembekal_dilantik.']');

        return redirect('/admin/vendor');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        // dd($vendor->vendor_profile);
        $view = $this->isAdminRequest() ? 'admin.vendor.detail' : 'vendor.detail';
        return view($view, [
            'vendor' => $vendor,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        return view('admin.vendor.edit', [
            'vendor' => $vendor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevendorRequest  $request
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        $request->validate([
            'nama_pembekal' => ($request->nama_pembekal == $vendor->nama_pembekal_dilantik) ? ['required', 'string', 'max:255'] : ['required', 'string', 'max:255', 'unique:vendors,nama_pembekal_dilantik'],
            // 'nama_pembekal' => ['required', 'string', 'max:255', 'unique:vendors,nama_pembekal_dilantik'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:5048'],
            'no_telefon' => ['nullable', 'numeric'],
            'faks' => ['nullable','numeric'],
            'alamat' => ['nullable','string', 'max:255'],
            'website' => ['nullable','string', 'max:255'],
        ]);

        // dd($request->image);

        if($request->image) {

            $newImageName = time() . '-' . $request->nama_pembekal . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);
    
        }

        $vendor->nama_pembekal_dilantik = $request->nama_pembekal;
        $vendor->description = $request->description;
        $vendor->vendor_profile->telefon = $request->no_telefon;
        $vendor->vendor_profile->faks = $request->faks;
        $vendor->vendor_profile->alamat =  $request->alamat;
        $vendor->vendor_profile->website = $request->website;

        if($vendor->vendor_profile->vendor_avatar) {
            $vendor->vendor_profile->vendor_avatar = $request->image ? $newImageName: $vendor->vendor_profile->vendor_avatar;
        }
        else {
            $vendor->vendor_profile->vendor_avatar = $request->image ? $newImageName : null;
        }

        $vendor->save();
        $vendor->vendor_profile->save();
        // dd($request->all()); 

        \LogActivity::addToLog(Auth::user()->name.' edit a vendor from admin panel ['.$vendor->nama_pembekal_dilantik.']');

        return redirect('/admin/vendor/' . $vendor->id);

    }

    public function updateStatus(vendor $vendor)
    {
        // $projek->user_project->whereIn('user_id', Auth::user()->id)->where('user_role_project', 'owner')->isNotEmpty()

        if ($vendor->status === 1) {
            
            // if($vendor->project->isNotEmpty()) {
            //     throw ValidationException::withMessages([
            //         'message' => 'You cannot deactive this vendor because this object contain an active project(s)',
            //     ]);
            // };

            $vendor->status = 0;
        }
        else {
            $vendor->status = 1;
        }

        $vendor->save();

        \LogActivity::addToLog(Auth::user()->name.' update a vendor status from admin panel ['.$vendor->nama_pembekal_dilantik.']');
        
        return redirect('admin/vendor/' . $vendor->id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        if($vendor->project->isNotEmpty()) {

            \LogActivity::addToLog(Auth::user()->name.' attempt to delete a vendor from admin panel ['.$vendor->nama_pembekal_dilantik.']');

            throw ValidationException::withMessages([
                'message' => 'You cannot delete this vendor because it has an active project(s)',
            ]);

        };

        if(project::onlyTrashed()->where('vendor_id', $vendor->id)->exists()) {

            \LogActivity::addToLog(Auth::user()->name.' attempt to delete a vendor from admin panel ['.$vendor->nama_pembekal_dilantik.']');

            throw ValidationException::withMessages([
                'message' => 'You cannot delete this vendor because it has a project(s) inside the bin. (Recommendation: delete the project(s) first from the project bin)',
            ]);

        };

        \LogActivity::addToLog(Auth::user()->name.' delete a vendor from admin panel ['.$vendor->nama_pembekal_dilantik.']');

        $vendor->vendor_profile->delete();
        $vendor->delete();
        return redirect("/admin/vendor");
    }
}
