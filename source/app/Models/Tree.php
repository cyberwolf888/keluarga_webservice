<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Tree
{
    public static function display_with_children($parentRow, $level, $keluarga)
    {
        echo '<li><a href="#">'.$parentRow->name;
        if($parentRow->married != null){
            echo " Menikah Dengan ".Anggota::find($parentRow->married)->user->name;
        }
        echo "</a>";
        // Create the query
        $sql = "SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.keluarga_id = '".$keluarga."' AND a.parent=".$parentRow->id;
        // Execute the query and go through the results.
        $result = DB::select($sql);
        if($result)
        {
            echo '<ul>';
            foreach ($result as $row){
                Tree::display_with_children($row, $level+1, $keluarga);
            }
            echo '</ul>';
        }
        echo '</li>';
    }
}
