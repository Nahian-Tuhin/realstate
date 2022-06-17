@extends('admin.layouts.master')
@section('title')
    Settings
@endsection
@section('styles')
@endsection
@section('content')
    <div class="content-wrapper" style="min-height: 194px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{ url('admin/profile-update') }}">{{ $title }}</a>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-8">
                        @include('admin.partials.message')
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @php($config = \App\Models\BusinessSetting::where(['key' => 'mail_config'])->first())
                            @php($data = $config ? json_decode($config['value'], true) : null)
                            <form class="form-horizontal" action="{{ route('mail-config') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Mailer Name</label>
                                        <div class="col-sm-10">

                                            <input type="text" placeholder="ex : Alex" class="form-control rounded-0"
                                                name="name"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['name'] ?? '' : '' }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Host</label>
                                        <div class="col-sm-10">

                                            <input type="text" placeholder="google.com" class="form-control" name="host"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['host'] ?? '' : '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form-label">Driver</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="smtp" class="form-control" name="driver"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['driver'] ?? '' : '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form-label">Port</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="587" class="form-control" name="port"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['port'] ?? '' : '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="ex : ex@yahoo.com" class="form-control"
                                                name="username"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['username'] ?? '' : '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form-label">Email ID</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="ex@yahoo.com" class="form-control"
                                                name="email"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['email_id'] ?? '' : '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form-label">Encryption</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="ex : tls" class="form-control"
                                                name="encryption"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['encryption'] ?? '' : '' }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input placeholder="Password" type="text" class="form-control" name="password"
                                                value="{{ env('APP_MODE') != 'demo' ? $data['password'] ?? '' : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info rounded-0">Update</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@stop
<!-- External javascript -->
