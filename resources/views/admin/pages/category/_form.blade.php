@csrf
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="title">Category name</label><span class="text-danger">*</span>
        <input type="text" name="title" class="form-control" placeholder="Category title"
            value="{{ old('title', $category->title) }}">
    </div>
    <div class="form-group col-md-6">
        <label for="meta_title">Meta title</label> <span class="text-danger">*</span>
        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta title"
            value="{{ old('meta_title', $category->meta_title) }}">
    </div>
    <div class="form-group col-md-6">
        <label for="description">Description</label> <span class="text-danger">*</span>
        <textarea placeholder="Description" class="form-control" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
    </div>
    <div class="form-group col-md-6">
        <label for="meta_description">Meta description</label> <span class="text-danger">*</span>
            <textarea placeholder="Meta Description" class="form-control" name="meta_description" rows="3">{{ old('meta_description', $category->meta_description) }}</textarea>
    </div>
</div>
<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
