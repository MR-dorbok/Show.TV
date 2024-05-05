@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>قائمة المسلسلات</h2>
        <div class="row">
            @foreach($series as $show)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="{{ asset($show->thumbnail) }}"  style="height:200px" class="card-img-top" alt="{{ $show->title }}">
                        <div class="card-body" style="height: 100px;">
                            <h5 class="card-title">{{ $show->title }}</h5>
                            <p class="card-text">{{ $show->description }}</p>
                            <p>Total episodes : {{ $show->episodes->count() }}</p>
                           

                        </div>
                        <div class="card-footer">
                        @if(auth()->user()->edit == 1)
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal{{ $show->id }}">تعديل</button>
@endif
@if(auth()->user()->delete == 1)
  

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>

                            @endif
                        </div>
                        <a href="{{ route('admin.series.episodes', ['series' => $show->id]) }}" class="btn btn-dark">View Episodes</a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Pagination Links -->
        {{ $series->links() }}
    </div>
 

@foreach ($series as $show)
    <div class="modal fade" id="editModal{{ $show->id }}" tabindex="-1" role="dialog" aria-labelledby="editModal{{ $show->id }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editModal{{ $show->id }}Label">Edit Series {{ $show->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your edit form here -->
                    <form action="{{ route('admin.series.update', $show->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $show->title }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $show->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
        <input type="text" class="form-control" id="thumbnail" name="thumbnail" value="{{ $show->thumbnail }}">
    </div>
  
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>
                  
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.series.destroy', $show->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach

@endsection
