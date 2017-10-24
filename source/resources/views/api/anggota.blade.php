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
<table class="table table-striped">
    <tr>
        <td>Nama</td>
        <td>{{ $model->user->name }}</td>
    </tr>
    <tr>
        <td>Telp</td>
        <td>{{ $model->user->telp }}</td>
    </tr>
    <tr>
        <td>Emali</td>
        <td>{{ $model->user->email }}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td>{{ date('d F Y',strtotime($model->dob)) }}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>{{ $model->jenis_kelamin() }}</td>
    </tr>
    <tr>
        <td>Wuku</td>
        <td>{{ $model->wuku }}</td>
    </tr>
    <tr>
        <td>Triwara</td>
        <td>{{ $model->triwara }}</td>
    </tr>
    <tr>
        <td>Pancawara</td>
        <td>{{ $model->pancawara }}</td>
    </tr>
    <tr>
        <td>Sasih</td>
        <td>{{ $model->sasih }}</td>
    </tr>
    <tr>
        <td>Urip</td>
        <td>{{ $model->urip }}</td>
    </tr>
</table>
<script src="{{ url('assets') }}/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
