@extends('layouts.backend')

@push('plugin_css')
@endpush

@push('page_css')
@endpush

@section('content')
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
    <div class="row widget-row">
        <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Monthly Transaction</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">{{ date('F') }}</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="12">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Monthly Sales</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">IDR</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="12">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Kendaraan</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle">Unit</span>
                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="12">0</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">Sales</span>
                        <span class="caption-helper">Monthly stats...</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <?php
                    $sql = "SELECT u.name,a.* FROM anggota AS a JOIN users AS u ON a.user_id = u.id WHERE a.parent=0 AND a.keluarga_id=".Auth::user()->keluarga->id;
                    // Execute the query and go through the results.
                    $result = DB::select($sql);
                    $rootRow = $result[0];
                    echo '<ul>';
                    \App\Models\Tree::display_with_children($rootRow, 0);
                    echo '</ul>';
                    echo '<br><br>';
                    ?>
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