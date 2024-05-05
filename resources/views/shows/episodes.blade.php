@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- فيديو التريلر -->
                <div class="embed-responsive embed-responsive-16by9 mb-4">
                <iframe width="420" height="315"
src="{{ $show->video_asset }}">
</iframe>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h1>{{ $show->title }} Episodes</h1>
                <div class="row">
                    @foreach($episodes as $episode)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <img class="card-img-top" src="{{ $episode->thumbnail_url }}" alt="{{ $episode->title }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $episode->title }}</h4>
                                    <p class="card-text">{{ $episode->description }}</p>
                                    <p class="card-text">Duration: {{ $episode->duration }}</p>
                                    <p class="card-text">Airing Time: {{ $episode->airing_time }}</p>
                                </div>
                                <div class="card-footer">
                                    @auth
                                    <a href="{{ route('episodes.show', ['episode' => $episode->id]) }}" class="btn btn-primary">Watch Now</a>
                                    @else
                                    <a href="{{ route('login') }}" class="btn btn-primary">Watch Now</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $episodes->links() }}
            </div>
        </div>
    </div>
@endsection
