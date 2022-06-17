@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit {{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('sadmin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
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
                            <form action="{{ route('mep-services.update', $data['id']) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')

                                @csrf
                                <div class="form-group col-md-6">
                                    <div class="custom-file mt-2">
                                        {{-- <label for="title">Title</label><span class="text-danger">*</span> --}}
                                        <label class="custom-label" for="customFile">Choose New Photo</label><span class="text-danger"></span>
                                        <br>
                                        <input type="file"  id="customFile" name="image" accept="image/*">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="title">Title</label><span class="text-danger"></span>
                                    <input type="text" name="title" class="form-control" required placeholder="Title"
                                        value="{{ old('title',$data['title'])}}">
                                </div>
                                <div class="form-group col-md-6 ">
                                            <label>Description</label><span class="text-danger"></span>
                                            <textarea required name="text" row='10' class="form-control"> {{ old('text',$data['text'] )}}</textarea>
                                    </div>



                                <div class="form-group col-md-6">
                                    <label for="Position">Position:</label>
                                    <select name="position" id="Position">

                                        @if ($data['position'] == 1)
                                        <option selected value="{{ $data['position'] }}">Footer Top</option>
                                        <option value="2">Footer Middle</option>
                                        <option value="3">Footer Last</option>

                                        @elseif ($data['position'] == 2)
                                        <option selected value="{{ $data['position'] }}">Footer Middle</option>
                                        <option value="1">Footer Top</option>
                                        <option value="3">Footer Last</option>

                                        @elseif ($data['position'] == 3)
                                        <option selected value="{{ $data['position'] }}">Footer Last</option>
                                        <option value="1">Footer Top</option>
                                        <option value="2">Footer Middle</option>


                                        @endif
                                    </select>

                                </div>
                            </div>


                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>

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
