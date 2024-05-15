<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function login(UsersRequest $request)
    {
        $user = User::where('username', $request->username)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        $response = [
            'user'  =>  $user,
            'token' =>  $user->createToken($request->username)->plainTextToken
        ];
     
        return $response;
    }
    

    public function createuser(UsersRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return $user;
    }

    public function updateuser(UsersRequest $request, string $id)
    {
        $validated = $request->validated();

        $user = User::findOrFail($id);

        $user-> update($validated);
                    

        return $user;
    }

    public function showuser($id)
    {
        $user = User::where('id', $id)->get();
        return $user;
    }



}
