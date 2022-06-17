@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Updates</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('sadmin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add New Updates</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    @include('admin.partials.message')

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('latestupdates.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf

                                            <div class="form-group col-md-6">
                                                <div class="custom-file mt-2">
                                                    {{-- <label for="title">Title</label><span class="text-danger">*</span> --}}
                                                    <label class="custom-label" for="customFile">Choose Photo</label><span class="text-danger">*</span>
                                                    <br>
                                                    <input type="file"  id="customFile" name="image" accept="image/*">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="title">Title</label><span class="text-danger">*</span>
                                                <input type="text" name="title" class="form-control" placeholder="Title"
                                                    value="{{ old('title') }}">
                                            </div>
                                            <div class="form-group col-md-6 ">
                                                        <label>Description</label><span class="text-danger">*</span>
                                                        <textarea  name="text" row='10' class="form-control"> {{ old('text') }}</textarea>
                                                </div>
                                            </div>





    </div>
<button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
