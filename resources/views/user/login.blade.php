@extends('main')

@section('content')
<link rel="stylesheet" type="text/css" href="/template/css/main/user_login.css">

<div class="login-container p-t-50">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="text-center">{{ $title }}</h2>

                @include('admin.alert')

                <form class="card-body login-background p-t-20 p-b-85" action="/login/store" method="post">
                    @csrf
                    <!-- Email Input -->
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>

                    <!-- Password Input -->
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>



                </form>
            </div>
        </div>
    </div>
</div>

@endsection
