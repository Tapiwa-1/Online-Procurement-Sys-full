<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Request/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $users = User::with('roles')->get();
        // dd($users);
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
