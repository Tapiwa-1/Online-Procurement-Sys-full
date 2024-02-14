<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FileService;
class ProfilePictureController extends Controller
{
    public function update(Request $request)
    {
        dd($request);
        $request->validate([ 'file' => 'required|mimes:jpg,jpeg,png' ]);
        $user = (new FileService)->updateFile(auth()->user(), $request, 'user');
        $user->save();

        return back()->with('message', 'Profile Picture Successfully');
    }
}
