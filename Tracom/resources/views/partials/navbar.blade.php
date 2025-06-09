<!-- resources/views/partials/navbar.blade.php -->

<!-- Font Awesome & Bootstrap CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
.custom-navbar {
  background-color: rgba(255, 255, 255, 0.98);
  box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08);
  padding: 0;
  position: sticky;
  top: 0;
  z-index: 1030;
  transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  border-bottom: 1px solid rgba(48, 111, 56, 0.1);
}

.custom-navbar.scrolled {
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  background-color: rgba(255, 255, 255, 0.96);
}

.custom-navbar:hover {
  box-shadow: 0 6px 22px rgba(0, 0, 0, 0.12);
  background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.98), rgba(252, 239, 180, 0.3) 15%);
}

.navbar-brand {
  font-weight: 800;
  font-size: 1.8rem;
  color: #306F38 !important;
  letter-spacing: 1.5px;
  cursor: default;
  user-select: none;
  text-transform: uppercase;
  transition: all 0.3s ease;
  padding: 1rem 0;
  margin-left: 1rem;
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.navbar-brand:hover {
  color: #24562B !important;
  transform: translateY(-1px);
}

.navbar-brand img {
  transition: all 0.3s ease;
  transform-origin: center;
}

.navbar-brand:hover img {
  transform: scale(1.05) rotate(-5deg);
}

.nav-link {
  font-weight: 600;
  color: #5E4118 !important;
  position: relative;
  margin: 0 1rem;
  text-transform: uppercase;
  font-size: 0.95rem;
  letter-spacing: 0.8px;
  transition: all 0.3s ease;
  padding: 1rem 0.5rem !important;
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 0%;
  height: 3px;
  background: linear-gradient(90deg, #BB9479, #306F38);
  left: 50%;
  transform: translateX(-50%);
  bottom: 0;
  border-radius: 3px;
  transition: width 0.3s ease, left 0.3s ease;
}

.nav-link:hover,
.nav-link.active {
  color: #306F38 !important;
  transform: translateY(-2px);
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 80%;
  left: 50%;
}

.btn-outline-success {
  border-color: #306F38;
  color: #306F38;
  transition: all 0.3s ease;
  border-width: 2px;
  font-weight: 600;
  padding: 0.5rem 1.25rem !important;
  border-radius: 50px;
  margin-left: 0.5rem;
}

.btn-outline-success:hover {
  background-color: #306F38;
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 4px 8px rgba(48, 111, 56, 0.3);
}

.cart-icon {
  position: relative;
  transition: all 0.3s ease;
}

.cart-icon:hover {
  transform: scale(1.1);
}

#cart-count {
  font-size: 0.65rem;
  padding: 0.35em 0.5em;
  min-width: 1.25em;
}

.dropdown-menu {
  border: none;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  padding: 0.5rem 0;
  margin-top: 0.5rem;
}

.dropdown-item {
  padding: 0.5rem 1.5rem;
  transition: all 0.2s ease;
}

.dropdown-item:hover {
  background-color: #f8f9fa;
  color: #306F38;
  transform: translateX(3px);
}

.navbar-toggler {
  border: none;
  padding: 0.5rem;
  margin-right: 1rem;
}

.navbar-toggler:focus {
  box-shadow: none;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2848, 111, 56, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
}

@media (max-width: 991.98px) {
  .navbar-collapse {
    background-color: rgba(255, 255, 255, 0.98);
    padding: 1rem;
    border-radius: 0 0 12px 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    margin-top: 0.5rem;
  }
  
  .nav-link {
    margin: 0.5rem 0;
    padding: 0.75rem 1rem !important;
    border-radius: 8px;
  }
  
  .nav-link:hover {
    background-color: rgba(252, 239, 180, 0.3);
  }
  
  .nav-link::after {
    display: none;
  }
  
  .btn-outline-success {
    margin-left: 0;
    margin-top: 0.5rem;
    width: 100%;
    text-align: center;
  }
}
</style>

<nav class="navbar navbar-expand-lg custom-navbar">
  <div class="container-fluid px-3 px-lg-5">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('img/logo.png') }}" alt="Logo Tracom" width="70" height="70" style="object-fit: cover; border-radius: 8px;">
      <span>Tracom</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link @if(Request::routeIs('home')) active @endif" href="{{ route('home') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if(Request::routeIs('menu')) active @endif" href="{{ route('menu') }}">Menu</a>
        </li>

        <li class="nav-item">
          <a class="nav-link @if(Request::routeIs('tentang')) active @endif" href="{{ route('tentang') }}">Tentang Kami</a>
        </li>

        <li class="nav-item me-2">
          <a class="nav-link cart-icon" href="{{ route('keranjang') }}">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
              style="display: none;">
              0
              <span class="visually-hidden">items in cart</span>
            </span>
          </a>
        </li>

        @auth('kasir')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="me-1">{{ Auth::guard('kasir')->user()->name }}</span>
              <i class="fas fa-user-circle ms-1"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('kasir.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('kasir.logout') }}">
                  @csrf
                  <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="btn btn-outline-success" href="{{ route('kasir.login') }}">
              <i class="fas fa-sign-in-alt me-1"></i> Login Kasir
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<script>
  // Add scroll effect
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.custom-navbar');
    if (window.scrollY > 10) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  function refreshCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalCount = cart.reduce((sum, item) => sum + item.quantity, 0);

    const cartCountEl = document.getElementById('cart-count');
    if (cartCountEl) {
      if (totalCount > 0) {
        cartCountEl.textContent = totalCount;
        cartCountEl.style.display = 'flex';
      } else {
        cartCountEl.style.display = 'none';
      }
    }
  }

  // Initialize cart count
  document.addEventListener('DOMContentLoaded', refreshCartCount);
  
  // Update cart count when storage changes (for multi-tab usage)
  window.addEventListener('storage', refreshCartCount);
</script>