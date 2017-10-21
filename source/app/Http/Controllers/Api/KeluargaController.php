<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KeluargaController extends Controller
{
    public function getGallery(Request $request)
    {
        $model = Gallery::where('keluarga_id',$request->keluarga_id)->get();
        return response()->json(['status'=>1,'data'=>$model->toArray()]);
    }

    public function uploadGallery(Request $request)
    {
        $rules = [
            'caption' => 'required|string|max:100',
            'img' => 'required|image|max:3500'
        ];
        $validator = \Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return response()->json(['status'=>0,'error'=>'Data tidak valid.']);
        }

        $path = base_path('../assets/gallery/');
        $file = \Image::make($request->file('img'))->resize(600, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $model = new Gallery();
        $model->anggota_id = $request->anggota_id;
        $model->keluarga_id = $request->keluarga_id;
        $model->caption = $request->caption;
        $model->img = $file->basename;
        $model->views = 0;
        $model->save();

        return response()->json(['status'=>1]);
    }
}
