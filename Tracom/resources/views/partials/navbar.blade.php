<!-- resources/views/partials/navbar.blade.php -->

<!-- Font Awesome & Bootstrap CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
.custom-navbar {
  background-color: #FFFFFF;
  box-shadow: 0 4px 18px rgba(0, 0, 0, 0.12);
  padding: 0 2rem 1rem 2rem;  /* padding-top 0 supaya mentok ke atas */
  position: sticky;
  top: 0;
  z-index: 999;
  transition: all 0.3s ease;
}


.custom-navbar:hover {
  background-color: #FFFFFF;
  box-shadow: 0 6px 22px rgba(0, 0, 0, 0.18);
  border-bottom: 5px solid transparent;
  background-image: linear-gradient(to bottom, #FFFFFF, #FCEFB4 8%);
  background-clip: padding-box;
}

  .navbar-brand {
    font-weight: 800;
    font-size: 2rem;
    color: #306F38 !important;
    letter-spacing: 2px;
    cursor: default;
    user-select: none;
    text-transform: uppercase;
    transition: color 0.3s ease;
  }

  .navbar-brand:hover {
  color: #24562B !important;
  text-shadow: 0 0 8px rgba(48, 111, 56, 0.4);
}

  .nav-link {
    font-weight: 600;
    color: #5E4118 !important;
    position: relative;
    margin-left: 2rem;
    text-transform: uppercase;
    font-size: 1rem;
    letter-spacing: 1px;
    transition: color 0.3s ease;
  }

  .nav-link::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 2.5px;
    background: #BB9479;
    left: 0;
    bottom: -8px;
    border-radius: 3px;
    transition: width 0.3s ease;
  }

  .nav-link:hover,
  .nav-link.active {
    color: #306F38 !important;
  }

  .nav-link:hover::after,
  .nav-link.active::after {
    width: 100%;
  }

  .btn-outline-success {
    border-color: #306F38;
    color: #306F38;
    transition: 0.3s ease;
  }

  .btn-outline-success:hover {
    background-color: #306F38;
    color: white;
  }

  @media (max-width: 768px) {
    .custom-navbar {
      flex-direction: column;
      padding: 1rem 1rem;
    }

    .nav-link {
      margin-left: 0;
      margin-top: 1rem;
    }
  }
</style>

<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="/">
      <img src="{{ asset('img/logo.png') }}" alt="Logo Tracom" width="80" height="80" style="object-fit: cover; border-radius: 8px;">
      <span>Tracom</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-3 align-items-center">

        <li class="nav-item">
          <a class="nav-link @if(Request::routeIs('home')) active @endif" href="{{ route('home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if(Request::routeIs('menu')) active @endif" href="{{ route('menu') }}">Menu</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="{{ route('tentang') }}">Tentang Kami</a>
      </li>


        <li class="nav-item position-relative">
          <a class="nav-link" href="{{ route('keranjang') }}">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
              style="font-size: 0.7rem; display: none;">
              0
              <span class="visually-hidden">items in cart</span>
            </span>
          </a>
        </li>

        @auth('kasir')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::guard('kasir')->user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('kasir.dashboard') }}">Dashboard</a></li>
              <li>
                <form method="POST" action="{{ route('kasir.logout') }}">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link btn btn-outline-success px-3 py-1" href="{{ route('kasir.login') }}">Login Kasir</a>
          </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>

<script>
  function refreshCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalCount = cart.reduce((sum, item) => sum + item.quantity, 0);

    const cartCountEl = document.getElementById('cart-count');
    if (cartCountEl) {
      if (totalCount > 0) {
        cartCountEl.textContent = totalCount;
        cartCountEl.style.display = 'inline-block';
      } else {
        cartCountEl.style.display = 'none';
      }
    }
  }

  // Panggil saat halaman load
  refreshCartCount();
</script>
