@extends('layouts.app')

@section('content')
    <div class="row pb-5 pl-5 pr-5 ">
        <div class="col bg-white p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div id="heading">
                    <h1>Permissions</h1>
                    <h3>Manage your permissions here.</h3>
                </div>
                <div id="addUsers">
                    <a href="{{ url('permissions/create') }}" class="btn btn-secondary">Tambah Permissions</a>
                </div>
            </div>
            <div id="tableUsers" class="">
                <table id="permissionsDatatables" class="cell-border compact stripe" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        $(document).ready(function() {
            var table = $('#permissionsDatatables').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('permissions.data') }}",
                columns: [{
                        data: null,
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row, meta) {
                            var pageInfo = table.page
                                .info(); // Use the `table` variable to get the page info
                            return pageInfo.start + meta.row +
                                1; // Adjusts the row number based on the start index of the current page
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
                    {
                        data: 'id',
                        name: 'id',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="d-flex justify-content-center">
                                    <a href="{{ url('/permissions/detail') }}/${data}" class="btn btn-sm btn-primary m-1">
                                        See Detail
                                    </a>
                                                <a href="{{ url('/permissions/edit') }}/${data}" class="btn btn-sm btn-warning m-1">
                                                    Edit
                                                </a>
                                                <div class="d-flex align-items-center">

                                                            <form action="{{ url('/permissions/delete') }}/${data}" method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus Model ini?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <!-- Ini menandakan bahwa request ini adalah DELETE method -->
                                                                <button type="submit" class="btn p-1 btn-danger">Hapus <i
                                                                        class="fa fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                </div>`;
                        }
                    }
                ]
            });
            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
@endsection
