<?php

namespace App\Http\Controllers\Admin;

use App\Models\Keluarga;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function member()
    {
        $model = User::where('type',2)->get();
        return view('admin.user.manage_member',['model'=>$model]);
    }

    public function create_member()
    {
        $model = new User();
        return view('admin.user.form_member',['model'=>$model]);
    }

    public function store_member(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
            'isActive' => 'required'
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->type = 2;
        $model->isActive = $request->isActive;
        $model->save();

        $keluarga = new Keluarga();
        $keluarga->user_id = $model->id;
        $keluarga->nama = $model->name;
        $keluarga->save();

        return redirect()->route('admin.member.manage');
    }

    public function show_member($id)
    {
        //
    }

    public function edit_member($id)
    {
        $model = User::find($id);
        return view('admin.user.form_member',['model'=>$model,'update'=>true]);
    }

    public function update_member(Request $request, $id)
    {
        $model = User::find($id);
        $validator = [
            'name' => 'required|max:255',
            'telp' => 'required',
            'isActive' => 'required'
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
        $model->isActive = $request->isActive;
        $model->save();

        return redirect()->route('admin.member.manage');
    }

    public function destroy_member($id)
    {
        //
    }
}
