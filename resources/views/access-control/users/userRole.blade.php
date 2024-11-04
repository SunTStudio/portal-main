@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="bg-light p-4 rounded">
            <h1>User Roles</h1>
            <div class="lead">
                Add & Delete Roles Users.
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('user.update.roles.data', ['id' => $user->id]) }}">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <h3>Nama User : {{ $user->name }}</h3>
                            <div class="submit mt-3">
                                <button type="submit" class="btn btn-primary">Update Roles</button>
                                <a href="{{ route('users.detail',['id' => $user->id]) }}" class="btn btn-default">Back</a>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 col-lg-10 col-10">
                            <p><strong>Assign to Roles</strong></p>
                            <table id="assignRoles" class="cell-border compact stripe" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="all_roles" id="allCheck"></th>
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
                paging: false,
                ajax: "{{ route('user.roles.data', ['id' => $user->id]) }}",
                columns: [{
                        data: 'name',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            // Tambahkan logika untuk mencentang checkbox jika `has_permission` bernilai true
                            let checked = row.has_user  ? 'checked' : '';
                            return `
                <input type="checkbox"
                    name="roles[]"
                    value="${row.id}"
                    class="role-checkbox"
                    ${checked}
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
                let checkboxes = document.querySelectorAll('.role-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            new $.fn.dataTable.FixedHeader(table);
        });

        // Datepicker Initialization
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
