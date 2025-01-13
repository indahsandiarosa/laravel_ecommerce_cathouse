@extends('welcome')

@section('content')
    <div class="container">
        <h1 class="text-center">Kelola Harga Produk</h1>
        
        <!-- Periksa apakah ada produk -->
        @if($products->isEmpty())
            <p class="text-center">Tidak ada produk untuk dikelola.</p>
        @else
            <!-- Tampilkan daftar produk dan harga -->
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
                            <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('admin.update-harga', $product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="price" value="{{ $product->price }}" class="form-control" step="5000" required>
                                    <button type="submit" class="btn btn-warning mt-2">Update Harga</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
