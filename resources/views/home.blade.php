@extends('welcome')

@section('content')
<!-- Navbar with full-width styling -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid px-4">
    <!-- Ganti teks dengan logo -->
    <a class="navbar-brand" href="#">
      <div class="logo-container">
        <img src="{{ asset('images/logocat.png') }}" alt="Ecommerce CatHouse Logo" class="img-fluid">
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto gap-2">
        <!-- Navigation links -->
        <ul class="navbar">
  <li class="nav-item">
    <a class="nav-link" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Katalog</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Galeri</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Hubungi Kami</a>
  </li>
</ul>



        <!-- Authentication buttons -->
        @guest
        <li class="nav-item">
  <!-- Button untuk memicu modal login -->
  <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
</li>

<li class="nav-item">
  <!-- Button untuk memicu modal register -->
  <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
</li>

        @endguest

        @auth
        
        
<li class="nav-item">
  <a class="btn btn-secondary" href="{{ route('password') }}">Ubah Password</a>
</li>
<li class="nav-item">
  <a class="btn btn-secondary text-white" href="{{ route('logout') }}">Logout</a>
</li>

        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- Modal login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="loginError" class="alert alert-danger" style="display: none;"></div>
        <form id="loginForm" action="{{ route('login.action') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="username">Username <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="username" value="{{ old('username') }}" required />
          </div>
          <div class="mb-3">
            <label for="password">Password <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="password" required />
          </div>
          <div class="mb-3">
            <button class="btn btn-secondary" type="submit">Login</button>
            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <div id="registerError" class="alert alert-danger" style="display:none"></div>
    <form id="registerForm" action="{{ route('register.action') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="name" required />
        </div>
        <div class="mb-3">
            <label for="username">Username <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="username" required />
        </div>
        <div class="mb-3">
            <label for="password">Password <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="password" required />
        </div>
        <div class="mb-3">
            <label for="password_confirm">Confirm Password <span class="text-danger">*</span></label>
            <input class="form-control" type="password" name="password_confirm" required />
        </div>
        <div class="mb-3">
            <button class="btn btn-secondary" type="submit">Register</button>
            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>
    </div>
  </div>
</div>

<div className="big-container1">
<div class="container">
   <div class="left">
    <div class="title">
     Novie's Cat House adopsi kucing ras Peaknose dan Persia
    </div>
    <div class="subtitle">
     Jelajahi Dunia Kucing Ras Terlengkap, Hanya di Novie's Cat House! Temukan Pasangan Hati yang Manis dan Menggemaskan.
    </div>
    <a class="button" href="{{ route('katalog') }}">
    Adopsi Sekarang
</a>
   </div>
   <div class="right">
   <div class="image-container">
    <img alt="Deskripsi gambar" height="400" src="/images/peaknosee.png" width="500"/>
</div>

   </div>
  </div>
</div>

<div className="big-container2">
  <div class="container1">
    <div class="title1">
      Koleksi Ras Populer
    </div>
    <div class="card">
      <h3>
        Ras Peaknose
      </h3>
      <p>
        Kucing Peaknose memiliki wajah yang pesek, mata yang bulat, serta bulu panjang dan halus yang memerlukan perhatian khusus
      </p>
      <img alt="British Shorthair cat" height="200" src="/images/peaknose1.png" width="300" />
    </div>
    <div class="card">
      <h3>
        Ras Persia
      </h3>
      <p>
        Kucing Persia memiliki kepala bulat besar, hidung yang pesek, dan bulu panjang yang lembut dengan ekor lebat yang indah.
      </p>
      <img alt="Persian cat" src="/images/persia1.png" />
    </div>
    <div class="catalog-link">
        <a href="{{ route('katalog') }}">Tampilkan Katalog -></a>
    </div>

  </div>
</div>

<div className="big-container3">
  <div class="container2">
   <h1>
   Kumpulan Foto Kucing kami
   </h1>
   <p>
   Keindahan Setiap Bulunya, Cerita di Balik Setiap Tatapannya
   </p>
   <div class="gallery">
    <img alt="Three people holding cat products with crates in front of them" height="300" src="/images/kcg1.jpg" width="500"/>
    <img alt="Person holding a cat and a product box" height="300" src="/images/kcg5.jpg" width="200"/>
    <img alt="Person holding a cat and a product box" height="300" src="/images/kcg6.jpg" width="200"/>
    <img alt="Two people holding a cat and a product box" height="300" src="/images/kcg4.jpg" width="200"/>
    <img alt="Person holding a cat and a product box" height="300" src="/images/kcg3.jpg" width="200"/>
    <img alt="Person holding a cat and a product box" height="300" src="/images/kcg2.jpg" width="200"/>
    <img alt="Two people holding a cat and a product box" height="300" src="/images/kcg7.jpg" width="200"/>
    <img alt="Child holding a cat and a product box" height="300" src="/images/kcg8.jpg" width="200"/>
    <img alt="Two people holding cat products with crates in front of them" height="300" src="/images/kcg9.jpg" width="200"/>
    <img alt="Child holding a cat and a product box" height="300" src="/images/kcg10.jpg" width="200"/>
    <img alt="Person holding a cat and a product box" height="300" src="/images/kcg11.jpg" width="200"/>
    <img alt="Person holding a cat and a product box" height="300" src="/images/kcg12.jpg" width="200"/>
   </div>
  </div>
</div>

<div className="big-container4">
    <footer class="footer">
        <div>
            <h3>COLORLIB</h3>
            <p>© 2019</p>
        </div>
        <div>
            <h3>Customers</h3>
            <a href="#">Buyer</a>
            <a href="#">Supplier</a>
        </div>
        <div>
            <h3>Company</h3>
            <a href="#">About us</a>
            <a href="#">Careers</a>
            <a href="#">Contact us</a>
        </div>
        <div>
            <h3>Further Information</h3>
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
        <div>
            <h3>Follow us</h3>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-medium-m"></i></a>
                <a href="#"><i class="fab fa-telegram-plane"></i></a>
            </div>
        </div>
    </footer>
</div>



<!-- Main content container -->
<div class="container mt-5">
  @yield('main_content')
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  // Di bagian script home.blade.php
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#registerForm').on('submit', function (e) {
        e.preventDefault();
        
        // Hapus pesan error sebelumnya
        $('#registerError').hide();
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = '/';
                } else {
                    $('#registerError')
                        .html(response.message || 'Registration failed')
                        .show();
                }
            },
            error: function(xhr, status, error) {
                // Log error untuk debugging
                console.log('Status:', status);
                console.log('Error:', error);
                console.log('Response:', xhr.responseText);
                
                let errorMessage = 'Registration failed';
                
                // Cek apakah ada validation errors
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage = Object.values(xhr.responseJSON.errors).flat().join('<br>');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                $('#registerError')
                    .html(errorMessage)
                    .show();
            }
        });
    });
});
</script>
