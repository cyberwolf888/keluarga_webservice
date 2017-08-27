<?php

namespace App\Http\Controllers\Keluarga;

use App\Models\Anggota;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class AnggotaController extends Controller
{
    public function index()
    {
        //dd(Auth::user()->keluarga);
        $model = Anggota::where('keluarga_id',Auth::user()->keluarga->id)->get();
        return view('keluarga.anggota.manage',['model'=>$model]);
    }

    public function create()
    {
        $model = new Anggota();
        $user = new User();
        return view('keluarga.anggota.form',['model'=>$model,'user'=>$user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'isActive' => 'required',
            'image' => 'required|image|max:3500'
        ]);

        $path = base_path('../assets/profile/');
        $file = Image::make($request->file('image'))->resize(600, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $user = new User();
        $user->name = $request->name;
        $user->telp = $request->telp;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = 3;
        $user->isActive = $request->isActive;
        $user->img = $file->basename;
        $user->save();

        $anggota = new Anggota();
        $anggota->user_id = $user->id;
        $anggota->keluarga_id = Auth::user()->keluarga->id;
        $anggota->dob = $request->dob;
        $anggota->gender = $request->gender;
        $anggota->save();

        return redirect()->route('keluarga.anggota.manage');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $model = Anggota::find($id);
        return view('keluarga.anggota.form',[
            'model'=>$model,
            'user'=>$model->user,
            'update'=>true
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = Anggota::find($id);
        $user = $model->user;
        $validator = [
            'name' => 'required|max:255',
            'telp' => 'required',
            'isActive' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'image' => 'image|max:3500'
        ];

        if($request->password != null){
            $validator['password'] = 'required|min:6|confirmed';
            $user->password = bcrypt($request->password);
        }

        if($user->email != $request->email){
            $validator['email'] = 'required|email|max:255|unique:users';
            $user->email = $request->email;
        }

        $this->validate($request, $validator);

        if ($request->hasFile('image')) {
            $path = base_path('../assets/profile/');
            if(is_file($path.$user->img)){
                unlink($path.$user->img);
            }
            $file = Image::make($request->file('image'))->resize(600, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $user->img = $file->basename;
        }

        $user->name = $request->name;
        $user->telp = $request->telp;
        $user->isActive = $request->isActive;
        $user->save();

        $model->dob = $request->dob;
        $model->gender = $request->gender;
        $model->save();

        return redirect()->route('keluarga.anggota.manage');
    }

    public function destroy($id)
    {
        //
    }
}
