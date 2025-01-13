@extends('welcome')

@section('content')
<div class="container6">
    <h1 class="text-center">Laporan Adopsi</h1>
    
    <!-- Tampilkan tabel data adopsi -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis</th> <!-- Nama produk -->
                <th>Harga</th>
                <th>Alamat COD</th>
                <th>Tanggal COD</th>
                <th>Nama Pelanggan</th> <!-- Nama pengguna -->
            </tr>
        </thead>
        <tbody>
            @foreach($adoptions as $adoption)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $adoption->product_name }}</td> <!-- Menampilkan nama produk -->
                    <td>{{ number_format($adoption->price, 0, ',', '.') }}</td>
                    <td>{{ $adoption->address }}</td>
                    <td>{{ $adoption->cod_date }}</td>
                    <td>{{ optional($adoption->user)->name }}</td> <!-- Menampilkan nama pengguna -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
