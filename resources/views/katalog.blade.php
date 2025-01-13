@extends('welcome')

@section('content')
<div class="big-container5">
  <div class="container3">
   <div class="header">
    <p>
     SIAP UNTUK DIADOPSI
    </p>
    <h1>
     RAS YANG TERSEDIA:
    </h1>
   </div>
   @foreach($products as $product)
<div class="product" style="display: inline-block; margin: 10px; text-align: center; width: 220px; height: 400px;">
  <!-- Set ukuran gambar tetap 200x200px atau sesuai preferensi -->
  <img alt="{{ $product->name }}" style="height: 200px; width: 200px; object-fit: cover;" src="{{ asset('images/katalog.jpeg') }}" />
  <h2 style="font-size: 18px; margin-top: 10px; height: 40px; overflow: hidden;">{{ $product->name }}</h2>
  <p class="price" style="font-size: 16px; color: #FF5722; font-weight: bold;">
    Rp{{ number_format($product->price, 0, ',', '.') }}
  </p>
</div>
@endforeach



  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title fs-4" id="productModalLabel">
                    @auth
                        Isi Alamat COD
                    @else
                        Maaf, Anda belum login
                    @endauth
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                @auth
                <p class="text-danger mb-3">* COD hanya berlaku untuk wilayah Yogyakarta.</p>
                <form action="/adoption" method="POST">
    @csrf
    <div class="mb-3">
        <label for="address" class="form-label">Alamat COD:</label>
        <textarea class="form-control" id="address" name="address" rows="4" required 
                  placeholder="Masukkan alamat lengkap untuk COD"></textarea>
    </div>
    <div class="mb-3">
        <label for="cod-date" class="form-label">Pilih Tanggal COD:</label>
        <input type="date" class="form-control" id="cod-date" name="cod_date" required>
    </div>
    <input type="hidden" name="product_name" value="Persia umur 1,5 bulan"> <!-- Nama produk -->
    <input type="hidden" name="price" value="2000000"> <!-- Harga produk -->
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Adopsi sekarang</button>
    </div>
</form>


                
                
</div>
    </form>
        @else
            <div class="text-center py-4">
                <p class="mb-4">Silakan login terlebih dahulu untuk melanjutkan proses adopsi.</p>
            </div>
                @endauth
            </div>
        </div>
    </div>
</div>




<!-- Include Bootstrap CSS & JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Menangani klik produk untuk membuka modal
    document.querySelectorAll('.product img').forEach((img) => {
        img.addEventListener('click', () => {
            const modal = new bootstrap.Modal(document.getElementById('productModal'));
            modal.show();
        });
    });
    $.ajax({
    url: '/katalog',
    method: 'GET', // Pastikan ini adalah GET
    success: function(data) {
        // Tangani respons
    },
    error: function(error) {
        // Tangani error
    }
});
</script>

@endsection