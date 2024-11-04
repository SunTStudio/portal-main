@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="wrapper wrapper-content">
        <div class="bg-white p-4 rounded">
            <div class="lead">
                Create Position.
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('position.store') }}">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <div class="m-2">
                                <label for="position" class="form-label">Name Position</label>
                                <input value="{{ old('position') }}" type="text" class="form-control" name="position"
                                    placeholder="Name position" required>
                            </div>
                            <div class="m-2">
                                <label for="code" class="form-label">Code</label>
                                <input value="{{ old('code') }}" type="text" class="form-control" name="code"
                                    placeholder="Code" required>
                            </div>
                            <div class="submit mt-3">
                                <button type="submit" class="btn btn-primary">Create position</button>
                                <a href="{{ url('/position') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <hr>
                    </div>


                </form>
            </div>

        </div>
    </div>
@endsection
