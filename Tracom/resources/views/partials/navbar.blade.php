<!-- Font Awesome & Bootstrap CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
  /* Warna utama badge cart disesuaikan */
  #cart-count {
    font-size: 0.7rem;
    display: none;
    transform: translate(-30%, -60%);
    background-color: #BB9479 !important; /* aksen cokelat muda */
    color: white;
  }

  .custom-navbar {
    background-color: #FFFFFF;
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.12);
    padding: 1rem 2rem;
    position: sticky;
    top: 0;
    z-index: 999;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }

  .custom-navbar:hover {
    background-color: #f9f9f9;
    box-shadow: 0 6px 22px rgba(0, 0, 0, 0.15);
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
    color: #1E4D24 !important;
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

<nav class="navbar navbar-expand-lg custom-navbar mt-3 mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Tracom</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-3 align-items-center">
        <li class="nav-item">
          <a class="nav-link @if(Request::routeIs('home')) active @endif" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Request::routeIs('menu')) active @endif" href="{{ route('menu') }}">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tentang">Tentang Kami</a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link" href="{{ route('keranjang') }}">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
              0
              <span class="visually-hidden">items in cart</span>
            </span>
          </a>
        </li>
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

  document.addEventListener('DOMContentLoaded', refreshCartCount);
</script>
