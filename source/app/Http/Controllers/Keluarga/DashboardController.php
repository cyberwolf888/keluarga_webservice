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

    public static function printTree($level=0, $parentID=null)
    {
        // Create the query
        $sql = "SELECT * FROM anggota WHERE ";
        if($parentID == null) {
            $sql .= "parent = 0";
        }
        else {
            $sql .= "parent=" . $parentID;
        }
        // Execute the query and go through the results.
        $result = DB::select($sql);
        
        if($level==1)
            dd($sql);

        if($result)
        {
            echo ';'.$level.' > ';
            foreach ($result as $row)
            {
                // Print the current ID;
                $currentID = $row->id;
                /* for($i = 0; $i < $level; $i++) {
                    echo " ";
                }*/
                echo $row->id;
                // Print all children of the current ID
                DashboardController::printTree($level+1, $row->id);
            }
        }
        else {
            //die("Failed to execute query! ($level / $parentID)");
        }
    }
}
