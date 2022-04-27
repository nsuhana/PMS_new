<?php

namespace App\Http\Controllers;

use App\Models\bookmark;
use App\Http\Requests\StorebookmarkRequest;
use App\Http\Requests\UpdatebookmarkRequest;

class BookmarkController extends Controller
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
     * @param  \App\Http\Requests\StorebookmarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebookmarkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(bookmark $bookmark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function edit(bookmark $bookmark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookmarkRequest  $request
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebookmarkRequest $request, bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(bookmark $bookmark)
    {
        //
    }
}
