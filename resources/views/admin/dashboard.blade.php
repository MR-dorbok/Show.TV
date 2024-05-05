<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Series</div>
                <div class="card-body">
                    <h5 class="card-title">{{$totalSeries}}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Episodes</div>
                <div class="card-body">
                <h5 class="card-title">{{$totalEpisodes}}</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Total Users</div>
                <div class="card-body">
                <h5 class="card-title">{{$totalUsers}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
