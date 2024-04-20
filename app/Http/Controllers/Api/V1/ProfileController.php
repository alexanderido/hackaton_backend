<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Profile;
use App\Models\Guest;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\GuestResource;
use App\Http\Resources\GuestsCollection;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\ProfilesCollection;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class ProfileController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProfilesCollection(Profile::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        if ($request->user()->role !== 'user') {
            return response()->json(['error' => 'You are not allowed to create an profile'], Response::HTTP_FORBIDDEN);
        }
        $profile = $request->user()->profile()->create($request->all());

        $profile->photo = $request->file('photo')->store('profile_picture', 'public');
        $profile->save();

        return response()->json(new ProfileResource($profile), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        $profile = Profile::find($profile->id);
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {

        if ($request->user()->cannot('update', $profile)) {
            return response()->json(['message' => 'You are not authorized to update this profile'], 403);
        }

        $profile->update($request->all());
        if ($request->hasFile('photo')) {
            $profile->photo = $request->file('photo')->store('profile_picture', 'public');
            $profile->save();
        }



        return response()->json($profile, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json(null, 204);
    }

    public function getGuestsByProfileId(Request $request)
    {

        $guest = Guest::where('profile_id', $request->profile_id)->get();

        return new GuestsCollection($guest);
    }

    public function getGuestsById(Request $request)
    {


        $guest = Guest::where('profile_id', $request->profile_id)
            ->where('id', $request->id)
            ->first();

        return new GuestResource($guest);
    }

    public function addTags(Request $request, Profile $profile)
    {
        $profile = Profile::where('id', $request->profile_id)->first();

        if (empty($request->tags)) {
            return response()->json(['message' => 'Please provide tags'], 400);
        }

        if ($profile->user_id != $request->user()->id) {
            return response()->json(['message' => 'You are not authorized to add tags to this profile'], 403);
        }

        //clear all tags
        $profile->tags()->detach();

        $profile->tags()->attach($request->tags);
        return response()->json(new ProfileResource($profile), Response::HTTP_OK);
    }
}
