<?php

namespace App\Http\Controllers;

use App\Models\LandingContent;
use App\Http\Requests\StoreLandingContentRequest;
use App\Http\Requests\UpdateLandingContentRequest;

class LandingContentController extends Controller
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
     * @param  \App\Http\Requests\StoreLandingContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLandingContentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingContent  $landingContent
     * @return \Illuminate\Http\Response
     */
    public function show(LandingContent $landingContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingContent  $landingContent
     * @return \Illuminate\Http\Response
     */
    public function edit(LandingContent $landingContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLandingContentRequest  $request
     * @param  \App\Models\LandingContent  $landingContent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLandingContentRequest $request, LandingContent $landingContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingContent  $landingContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandingContent $landingContent)
    {
        //
    }
}
