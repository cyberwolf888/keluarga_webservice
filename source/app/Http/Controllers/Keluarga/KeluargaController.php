<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeluargaController extends Controller
{

    public function edit()
    {
        $model = Auth::user()->keluarga;
        $anggota = DB::select('SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.keluarga_id='.$model->id.' AND a.parent=0');
        $collection = collect(DB::select('SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.keluarga_id='.$model->id));
        return view('keluarga.setting.form',[
            'model'=>$model,
            'anggota'=>$anggota,
            'collection'=>$collection,
            'update'=>true
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255',
            'asal' => 'required',
            'keturunan' => 'required',
        ]);

        $keluarga = Auth::user()->keluarga;
        $kepala = DB::select('SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.keluarga_id='.$keluarga->id.' AND a.parent=0');
        if(count($kepala)>0){
            $anggota = Anggota::find($kepala[0]->id);
            $anggota->parent = null;
            $anggota->save();
        }

        $keluarga->nama = $request->nama;
        $keluarga->asal = $request->asal;
        $keluarga->save();

        $anggota = Anggota::find($request->keturunan);
        $anggota->parent = 0;
        $anggota->save();

        return redirect()->route('keluarga.setting.create');
    }

}
