<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Resources\DestinationsCollection;
use App\Http\Resources\DestinationResource;

class DestinationController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return new AgenciesCollection(Agency::all());
        return new DestinationsCollection(Destination::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $destination = Destination::find($destination->id);
        return new DestinationResource($destination);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
