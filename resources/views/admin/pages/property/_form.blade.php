@csrf
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="category_id">Category</label> <span class="text-danger">*</span>
        <select class="form-control select2bs4" id="category_id" name="category_id">
            <option value="">Select section</option>
            @foreach ($getCategories as $category)
                <option value="{{ $category['id'] }}" @if (!empty($category['category_id']) && $category['category_id'] == $category->id) selected @endif>
                    {{ $category['title'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="title">Property name</label><span class="text-danger">*</span>
        <input type="text" name="title" class="form-control" placeholder="Property title"
            value="{{ old('title', $property->title) }}">
    </div>
    <div class="form-group col-md-4">
        <label for="bathroom">Baths</label><span class="text-danger">*</span>
        <input type="number" name="bathroom" class="form-control" placeholder="Bathroom number"
            value="{{ old('bathroom', $property->bathroom) }}">
    </div>
    <div class="form-group col-md-4">
        <label for="bedroom">Beds</label><span class="text-danger">*</span>
        <input type="number" name="bedroom" class="form-control" placeholder="Bedroom number"
            value="{{ old('bedroom', $property->bedroom) }}">
    </div>
    <div class="form-group col-md-4">
       <label for="price">Price</label><span class="text-danger">*</span>
       <input type="number" name="price" class="form-control" placeholder="Enter property price">
    </div>
    <div class="form-group col-md-4">
        <label for="rental_period">Rental period</label><span class="text-danger">*</span>
        <select name="rental_period" class="form-control">
            <option>--Select--</option>
            <option value="yearly">Yearly</option>
            <option value="monthly">Monthly</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label for="meta_title">Meta title</label> <span class="text-danger">*</span>
        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta title"
            value="{{ old('meta_title', $property->meta_title) }}">
    </div>
    <div class="form-group col-md-4">
        <label for="description">Description</label> <span class="text-danger">*</span>
        <textarea placeholder="Description" class="form-control" name="description"
            rows="3">{{ old('description', $property->description) }}</textarea>
    </div>
    <div class="form-group col-md-4">
        <label for="meta_description">Meta description</label> <span class="text-danger">*</span>
        <textarea placeholder="Meta Description" class="form-control" name="meta_description"
            rows="3">{{ old('meta_description', $property->meta_description) }}</textarea>
    </div>
    <div class="form-group col-md-4">
        <label for="image">Image</label> <span class="text-danger">*</span>
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="form-group col-md-2">
        <label for="is_ongoing">Is Ongoing?</label><br>
        <input type="checkbox" name="is_ongoing" value="onGoing">
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
