@extends('welcome')

@section('content')
<div class="container6">
    <h1 class="text-center">Admin Dashboard</h1>
    <p class="text-center">Selamat datang di halaman admin!</p>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col-md-6 d-flex justify-content-center mb-3">
            <a href="{{ route('admin.kelola-harga') }}" class="btn btn-primary px-4">Kelola Harga</a>
            </div>
            <div class="col-md-6 d-flex justify-content-center mb-3">
            <a href="{{ route('admin.laporan') }}" class="btn btn-success px-4">Laporan</a>

            </div>
        </div>
    </div>
</div>



@endsection
