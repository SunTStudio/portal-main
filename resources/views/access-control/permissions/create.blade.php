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
            <h1>Create Permission</h1>
            <div class="lead">
                Create Permission details.
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('permissions.store') }}">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="name" class="form-label">Name Permission</label>
                            <input value="{{ old('name') }}" type="text" class="form-control"
                                name="name" placeholder="Name" required>
                            <div class="submit mt-3">
                                <button type="submit" class="btn btn-primary">Create Permission</button>
                                <a href="{{ url('/permissions') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 col-lg-10 col-10 ">
                            <p> <strong> Assign to Roles </strong></p>
                            <table id="assignRoles" class="cell-border compact stripe" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="all_roles"></th>
                                        <th>Name</th>
                                        <th>Guard</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>


                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#assignRoles').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.data') }}",
                columns: [{
                        data: 'id',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `
                            <input type="checkbox"
                                name="permision${data}"
                                value="${row.name}"
                                class='permission'
                                >
                            `;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center'
                    },
                    {
                        data: 'guard_name',
                        name: 'guard_name',
                        className: 'text-center'
                    },
                ]
            });
            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
    <script>
        var mem = $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            format: "yyyy-mm-dd",
            autoclose: true
        });

        var mem2 = $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            format: "yyyy-mm-dd",
            autoclose: true
        });
    </script>
@endsection
