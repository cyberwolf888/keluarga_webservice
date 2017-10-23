<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{ url('assets/backend/tree.css') }}">
</head>

<body>
<div class="tree">
    <?php
    $sql = "SELECT u.name,u.img,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.parent=0 AND a.keluarga_id=".$keluarga_id;
    // Execute the query and go through the results.
    $result = DB::select($sql);
    $rootRow = $result[0];
    //dd($rootRow);
    if(count($result)>0){
        echo '<ul>';
        \App\Models\Tree::display_with_children($rootRow, 0, $keluarga_id,true);
        echo '</ul>';
    }
    ?>
</div>
</body>
</html>
