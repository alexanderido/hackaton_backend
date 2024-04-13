<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreAgenciesRequest;
use App\Models\Agency;
use Illuminate\Http\Request;
use App\Http\Resources\AgenciesCollection;
use App\Http\Resources\AgencyResource;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(StoreAgenciesRequest $request)
    {
        $agency = $request->user()->agency()->create($request->all());

        if ($request->user()->role !== 'agency') {
            return response()->json(['error' => 'You are not allowed to create an agency'], Response::HTTP_FORBIDDEN);
        }

        $agency->logo = $request->file('logo')->store('agency_logo', 'public');
        $agency->save();

        $agency->cover = $request->file('cover')->store('agency_cover', 'public');
        $agency->save();

        return response()->json(new AgencyResource($agency), Response::HTTP_CREATED);
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
        $agency->update($request->all());
        if ($request->hasFile('logo')) {
            $agency->logo = $request->file('logo')->store('agency_logo', 'public');
            $agency->save();
        }
        if ($request->hasFile('cover')) {
            $agency->cover = $request->file('cover')->store('agency_cover', 'public');
            $agency->save();
        }
        return response()->json(new AgencyResource($agency), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $agency->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
