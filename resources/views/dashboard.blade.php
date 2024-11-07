@extends('layouts.app')
@section('css')
<style>
    #tombolSubWebsite{
        display: flex;
    }

    .product-imitation{
        height: 10rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-imitation img{
        height:8rem;
        object-fit: cover;
    }
@media (max-width: 767px) {
    /* .tombolSubWebsite{
        font-size: 0.5rem;
    } */
    .product-imitation{
        height:7rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-imitation img{
        height:5rem;
        object-fit: cover;
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
    <div class="row bg-white">
        <div class="col-12  text-center p-3">
            <img src="{{ asset('logo aji.png') }}" width="8%" alt="img-fluid">
            <p class="h5 p-2"><strong> PORTAL ASTRA JUOKU INDONESIA </strong></p>
            @if (auth()->user()->hasRole('Admin'))
            <a href="{{ url('sub-website/create') }}" class="btn btn-secondary">Tambah Sub Website</a>
            <a href="{{ url('sub-website/updateData') }}" class="btn btn-secondary">Update Semua Website</a>
            @endif
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                @foreach ($subWebsites as $subWebsite)
                    <div class="col-lg-3 col-6">
                        <div class="ibox">
                            <div class="ibox-content product-box">
                                <div class="product-imitation p-3">
                                    <img src="{{ asset("img/subWebsite/$subWebsite->sampul") }}" class="sampul img-fluid"
                                        alt="">
                                </div>
                                <div class="product-desc text-center">
                                    <div class="text-center">
                                        {{-- <button type="button" class="btn btn-success mb-1 btn-xs">HR</button> --}}
                                    </div>
                                    <p class="product-name">{{ $subWebsite->name }}</p>
                                    <div class="m-t">

                                        <div class="text-center  justify-content-center"  id="tombolSubWebsite">
                                            @if ((((in_array((auth()->user()->position->position ?? '-'), json_decode($subWebsite->positions)) || in_array('semua', json_decode($subWebsite->positions))) && (in_array((auth()->user()->department->name ?? '-'), json_decode($subWebsite->departments)) || in_array('semua', json_decode($subWebsite->departments))) && (in_array((auth()->user()->detailDepartment->name ?? '-'), json_decode($subWebsite->detail_departements)) || in_array('semua', json_decode($subWebsite->detail_departements)))) && (($subWebsite->role == null || auth()->user()->roles->contains('name', $subWebsite->role)) && !in_array('tidak', json_decode($subWebsite->users))
                                            )) || auth()->user()->hasRole('Admin') )
                                                {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                                <form id="{{ $subWebsite->id }}" action="{{ url($subWebsite->link) }}/loginPortalAJI"
                                                    method="POST">
                                                    <button type="submit" class="btn btn-primary tombolSubWebsite" onclick="ExternalSite(event,{{ $subWebsite->id }})">Masuk</button>
                                                </form>
                                            @else
                                            <button type="button" class="btn btn-primary tombolSubWebsite"
                                                        disabled>Tidak Memiliki Akses</button>
                                            @endif

                                            @hasrole('Admin')
                                                <a href="{{ route('subWebsite.edit',['id' => $subWebsite->id]) }}" class="btn btn-warning ml-2  tombolSubWebsite"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('subWebsite.updateDataSingle',['id' => $subWebsite->id]) }}" class="btn btn-info ml-2 mr-2 tombolSubWebsite"><i class="fa fa-cogs"></i></a>
                                                <form action="{{ route('subWebsite.delete',['id' => $subWebsite->id]) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus Sub Website ini?');" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger tombolSubWebsite" ><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endhasrole

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
