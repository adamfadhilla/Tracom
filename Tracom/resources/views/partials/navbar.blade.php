<!-- navbar.html -->
<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
  rel="stylesheet"
/>
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  rel="stylesheet"
/>
<style>
  .navbar {
    background-color: #fff;
    box-shadow: 0 4px 12px rgb(0 0 0 / 0.08);
  }

  .navbar-brand {
    font-weight: 700;
    font-size: 1.8rem;
    color: #e67e22 !important;
    letter-spacing: 1.5px;
  }

  .nav-link {
    font-weight: 500;
    color: #2c3e50 !important;
    position: relative;
    transition: color 0.3s ease;
  }

  .nav-link::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 2px;
    background: #e67e22;
    left: 0;
    bottom: -6px;
    transition: width 0.3s ease;
  }

  .nav-link:hover,
  .nav-link.active {
    color: #e67e22 !important;
  }

  .nav-link:hover::after,
  .nav-link.active::after {
    width: 100%;
  }
</style>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="beranda">Tracom</a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav gap-3 align-items-center">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('menu') }}">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Tentang Kami</a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link" href="{{ route('keranjang') }}">
            <i class="fas fa-shopping-cart fa-lg"></i>
            <span
              class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
              style="font-size: 0.7rem;"
            >
              0
              <span class="visually-hidden">items in cart</span>
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
