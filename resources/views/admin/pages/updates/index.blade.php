@extends('admin.layouts.master')
@section('title')
Latest Updates
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
            @include('admin.partials.message')
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Updates</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('sadmin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Updates</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title}}</h3>
                            <a href="{{ route('latestupdates.create') }}" class="btn btn-success float-right">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>Add Update</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($updates as $key => $update)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $update['title'] }}</td>

                                        <td width="20%">
                                            @if (!empty($update['image']))

                                            <img style="width: 60px;" src="{{ URL::asset('/uploads/latestupdates/'.$update->image) }}" alt="{{ $update->title }}">
                                            @else
                                            <img style="width: 60px; border: 3px solid red" src="{{ url('uploads/no_image.png') }}" alt="No Image">
                                            @endif
                                        </td>


                                        <td width="20%">

                                            {{   Str::limit( $update->text, 5, $end='....') }}

                                        </td>

                                        <td>@if ($update->status == 1 )
                                            <a title="Change" update_id="{{ $update->id }}" class="text-success update_status" id="update_{{ $update->id }}" href="javascript:void(0)"> Active
                                            </a>
                                            @else
                                            <a title="Change" update_id="{{ $update->id }}" class="update_status text-danger" id="update_{{ $update->id }}" href="javascript:void(0)"> In Active
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ route('latestupdates.edit', $update->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form style="display: inline-block" action="{{ route('latestupdates.destroy', $update->id) }}" class="form-delete" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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
    $(document).ready(function() {
        $(".update_status").click(function() {
            var status = $(this).text();
            var update_id = $(this).attr("update_id");
            $.ajax({
                headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                type: 'post',
                url: '/sadmin/update-latestupdates-status',
                data: {
                    status: status,
                    update_id: update_id
                },
                success: function(resp) {
                    if (resp['status'] == 0) {
                        $("#update_" + update_id).html(
                            "<a href='javascript:void(0)' class='update_status'>Inactive</a>"
                        )
                    } else if (resp['status'] == 1) {
                        $("#update_" + update_id).html(
                            "<a href='javascript:void(0)' class='update_status'>Active</a>"
                        )
                    }
                },
                error: function() {
                    alert("Error");
                }
            });
        });
    });
</script>
@endsection
