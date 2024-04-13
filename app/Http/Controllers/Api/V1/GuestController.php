<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Resources\GuestResource;

class GuestController
{
    /**
     * Display a listing of the resource.
     */
    public function indexById(Request $request)
    {
        //get guest by profile id
        $guest = Guest::where('profile_id', $request->profile_id)->get();
        return GuestResource::collection($guest);
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
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
