@extends('layouts.app')

@section('content')
    <div class="row pb-5 pl-5 pr-5 ">
        <div class="col bg-white p-3">
            <div class="d-flex row justify-content-between align-items-center">
                <div id="heading" class="mb-2 col-lg-6 col-12">
                    <h1>Detail Department</h1>
                    <h3>Manage your Detail Department here</h3>
                    <a href="{{ url('department-detail/create') }}" class="btn btn-secondary">Tambah Detail Department</a>
                </div>
                <div class="col-lg-4 col-12 ">
                    <div class="row">
                        <div class="col-lg-3 col-12 text-center m-1">
                            <a href="{{ route('file.download', ['filename' => 'template-detail-department.xlsx']) }}"
                                class="btn btn-primary"><i class="fa fa-download"></i> Template</a>
                        </div>
                        <div class="col-lg-8 col-12 text-center m-1">
                            <form action="{{ route('detail.department.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="fileinput fileinput-new border border-secondary rounded"
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
            <div id="tableUsers" class="">
                <table id="detailDepartmentDatatables" class="cell-border compact stripe" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From Department</th>
                            <th>Name</th>
                            <th>Code</th>
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
            var table = $('#detailDepartmentDatatables').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('detail.department.data') }}",
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
                        className: 'text-center',
                        render: function(data, type, row) {
                            return row.department.name
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center'
                    },
                    {
                        data: 'code',
                        name: 'code',
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

                                                <a href="{{ url('/department-detail/edit') }}/${data}" class="btn btn-sm btn-warning m-1">
                                                    Edit
                                                </a>
                                                <div class="d-flex align-items-center">

                                                            <form action="{{ url('/department-detail/delete') }}/${data}" method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus detail department ini?');">
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
