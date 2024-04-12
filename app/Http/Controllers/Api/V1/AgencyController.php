<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Agency;
use Illuminate\Http\Request;
use App\Http\Resources\AgenciesCollection;
use App\Http\Resources\AgencyResource;

class AgencyController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AgenciesCollection(Agency::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        $agency = Agency::find($agency->id);
        return new AgencyResource($agency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
