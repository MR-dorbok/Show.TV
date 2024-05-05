{{-- profile.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Profile</h1>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        
        <!-- Form for updating profile -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            
            <div class="form-group">
                <label for="image">Profile Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
