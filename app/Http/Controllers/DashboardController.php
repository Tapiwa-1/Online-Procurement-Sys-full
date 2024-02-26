<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $users = User::with('roles')->take(5)->get();
        $superAdminCount = User::with('roles')->get()->count();
        return Inertia::render("Admin/Dashboard",compact("users","superAdminCount"));
    }

}
