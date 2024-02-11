<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([ 'file' => 'required|mimes:jpg,jpeg,png' ]);
        $user = (new FileService)->updateFile(auth()->user(), $request, 'user');
        $user->save();

        return redirect()->route('users.show',['id' => auth()->user()->id]);
    }
}
