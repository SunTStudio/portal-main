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
        <div class="bg-light p-4 rounded">
            <h1>Add new user</h1>
            <div class="lead">
                Add new user and assign role.
            </div>

            <div class="container mt-4">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="name" class="form-label">PIC Name</label>
                            <input value="" type="text" class="form-control" name="name" placeholder="Name"
                                required>

                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="email" class="form-label">Email</label>
                            <input value="" type="email" class="form-control" name="email"
                                placeholder="Email address" required>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="username" class="form-label">Username</label>
                            <input value="" type="text" class="form-control" name="username" placeholder="Username"
                                required>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="password" class="form-label">Password</label>
                            <input value="" type="password" class="form-control" name="password"
                                placeholder="Password" required>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Tanggal Lahir</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="tgl_lahir"
                                        value="{{ old('tgl_lahir') }}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="email" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender" required="required">
                                <option value="" selected="selected"> -- Select -- </option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <div class="form-group" id="data_2">
                                <label class="font-normal">Tanggal Masuk</label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="tgl_masuk"
                                        value="{{ old('tgl_masuk') }}">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="dept_id" class="form-label">Department</label>
                            <select class="form-control" id="dept_id" name="dept_id" required="required" onchange="departmentSelect(this)">
                                <option value="" selected="selected"> -- Select -- </option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="detail_dept_id" class="form-label">Detail Department</label>
                            <select class="form-control" id="DetailDepartement" name="detail_dept_id" required="required" >
                                <option value="" selected="selected"> -- Select -- </option>
                                @foreach ($detail_departements as $detail_departement)
                                    <option value="{{ $detail_departement->id }}">{{ $detail_departement->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="position_id" class="form-label">Position</label>
                            <select class="form-control" id="position_id" name="position_id" required="required">
                                <option value="" selected="selected"> -- Select -- </option>
                                @foreach ($positions as $positions)
                                    <option value="{{ $positions->id }}">{{ $positions->position }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="email" class="form-label">Golongan</label>
                            <input value="" type="text" class="form-control" name="golongan"
                                placeholder="Golongan " required>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="email" class="form-label">Npk</label>
                            <input value="" type="text" class="form-control" name="npk" placeholder="npk "
                                required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save User</button>
                    <a href="{{ url('/users') }}" class="btn btn-default">Back</a>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>

        function departmentSelect(selectDeparment){
            selectedDeparment = Array.from(selectDeparment.selectedOptions).map(option => option.value);

            $.ajax({
                url: "{{ route('sort.struktur') }}",
                type: "GET",
                data: {
                    sortDepartment: selectedDeparment,
                },
                success: function(data) {
                        // Menghapus isi dari elemen dengan ID DetailDepartement
                        $('#DetailDepartement').empty(); // Memanggil .empty() dengan tanda kurung

                        // Membangun string HTML
                        $('#DetailDepartement').append('<option value=" " selected="selected"> -- Select -- </option>');
                        $.each(data.resultDetailDepartments, function(index, detail) {
                            $('#DetailDepartement').append(
                                `<option value="${detail.name}">${detail.name}</option>`
                            );
                        });
                },
                error: function() {
                    // Tangani kesalahan di sini
                },
            });
        }

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
