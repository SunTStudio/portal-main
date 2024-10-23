@extends('layouts.app')

@section('content')
    <div class="row bg-white">
        <div class="col-12  text-center p-3">
            <img src="{{ asset('logo aji.png') }}" width="8%" alt="img-fluid">
            <p class="h5 p-2"><strong> PORTAL ASTRA JUOKU INDONESIA </strong></p>
        </div>
        <div class="col-12">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation p-3">
                                <img src="{{ asset('img/logoWeb/LogoLimitSampleWeb.png') }}" wi class="img-fluid"
                                    alt="">
                            </div>
                            <div class="product-desc text-center">
                                <div class="text-center">
                                    <button type="button" class="btn btn-success mb-1 btn-xs">Quality</button>
                                </div>
                                <a href="#" class="product-name">Limit Sample (Lokal)</a>
                                <div class="m-t">
                                    <div class="text-center">
                                        {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                        {{-- <form action="{{ url('http://10.14.143.89/limit-sample/public/directToExternalSite') }}" method="POST"> --}}
                                        <form id="limit-sample-local" action="{{ url('http://10.14.179.250:1111/directToExternalSite') }}"
                                            method="POST">
                                            <button type="submit" class="btn btn-primary" onclick="ExternalSite(event,'limit-sample-local')">Masuk</button>
                                        </form>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation p-3">
                                <img src="{{ asset('img/logoWeb/LogoLimitSampleWeb.png') }}" wi class="img-fluid"
                                    alt="">
                            </div>
                            <div class="product-desc text-center">
                                <div class="text-center">
                                    <button type="button" class="btn btn-success mb-1 btn-xs">Quality</button>
                                </div>
                                <a href="#" class="product-name">Limit Sample (Server)</a>
                                <div class="m-t">
                                    <div class="text-center">
                                        {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                        <form id="limit-sample-server"
                                            action="{{ url('http://10.14.143.89/limit-sample/public/directToExternalSite') }}"
                                            method="POST">
                                            {{-- <form action="{{ url('http://10.14.179.250:1111/directToExternalSite') }}" method="POST"> --}}
                                            <button type="submit" class="btn btn-primary" onclick="ExternalSite(event,'limit-sample-server')">Masuk</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation p-3">
                                <img src="{{ asset('img/logoWeb/LogoEhsPatrolWeb.png') }}" wi class="img-fluid"
                                    alt="">
                            </div>
                            <div class="product-desc text-center">
                                <div class="text-center">
                                    <button type="button" class="btn btn-success mb-1 btn-xs">EHS</button>
                                </div>
                                <a href="#" class="product-name">EHS Patrol (Local)</a>
                                <div class="m-t">
                                    <div class="text-center">
                                        {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                        <form id="ehs-patrol" action="{{ url('http://10.14.179.250:3333/directToExternalSite') }}"
                                            method="POST">
                                            <button type="submit" class="btn btn-primary" onclick="ExternalSite(event,'ehs-patrol')">Masuk</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation p-3">
                                <img src="{{ asset('img/logoWeb/LogoELearningWeb.png') }}" wi class="img-fluid"
                                    alt="">
                            </div>
                            <div class="product-desc text-center">
                                <div class="text-center">
                                    <button type="button" class="btn btn-success mb-1 btn-xs">HR</button>
                                </div>
                                <a href="#" class="product-name">E-Learning (Local)</a>
                                <div class="m-t">
                                    <div class="text-center">
                                        {{-- <a href="{{ route('loginToExternalSite') }}" class="btn btn-secondary" onclick="">Masuk</a> --}}
                                        <form id="e-learning" action="{{ url('http://10.14.179.250:4444/directToExternalSite') }}"
                                            method="POST">
                                            <button type="submit" class="btn btn-primary" onclick="ExternalSite(event,'e-learning')">Masuk</button>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function ExternalSite(e,idForm) {
            e.preventDefault(); // Mencegah form dari pengiriman langsung
            const token = "{{ session('token') }}"; // Ambil token dari session

            // Buat input hidden secara dinamis
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'token';
            hiddenInput.value = token;

            // Tambahkan input ke form
            const form = document.getElementById(idForm);
            form.appendChild(hiddenInput);

            // Kirim form setelah input ditambahkan
            form.submit();
        }
    </script>
@endsection
