<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Resources\DestinationsCollection;
use App\Http\Resources\DestinationResource;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Gallery;

class DestinationController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('tags')) {
            $arrTags = explode(',', $request->tags);



            //get all destinations with all tags
            $destinations = Destination::whereHas('tags', function ($query) use ($arrTags) {
                $query->whereIn('tags.id', $arrTags);
            })->get();

            //return new DestinationsCollection($destinations);
            return new DestinationsCollection($destinations);
        }

        //return all destinations with pagination
        $destinations = Destination::limit(20)->get();
        return new DestinationsCollection($destinations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {
        $role = $request->user()->role;
        if ($role != 'agency') {
            return response()->json(['message' => 'You are not authorized to create a destination'], 403);
        }


        $request->merge(['agency_id' =>  $request->user()->agency->id]);
        $destination = Destination::create($request->all());

        $destination->save();
        $destination->cover = $request->file('cover')->store('destination_cover', 'public');
        $destination->logo = $request->file('logo')->store('destination_logo', 'public');
        $destination->save();

        return response()->json(new DestinationResource($destination), Response::HTTP_CREATED);
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
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {

        $role = $request->user()->role;
        if ($role != 'agency') {
            return response()->json(['message' => 'You are not authorized to update a destination'], 403);
        }
        if ($request->user()->agency->id != $destination->agency_id) {
            return response()->json(['message' => 'You are not authorized to update this destination'], 403);
        }



        $destination = Destination::find($destination->id);
        $destination->update($request->all());

        if ($request->hasFile('cover')) {
            $destination->cover = $request->file('cover')->store('destination_cover', 'public');
        }

        if ($request->hasFile('logo')) {
            $destination->logo = $request->file('logo')->store('destination_logo', 'public');
        };
        $destination->save();

        return response()->json(new DestinationResource($destination), Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $role = request()->user()->role;
        if ($role != 'agency') {
            return response()->json(['message' => 'You are not authorized to delete a destination'], 403);
        }
        if (request()->user()->agency->id != $destination->agency_id) {
            return response()->json(['message' => 'You are not authorized to delete this destination'], 403);
        }

        $destination = Destination::find($destination->id);
        $destination->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    public function addTags(Request $request, Destination $destination)
    {



        $destination = Destination::where('id', $request->destination_id)->first();

        if (empty($request->tags)) {
            return response()->json(['message' => 'Please provide tags'], 400);
        }

        if ($destination->agency_id != $request->user()->agency->id) {
            return response()->json(['message' => 'You are not authorized to add tags to this destination'], 403);
        }

        //clear all tags
        $destination->tags()->detach();

        $destination->tags()->attach($request->tags);
        return response()->json(new DestinationResource($destination), Response::HTTP_OK);
    }

    public function getAllPrice(Destination $destination)
    {

        return $destination->prices;
    }

    public function getPriceByDate(Request $request, Destination $destination)
    {
        $date = $request->date;

        //get price by date how $date are between start_date and end_date
        $price = $destination->prices->where('start_date', '<=', $date)->where('end_date', '>=', $date);

        return $price;
    }

    public function filterbyTags()
    {
        return 'asdf';
    }


    public function addPrices(Request $request, Destination $destination)
    {
        $role = $request->user()->role;
        if ($role != 'agency') {
            return response()->json(['message' => 'You are not authorized to add prices to a destination'], 403);
        }
        if ($request->user()->agency->id != $destination->agency_id) {
            return response()->json(['message' => 'You are not authorized to add prices to this destination'], 403);
        }

        //validate if start_date is less than end_date
        if ($request->start_date > $request->end_date) {
            return response()->json(['message' => 'Start date cannot be greater than end date'], 400);
        }

        //validate if price is a number
        if (!is_numeric($request->price)) {
            return response()->json(['message' => 'Price must be a number'], 400);
        }


        $destination = Destination::find($destination->id);

        //validate if rage of dates are not overlapping with existing prices for the destination
        $prices = $destination->prices->where('start_date', '<=', $request->start_date)->where('end_date', '>=', $request->start_date)->count();
        if ($prices > 0) {
            return response()->json(['message' => 'Price range overlaps with existing prices'], 400);
        }

        $destination->prices()->create($request->all());

        return response()->json(new DestinationResource($destination), Response::HTTP_CREATED);
    }

    public function addGallery(Request $request, Destination $destination)
    {

        $role = $request->user()->role;
        if ($role != 'agency') {
            return response()->json(['message' => 'You are not authorized to add gallery to a destination'], 403);
        }
        if ($request->user()->agency->id != $destination->agency_id) {
            return response()->json(['message' => 'You are not authorized to add gallery to this destination'], 403);
        }

        $destination = Destination::find($destination->id);

        //image has 1 or more images to be uploaded
        if ($request->hasFile('images')) {
            //  dd($request->images);
            foreach ($request->file('images') as $image) {
                $gallery = new Gallery();
                $gallery->destination_id = $destination->id;
                $gallery->image = $image->store('destination_gallery', 'public');
                $gallery->save();
            }
        }



        return response()->json(new DestinationResource($destination), Response::HTTP_CREATED);
    }
}
