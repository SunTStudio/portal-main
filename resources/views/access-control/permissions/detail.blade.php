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
            <h1>Permission Detail</h1>
            <div class="container mt-4">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf

                        <div class="mb-3 ">
                            <h3>Name : {{ $permissionData->name }}</h3>
                            <h3>Guard : {{ $permissionData->guard_name }}</h3>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="mb-3 col-lg-10 col-10 ">
                            <p> <strong> Permission to Roles </strong></p>
                            <table id="assignRoles" class="cell-border compact stripe" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Guard</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>



                </form>
                <a href="{{ url('/permissions') }}" class="btn btn-default">Back</a>
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
                ajax: "{{ route('permissions.data.hasRoles',['permission' => $permissionData->name]) }}",
                columns: [
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
