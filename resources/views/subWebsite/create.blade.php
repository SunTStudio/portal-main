@extends('layouts.app')
@section('css')
    <link href="{{ url('css/plugins/select2/select2.min.css') }}" rel="stylesheet">
@endsection
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

            <div class="container mt-4">
                <form method="POST" action="{{ route('subWebsite.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h3>Tambah Sub Website Baru</h3>

                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="name" class="form-label">Nama Website :</label>
                            <input value="" type="text" class="form-control" name="name" placeholder="Name"
                                required>

                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="email" class="form-label">Link Website ("contoh : http://10.14.179.250:1111" tanpa "/" diakhir)</label>
                            <input value="" type="text" class="form-control" name="link"
                                placeholder="Link Website" required>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="formFile" class="form-label">Sampul Website</label>
                            <input class="form-control" name="sampul" type="file" id="formFile">
                        </div>

                    </div>
                    <div class="hr-line-dashed"></div>
                    <h3>Hak Akses Sub Website <small> (Default "Semua") </small></h3>
                    <div id="checkbox" class="d-flex ">
                        <div class="m-3">
                            <input type="checkbox" id="ByDepartement"> <span> By Departement</span>
                        </div>
                        <div class="m-3">
                            <input type="checkbox" id="ByDetailDepartement"> <span> By Detail Departement</span>
                        </div>
                        <div class="m-3">
                            <input type="checkbox" id="ByPosition"> <span> By Position</span>
                        </div>
                        <div class="m-3">
                            <input type="checkbox" id="ByUser"> <span> By Users</span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="mb-3 col-lg-5 col-8" id="Departement" style="visibility: hidden;position: absolute;">
                            <label for="password" class="form-label">Departement Access</label>
                            <select class="select2_demo_2 form-control" name="departments[]" id="departments"
                                multiple="multiple" onchange="sortDepartment(this)">
                                <option value="tidak">Tidak Ada</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->name }}">
                                        {{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1" id="addCol1" style="position: absolute;"></div>
                        <div class="mb-3 col-lg-5 col-8" id="DetailDepartement"
                            style="visibility: hidden;position: absolute;">
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Detail Departement Access</label>
                                <select class="select2_demo_2 form-control" id="detail_departements"
                                    name="detail_departements[]" multiple="multiple" onchange="sortDetailDepartment(this)">
                                    <option value="tidak">Tidak Ada</option>
                                    @foreach ($detail_departements as $detail_departement)
                                        <option value="{{ $detail_departement->name }}">{{ $detail_departement->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-1" id="addCol2" style="position: absolute;"></div>
                        <div class="mb-3 col-lg-5 col-8" id="Position" style="visibility: hidden;position: absolute;">
                            <label for="email" class="form-label">Position Access</label>
                            <select class="select2_demo_2 form-control" name="positions[]" multiple="multiple"
                                onchange="sortPosition(this)">
                                <option value="tidak">Tidak Ada</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->position }}">{{ $position->position }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1" id="addCol3" style="position: absolute;"></div>
                        <div class="mb-3 col-lg-5 col-8" id="Users" style="visibility: hidden;position: absolute;">
                            <label for="email" class="form-label">User Access</label>
                            <select class="select2_demo_2 form-control" id="users_list" name="users[]"
                                multiple="multiple">
                                <option value="tidak">Tidak Ada</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->npk }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1" id="addCol4" style="position: absolute;"></div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <button type="submit" class="btn btn-primary">Tambah Sub Website</button>
                    <a href="{{ url('/') }}" class="btn btn-default">Back</a>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <!-- Select2 -->
    <script src="{{ url('js/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        var selectedDeparment;
        var selectedDetailDeparment;
        var selectedPosition;

        function sortDepartment(selectDeparment) {
            // Ambil semua nilai yang dipilih
            selectedDeparment = Array.from(selectDeparment.selectedOptions).map(option => option.value);
            sortAccessDetailDeparment();
        }

        function sortDetailDepartment(selectDetailDeparment) {
            // Ambil semua nilai yang dipilih
            selectedDetailDeparment = Array.from(selectDetailDeparment.selectedOptions).map(option => option.value);
            sortAccessUser();
        }

        function sortPosition(selectPosition) {
            // Ambil semua nilai yang dipilih
            selectedPosition = Array.from(selectPosition.selectedOptions).map(option => option.value);
            sortAccessUser();
        }

        function sortAccessDetailDeparment() {
            $.ajax({
                url: "{{ route('sort.access') }}",
                type: "GET",
                data: {
                    sortDepartment: selectedDeparment,
                    sortDetailDepartment: selectedDetailDeparment,
                    sortPosition: selectedPosition
                },
                success: function(data) {
                    if (data.resultDetailDepartments.length != 0) {
                        // Menghapus isi dari elemen dengan ID DetailDepartement
                        $('#DetailDepartement').empty(); // Memanggil .empty() dengan tanda kurung

                        // Membangun string HTML
                        let options = ''; // Menyimpan opsi yang akan ditambahkan
                        $.each(data.resultDetailDepartments, function(index, detail) {
                            options += `<option value="${detail.name}">${detail.name}</option>`;
                        });


                        // Menambahkan elemen baru ke dalam DetailDepartement
                        $('#DetailDepartement').append(
                            `
                                            <div class="form-group" id="data_1">
                                                <label class="font-normal">Detail Departement Access</label>
                                                <select class="select2_demo_2 form-control" id="detail_departements" name="detail_departements[]" multiple="multiple"
                                                    onchange="sortDetailDepartment(this)">
                                                    <option value="tidak">Tidak Ada</option>
                                                    ${options}
                                                </select>
                                            </div>
                                        `
                        );

                        // Inisialisasi Select2 setelah menambahkan elemen
                        $('#detail_departements').select2({
                            // Tambahkan opsi konfigurasi jika diperlukan
                            placeholder: "Semua",
                            allowClear: true
                        });
                    }

                    if (data.resultUsers.length != 0) {
                        $('#Users').empty();

                        // Membangun string HTML
                        let options = ''; // Menyimpan opsi yang akan ditambahkan
                        $.each(data.resultUsers, function(index, users) {
                            options += `<option value="${users.name}">${users.name}</option>`;
                        });

                        $('#Users').append(
                            `
                                            <label for="email" class="form-label">User Access</label>
                                            <select class="select2_demo_2 form-control" id="users_list" name="users[]"
                                                multiple="multiple">
                                                <option value="tidak">Tidak Ada</option>
                                                ${options}
                                            </select>
                                        `
                        );

                        $('#users_list').select2({
                            // Tambahkan opsi konfigurasi jika diperlukan
                            placeholder: "Semua",
                            allowClear: true
                        });
                    }
                },
                error: function() {
                    // Tangani kesalahan di sini
                },
            });
        }

        function sortAccessUser() {
            $.ajax({
                url: "{{ route('sort.access') }}",
                type: "GET",
                data: {
                    sortDepartment: selectedDeparment,
                    sortDetailDepartment: selectedDetailDeparment,
                    sortPosition: selectedPosition
                },
                success: function(data) {

                    if (data.resultUsers.length != 0) {
                        $('#Users').empty();

                        // Membangun string HTML
                        let options = ''; // Menyimpan opsi yang akan ditambahkan
                        $.each(data.resultUsers, function(index, users) {
                            options += `<option value="${users.name}">${users.name}</option>`;
                        });

                        $('#Users').append(
                            `
                                            <label for="email" class="form-label">User Access</label>
                                            <select class="select2_demo_2 form-control" id="users_list" name="users[]"
                                                multiple="multiple">
                                                <option value="tidak">Tidak Ada</option>
                                                ${options}
                                            </select>
                                        `
                        );

                        $('#users_list').select2({
                            // Tambahkan opsi konfigurasi jika diperlukan
                            placeholder: "Semua",
                            allowClear: true
                        });
                    }
                },
                error: function() {
                    // Tangani kesalahan di sini
                },
            });
        }





        const ByDepartement = document.getElementById('ByDepartement');
        const ByDetailDepartement = document.getElementById('ByDetailDepartement');
        const ByPosition = document.getElementById('ByPosition');
        const ByUsers = document.getElementById('ByUser');
        const addCol1 = document.getElementById('addCol1');
        const addCol2 = document.getElementById('addCol2');
        const addCol3 = document.getElementById('addCol3');
        const addCol4 = document.getElementById('addCol4');

        const Departement = document.getElementById('Departement');
        const DetailDepartement = document.getElementById('DetailDepartement');
        const Position = document.getElementById('Position');
        const Users = document.getElementById('Users');

        // Event listener untuk checkbox
        ByDepartement.addEventListener("change", function() {
            if (ByDepartement.checked) {
                Departement.style.visibility = "visible";
                Departement.style.position = "static";
                addCol1.style.position = "static";
            } else {
                Departement.style.position = "absolute";
                Departement.style.visibility = "hidden";
                addCol1.style.position = "absolute";
            }
        });

        ByDetailDepartement.addEventListener("change", function() {
            if (ByDetailDepartement.checked) {
                DetailDepartement.style.visibility = "visible";
                DetailDepartement.style.position = "static";
                addCol2.style.position = "static";
            } else {
                DetailDepartement.style.visibility = "hidden";
                DetailDepartement.style.position = "absolute";
                addCol2.style.position = "absolute";
            }
        });

        ByPosition.addEventListener("change", function() {
            if (ByPosition.checked) {
                Position.style.visibility = "visible";
                Position.style.position = "static";
                addCol3.style.position = "static";
            } else {
                Position.style.visibility = "hidden";
                Position.style.position = "absolute";
                addCol3.style.position = "absolute";
            }
        });

        ByUsers.addEventListener("change", function() {
            if (ByUsers.checked) {
                Users.style.visibility = "visible";
                Users.style.position = "static";
                addCol4.style.position = "static";
            } else {
                Users.style.visibility = "hidden";
                Users.style.position = "absolute";
                addCol4.style.position = "absolute";
            }
        });


        $(".select2_demo_2").select2({
            placeholder: " semua",
        });
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
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
