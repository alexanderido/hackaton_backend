<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class LoginController extends Controller
{
  //
  public function login(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return response()->json([
        'message' => 'The provided credentials are incorrect.'
      ], Response::HTTP_UNAUTHORIZED);
    }



    return response()->json([
      'id' => $user->id,
      'name' => $user->name,
      'email' => $user->email,
      'token' => $user->createToken($request->email)->plainTextToken,
    ], Response::HTTP_OK);
  }

  public function logout(Request $request)
  {
    $request->user()->currentAccessToken()->delete();
    return response()->json([
      'message' => 'Tokens Revoked'
    ], Response::HTTP_OK);
  }

  public function register(StoreUserRequest $request)
  {

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => $request->role,
    ]);



    return response()->json([
      'id' => $user->id,
      'name' => $user->name,
      'email' => $user->email,
      'role' => $user->role,
      'token' => $user->createToken($request->email)->plainTextToken,
    ], Response::HTTP_OK);
  }
}
