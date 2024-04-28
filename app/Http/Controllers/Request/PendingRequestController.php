<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as FReq;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Services\FileService;
use App\Models\Request as ModelsRequest;

class PendingRequestController extends Controller
{
    public function index()
    {
        // $allRequest = ModelsRequest::all();
        $users = User::all();
        if(Auth::user()->hasRole('admin')){
            return back();
        }

        $userId = Auth::user()->id;


            $allRequest = ModelsRequest::where('participant1', $userId)
            ->where('participant1approval', false)
            ->orWhere('participant2', $userId)
            ->where('participant2approval', false)
            ->orWhere('participant3', $userId)
            ->where('participant3approval', false)
            ->orWhere('participant4', $userId)
            ->where('participant4approval', false)
            ->get();

        // Process and display the $pendingRequests collection as needed

            //code not giving output where it should look for a field in a Procrument request where the authenticated user should see all his pending request based on the field participant1..4 if his auth is there and if the field participant1..4approval is false
        //  select where participant1 or   participant1 or participant1 or participant1 is Auth::user()->id and particapant1approval, particapant2approval, particapant3approval, particapant4approval is null
        activity()->log(Auth::user()->name . ' browse Request');
        return Inertia::render('Request/Pending', compact('allRequest','users'));


        // correct this code to check is the current user is admin

    }
}
