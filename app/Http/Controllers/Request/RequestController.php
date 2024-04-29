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
use App\Services\FileService;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $allRequest = ModelsRequest::all();
        $users = User::all();
        if(Auth::user()->hasRole('admin')){

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
                'user_id' => $req->user_id,
            ]);
            activity()->log(Auth::user()->name . ' browse Request');
            return Inertia::render('Request/Index', compact('allRequest','users'));
        }else{
              $allRequest = ModelsRequest::query()
            ->where('user_id', Auth::user()->id) // Filter by user_id
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
                'user_id' => $req->user_id,
            ]);
            activity()->log(Auth::user()->name . ' browse Request');
            return Inertia::render('Request/Index', compact('allRequest','users'));
        }

        // correct this code to check is the current user is admin

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin')){
            return back();
        }
        $users = User::with('roles')->get();
        activity()->log(Auth::user()->name . ' Is Attempting to create A request');
        return Inertia::render('Request/Create',compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasRole('admin')){
            return back();
        }
        $oneRequest = new \App\Models\Request;
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png',
            'purpose' => 'required|string|max:255',
            'programProject' => 'required|string|max:255',
            'description' => 'required',
            'participant1' => 'required|max:255',
            'participant2' => 'required|max:255',
            'participant3' => 'required|max:255',
            'participant4' => 'required|max:255',

        ]);

        activity()->log(Auth::user()->name . ' create A request called '. $request->purpose);
        $oneRequest = (new FileService)->updateFile($oneRequest, $request, 'request');
        $oneRequest->purpose = $request->input('purpose');
        $oneRequest->programProject = $request->input('programProject');
        $oneRequest->description = $request->input('description');
        $oneRequest->participant1 = $request->participant1[0];
        $oneRequest->participant2 = $request->participant2[0];
        $oneRequest->participant3 = $request->participant3[0];
        $oneRequest->participant4 = $request->participant4[0];
        $oneRequest->user_id = Auth::user()->id;
        $oneRequest->save();
        // ModelsRequest::create([
        //     'purpose' => $request->purpose,
        //     'programProject' => $request->programProject,
        //     'description' => $request->description,
        //     'participant1' => $request->participant1[0],
        //     'participant2' => $request->participant2[0],
        //     'participant3' => $request->participant3[0],
        //     'participant4' => $request->participant4[0]
        // ]);
        // ModelsRequest::create($validated);
         //create a file service to handle file upload

        return to_route('request.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::with('roles')->get();
        $OneRequest = ModelsRequest::where('id', $id)->first();
        // activity()->log(Auth::user()->name . ' create A request called '. $request->purpose);
        return Inertia::render("Request/Show", compact('OneRequest','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        if(Auth::user()->hasRole('admin')){
            return back();
        }
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
        if(Auth::user()->hasRole('admin')){
            return back();
        }
        $request = ModelsRequest::find($id);

        if($request->user_id != Auth::user()->id){
            return back()->with('message', 'Delete operation failed');
        }

        if (!empty($request->file)) {
            $currentFile = public_path() . $request->file;

            if (file_exists($currentFile)) {
                unlink($currentFile);
            }
        }

        $request->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
