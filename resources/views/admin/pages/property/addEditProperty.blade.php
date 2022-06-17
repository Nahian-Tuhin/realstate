@extends('admin.layouts.master')
@section('title')
    @if (isset($property->id))
        Update Property
    @else
        Add Property
    @endif
@endsection
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
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
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
                                <form action="{{ url('sadmin/add-edit-property', $property['id']) }}" method="POST"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="category_id">Category</label> <span class="text-danger">*</span>
                                            <select name="category_id"
                                                class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                                <option value="">Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category['id'] }}"
                                                        @if ($category['id'] == $property['category_id']) selected @else ' ' @endif>
                                                        {{ $category['title'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="title">Property name</label><span class="text-danger">*</span>
                                            <input type="text" name="title" class="form-control"
                                                placeholder="Property title" value="{{ old('title', $property->title) }}"
                                                required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="bathroom">Baths</label><span class="text-danger">*</span>
                                            <input type="number" name="bathroom" class="form-control"
                                                placeholder="Bathroom number"
                                                value="{{ old('bathroom', $property->bathroom) }}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="bedroom">Beds</label><span class="text-danger">*</span>
                                            <input type="number" name="bedroom" class="form-control"
                                                placeholder="Bedroom number"
                                                value="{{ old('bedroom', $property->bedroom) }}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="price">Price</label><span class="text-danger">*</span>
                                            <input type="number" name="price" class="form-control"
                                                placeholder="Enter property price"
                                                value="{{ old('price', $property->price) }}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="rental_period">Rental period</label><span
                                                class="text-danger">*</span>
                                            <select name="rental_period" class="form-control" required>
                                                <option selected="true" disabled="disabled">-- Select Option --</option>
                                                <option value="Yearly"
                                                    {{ $property->rental_period == 'Yearly' ? 'selected' : '' }}>
                                                    Yearly
                                                </option>
                                                <option value="Monthly"
                                                    {{ $property->rental_period == 'Monthly' ? 'selected' : '' }}>
                                                    Monthly
                                                </option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="meta_title">Meta title</label> <span class="text-danger">*</span>
                                            <input type="text" class="form-control" id="meta_title" name="meta_title"
                                                placeholder="Meta title"
                                                value="{{ old('meta_title', $property->meta_title) }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="description">Description</label> <span
                                                class="text-danger">*</span>
                                            <textarea placeholder="Description" class="form-control" name="description" rows="3"
                                                required>{{ old('description', $property->description) }}</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="address">Address</label> <span class="text-danger">*</span>
                                            <textarea placeholder="Address" class="form-control" name="address" rows="3"
                                                required>{{ old('address', $property->address) }}</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="meta_description">Meta description</label> <span
                                                class="text-danger">*</span>
                                            <textarea placeholder="Meta Description" class="form-control" name="meta_description"
                                                rows="3">{{ old('meta_description', $property->meta_description) }}</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label> <span class="text-danger">*</span>
                                            <input type="file" name="image" class="form-control" accept="image/*"
                                                @if (isset($property['id'])) '' @else required @endif>
                                        </div>
                                        @if (isset($property->id))
                                            <div class="form-group col-md-2">
                                                <img src="{{ asset('/uploads/property_img/' . $property->image) }}"
                                                            onerror="this.src='{{ asset('/uploads/property_img/default.png') }}'"
                                                            alt="{{ $property->title }}" style="height:50px; margin-top: 10px;">
                                            </div>
                                        @endif
                                        <div class="form-group col-md-2">
                                            <label for="is_ongoing">Is Ongoing?</label><br>
                                            <input type="checkbox" name="is_ongoing" value="onGoing">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>

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
@section('scripts')
@endsection
