<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registration(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                function ($attribute, $value, $fail) use ($request){
                    if (!$request->post('username')) {
                        if (User::where('username', "@$value")->exists()) {
                            $fail('The nick name \'' . $value . '\' alredy use =(');
                        }
                    }

                }
            ],
            'email' => 'required|unique:users',
            'password' => 'required',
            'username' => 'regex:/^@\w+$/|unique:users',
        ]);

        return response()->json([
            User::create($validated)
        ]);
    }
}
