@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Level</th>
            <th>Updated At</th>
            <th style="width: 100px">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{!! $user->level == 1 ? 'Admin' : 'User' !!}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/users/users/edit/{{ $user->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                        onclick="removeRow('{{ $user->id }}', '/admin/users/users/destroy')">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{!! $users->links() !!}

@endsection
