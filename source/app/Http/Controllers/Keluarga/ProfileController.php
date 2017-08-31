<?php

namespace App\Http\Controllers\Keluarga;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $model = Auth::user();
        return view('keluarga.profile.form',['model'=>$model]);
    }

    public function update(Request $request)
    {
        $model = Auth::user();
        $validator = [
            'name' => 'required|max:255',
            'telp' => 'required',
        ];

        if($request->password != null){
            $validator['password'] = 'required|min:6|confirmed';
            $model->password = bcrypt($request->password);
        }

        if($model->email != $request->email){
            $validator['email'] = 'required|email|max:255|unique:users';
            $model->email = $request->email;
        }

        $this->validate($request, $validator);

        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->save();

        return redirect()->route('keluarga.profile.edit');
    }
}

