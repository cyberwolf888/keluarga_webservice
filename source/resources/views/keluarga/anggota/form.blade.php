@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
@endpush

@push('page_css')
@endpush

@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Member
                <small>Add New Data</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ route('keluarga.dashboard') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ route('keluarga.anggota.manage') }}">Anggota</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">Add New Data</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Add New Data</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    {!! Form::open(['route' => isset($update) ? ['keluarga.anggota.update', $model->id] : 'keluarga.anggota.store', 'files' => true]) !!}
                    <div class="form-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <h4 class="alert-heading">Ooppss ada error.</h4>
                                @foreach ($errors->all() as $error)
                                    <p><i class="fa fa-close font-red-mint"></i>&nbsp;{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        @if(isset($update))
                        <div class="form-group form-md-line-input {{ $errors->has('parent') ? ' has-error' : '' }}">
                            {!! Form::select('parent',[''=>""]+$collection->pluck('name','id')->all(), $model->parent,['id'=>'parent','placeholder'=>'','class'=>'form-control']) !!}
                            <label for="parent">Parent ID</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('married') ? ' has-error' : '' }}">
                            {!! Form::select('married',[''=>""]+$collection->pluck('name','id')->all(), $model->married,['id'=>'married','placeholder'=>'','class'=>'form-control']) !!}
                            <label for="married">Married to</label>
                        </div>
                        @endif
                        <div class="form-group form-md-line-input {{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::text('name', $user->name, ['id'=>'name','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="name">Nama Lengkap</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('kasta') ? ' has-error' : '' }}">
                            {!! Form::select('kasta', ['Brahmana'=>'Brahmana','Ksatria'=>'Ksatria','Weisya'=>'Weisya','Sudra'=>'Sudra'], $model->kasta,['id'=>'kasta','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="kasta">Kasta</label>
                        </div>
                        <div class="form-group form-md-line-input {{ $errors->has('telp') ? ' has-error' : '' }}">
                            {!! Form::text('telp', $user->telp, ['id'=>'telp','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="telp">Nomer Telp</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::email('email', $user->email, ['id'=>'email','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="email">Email</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('dob') ? ' has-error' : '' }}">
                            {!! Form::date('dob', $model->dob, ['id'=>'dob','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="dob">Tanggal Lahir</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('gender') ? ' has-error' : '' }}">
                            {!! Form::select('gender', ['L'=>'Laki-laki','P'=>'Perempuan'], $model->gender,['id'=>'gender','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="gender">Jenis Kelamin</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::password('password', ['id'=>'password','placeholder'=>'','class'=>'form-control']) !!}
                            <label for="password">Password</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::password('password_confirmation', ['id'=>'password_confirmation','placeholder'=>'','class'=>'form-control']) !!}
                            <label for="password_confirmation">Password Confirmation</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('wuku') ? ' has-error' : '' }}">
                            {!! Form::text('wuku', $model->wuku, ['id'=>'wuku','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="wuku">Wuku</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('triwara') ? ' has-error' : '' }}">
                            {!! Form::text('triwara', $model->triwara, ['id'=>'triwara','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="triwara">Triwara</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('pancawara') ? ' has-error' : '' }}">
                            {!! Form::text('pancawara', $model->pancawara, ['id'=>'pancawara','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="pancawara">Pancawara</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('sasih') ? ' has-error' : '' }}">
                            {!! Form::text('sasih', $model->sasih, ['id'=>'sasih','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="sasih">Sasih</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('urip') ? ' has-error' : '' }}">
                            {!! Form::text('urip', $model->urip, ['id'=>'urip','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="urip">Urip</label>
                        </div>

                        <div class="form-group form-md-line-input {{ $errors->has('isActive') ? ' has-error' : '' }}">
                            {!! Form::select('isActive', ['1'=>'Active','0'=>'Suspend'], $user->isActive,['id'=>'status','placeholder'=>'','class'=>'form-control', 'required']) !!}
                            <label for="status">Status Account</label>
                        </div>

                        <div class="form-group last">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    @if($user->img == null)
                                    <img src="{{ url('assets') }}/backend/global/img/no_image.png" alt="" />
                                    @else
                                    <img src="{{ url('assets/profile/'.$user->img) }}" alt="" />
                                    @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="image"> </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue">Submit</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6 ">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Kalender Bali</span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <div class="embed-responsive embed-responsive-16by9" style="padding-bottom: 99.25%;">
                        <iframe class="embed-responsive-item" src="http://kalenderbali.org/klasik"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
@endsection

@push('plugin_scripts')
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endpush

@push('scripts')
@endpush