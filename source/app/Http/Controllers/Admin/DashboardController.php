<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        //return view('admin.dashboard.index');
        return redirect()->route('admin.member.manage');
    }
}
