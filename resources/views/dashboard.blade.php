@extends('layouts.app')
@section('css')
<style>
    .ibox{
        margin-bottom: 10px;
    }
    .ibox-title{
        padding: 15px 10px 8px 15px;
    }
    .subwebs{
        aspect-ratio: 9/4;
        margin: auto;
        overflow-x: hidden;
        overflow-y: scroll;
        scroll-snap-type: y mandatory;
    }
    #content-dashboard{
        text-transform: uppercase;
    }
    .head-sub-website .row{
        aspect-ratio: 4/1;
        overflow: hidden;
    }
    #tombolSubWebsite .btn{
        padding: 0.2rem 0.5rem;
    }
    .tombolHapus .btn{
        padding: 0.2rem 0.5rem;
    }
    .judul-website{
        font-size: 0.8rem;
    }
    .product-imitation{
        height: 4rem;
        display: flex;
        overflow: hidden;
        align-items: center;
        justify-content: center;
    }
    .product-imitation img{
        width: 100%;
        object-fit: cover;
    }

    .product-name{

    }

    .keterangan-sub-website p{
        font-size: 0.7rem;
    }
@media (max-width: 767px) {
    .ibox{
        margin-bottom: 25px;
    }
    /* .tombolSubWebsite{
        font-size: 0.5rem;
    } */
    /* .product-imitation{
        height:7rem;
        display: flex;
        align-items: center;
        justify-content: center;
    } */

    /* .product-imitation img{
        height:7rem;
        object-fit: cover;
    } */
    .subwebs{
        aspect-ratio: 9/8;
        margin: auto;
        overflow-x: hidden;
        overflow-y: scroll;
        scroll-snap-type: y mandatory;
    }
    .judul-website{
        font-size: 0.6rem;
    }
    .tombolHapus .btn{
        padding: 0.15rem 0.35rem;
    }
    #tombolSubWebsite .btn{
        padding: 0.15rem 0.35rem;
    }
    #tombolSubWebsite{
        display: block;
    }
    #tombolSubWebsite .tombolSubWebsite{
        margin: 0.1rem;
    }
}
</style>
@endsection
@section('content')
@if (request()->has('error'))
            <div class="alert alert-danger">
                {{ request()->get('error') }}
            </div>
