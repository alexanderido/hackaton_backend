<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreAgenciesRequest;
use App\Models\Agency;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Resources\AgenciesCollection;
use App\Http\Resources\AgencyResource;
use App\Models\Destination;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\DestinationResource;

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

    public function getAgencyTrips(Agency $agency)
    {

        if (auth()->user()->role !== 'agency') {
            return response()->json(['error' => 'You are not allowed to view agency trips'], Response::HTTP_FORBIDDEN);
        }

        if ($agency->id !== auth()->user()->agency->id) {
            return response()->json(['error' => 'You are not allowed to view agency trips'], Response::HTTP_FORBIDDEN);
        }

        $agencyID = $agency->id;
        $allDestinations = Agency::find($agencyID)->destinations;

        //in destination_trip_meta table, get all the destinations that belong to the agency

        $allTrips = [];

        foreach ($allDestinations as $destination) {

            $tripMeta = $destination->tripMeta;

            foreach ($tripMeta as $trip) {

                if (!in_array($trip->trip->id, $allTrips)) {
                    array_push($allTrips, $trip->trip->id);
                }
            }
        }
        $returnData = [];
        foreach ($allTrips as $trip) {

            $trips = Trip::find($trip);

            array_push($returnData, [
                'trip_id' => $trips->id,
                'travel' => $trips->profile->name,
                'trip_origin' => $trips->origin,
            ]);
        }

        return $returnData;
    }

    public function showAgencyTrip(Request $request, Agency $agency)
    {
        if (auth()->user()->role !== 'agency') {
            return response()->json(['error' => 'You are not allowed to view agency trips'], Response::HTTP_FORBIDDEN);
        }

        if ($agency->id !== auth()->user()->agency->id) {
            return response()->json(['error' => 'You are not allowed to view agency trips'], Response::HTTP_FORBIDDEN);
        }

        $trip = Trip::find($request->trip_id);
        $metas = $trip->metas;
        $destinationsList = [];
        foreach ($metas as $meta) {
            $destinations = $meta->destinations;
            foreach ($destinations as $destination) {

                if ($destination->agency_id === $agency->id) {

                    array_push($destinationsList, new DestinationResource($destination));
                }
            }
        }
        return  $destinationsList;
    }
}
