<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
/* use App\Http\Resources\UserResource;
use App\Http\Resources\GameCollection; */


class UserController extends Controller
{



  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    return response()->json($user);
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //detected user logid with tocken
    /*       $user = auth()->user();
        if ($user->id === $id || $user->role === 'admin') {
            $user = User::find($id);
            $user->update($request->all());

            return response()->json(['message' => 'User updated successfully'], 200);
        } else {
            return response()->json(['message' => 'You are not authorized to update this user'], 403);
        } */
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    /*       //detected user logid with tocken
        $user = auth()->user();
        if ($user->id === $id || $user->role === 'admin') {
            $user = User::find($id);
            $user->delete();

            return response()->json(['message' => 'User deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'You are not authorized to delete this user'], 403);
        } */
  }
}
