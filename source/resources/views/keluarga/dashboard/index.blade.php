@extends('layouts.backend')

@push('plugin_css')
@endpush

@push('page_css')
<link rel="stylesheet" href="{{ url('assets/backend/tree.css') }}">
@endpush

@section('content')
    <style>

    </style>
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Dashboard
                <small>statistics, charts, recent events and reports</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('member') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Dashboard</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Pohon Keluarga</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tree">
                    <?php
                    $sql = "SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.parent=0 AND a.keluarga_id=".Auth::user()->keluarga->id;
                    // Execute the query and go through the results.
                    $result = DB::select($sql);
                    $rootRow = $result[0];
                    echo '<ul>';
                    \App\Models\Tree::display_with_children($rootRow, 0, Auth::user()->keluarga->id);
                    echo '</ul>';
                    ?>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush