@extends('admin.layouts.master')
@section('title')
    All Property
@endsection
@section('styles')
    <style>
        a {
            color: #5da1eb;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catalogue</h1>
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
                @include('admin.partials.message')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                                <a href="{{ url('sadmin/add-edit-property') }}" class="btn btn-success float-right">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> {{ $title }}</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Property</th>
                                            <th>Image</th>
                                            <th>Period</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($properties))
                                            @foreach ($properties as $key => $property)
                                                <tr>
                                                    <td>{{ ++$key }}</td>

                                                    <td class="text-dark"><a> {{ $property->title }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('/uploads/property_img/' . $property->image) }}"
                                                            onerror="this.src='{{ asset('/uploads/property_img/default.png') }}'"
                                                            alt="{{ $property->title }}" style="height:100px;">
                                                    </td>
                                                    <td>
                                                        {{ $property->rental_period }}
                                                    </td>
                                                    <td>{{ $property->slug }}</td>
                                                    <td>
                                                        @if ($property->status == 1)
                                                            <a title="Change" property_id="{{ $property->id }}"
                                                                class="text-success property_status"
                                                                id="property_{{ $property->id }}"
                                                                href="javascript:void(0)"> Active
                                                            </a>
                                                        @else
                                                            <a title="Change" property_id="{{ $property->id }}"
                                                                class="property_status text-danger"
                                                                id="property_{{ $property->id }}"
                                                                href="javascript:void(0)"> In Active
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- <a title="Add Images"
                                                            href="{{ url('sadmin/add-property-image', $property->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                                        </a> --}}
                                                        <a class="btn btn-warning btn-sm"
                                                            href="{{ url('sadmin/add-edit-property', $property->id) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form style="display: inline-block"
                                                            action="{{ route('delete.property', $property->id) }}"
                                                            class="form-delete" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No {{ $title }} found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
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
@stop
<!-- External javascript -->
@section('scripts')
    <script type="text/javascript">
        //Jquery ready function
        $(document).on("click", ".property_status", function() {
            var status = $(this).text();
            var property_id = $(this).attr("property_id");
            $.ajax({
                type: 'post',
                url: '/sadmin/update-property-status',
                data: {
                    status: status,
                    property_id: property_id
                },
                success: function(resp) {
                    if (resp['status'] == 0) {
                        $("#property_" + property_id).html(
                            "<a href='javascript:void(0)' class='property_status'>In Active</a>"
                        )
                    } else if (resp['status'] == 1) {
                        $("#property_" + property_id).html(
                            "<a href='javascript:void(0)' class='property_status'>Active</a>"
                        )
                    }
                },
                error: function() {
                    alert("Error");
                }
            });
        });
    </script>
@endsection
