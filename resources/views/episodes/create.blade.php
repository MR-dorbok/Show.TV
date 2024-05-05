@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Create Episode</h1>
        <form action="{{ route('episodes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="show_id">Select Show</label>
                <select class="form-control" id="show_id" name="show_id" required>
                    @foreach($shows as $show)
                        <option value="{{ $show->id }}">{{ $show->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="episode_title">Episode Title</label>
                <input type="text" class="form-control" id="episode_title" name="episode_title" required>
            </div>
            <div class="form-group">
                <label for="episode_description">Episode Description</label>
                <textarea class="form-control" id="episode_description" name="episode_description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="episode_duration">Episode Duration</label>
                <input type="text" class="form-control" id="episode_duration" name="episode_duration" required>
            </div>
            <div class="form-group">
                <label for="episode_airing_time">Episode Airing Time</label>
                <input type="text" class="form-control" id="episode_airing_time" name="episode_airing_time" required>
            </div>
            <div class="form-group">
                <label for="episode_thumbnail">Episode Thumbnail URL</label>
                <input type="text" class="form-control" id="episode_thumbnail" name="episode_thumbnail" required>
            </div>
            <div class="form-group">
                <label for="episode_trailer_url">Episode Trailer Video URL</label>
                <input type="text" class="form-control" id="episode_trailer_url" name="episode_trailer_url" required>
            </div>
            <button type="submit" class="btn btn-success">Create Episode</button>
        </form>
    </div>
@endsection
