<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Tracom - Kuliner Khas Betawi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <style>
      /* Reset & base */
    /* Reset & base */
body {
  font-family: 'Poppins', sans-serif;
  background: #FCEFB4; /* Background lembut */
  color: #5E4118; /* Teks utama */
  margin: 0;
  padding: 0;
  line-height: 1.6;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

/* Navbar */
.navbar {
  background-color: #FFFFFF;
  box-shadow: 0 4px 18px rgba(0, 0, 0, 0.12);
  padding: 1rem 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky;
  top: 0;
  z-index: 999;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.navbar:hover {
  background-color: #f9f9f9;
  box-shadow: 0 6px 22px rgba(0, 0, 0, 0.15);
}

.navbar-brand {
  font-weight: 800;
  font-size: 2rem;
  color: #306F38 !important; /* Hijau khas */
  letter-spacing: 2px;
  cursor: default;
  user-select: none;
  text-transform: uppercase;
  transition: color 0.3s ease;
}
.navbar-brand:hover {
  color: #1E4D24 !important;
}

/* Navbar Links */
.nav-link {
  font-weight: 600;
  color: #5E4118 !important; /* Coklat tua */
  position: relative;
  margin-left: 2rem;
  text-transform: uppercase;
  font-size: 1rem;
  letter-spacing: 1px;
  cursor: pointer;
  transition: color 0.3s ease;
}
.nav-link::after {
  content: '';
  position: absolute;
  width: 0%;
  height: 2.5px;
  background: #BB9479; /* Coklat muda */
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

/* Hero Section */
.hero {
  background: linear-gradient(135deg, #FCEFB4 0%, #FFFFFF 100%);
  padding: 140px 20px 120px;
  text-align: center;
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.hero h1 {
  font-size: clamp(2.8rem, 5vw, 4rem);
  font-weight: 900;
  margin-bottom: 1.2rem;
  color: #306F38;
  text-shadow: 1px 1px 6px rgba(48, 111, 56, 0.4);
  letter-spacing: 2px;
  animation: fadeInDown 1s ease forwards;
}

.hero p {
  font-size: clamp(1rem, 2.5vw, 1.3rem);
  color: #5E4118;
  max-width: 650px;
  margin: 0 auto 3rem;
  line-height: 1.7;
  animation: fadeInUp 1s ease forwards;
  animation-delay: 0.4s;
  opacity: 0;
}

.btn-primary {
  background-color: #BB9479; /* Coklat muda */
  border: none;
  padding: 14px 44px;
  font-weight: 700;
  font-size: 1.25rem;
  border-radius: 50px;
  box-shadow: 0 6px 18px rgba(187, 148, 121, 0.6);
  transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.25s ease;
  color: #FFFFFF;
  cursor: pointer;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  animation: fadeInUp 1s ease forwards;
  animation-delay: 0.6s;
  opacity: 0;
}
.btn-primary:hover {
  background-color: #5E4118; /* Coklat tua */
  box-shadow: 0 10px 28px rgba(94, 65, 24, 0.8);
  transform: translateY(-5px) scale(1.05);
}

/* Floating decorative circles */
.hero::before,
.hero::after {
  content: '';
  position: absolute;
  border-radius: 50%;
  background: #BB9479aa;
  filter: blur(75px);
  z-index: 0;
  animation: float 6s ease-in-out infinite;
}
.hero::before {
  width: 280px;
  height: 280px;
  top: -100px;
  left: -80px;
  animation-delay: 0s;
}
.hero::after {
  width: 220px;
  height: 220px;
  bottom: -80px;
  right: -70px;
  animation-delay: 3s;
}

/* About Section */
.about {
  background: #FFFFFF;
  padding: 100px 30px 90px;
  text-align: center;
  box-shadow: 0 0 40px rgba(0, 0, 0, 0.06);
  border-radius: 16px;
  max-width: 920px;
  margin: -90px auto 120px;
  position: relative;
  z-index: 1;
  animation: fadeInUp 1.2s ease forwards;
  opacity: 0;
}
.about h2 {
  font-weight: 800;
  font-size: 3rem;
  margin-bottom: 1.2rem;
  color: #306F38;
  letter-spacing: 1.2px;
}
.about p.lead {
  font-size: 1.3rem;
  color: #5E4118;
  margin-bottom: 1.3rem;
  line-height: 1.8;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

/* Footer */
.footer {
  background-color: #306F38;
  color: #FFFFFF;
  padding: 30px 20px;
  text-align: center;
  font-weight: 600;
  font-size: 1.1rem;
  letter-spacing: 1px;
  user-select: none;
  box-shadow: inset 0 4px 10px rgba(0, 0, 0, 0.2);
  transition: background-color 0.3s ease;
}
.footer:hover {
  background-color: #255626;
}

/* Animations */
@keyframes fadeInDown {
  0% {
    opacity: 0;
    transform: translateY(-40px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    transform: translateY(40px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0) translateX(0);
  }
  50% {
    transform: translateY(15px) translateX(10px);
  }
}

/* Responsive tweaks */
@media (max-width: 768px) {
  .navbar {
    flex-direction: column;
    padding: 1rem 1rem;
  }
  .nav-link {
    margin-left: 0;
    margin-top: 1rem;
  }
  .hero h1 {
    font-size: 2.6rem;
  }
  .hero p {
    max-width: 90%;
  }
  .about {
    padding: 60px 20px 60px;
    margin: -70px 10px 80px;
  }
  .about h2 {
    font-size: 2.4rem;
  }
  .about p.lead {
    font-size: 1.1rem;
  }
  .btn-primary {
    padding: 12px 32px;
    font-size: 1.1rem;
  }
}


    </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">Tracom</a>
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
            <a class="nav-link" href="#tentang">Tentang Kami</a>
          </li>
          <li class="nav-item position-relative">
  <a class="nav-link" href="{{ route('keranjang') }}">
    <i class="fas fa-shopping-cart fa-lg"></i>
    <span
      id="cart-count"
      class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
      style="font-size: 0.7rem;"
    >
      0
      <span class="visually-hidden">items in cart</span>
    </span>
  </a>
</li>

          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Rasa Tradisi Betawi, Kini Lebih Dekat</h1>
      <p>
        Kami menyajikan Ketupat Babanci dan Lontong Sayur otentik dengan cita
        rasa turun temurun.
      </p>
      <a href="{{ route('menu') }}" class="btn btn-primary btn-lg mt-3"
        >Lihat Menu <i class="fas fa-utensils ms-2"></i
      ></a>
    </div>
  </section>

  <!-- About Section -->
  <section class="about" id="tentang">
    <div class="container">
      <h2>Tentang Tracom</h2>
      <p class="lead">
        Tracom (Tradevis Company) adalah perusahaan kuliner yang bergerak di bidang makanan tradisional Indonesia. Berdiri dengan semangat melestarikan cita rasa lokal, Tracom mengangkat dua sajian khas yang menggugah selera: Lontong Sayur dan Ketupat Babanci.

      </p>
      <p>
        Kami percaya bahwa makanan bukan sekadar konsumsi, melainkan warisan budaya yang patut dijaga dan diperkenalkan ke generasi muda maupun pasar yang lebih luas.

      </p>
    </div>
  </section>

  
  <footer class="footer">
    <div class="container">&copy; 2025 Tracom. Semua Hak Dilindungi.</div>
  </footer>
    <script>
  function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalCount = cart.reduce((sum, item) => sum + item.quantity, 0);

    const cartCountEl = document.getElementById('cart-count');
    if (cartCountEl) {
      if (totalCount > 0) {
        cartCountEl.textContent = totalCount;
        cartCountEl.style.display = 'inline-block';
      } else {
        cartCountEl.style.display = 'none'; // sembunyikan jika 0
      }
    }
  }

  // Panggil saat halaman load
  updateCartCount();
</script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
