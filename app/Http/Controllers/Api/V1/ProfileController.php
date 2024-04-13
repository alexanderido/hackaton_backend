<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
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
}
