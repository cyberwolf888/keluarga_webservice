<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link href="{{ url('assets') }}/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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

<!-- Default bootstrap modal example -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="x" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detail Anggota Keluarga</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="btnClose">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('assets') }}/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script>
    // Fill modal with content from link href
    $("#myModal").on("show.bs.modal", function(e) {
        var link = $(e.relatedTarget);
        $(this).find(".modal-body").load(link.attr("href"));
    });
    $("#btnClose").click(function () {
        location.reload();
    });
    $("#x").click(function () {
        location.reload();
    });
</script>
</body>
</html>
