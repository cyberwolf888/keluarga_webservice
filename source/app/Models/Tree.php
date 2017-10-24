<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tree
{
    public static function display_with_children($parentRow, $level, $keluarga, $print=false)
    {
        echo '<li><a href="#">';
        if($parentRow->married != null){
            $married = Anggota::find($parentRow->married);

            echo '
            <table>
                <tr>
                    <td>
                        <a href="'.url('api/getDetailAnggota/'.$parentRow->id).'" data-remote="false" data-toggle="modal" data-target="#myModal" >
                            <img src="'.url('assets/profile/'.$parentRow->img).'" width="100px" height="100px">
                        </a>
                    </td>
                    <td width="10px">  </td>
                    <td>
                        <a href="'.url('api/getDetailAnggota/'.$married->id).'" data-remote="false" data-toggle="modal" data-target="#myModal" >
                            <img src="'.url('assets/profile/'.$married->user->img).'" width="100px" height="100px">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>'.$parentRow->name.'</td>
                    <td width="10px">  </td>
                    <td>'.$married->user->name.'</td>
                </tr>
            </table>
            ';
        }else{
            if($print){
                echo '
                        <table>
                            <tr>
                                <td>
                                    <a href="'.url('api/getDetailAnggota/'.$parentRow->id).'" data-remote="false" data-toggle="modal" data-target="#myModal" >
                                        <img src="'.url('assets/profile/'.$parentRow->img).'" width="100px" height="100px">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>'.$parentRow->name.'</td>
                            </tr>
                        </table>
                        ';
            }else{
                echo '
                        <table>
                            <tr>
                                <td><img src="'.url('assets/profile/'.$parentRow->img).'" width="100px" height="100px"></td>
                                <td width="10px">  </td>
                                <td><a href="'. route('keluarga.addwedding', $parentRow->id) .'"><img src="'.url('assets/backend/img/icon-add-grey.png').'" width="100px" height="100px"></a> </td>
                            </tr>
                            <tr>
                                <td>'.$parentRow->name.'</td>
                                <td width="10px">  </td>
                                <td></td>
                            </tr>
                        </table>
                        ';
            }

        }
        echo "</a>";
        // Create the query
        $sql = "SELECT u.name,u.img,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.keluarga_id = '".$keluarga."' AND a.parent=".$parentRow->id;
        // Execute the query and go through the results.
        $result = DB::select($sql);
        if($result)
        {
            echo '<ul>';
            foreach ($result as $row){
                Tree::display_with_children($row, $level+1, $keluarga, $print);
            }
            if(!$print) {
                echo '<li><a href="' . route('keluarga.addparent', $parentRow->id) . '"><img src="' . url('assets/backend/img/icon-add-grey.png') . '" width="100px" height="100px"></a></li>';
            }
            echo '</ul>';
        }else{
            if(!$print){
                echo '<ul>';
                echo '<li><a href="'.route('keluarga.addparent',$parentRow->id).'"><img src="'.url('assets/backend/img/icon-add-grey.png').'" width="100px" height="100px"></a></li>';
                echo '</ul>';
            }
        }
        echo '</li>';
    }
}
