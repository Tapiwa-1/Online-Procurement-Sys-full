<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Request as FReq;

class logController extends Controller
{

    public function index()
    {

        $activity = Activity::query()
            ->when(FReq::input('search'), function ($query, $search) {
                $query->where('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();
        return Inertia::render("Admin/Logs/Index", compact('activity'));
    }

    public function destroy(){
        Activity::truncate();
        return back()->with('message', 'Deleted Successfully');
    }
}

