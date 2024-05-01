<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\ProcurementArticle;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProcurementArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('admin') && !Auth::user()->hasRole('Procurement Officer')){
            return back();
        }
        $procurementArticles = ProcurementArticle::all();

        return Inertia::render('Articles/Index', compact('procurementArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->hasRole('admin') && !Auth::user()->hasRole('Procurement Officer')){
            return back();
        }
        //
        return Inertia::render('Articles/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasRole('admin') && !Auth::user()->hasRole('Procurement Officer')){
            return back();
        }

        $article = new \App\Models\ProcurementArticle;
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png',
            'name' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'required',

        ]);

        activity()->log(Auth::user()->name . ' create an article called '. $request->name);
        $article = (new FileService)->updateFile($article, $request, 'request');
        $article->name = $request->input('name');
        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->user_id = Auth::user()->id;
        $article->save();
        return to_route('procurement-article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProcurementArticle  $procurementArticle)
    {
        if(Auth::user()->hasRole('admin') && !Auth::user()->hasRole('Procurement Officer')){
            return back();
        }
        return Inertia::render('Articles/Show', compact('procurementArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProcurementArticle  $procurementArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProcurementArticle  $procurementArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProcurementArticle  $procurementArticle)
    {
        if(Auth::user()->hasRole('admin') && !Auth::user()->hasRole('Procurement Officer')){
            return back();
        }


        if($procurementArticle->user_id != Auth::user()->id){
            return back()->with('message', 'Delete operation failed');
        }

        if (!empty($procurementArticle->file)) {
            $currentFile = public_path() . $procurementArticle->file;

            if (file_exists($currentFile)) {
                unlink($currentFile);
            }
        }

        $procurementArticle->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
