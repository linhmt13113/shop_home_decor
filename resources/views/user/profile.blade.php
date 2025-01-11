
@extends('main')

@section('content')
<link rel="stylesheet" type="text/css" href="/template/css/main/user_profile.css">


<div class="profile-container profile-background p-t-120 p-b-85 fixed-profile ">
    <h2 class="text-center p-t-40 ">{{ $user->name }} Profile</h2>

    @include('admin.alert')

    <form class="profile-background p-t-20 p-b-85" action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">New Password (Leave blank if not changing)</label>
            <input type="password" class="form-control" name="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
<!-- <div class="spacer" style="height: 100px;"></div> -->


@endsection


