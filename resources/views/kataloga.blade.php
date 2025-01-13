@extends('welcome')

@section('content')
<div class="big-container5">
  <div class="container3">
   <div class="header">
    <p>
     FEATURED SHOP ITEMS {{ $title }}
    </p>
    <h1>
     FEATURED PRODUCTS
    </h1>
    @auth
    <div class="header-icons">
    <!-- Love Icon -->
    <a class="btn btn-outline-secondary" href="/favorit-saya">
        <i class="fa fa-heart" id="favorite-icon" title="Favorit">
            <span id="favorite-count" class="badge bg-danger">0</span>
        </i>
    </a>

    <!-- Cart Icon -->
    <a class="btn btn-outline-secondary" href="/keranjang">
    <i class="fas fa-shopping-cart"></i>
    <span id="cart-count" class="badge bg-danger">0</span>
</a>
</div>

            @endauth
   </div>
   <div class="products">
    <div class="product">
     <img alt="Yellow molded fiberglass chair" height="200" src="/images/persiakcg2.jpg" width="200" />
     <h2> Persia umur 1,5 bulan </h2>
     <p class="price"> Rp2.000.000,00 </p>
    </div>
    <div class="product">
     <img alt="Blue chair" height="200" src="/images/persiakcg3.png" width="200" />
     <h2> Persia umur 3 bulan </h2>
     <p class="price"> Rp3.000.000.00 </p>
    </div>
    <div class="product">
     <img alt="Yellow aluminum group chair" height="200" src="/images/persiakcg1.jpg" width="200" />
     <h2> Persia umur 6 bulan </h2>
     <p class="price"> Rp4.000.000,00 </p>
    </div>
    <div class="product">
     <img alt="Light blue bumper chair" height="200" src="/images/peaknosekcg1.png" width="200" />
     <h2> Peaknose umur 1,5 bulan </h2>
     <p class="price"> Rp2.700.000,00 </p>
    </div>
    <div class="product">
     <img alt="Blue sofa" height="200" src="/images/peaknosekcg3.png" width="200" />
     <h2> Peaknose umur 3 bulan </h2>
     <p class="price"> Rp3.700.000,00 </p>
    </div>
    <div class="product">
     <img alt="Pink ottoman" height="200" src="/images/peaknosekcg2.png" width="200" />
     <h2> Peaknose Umur 6 bulan </h2>
     <p class="price"> Rp4.700.000,00 </p>
    </div>
   </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title fs-4" id="productModalLabel">
          @auth
          Pilih Aksi
          @else
          Maaf, Anda belum login
          @endauth
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-4">
        @auth
        <form action="#" method="POST">
          @csrf
          <div class="d-grid gap-2">
            <button type="button" class="btn btn-outline-primary" onclick="addToFavorites()">
              <i class="bi bi-heart-fill"></i> Tambah ke Favorit Saya
            </button>
            <button type="button" class="btn btn-outline-secondary" onclick="addToCart()">
              <i class="bi bi-cart-fill"></i> Tambah ke Keranjang
            </button>
          </div>
        </form>
        @else
        <div class="text-center py-4">
          <p class="mb-4">Silakan login terlebih dahulu untuk melanjutkan.</p>
          <a href="{{ route('login') }}" class="btn btn-primary px-4">
            <i class="bi bi-box-arrow-in-right"></i> Login Sekarang
          </a>
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

    // Menghitung jumlah item favorit
    let favoriteCount = 0;
    let cartCount = 0;

    function addToFavorites() {
        favoriteCount++;
        document.getElementById('favorite-count').innerText = favoriteCount;
    }

    function addToCart() {
        cartCount++;
        document.getElementById('cart-count').innerText = cartCount;
    }
</script>

@endsection