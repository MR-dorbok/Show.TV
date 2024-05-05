@extends('layouts.app')

@section('content')
<body style="background-color:#000;color:#fff">
<div class="container">
 
    <div class="row justify-content-center">
        @foreach($showsByCategory as $categoryId => $shows)
            @if($shows->isNotEmpty())
                <h2>Category: {{ $categoryId }}</h2>
                @foreach($shows as $show)
                    <div class="col-lg-3 col-md-4 mb-3">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ $show->thumbnail }}" alt="{{ $show->title }}">
                            <div class="card-body">
                                <h4 class="card-title" style="color:#000">{{ $show->title }}</h4>
                                <p class="card-text" style="color:#000">{{ $show->description }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('show.episodes', ['show' => $show->id]) }}" class="btn btn-dark">View Episodes</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="alert alert-warning" role="alert">
                        No shows in this category.
                    </div>
                </div>
            @endif
        @endforeach
    </div>

 

</div>
</body>
@endsection
