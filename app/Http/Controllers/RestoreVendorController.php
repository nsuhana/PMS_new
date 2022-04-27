<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\vendor_profile;

use Illuminate\Support\Facades\Auth;

class RestoreVendorController extends Controller
{
    public function index() {

        $vendor = vendor::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate('20');

        $view = 'admin.vendor.trash.index';
        return view($view,[
            'vendors' => $vendor,
        ]);
    }

    public function restoreVendor($id) {

        // ========= [vendor_profile] ===========
        vendor_profile::onlyTrashed()->where('vendor_id', $id)->restore();
        // ========= [vendor] ===========
        vendor::onlyTrashed()->find($id)->restore();

        \LogActivity::addToLog(Auth::user()->name.' restore a vendor from trash');

        return redirect('/admin/vendor/'.$id);
    }

    public function forceDestroyVendor($id) {

        // ========= [vendor_profile] ===========
        vendor_profile::onlyTrashed()->where('vendor_id', $id)->forcedelete();
        // ========= [vendor] ===========
        vendor::onlyTrashed()->find($id)->forcedelete();

        \LogActivity::addToLog(Auth::user()->name.' delete a vendor from trash');

        return redirect('/admin/vendor/deleted');

    }

}
