<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Resources\RequestCollection;
use App\Models\Request as ModelsRequest;
use Illuminate\Support\Facades\Request as FReq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $allRequest = ModelsRequest::all();
        $users = User::all();
         $allRequest = ModelsRequest::query()
            ->when(FReq::input('search'), function ($query, $search) {
                $query->where('purpose', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn ($req) => [
                'id' => $req->id,
                'purpose' => $req->purpose,
                'participant1' => $req->participant1,
                'participant2' => $req->participant2,
                'participant3' => $req->participant3,
                'participant4' => $req->participant4,
            ]);
            activity()
                ->log(Auth::user()->name . ' browse Request');
        return Inertia::render('Request/Index', compact('allRequest','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $users = User::with('roles')->get();
        return Inertia::render('Request/Create',compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'purpose' => 'required|string|max:255',
            'programProject' => 'string|max:255',
            'description' => 'required',
            'participant1' => 'required|max:255',
            'participant2' => 'required|max:255',
            'participant3' => 'required|max:255',
            'participant4' => 'required|max:255',

        ]);
        // dd($validated);
        ModelsRequest::create([
            'purpose' => $request->purpose,
            'programProject' => $request->programProject,
            'description' => $request->description,
            'participant1' => $request->participant1[0],
            'participant2' => $request->participant2[0],
            'participant3' => $request->participant3[0],
            'participant4' => $request->participant4[0]
        ]);
        // ModelsRequest::create($validated);

        return to_route('request.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $OneRequest = ModelsRequest::where('id', $id)->first();
        return Inertia::render("Request/Show", compact('OneRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $OneRequest = ModelsRequest::where('id', $id)->first();
        $users = User::with('roles')->get();
        return Inertia::render("Request/Edit", compact('OneRequest','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelsRequest::find($id)->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
