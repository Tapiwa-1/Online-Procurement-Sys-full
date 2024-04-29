<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        return Inertia::render("Index");
    }

    public function overview(){
        $allUsers = User::all()->count();
        $users = User::with('roles')->take(5)->get();
        return Inertia::render("Admin/Dashboard",compact("users","allUsers"));
    }
}
