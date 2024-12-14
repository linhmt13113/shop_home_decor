@extends('main')

@section('content')

<div class="container bg0 p-t-130 p-b-85 ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="text-center">{{ $title }}</h2>

                @include('admin.alert')

                <form class="card-body bg0 p-t-20 p-b-85" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Full Name"
                            value="{{ old('name') }}" required autofocus>

                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}" required>

                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>

                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm Password" required>

                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection
