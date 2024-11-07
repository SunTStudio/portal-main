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
                Edit Detail Department.
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('detail.department.update',['id' => $oldData->id]) }}">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <div class="m-2">
                                <label for="name" class="form-label">Name  Detail Department</label>
                                <input value="{{ $oldData->name }}" type="text" class="form-control" name="name"
                                    placeholder="Name Department" required>
                            </div>
                            <div class="m-2">
                                <label for="name" class="form-label">Code</label>
                                <input value="{{ $oldData->code }}" type="text" class="form-control" name="code"
                                    placeholder="Code" required>
                            </div>
                            <div class="m-2">
                                <label class="m-0 p-0">From Departments</label>
                                <select class="form-control m-b" name="departement_id">
                                    <option value=" ">Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" @if ($department->id == $oldData->departement_id)
                                            selected
                                        @endif>{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="submit mt-3">
                                <button type="submit" class="btn btn-primary">Edit Detail Department</button>
                                <a href="{{ url('/department-detail') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <hr>
                    </div>


                </form>
            </div>

        </div>
    </div>
@endsection
