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
            <h1>Create Role</h1>
            <div class="lead">
                Create Role details.
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="name" class="form-label">Name Role</label>
                            <input value="{{ old('name') }}" type="text" class="form-control"
                                name="name" placeholder="Name" required>
                            <div class="submit mt-3">
                                <button type="submit" class="btn btn-primary">Create Role</button>
                                <a href="{{ url('/roles') }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 col-lg-10 col-10 ">
                            <p> <strong> Assign Permissions </strong></p>
                            <table id="assignPermission" class="cell-border compact stripe" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="all_permission" id="allCheck"></th>
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
            var table = $('#assignPermission').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                paging: false,
                ajax: "{{ route('permissions.data') }}",
                columns: [{
                        data: 'id',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `
                            <input type="checkbox"
                                name="permissions[]"
                                value="${row.name}"
                                class='permission-checkbox'
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
            // Checkbox "Check All"
            $('#allCheck').on('change', function() {
                let checkboxes = document.querySelectorAll('.permission-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
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
