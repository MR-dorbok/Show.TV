@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Show</h1>
        <form action="{{ route('shows.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="show_title">Show Title</label>
        <input type="text" class="form-control" id="show_title" name="show_title" required>
    </div>
    <div class="form-group">
        <label for="show_description">Show Description</label>
        <textarea class="form-control" id="show_description" name="show_description" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="show_thumbnail">Show Thumbnail URL</label>
        <input type="text" class="form-control" id="show_thumbnail" name="show_thumbnail" required>
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <?php
        $categories = \App\Models\Category::all();
?>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create Show</button>
</form>

    </div>
@endsection
