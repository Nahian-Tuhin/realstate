@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
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
                                <form action="{{ route('banner.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    {{-- <div class="form-row"> --}}
                                        <div class="form-group col-md-6">
                                            <label for="title">Banner Name</label><span class="text-danger">*</span>
                                            <input type="text" name="title" class="form-control" placeholder="Banner name"
                                                value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group col-md-6 mt-4">
                                            <div class="custom-file mt-2">
                                                <label class="label" for="customFile">Choose Photo:</label>
                                                <input type="file" class="custom-input" id="customFile"
                                                    name="banner_image" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mt-4">
                                            <div class="custom-file mt-2">
                                                <label class="custom" for="customFile">Choose Background:</label>
                                                <input type="file" class="" id="customFile"
                                                    name="background_img" accept="image/*">
                                            </div>
                                        </div>
                                    {{-- </div> --}}



                                    <div class="form-group col-md-6 mt-4">
                                        <label>Description</label>
                                        <textarea  name="text" row='10' placeholder="Optional" class="form-control"> {{ old('text') }}</textarea>
                                </div>
                            {{-- </div> --}}

                            <div class="col-md-6 mb-3">
                                <label for="validationCustomUsername">Add Link to a Page</label> <small class="text-mute">(optional)</small>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">{{ url('/') }}/</span>
                                  </div>
                                  <input type="text" class="form-control" id="validationCustomUsername" name="link" value="{{ old('link') }}" placeholder="about" aria-describedby="inputGroupPrepend">
                                  <div class="invalid-feedback">

                                  </div>
                                </div>
                              </div>
                            {{-- </div> --}}
                                    <button type="submit" class="btn btn-primary">Add New</button>
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
<!-- External javascript -->
{{-- @section('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{ URL::asset('backend') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script type="text/javascript">
        //Jquery ready function
        $(document).ready(function() {
            bsCustomFileInput.init();
            $("#section_id").change(function() {
                var section_id = $(this).val();
                $.ajax({
                    type: 'post',
                    url: '/sadmin/append-category-level',
                    data: {
                        section_id: section_id
                    },
                    success: function(resp) {
                        $("#append_category").html(resp);
                    },
                    error: function() {
                        alert("Error");
                    }
                });
            });
        });
    </script>
@endsection --}}
