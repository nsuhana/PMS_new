<?php

namespace App\Http\Controllers;

use App\Models\user_project;
use App\Http\Requests\Storeuser_projectRequest;
use App\Http\Requests\Updateuser_projectRequest;

class UserProjectController extends Controller
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
     * @param  \App\Http\Requests\Storeuser_projectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeuser_projectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user_project  $user_project
     * @return \Illuminate\Http\Response
     */
    public function show(user_project $user_project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user_project  $user_project
     * @return \Illuminate\Http\Response
     */
    public function edit(user_project $user_project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateuser_projectRequest  $request
     * @param  \App\Models\user_project  $user_project
     * @return \Illuminate\Http\Response
     */
    public function update(Updateuser_projectRequest $request, user_project $user_project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user_project  $user_project
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_project $user_project)
    {
        //
    }
}