@endif
    <div class="row m-1" id="content-dashboard">
        <div class="col-12  text-center p-3 bg-white rounded">
            <img src="{{ asset('logo aji.png') }}" width="80vh"  class="img-fluid">
            <p class="h5 p-2"><strong> PORTAL ASTRA JUOKU INDONESIA </strong></p>
            @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
            <a href="{{ url('sub-website/create') }}" class="btn btn-secondary m-1">Tambah Sub Website</a>
            <a href="{{ url('sub-website/updateData') }}" class="btn btn-info m-1">Update Semua Website</a>
            @endif
        </div>
        @if ($subWebsitesInternal->count() != 0)
        <div class="col-lg-6 col-12 mt-3 mb-4 bg-white rounded border">
            <div class="row">
            <div class="col-12 ibox-title " style=" background-image:url('{{ asset('css/patterns/header-profile-skin-2.png') }}');">
                <div class="row justify-content-between">
                    <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center mb-1" style="letter-spacing: 1px;">
                        <p  style="margin: 0 10px; font-weight:bold; color:white;">INTERNAL AJI WEBSITES</p>
                    </div>
                    <div class="col-lg-6 col-12 mb-1">
                        <div class="input-group rounded">
                            <input type="text" placeholder="Search Internal SubWebsite " id="search-internal" class="input form-control" onchange="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12  ibox-content p-2 ">
                <div class="row justify-content-center subwebs" id="subwebs-internal">

                    @foreach ($subWebsitesInternal as $subWebsiteInternal)
                        <div class="col-lg-4 col-6 p-1" >
                            <div class="ibox">
                                <div  class="head-sub-website" style=" background-image:url('{{ asset('css/patterns/header-profile-skin-2.png') }}'); padding:3px 0px 2px 10px;">
                                    @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
                                    <div class="row">
                                        <div class="col d-flex align-items-center">
                                            <p class="product-name text-white judul-website">{{ $subWebsiteInternal->name }}
                                                @if ($subWebsiteInternal->jenis == 'sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-database" title="Sinkron"></i>
                                                    @if ($subWebsiteInternal->status == true)
                                                    <i class="fa fa-chevron-circle-up" style="color: white;" title="Uptodate"></i>
                                                    @elseif ($subWebsiteInternal->status == false)
                                                    <i class="fa fa-chevron-circle-down" style="color: white;" title="Outdated"></i>
                                                    @endif
                                                @elseif ($subWebsiteInternal->jenis == 'non-sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-external-link-square" title="Pintasan | Non-Sinkron"></i>
                                                @endif
                                            </p>
                                        </div>
                                        @if(auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
                                        <div class="col-lg-3 col-4 p-0 tombolHapus d-flex align-items-center">
                                            <form action="{{ route('subWebsite.delete',['id' => $subWebsiteInternal->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sub Website ini?');" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger tombolSubWebsite " ><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col d-flex align-items-center">
                                            <p class="product-name text-white judul-website">{{ $subWebsiteInternal->name }}
                                                @if ($subWebsiteInternal->jenis == 'sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-database" title="Sinkron"></i>
                                                    @if ($subWebsiteInternal->status == true)
                                                    <i class="fa fa-chevron-circle-up" style="color: white;" title="Uptodate"></i>
                                                    @elseif ($subWebsiteInternal->status == false)
                                                    <i class="fa fa-chevron-circle-down" style="color: white;" title="Outdated"></i>
                                                    @endif
                                                @elseif ($subWebsiteInternal->jenis == 'non-sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-external-link-square" title="Pintasan | Non-Sinkron"></i>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="ibox-content product-box">
                                    <div class="product-imitation p-3 bg-white">
                                        <img src="{{ asset("img/subWebsite/$subWebsiteInternal->sampul") }}" class="sampul img-fluid"
                                            alt="">
                                    </div>
                                    <div class="product-desc p-2 text-center border-top">
                                        <div class="text-center">
                                            {{-- <button type="button" class="btn btn-success mb-1 btn-xs">HR</button> --}}
                                        </div>

                                        <div >
                                            <div class="keterangan-sub-website text-left" style="height: 10vh; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; white-space: normal;">
                                                <p class="m-0 p-0">
                                                    <i class="fa fa-info-circle text-info"></i>
                                                    {{ $subWebsiteInternal->keterangan ?? "No Description" }}
                                                </p>
                                            </div>
                                            <hr class="m-2 p-0">

                                            <div class="text-center  justify-content-center d-flex"  id="tombolSubWebsite" style="font-size: 0.8rem">
                                                @if ((((in_array((auth()->user()->position->position ?? '-'), json_decode($subWebsiteInternal->positions)) || in_array('semua', json_decode($subWebsiteInternal->positions))) && (in_array((auth()->user()->department->name ?? '-'), json_decode($subWebsiteInternal->departments)) || in_array('semua', json_decode($subWebsiteInternal->departments))) && (in_array((auth()->user()->detailDepartment->name ?? '-'), json_decode($subWebsiteInternal->detail_departements)) || in_array('semua', json_decode($subWebsiteInternal->detail_departements)))) && (($subWebsiteInternal->role == null || auth()->user()->roles->contains('name', $subWebsiteInternal->role)) && !in_array('tidak', json_decode($subWebsiteInternal->users))
                                                )) || auth()->user()->hasRole('Admin') )
                                                    {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                                    @if ($subWebsiteInternal->jenis == 'sinkron')

                                                        <form id="{{ $subWebsiteInternal->id }}" action="{{ $subWebsiteInternal->link.'/loginPortalAJI' }}" method="POST">
                                                            @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
                                                                <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event,{{ $subWebsiteInternal->id }})">Masuk</button>
                                                            @else
                                                                <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event,{{ $subWebsiteInternal->id }})">Masuk</button>
                                                            @endif
                                                        </form>
                                                    @else

                                                        <a href="{{ $subWebsiteInternal->link }}" class="btn btn-primary">Masuk</a>
                                                    @endif
                                                @else

                                                <button type="button" class="btn btn-danger tombolSubWebsite"
                                                            disabled>No Access</button>
                                                @endif

                                                @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)

                                                    <a href="{{ route('subWebsite.edit',['id' => $subWebsiteInternal->id]) }}" class=" ml-1 btn btn-warning  tombolSubWebsite"><i class="fa fa-edit"></i></a>

                                                    @if ($subWebsiteInternal->jenis == 'sinkron')

                                                        <a href="{{ route('subWebsite.updateDataSingle',['id' => $subWebsiteInternal->id]) }}" class="ml-1 btn btn-info tombolSubWebsite"><i class="fa fa-cogs"></i></a>
                                                    @endif


                                                    @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>

        @endif
        @if ($subWebsitesExternal->count() != 0)
        <div class="col-lg-6 col-12 mt-3 mb-4 bg-white rounded border">
            <div class="row">
                <div class="col-12 ibox-title " style=" background-image:url('{{ asset('css/patterns/header-profile-skin-1.png') }}');">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-12 d-flex align-items-center justify-content-center mb-1" style="letter-spacing: 1px;">
                            <p  style="margin: 0 10px; font-weight:bold; color:white;">EXTERNAL AJI WEBSITES</p>
                        </div>
                        <div class="col-lg-6 col-12 mb-1">
                            <div class="input-group">
                                <input type="text" placeholder="Search External SubWebsite " id="search-external" class="input form-control">

                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-12  ibox-content p-2">
                <div class="row justify-content-center subwebs" id="subwebs-external">

                    @foreach ($subWebsitesExternal as $subWebsiteExternal)
                        <div class="col-lg-4 col-6 p-1" >
                            <div class="ibox">
                                <div  class="head-sub-website" style=" background-image:url('{{ asset('css/patterns/header-profile-skin-1.png') }}'); padding:3px 0px 2px 10px;">
                                    @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
                                    <div class="row ">
                                        <div class="col d-flex align-items-center">
                                            <p class="product-name text-white judul-website">{{ $subWebsiteExternal->name }}
                                                @if ($subWebsiteExternal->jenis == 'sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-database" title="Sinkron"></i>
                                                    @if ($subWebsiteExternal->status == true)
                                                    <i class="fa fa-chevron-circle-up" style="color: white;" title="Uptodate"></i>
                                                    @elseif ($subWebsiteExternal->status == false)
                                                    <i class="fa fa-chevron-circle-down" style="color: white;" title="Outdated"></i>
                                                    @endif
                                                @elseif ($subWebsiteExternal->jenis == 'non-sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-external-link-square" title="Pintasan | Non-Sinkron"></i>
                                                @endif
                                            </p>
                                        </div>
                                        @if(auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
                                        <div class="col-lg-3 col-4 p-0 tombolHapus d-flex align-items-center">
                                            <form action="{{ route('subWebsite.delete',['id' => $subWebsiteExternal->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sub Website ini?');" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger tombolSubWebsite " ><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col d-flex align-items-center">
                                            <p class="product-name text-white judul-website">{{ $subWebsiteExternal->name }}
                                                @if ($subWebsiteExternal->jenis == 'sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-database" title="Sinkron"></i>
                                                    @if ($subWebsiteExternal->status == true)
                                                    <i class="fa fa-chevron-circle-up" style="color: white;" title="Uptodate"></i>
                                                    @elseif ($subWebsiteExternal->status == false)
                                                    <i class="fa fa-chevron-circle-down" style="color: white;" title="Outdated"></i>
                                                    @endif
                                                @elseif ($subWebsiteExternal->jenis == 'non-sinkron' && auth()->user()->hasRole('Admin'))
                                                    <i class="fa fa-external-link-square" title="Pintasan | Non-Sinkron"></i>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="ibox-content product-box">
                                    <div class="product-imitation p-3 bg-white">
                                        <img src="{{ asset("img/subWebsite/$subWebsiteExternal->sampul") }}" class="sampul img-fluid"
                                            alt="">
                                    </div>
                                    <div class="product-desc p-2 text-center border-top">
                                        <div class="text-center">
                                            {{-- <button type="button" class="btn btn-success mb-1 btn-xs">HR</button> --}}
                                        </div>

                                        <div >
                                            <div class="keterangan-sub-website text-left " style="height: 10vh; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; white-space: normal;">
                                                {{-- <p class="m-0 p-0"><strong> Keterangan : </strong></p> --}}
                                                <p class="m-0 p-0"> <i class="fa fa-info-circle text-info"> </i> {{ $subWebsiteExternal->keterangan ?? "No Description" }}</p>
                                            </div>
                                            <hr class="m-2 p-0">

                                            <div class="text-center  justify-content-center d-flex"  id="tombolSubWebsite" style="font-size: 0.8rem">
                                                @if ((((in_array((auth()->user()->position->position ?? '-'), json_decode($subWebsiteExternal->positions)) || in_array('semua', json_decode($subWebsiteExternal->positions))) && (in_array((auth()->user()->department->name ?? '-'), json_decode($subWebsiteExternal->departments)) || in_array('semua', json_decode($subWebsiteExternal->departments))) && (in_array((auth()->user()->detailDepartment->name ?? '-'), json_decode($subWebsiteExternal->detail_departements)) || in_array('semua', json_decode($subWebsiteExternal->detail_departements)))) && (($subWebsiteExternal->role == null || auth()->user()->roles->contains('name', $subWebsiteExternal->role)) && !in_array('tidak', json_decode($subWebsiteExternal->users))
                                                )) || auth()->user()->hasRole('Admin') )
                                                    {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                                    @if ($subWebsiteExternal->jenis == 'sinkron')

                                                        <form id="{{ $subWebsiteExternal->id }}" action="{{ $subWebsiteExternal->link.'/loginPortalAJI' }}" method="POST">
                                                            @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
                                                                <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event,{{ $subWebsiteExternal->id }})">Masuk</button>
                                                            @else
                                                                <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event,{{ $subWebsiteExternal->id }})">Masuk</button>
                                                            @endif
                                                        </form>
                                                    @else

                                                        <a href="{{ $subWebsiteExternal->link }}" class="btn btn-primary">Masuk</a>
                                                    @endif
                                                @else

                                                <button type="button" class="btn btn-danger tombolSubWebsite"
                                                            disabled>No Access</button>
                                                @endif

                                                @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)

                                                    <a href="{{ route('subWebsite.edit',['id' => $subWebsiteExternal->id]) }}" class=" ml-1 btn btn-warning  tombolSubWebsite"><i class="fa fa-edit"></i></a>

                                                    @if ($subWebsiteExternal->jenis == 'sinkron')

                                                        <a href="{{ route('subWebsite.updateDataSingle',['id' => $subWebsiteExternal->id]) }}" class="ml-1 btn btn-info tombolSubWebsite"><i class="fa fa-cogs"></i></a>
                                                    @endif


                                                    @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script>

        document.getElementById("search-external").addEventListener("keyup", function() {
            const inputValue = this.value; // Ambil nilai input
            $.ajax({
                url:"{{ route('search.external') }}",
                type:"GET",
                data: {
                        query: inputValue
                    },
                success: function (data) {
                    $('#subwebs-external').empty();
                    $.each(data, function (index, item) {
                        const isAdmin =  @json(auth()->user()->hasRole('Admin')) ;
                        const singleRole =  @json(Auth::user()->roles->count() === 1) ;
                        const authUserPosition = @json(Auth::user()->position->position);
                        const authUserDepartment =  @json(Auth::user()->department->name) ;
                        const authUserDetailDepartment =  @json(Auth::user()->detailDepartment->name) ;
                        const itemPositions = JSON.parse(item.positions || "[]");
                        const itemDepartments = JSON.parse(item.departments || "[]");
                        const itemDetailDepartments = JSON.parse(item.detail_departements || "[]");
                        const assetPath = @json(asset(''));
                        const urlPath = @json(url(''));
                        var authUserRoles = @json(auth()->user()->roles);
                        authUserRoles = authUserRoles.map(role => role.name);
                        const hasAccess = (
                            (
                                itemPositions.includes(authUserPosition) ||
                                itemPositions.includes('semua')
                            ) &&
                            (
                                itemDepartments.includes(authUserDepartment) ||
                                itemDepartments.includes('semua')
                            ) &&
                            (
                                itemDetailDepartments.includes(authUserDetailDepartment) ||
                                itemDetailDepartments.includes('semua')
                            ) &&
                            (item.role === null || authUserRoles.includes(item.role))
                        );

                        const statusIcon = item.status
                            ? ' <i class="fa fa-chevron-circle-up" style="color: white;" title="Uptodate"></i> '
                            : ' <i class="fa fa-chevron-circle-down" style="color: white;" title="Outdated"></i> ';

                        const jenisIcon =
                            item.jenis === 'sinkron'
                                ? ` <i class="fa fa-database" title="Sinkron"></i> ${statusIcon}`
                                : ' <i class="fa fa-external-link-square" title="Pintasan | Non-Sinkron"></i> ';

                        const editButton =
                            isAdmin && singleRole
                                ? `
                                <a href="${urlPath}/sub-website/edit/${item.id}" class="ml-1 btn btn-warning tombolSubWebsite"><i class="fa fa-edit"></i></a>
                                ${item.jenis === 'sinkron'
                                    ? `<a href="${urlPath}/sub-website/updateDataSingle/${item.id}" class="ml-1 btn btn-info tombolSubWebsite"><i class="fa fa-cogs"></i></a>`
                                    : ''
                                }
                            `
                                : '';

                        const actionButton =
                            hasAccess || isAdmin
                                ? item.jenis === 'sinkron'
                                    ? `
                                <form id="${item.id}" action="${item.link}/loginPortalAJI" method="POST">
                                    <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event, ${item.id})">
                                        ${isAdmin && singleRole ? 'Masuk' : 'Masuk'}
                                    </button>
                                </form>`
                                    : `<a href="${item.link}" class="btn btn-primary">Masuk</a>`
                                : `<button type="button" class="btn btn-danger tombolSubWebsite" disabled>No Access</button>`;

                        $('#subwebs-external').append(`

                            <div class="col-lg-4 col-6 p-1">
                                <div class="ibox">
                                    <div class="head-sub-website" style="background-image:url('${assetPath}css/patterns/header-profile-skin-2.png'); padding:3px 0px 2px 10px;">
                                        <div class="row">
                                            <div class="col d-flex align-items-center">
                                                <p class="product-name text-white judul-website">${item.name}
                                                    ${isAdmin && singleRole ? `
                                                    ${jenisIcon}
                                                    `:''}
                                                    </p>
                                            </div>
                                            ${isAdmin && singleRole ? `
                                            <div class="col-lg-3 col-4 p-0 tombolHapus d-flex align-items-center">
                                                <form action="${urlPath}/sub-website/delete/${item.id}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sub Website ini?');" method="POST">
                                                    <button type="submit" class="btn btn-danger tombolSubWebsite"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                            ` : ''}
                                        </div>
                                    </div>
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation p-3 bg-white">
                                            <img src="${assetPath}img/subWebsite/${item.sampul}" class="sampul img-fluid" alt="">
                                        </div>
                                        <div class="product-desc p-2 text-center border-top">
                                            <div class="text-center">
                                                <div class="keterangan-sub-website text-left" style="height: 10vh; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; white-space: normal;">
                                                    <p class="m-0 p-0"><i class="fa fa-info-circle text-info"></i> ${item.keterangan || "No Description"}</p>
                                                </div>
                                                <hr class="m-2 p-0">
                                                <div class="text-center justify-content-center d-flex" id="tombolSubWebsite" style="font-size: 0.8rem">
                                                    ${actionButton}
                                                    ${editButton}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                },

                error: function(data){

                },
            });
        });

        document.getElementById("search-internal").addEventListener("keyup", function() {
            const inputValue = this.value; // Ambil nilai input
            $.ajax({
                url:"{{ route('search.internal') }}",
                type:"GET",
                data: {
                        query: inputValue
                    },
                success: function (data) {
                    $('#subwebs-internal').empty();
                    $.each(data, function (index, item) {
                        const isAdmin =  @json(auth()->user()->hasRole('Admin')) ;
                        const singleRole =  @json(Auth::user()->roles->count() === 1) ;
                        const authUserPosition = @json(Auth::user()->position->position);
                        const authUserDepartment =  @json(Auth::user()->department->name) ;
                        const authUserDetailDepartment =  @json(Auth::user()->detailDepartment->name) ;
                        const itemPositions = JSON.parse(item.positions || "[]");
                        const itemDepartments = JSON.parse(item.departments || "[]");
                        const itemDetailDepartments = JSON.parse(item.detail_departements || "[]");
                        const assetPath = @json(asset(''));
                        const urlPath = @json(url(''));
                        var authUserRoles = @json(auth()->user()->roles);
                        authUserRoles = authUserRoles.map(role => role.name);
                        const hasAccess = (
                            (
                                itemPositions.includes(authUserPosition) ||
                                itemPositions.includes('semua')
                            ) &&
                            (
                                itemDepartments.includes(authUserDepartment) ||
                                itemDepartments.includes('semua')
                            ) &&
                            (
                                itemDetailDepartments.includes(authUserDetailDepartment) ||
                                itemDetailDepartments.includes('semua')
                            ) &&
                            (item.role === null || authUserRoles.includes(item.role))
                        );

                        const statusIcon = item.status
                            ? ' <i class="fa fa-chevron-circle-up" style="color: white;" title="Uptodate"></i> '
                            : ' <i class="fa fa-chevron-circle-down" style="color: white;" title="Outdated"></i> ';

                        const jenisIcon =
                            item.jenis === 'sinkron'
                                ? ` <i class="fa fa-database" title="Sinkron"></i> ${statusIcon}`
                                : ' <i class="fa fa-external-link-square" title="Pintasan | Non-Sinkron"></i> ';

                        const editButton =
                            isAdmin && singleRole
                                ? `
                                <a href="${urlPath}/sub-website/edit/${item.id}" class="ml-1 btn btn-warning tombolSubWebsite"><i class="fa fa-edit"></i></a>
                                ${item.jenis === 'sinkron'
                                    ? `<a href="${urlPath}/sub-website/updateDataSingle/${item.id}" class="ml-1 btn btn-info tombolSubWebsite"><i class="fa fa-cogs"></i></a>`
                                    : ''
                                }
                            `
                                : '';

                        const deleteButton =
                            isAdmin && singleRole ?
                            `<form action="${urlPath}/sub-website/delete/${item.id}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sub Website ini?');" method="POST">
                                                    <button type="submit" class="btn btn-danger tombolSubWebsite"><i class="fa fa-trash"></i></button>
                                                </form>`
                            :
                            '';

                        const actionButton =
                            hasAccess || isAdmin ?
                                item.jenis === 'sinkron' ?
                                    `
                                    <form id="${item.id}" action="${item.link}/loginPortalAJI" method="POST">
                                        <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event, ${item.id})">
                                            ${isAdmin && singleRole ? 'Masuk' : 'Masuk'}
                                        </button>
                                    </form>`
                                : `<a href="${item.link}" class="btn btn-primary">Masuk</a>`
                            : `<button type="button" class="btn btn-danger tombolSubWebsite" disabled>No Access</button>`;

                        $('#subwebs-internal').append(`

                            <div class="col-lg-4 col-6 p-1">
                                <div class="ibox">
                                    <div class="head-sub-website" style="background-image:url('${assetPath}css/patterns/header-profile-skin-2.png'); padding:3px 0px 2px 10px;">
                                        <div class="row">
                                            <div class="col d-flex align-items-center">
                                                <p class="product-name text-white judul-website">${item.name}
                                                    ${isAdmin && singleRole ? `
                                                    ${jenisIcon}
                                                    `:''}
                                                    </p>
                                            </div>
                                            ${isAdmin && singleRole ? `
                                            <div class="col-lg-3 col-4 p-0 tombolHapus d-flex align-items-center">
                                                ${deleteButton}
                                            </div>
                                            `:''}
                                        </div>
                                    </div>
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation p-3 bg-white">
                                            <img src="${assetPath}img/subWebsite/${item.sampul}" class="sampul img-fluid" alt="">
                                        </div>
                                        <div class="product-desc p-2 text-center border-top">
                                            <div class="text-center">
                                                <div class="keterangan-sub-website text-left" style="height: 10vh; overflow: hidden; text-overflow: ellipsis; word-wrap: break-word; white-space: normal;">
                                                    <p class="m-0 p-0"><i class="fa fa-info-circle text-info"></i> ${item.keterangan || "No Description"}</p>
                                                </div>
                                                <hr class="m-2 p-0">
                                                <div class="text-center justify-content-center d-flex" id="tombolSubWebsite" style="font-size: 0.8rem">
                                                    ${actionButton}
                                                    ${editButton}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                },

                error: function(data){

                },
            });
        });

        function ExternalSite(e, idForm) {
            e.preventDefault(); // Mencegah form dari pengiriman langsung
            const token = "{{ session('token') }}"; // Ambil token dari session

            // Contoh menggunakan CryptoJS untuk mengenkripsi token
            const encryptedToken = btoa(token);
            // Buat input hidden secara dinamis
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'token';
            hiddenInput.value = encryptedToken;

            // Tambahkan input ke form
            const form = document.getElementById(idForm);
            form.appendChild(hiddenInput);

            // Kirim form setelah input ditambahkan
            form.submit();
        }
    </script>
@endsection
