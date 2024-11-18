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
        <div class="bg-light p-4 rounded">
            <h1>Tambah Sub Website Baru</h1>

            <div class="container mt-4">
                <form method="POST" action="{{ route('subWebsite.update', ['id' => $oldData->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10">
                            <label for="name" class="form-label">Nama Website :</label>
                            <input type="text" class="form-control" name="name" placeholder="Name"
                                value="{{ $oldData->name }}" required>

                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="email" class="form-label">Link Website ("contoh : http://10.14.179.250:1111"
                                ,tanpa "/" diakhir)</label>
                            <input type="text" class="form-control" name="link" placeholder="Link Website"
                                value="{{ $oldData->link }}" required>
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <label for="formFile" class="form-label">Sampul Website (Kosongkan Jika pakai Foto Lama)</label>
                            <input class="form-control" name="sampul" type="file" id="formFile">
                        </div>
                        <div class="mb-3 col-lg-6 col-10">
                            <div class="row">
                                <div class="col-10 col-lg-6">
                                    <label for="checks" class="form-label">Pilih Jenis Sub Website</label>
                                    <div class="i-checks"><label> <input type="radio"
                                                @if ($oldData->jenis == 'sinkron') checked="" @endif value="sinkron"
                                                name="jenis"> <i></i> Sinkron </label></div>
                                    <div class="i-checks"><label> <input type="radio"
                                                @if ($oldData->jenis == 'non-sinkron') checked="" @endif value="non-sinkron"
                                                name="jenis"> <i></i> Non Sinkron </label></div>
                                </div>
                                <div class="col-10 col-lg-6">
                                    <label for="checks" class="form-label">Pilih Kategori Sub Website</label>
                                    <div class="i-checks"><label> <input type="radio"
                                                @if ($oldData->kategori == 'internal') checked="" @endif value="internal"
                                                name="kategori"> <i></i> internal </label></div>
                                    <div class="i-checks"><label> <input type="radio"
                                                @if ($oldData->kategori == 'external') checked="" @endif value="external"
                                                name="kategori"> <i></i> External </label></div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <h3>Hak Akses Sub Website <small> (Default "Semua") </small></h3>
                    @php
                        $departmentsList = json_decode($oldData->departments, true) ?? [];
                        $detail_departementsList = json_decode($oldData->detail_departements, true) ?? [];
                        $positionsList = json_decode($oldData->positions, true) ?? [];
                        $usersList = json_decode($oldData->users, true) ?? [];
                    @endphp
                    <div class="row">

                        <div class="mb-3 col-lg-6 col-10" id="Departement">
                            <label for="password" class="form-label">Departement Access</label>
                            <select class="select2_demo_2 form-control" name="departments[]" multiple="multiple"
                                onchange="sortDepartment(this)" id="departments">
                                <option value="semua" {{ in_array('semua', $departmentsList) ? 'selected' : '' }}>Semua
                                </option>
                                <option value="tidak" {{ in_array('tidak', $departmentsList) ? 'selected' : '' }}>Tidak Ada
                                </option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->name }}"
                                        {{ in_array($department->name, $departmentsList) ? 'selected' : '' }}>
                                        {{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6 col-10" id="DetailDepartement">
                            <div class="form-group" id="data_1">
                                <label class="font-normal">Detail Departement Access</label>
                                <select class="select2_demo_2 form-control" name="detail_departements[]"
                                    id="detail_departements" multiple="multiple" onchange="sortDetailDepartment(this)">
                                    <option value="semua"
                                        {{ in_array('semua', $detail_departementsList) ? 'selected' : '' }}>Semua</option>
                                    <option value="tidak"
                                        {{ in_array('tidak', $detail_departementsList) ? 'selected' : '' }}>Tidak Ada
                                    </option>
                                    @foreach ($detail_departements as $detail_departement)
                                        <option value="{{ $detail_departement->name }}"
                                            {{ in_array($detail_departement->name, $detail_departementsList) ? 'selected' : '' }}>
                                            {{ $detail_departement->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6 col-10" id="Position">
                            <label for="email" class="form-label">Position Access</label>
                            <select class="select2_demo_2 form-control" name="positions[]" multiple="multiple"
                                onchange="sortPosition(this)">
                                <option value="semua" {{ in_array('semua', $positionsList) ? 'selected' : '' }}>Semua
                                </option>
                                <option value="tidak" {{ in_array('tidak', $positionsList) ? 'selected' : '' }}>Tidak Ada
                                </option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->position }}"
                                        {{ in_array($position->position, $positionsList) ? 'selected' : '' }}>
                                        {{ $position->position }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-lg-6 col-10" id="Users">
                            <label for="email" class="form-label">User Access</label>
                            <select class="select2_demo_2 form-control" name="users[]" multiple="multiple"
                                id="users_list">
                                <option value="semua" {{ in_array('semua', $usersList) ? 'selected' : '' }}>Semua
                                </option>
                                <option value="tidak" {{ in_array('tidak', $usersList) ? 'selected' : '' }}>Tidak Ada
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->npk }}"
                                        {{ in_array($user->npk, $usersList) ? 'selected' : '' }}>{{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>


                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                    <a href="{{ url('/') }}" class="btn btn-default ml-2">Back</a>
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
                        let optionsUser = ''; // Menyimpan opsi yang akan ditambahkan
                        $.each(data.resultUsers, function(index, users) {
                            optionsUser += `<option value="${users.npk}">${users.name}</option>`;
                        });

                        $('#Users').append(
                            `
                                            <label for="email" class="form-label">User Access</label>
                                            <select class="select2_demo_2 form-control" id="users_list" name="users[]"
                                                multiple="multiple">
                                                <option value="tidak">Tidak Ada</option>
                                                ${optionsUser}
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
                        let optionsUser = ''; // Menyimpan opsi yang akan ditambahkan
                        $.each(data.resultUsers, function(index, users) {
                            optionsUser += `<option value="${users.npk}">${users.name}</option>`;
                        });

                        $('#Users').append(
                            `
                                            <label for="email" class="form-label">User Access</label>
                                            <select class="select2_demo_2 form-control" id="users_list" name="users[]"
                                                multiple="multiple">
                                                <option value="tidak">Tidak Ada</option>
                                                ${optionsUser}
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




        $(".select2_demo_2").select2({
            placeholder: "Semuanya",
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
