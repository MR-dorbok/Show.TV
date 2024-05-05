@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ $category->name }}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($shows as $show)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ $show->thumbnail }}" class="card-img-top" alt="{{ $show->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $show->title }}</h5>
                    <p class="card-text">{{ $show->description }}</p>
                    <a href="#" class="btn btn-primary">التفاصيل</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
