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
        $allRequest = ModelsRequest::query()
        ->where('user_id', Auth::user()->id) // Filter by user_id
          ->where(function ($query) use ($userId) {
        $query->where('participant1', $userId)
              ->orWhere('participant2', $userId)
              ->orWhere('participant3', $userId)
              ->orWhere('participant4', $userId);
        })
        ->whereNull('participant1approved')
        ->whereNull('participant2approved')
        ->whereNull('participant3approved')
        ->whereNull('participant4approved')
            ->when(FReq::input('search'), function ($query, $search) {
                $query->where('purpose', 'like', "%{$search}%");
            })
        ->paginate(10)
        ->withQueryString()
            ->through(fn ($req) => [
            'id' => $req->id,
            'purpose' => $req->purpose,
            'participant1' => $req->participant1,
            'participant1approved' => $req->participant1approved,
            'participant2' => $req->participant2,
            'participant2approved' => $req->participant2approved,
            'participant3' => $req->participant3,
            'participant3approved' => $req->participant3approved,
            'participant4' => $req->participant4,
            'participant4approved' => $req->participant4approved,
            'user_id' => $req->user_id,
        ]);
        //  select where participant1 or   participant1 or participant1 or participant1 is Auth::user()->id and particapant1approval, particapant2approval, particapant3approval, particapant4approval is null
        activity()->log(Auth::user()->name . ' browse Request');
        return Inertia::render('Request/Index', compact('allRequest','users'));


        // correct this code to check is the current user is admin

    }
}
