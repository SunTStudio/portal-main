@extends('layouts.app')

@section('content')
    <div class="row pb-5 pl-5 pr-5 ">
        <div class="col bg-white p-3">
            <div class="d-flex row justify-content-between align-items-center">
                <div id="heading" class="mb-2 col-lg-6 col-12">
                    <h1>Users</h1>
                    <h3>Manage your users here.</h3>
                    <a href="{{ url('/users/create') }}" class="btn btn-secondary">Tambah Users</a>
                </div>
                <div class="col-lg-4 col-12 ">
                    <div class="row">
                        <div class="col-lg-3 col-12 text-center d-flex align-items-center justify-content-center m-1">
                            <a href="{{ route('file.download', ['filename' => 'template-users.xlsx']) }}"
                                class="btn btn-primary"><i class="fa fa-download"></i> Template</a>
                        </div>
                        <div class="col-lg-8 col-12 text-center m-1">
                            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="fileinput fileinput-new border border-secondary rounded mt-2"
                                    data-provides="fileinput">
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">Import by file Excel</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="file" required />
                                    </span>
                                    <span class="fileinput-filename"></span>
                                    <a href="#" class="close fileinput-exists" data-dismiss="fileinput"
                                        style="float: none">×</a>
                                </div>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group row mt-1 p-3">
                <div class="col-sm-4">
                    <label class="m-0 p-0">Departments</label>
                    <select class="form-control m-b" name="account" id="departmentsFilter">
                        <option value=" ">Semua</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <label class="m-0 p-0">Detail Departments</label>
                    <select class="form-control m-b" name="account" id="detaildepartmentsFilter">
                        <option value=" ">Semua</option>
                        @foreach ($detail_departements as $detail_departement)
                            <option value="{{ $detail_departement->id }}">{{ $detail_departement->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <label class="m-0 p-0">Positions</label>
                    <select class="form-control m-b" name="account" id="positionFilter">
                        <option value=" ">Semua</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->position }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="tableUsers" class="">
                <table id="usersDatatables" class="cell-border compact stripe" width="100%">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Departement</th>
                            <th>Detail Departement</th>
                            <th>Position</th>
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
            var table = $('#usersDatatables').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.data') }}",
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
                        data: 'username',
                        name: 'username',
                        className: 'text-center'
                    },
                    {
                        data: 'dept_id',
                        name: 'dept_id',
                        className: 'text-center',
                        render: function(data, type, row) {
                            return row.department ? row.department.name : '-';
                        }
                    },
                    {
                        data: 'detail_dept_id',
                        name: 'detail_dept_id',
                        className: 'text-center',
                        render: function(data, type, row) {
                            return row.detail_department ? row.detail_department.name : '-';
                        }
                    },
                    {
                        data: 'position_id',
                        name: 'position_id',
                        className: 'text-center',
                        render: function(data, type, row) {
                            return row.position ? row.position.position : '-';
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        className: 'text-center',
                        orderable: false,
                        render: function(data, type, row) {
                            return `
                                <div class="d-flex justify-content-center">
                                    <a href="{{ url('/users/detail') }}/${data}" class="btn btn-sm btn-primary m-1">
                                        See Detail
                                    </a>
                                                <a href="{{ url('/users/edit') }}/${data}" class="btn btn-sm btn-warning m-1">
                                                    Edit
                                                </a>
                                                <div class="d-flex align-items-center">

                                                            <form action="{{ url('/users/delete') }}/${data}" method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus User ini?');">
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

            $('#departmentsFilter').on('change', function() {
                var selectedDepartments = $(this).val();
                filterDetailDepartments(selectedDepartments);
                if(selectedDepartments == ' '){
                    table.column(3).search(selectedDepartments).draw();
                }else{
                    var regex = '^' + selectedDepartments + '$';

                    // Terapkan pencarian ke kolom
                    table.column(3).search(regex, true, false).draw();
                }
            });

            $('#detaildepartmentsFilter').on('change', function() {
                var selectedDepartments = $(this).val();
                if(selectedDepartments == ' '){
                    table.column(4).search(selectedDepartments).draw();
                }else{
                    var regex = '^' + selectedDepartments + '$';

                    // Terapkan pencarian ke kolom
                    table.column(4).search(regex, true, false).draw();
                }
            });

            $('#positionFilter').on('change', function() {
                var selectedDepartments = $(this).val();
                if(selectedDepartments == ' '){
                    table.column(5).search(selectedDepartments).draw();
                }else{
                    var regex = '^' + selectedDepartments + '$';

                    // Terapkan pencarian ke kolom
                    table.column(5).search(regex, true, false).draw();
                }
            });

            new $.fn.dataTable.FixedHeader(table);
        });

        function filterDetailDepartments(sort) {
            $.ajax({
                url: "{{ route('user.filter.index') }}",
                type: "GET",
                data: {
                    sortDetail: sort
                },
                success: function(data) {
                    $('#detaildepartmentsFilter').empty();
                    $('#detaildepartmentsFilter').append(
                        `
                            <option value=" ">Semua</option>
                        `
                    );
                    $.each(data.data, function(index, detail) {
                        $('#detaildepartmentsFilter').append(
                            `
                            <option value="${detail.id}">${detail.name}</option>
                        `

                        );
                    });
                },
                error: function() {
                    // Tangani kesalahan di sini
                },
            });
        }
    </script>
@endsection
