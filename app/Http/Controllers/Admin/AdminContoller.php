<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    public function index(): Factory|View
    {
        $user = auth()->user();

        return view('admin.home', compact('user'));
    }
}
