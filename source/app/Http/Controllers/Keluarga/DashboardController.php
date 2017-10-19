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

    public function addparent($id)
    {
        $collection = collect(DB::select('SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE parent IS NULL AND a.keluarga_id='.Auth::user()->keluarga->id));
        return view('keluarga.dashboard.addparent',['id'=>$id,'collection'=>$collection]);
    }
    public function storeaddparent(Request $request,$id)
    {
        $model = Anggota::find($request->keturunan);
        $model->parent = $id;
        $model->save();

        return redirect()->route('keluarga.dashboard');
    }

    public function addwedding($id)
    {
        $collection = collect(DB::select('SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE parent IS NULL AND a.keluarga_id='.Auth::user()->keluarga->id));
        return view('keluarga.dashboard.addwedding',['id'=>$id,'collection'=>$collection]);
    }
    public function storeaddwedding(Request $request, $id)
    {
        $model = Anggota::find($id);
        $model->married = $request->keturunan;
        $model->save();

        return redirect()->route('keluarga.dashboard');
    }
}
