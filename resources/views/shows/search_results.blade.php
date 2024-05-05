<!-- resources/views/search_results.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Search Results</h1>
    @if($results->isNotEmpty())
        <div class="row">
            @foreach($results as $result)
                <div class="col-lg-3 col-md-4 mb-3">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{ $result->thumbnail }}" alt="{{ $result->title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $result->title }}</h4>
                            <p class="card-text">{{ $result->description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('show.episodes', ['show' => $result->id]) }}" class="btn btn-dark">View Episodes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No results found.</p>
    @endif
</div>
@endsection
