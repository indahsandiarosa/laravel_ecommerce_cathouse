@extends('welcome')

@section('content')
<form action="{{ route('admin.update', $product->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="price" class="form-label">Harga Baru</label>
        <input type="number" class="form-control" name="price" value="{{ $product->price }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Harga</button>
</form>

@endsection
