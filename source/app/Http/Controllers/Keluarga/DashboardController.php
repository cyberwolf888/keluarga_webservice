<?php

namespace App\Http\Controllers\Keluarga;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('keluarga.dashboard.index');
    }
}
