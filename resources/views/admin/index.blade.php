@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kelola Harga</h1>
    <a href="{{ route('harga.create') }}" class="btn btn-primary mb-3">Tambah Harga</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('harga.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('harga.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
