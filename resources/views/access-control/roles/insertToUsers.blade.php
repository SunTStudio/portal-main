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
            <h1>Role Detail</h1>
            <div class="container mt-4">
                <form method="POST" action="{{ route('roles.users.store',['role' => $roleData->name ]) }}">
                    @csrf

                        <div class="mb-3 ">
                            <h3>Name : {{ $roleData->name }}</h3>
                            <h3>Guard : {{ $roleData->guard_name }}</h3>
                        </div>
                        <button type="submit" class="btn btn-success">Tambah Role ke Users</button>
                        <div class="hr-line-dashed"></div>
                        <div class="mb-3  ">
                            <p> <strong> Assign To Users </strong></p>
                            <table id="assignPermission" class="cell-border compact stripe" width="100%">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="all_roles" id="allCheck"></th>
                                        <th>Name</th>
                                        <th>Departement</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>


                </form>
                <a href="{{ url('/roles') }}" class="btn btn-default">Back</a>
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
                paging: false,
                serverSide: true,
                ajax: "{{ route('roles.insert.roleToUsers',['role' => $roleData->name]) }}",
                columns: [
                    {
                        data: 'name',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            // Tambahkan logika untuk mencentang checkbox jika `has_user` bernilai true
                            let checked = row.has_roles  ? 'checked' : '';
                            return `
                <input type="checkbox"
                    name="users[]"
                    value="${row.id}"
                    class="users-checkbox"
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
                        data: 'dept_id',
                        name: 'dept_id',
                        className: 'text-center',
                        render: function(data,row) {
                            return row.department ? row.department.name : 'Tidak ada';
                        },
                    },
                ]
            });
             // Checkbox "Check All"
             $('#allCheck').on('change', function() {
                let checkboxes = document.querySelectorAll('.users-checkbox');
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
