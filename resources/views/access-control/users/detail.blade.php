@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="bg-light p-4 rounded">
            <h1>Show user</h1>
            <div class="lead">

            </div>

            <div class="container mt-4">
                <div>
                    Name: {{ $user->name }}
                </div>
                <div>
                    Email: {{ $user->email }}
                </div>
                <div>
                    Username: {{ $user->username }}
                </div>
            </div>

        </div>
        <div class="mt-4">
            <a href="{{ route('users.role.permission',['id' => $user->id]) }}" class="btn btn-info">Role & Permission</a>
            <a href="{{ route('users.edit',['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('users') }}" class="btn btn-default">Back</a>
        </div>
    </div>
@endsection

@section('script')
@endsection
