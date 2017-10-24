<?php

namespace App\Http\Controllers\Api;

use App\Models\Anggota;
use App\Models\Gallery;
use App\User;
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

    public function detailGallery(Request $request)
    {
        $model = Gallery::find($request->id_gallery);
        $anggota = Anggota::find($model->anggota_id);

        $data = $model->toArray();
        $data['img'] = url('assets/gallery/'.$model->img);
        $data['foto'] = $anggota->user->img == "" ? "" : url('assets/profile/'.$anggota->user->img);
        $data['name'] = $anggota->user->name;
        $data['email'] = $anggota->user->email;
        $data['diupload'] = "Diupload ".date('d F Y',strtotime($model->created_at));
        $data['dilihat'] = "Dilihat ".$model->views." kali";

        $model->views+=1;
        $model->save();

        return response()->json(['status'=>1,'data'=>$data]);
    }

    public function getPohonKeluarga(Request $request)
    {
        return view('api.print',[
            'keluarga_id'=>$request->keluarga_id
        ]);
    }

    public function getDetailAnggota($id)
    {
        $model = Anggota::find($id);
        return view('api.anggota',['model'=>$model]);
    }
}
