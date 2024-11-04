@extends('layouts.app')

@section('content')
    <div class="wrapper wrapper-content pb-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1">Acount</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Profile</a></li>
                        </ul>
                        <div class="tab-content">

                            {{-- start tab 1 --}}
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">

                                    <fieldset>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama" value="{{ $user->name }}" disabled></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Username:</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Username" value="{{ $user->username }}" disabled></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label" >Email:</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Email" value="{{ $user->email }}" disabled></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label" >Roles:</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Roles" value="{{ $user->getRoleNames()->join(', ') ?? 'Tidak Ada' }}" disabled></div>
                                        </div>

                                    </fieldset>

                                </div>
                            </div>
                            {{-- end tab 1 --}}

                            {{-- start tab 2 --}}
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">

                                    <fieldset>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Nama" value="{{ $user->name }}" disabled></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">NPK</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="NPK" value="{{ $user->npk ?? '-' }}" disabled></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Departement</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Departement" value="{{ $user->department->name ?? '-' }}" disabled></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Detail Departement</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Detail_Departement" value="{{ $user->detailDepartment->name ?? '-' }}" disabled></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Position</label>
                                            <div class="col-sm-10"><input type="text" class="form-control" placeholder="Position" value="{{ $user->position->position ?? '-' }}" disabled></div>
                                        </div>
                                        </div>
                                    </fieldset>


                                </div>
                            </div>
                            {{-- end tab 2 --}}

                        </div>
                </div>
            </div>
        </div>
        <div class="ml-2">
            <a href="{{ route('users.roles',['id' => $user->id]) }}" class="btn btn-info">Roles </a>
            <a href="{{ route('users.permissions',['id' => $user->id]) }}" class="btn btn-info">Permissions</a>
            <a href="{{ route('users.edit',['id' => $user->id]) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('users') }}" class="btn btn-default">Back</a>
        </div>
    </div>
@endsection

@section('script')
@endsection
