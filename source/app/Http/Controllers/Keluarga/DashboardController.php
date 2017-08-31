<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('keluarga.dashboard.index');
    }

    public function print_tree()
    {
        return view('keluarga.dashboard.print');
    }
}
