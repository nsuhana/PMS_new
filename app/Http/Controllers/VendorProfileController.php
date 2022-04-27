<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\vendor_profile;
use App\Http\Requests\Storevendor_profileRequest;
use App\Http\Requests\Updatevendor_profileRequest;

class VendorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storevendor_profileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storevendor_profileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vendor_profile  $vendor_profile
     * @return \Illuminate\Http\Response
     */
    public function show(vendor_profile $vendor_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vendor_profile  $vendor_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor_profile $vendor_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatevendor_profileRequest  $request
     * @param  \App\Models\vendor_profile  $vendor_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Updatevendor_profileRequest $request, vendor_profile $vendor_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vendor_profile  $vendor_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor_profile $vendor_profile)
    {
        //
    }
}
