<?php

namespace App\Http\Controllers;

use App\Models\card_view;
use App\Http\Requests\Storecard_viewRequest;
use App\Http\Requests\Updatecard_viewRequest;

class CardViewController extends Controller
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
     * @param  \App\Http\Requests\Storecard_viewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storecard_viewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\card_view  $card_view
     * @return \Illuminate\Http\Response
     */
    public function show(card_view $card_view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\card_view  $card_view
     * @return \Illuminate\Http\Response
     */
    public function edit(card_view $card_view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatecard_viewRequest  $request
     * @param  \App\Models\card_view  $card_view
     * @return \Illuminate\Http\Response
     */
    public function update(Updatecard_viewRequest $request, card_view $card_view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\card_view  $card_view
     * @return \Illuminate\Http\Response
     */
    public function destroy(card_view $card_view)
    {
        //
    }
}
