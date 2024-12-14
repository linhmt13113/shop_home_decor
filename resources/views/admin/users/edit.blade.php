@extends('admin.main')

@section('content')
<form action="" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password (Leave blank to keep current)</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <select name="level" class="form-control" required>
                <option value="0" {{ $user->level == 0 ? 'selected' : '' }}>User</option>
                <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update User</button>
    </div>
    @csrf
</form>
@endsection
