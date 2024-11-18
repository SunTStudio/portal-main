@extends('layouts.app')
@section('css')
<style>
    #content-dashboard{
        text-transform: uppercase;
    }
    #tombolSubWebsite .btn{
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
@media (max-width: 767px) {
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
    .judul-website{
        font-size: 0.6rem;
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
            <img src="{{ asset('logo aji.png') }}"  class="img-fluid">
            <p class="h5 p-2"><strong> PORTAL ASTRA JUOKU INDONESIA </strong></p>
            @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)
            <a href="{{ url('sub-website/create') }}" class="btn btn-secondary m-1">Tambah Sub Website</a>
            <a href="{{ url('sub-website/updateData') }}" class="btn btn-info m-1">Update Semua Website</a>
            @endif
        </div>
        @if ($subWebsitesInternal->count() != 0)
        <div class="col-12 mt-3 mb-4 bg-white rounded ">
            <div class="row">
            <div class="col-12 ibox-title" style="letter-spacing: 1px; display: flex; align-items: center; background-image:url('{{ asset('css/patterns/header-profile-skin-3.png') }}');">
                <p style="margin: 0 10px; font-weight:bold; color:white;">INTERNAL AJI WEBSITES</p>
            </div>
            <div class="col-12  ibox-content border">
                <div class="row justify-content-center">

                    @foreach ($subWebsitesInternal as $subWebsiteInternal)
                        <div class="col-lg-2 col-6">
                            <div class="ibox">
                                <div  style=" background-image:url('{{ asset('css/patterns/header-profile-skin-3.png') }}'); padding:3px 0px 2px 10px;">
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

                                            <div class="text-center  justify-content-center d-flex"  id="tombolSubWebsite" style="font-size: 0.8rem">
                                                @if ((((in_array((auth()->user()->position->position ?? '-'), json_decode($subWebsiteInternal->positions)) || in_array('semua', json_decode($subWebsiteInternal->positions))) && (in_array((auth()->user()->department->name ?? '-'), json_decode($subWebsiteInternal->departments)) || in_array('semua', json_decode($subWebsiteInternal->departments))) && (in_array((auth()->user()->detailDepartment->name ?? '-'), json_decode($subWebsiteInternal->detail_departements)) || in_array('semua', json_decode($subWebsiteInternal->detail_departements)))) && (($subWebsiteInternal->role == null || auth()->user()->roles->contains('name', $subWebsiteInternal->role)) && !in_array('tidak', json_decode($subWebsiteInternal->users))
                                                )) || auth()->user()->hasRole('Admin') )
                                                    {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                                    @if ($subWebsiteInternal->jenis == 'sinkron')

                                                        <form id="{{ $subWebsiteInternal->id }}" action="{{ $subWebsiteInternal->link.'/loginPortalAJI' }}" method="POST">

                                                            <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event,{{ $subWebsiteInternal->id }})"><i class="fa fa-sign-in"></i></button>
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

                                                        <form action="{{ route('subWebsite.delete',['id' => $subWebsiteInternal->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sub Website ini?');" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger tombolSubWebsite ml-1 " ><i class="fa fa-trash"></i></button>
                                                        </form>
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
        <div class="col-12 mt-3 mb-4 bg-white rounded ">
            <div class="row">
            <div class="col-12 ibox-title" style="letter-spacing: 1px; display: flex; align-items: center; background-image:url('{{ asset('css/patterns/header-profile-skin-1.png') }}');">
                <p style="margin: 0 10px; font-weight:bold; color:white;">EXTERNAL AJI WEBSITES</p>
            </div>
            <div class="col-12 ibox-content border">
                <div class="row justify-content-center">

                    @foreach ($subWebsitesExternal as $subWebsiteExternal)
                        <div class="col-lg-2 col-6">
                            <div class="ibox">
                                <div  style=" background-image:url('{{ asset('css/patterns/header-profile-skin-1.png') }}'); padding:3px 0px 2px 10px;">
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

                                            <div class="text-center  justify-content-center d-flex"  id="tombolSubWebsite" style="font-size: 0.8rem">
                                                @if ((((in_array((auth()->user()->position->position ?? '-'), json_decode($subWebsiteExternal->positions)) || in_array('semua', json_decode($subWebsiteExternal->positions))) && (in_array((auth()->user()->department->name ?? '-'), json_decode($subWebsiteExternal->departments)) || in_array('semua', json_decode($subWebsiteExternal->departments))) && (in_array((auth()->user()->detailDepartment->name ?? '-'), json_decode($subWebsiteExternal->detail_departements)) || in_array('semua', json_decode($subWebsiteExternal->detail_departements)))) && (($subWebsiteExternal->role == null || auth()->user()->roles->contains('name', $subWebsiteExternal->role)) && !in_array('tidak', json_decode($subWebsiteExternal->users))
                                                )) || auth()->user()->hasRole('Admin') )
                                                    {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                                    @if ($subWebsiteExternal->jenis == 'sinkron')

                                                        <form id="{{ $subWebsiteExternal->id }}" action="{{ $subWebsiteExternal->link.'/loginPortalAJI' }}" method="POST">

                                                            <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event,{{ $subWebsiteExternal->id }})"><i class="fa fa-sign-in"></i></button>
                                                        </form>
                                                    @else

                                                        <a href="{{ $subWebsiteExternal->link }}" class="btn btn-primary">Masuk</a>
                                                    @endif
                                                @else

                                                <button type="button" class="btn btn-primary tombolSubWebsite"
                                                            disabled>Tidak Memiliki Akses</button>
                                                @endif

                                                @if (auth()->user()->hasRole('Admin') && Auth::user()->roles->count() === 1)

                                                    <a href="{{ route('subWebsite.edit',['id' => $subWebsiteExternal->id]) }}" class=" ml-1 btn btn-warning  tombolSubWebsite"><i class="fa fa-edit"></i></a>

                                                    @if ($subWebsiteExternal->jenis == 'sinkron')

                                                        <a href="{{ route('subWebsite.updateDataSingle',['id' => $subWebsiteExternal->id]) }}" class="ml-1 btn btn-info tombolSubWebsite"><i class="fa fa-cogs"></i></a>
                                                    @endif

                                                        <form action="{{ route('subWebsite.delete',['id' => $subWebsiteExternal->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sub Website ini?');" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger tombolSubWebsite ml-1 " ><i class="fa fa-trash"></i></button>
                                                        </form>
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
