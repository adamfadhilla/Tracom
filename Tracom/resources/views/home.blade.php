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
      body {
        font-family: 'Poppins', sans-serif;
        background: #fafafa;
        color: #2c3e50;
        margin: 0;
        padding: 0;
      }

      /* Navbar */
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

      /* Hero Section */
      .hero {
        background: linear-gradient(135deg, #fef3e4 0%, #f0f4ff 100%);
        padding: 120px 20px 100px;
        text-align: center;
        position: relative;
        overflow: hidden;
      }

      .hero h1 {
        font-size: 3.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: #e67e22;
        text-shadow: 1px 1px 4px rgba(230, 126, 34, 0.4);
      }

      .hero p {
        font-size: 1.3rem;
        color: #555555dd;
        max-width: 600px;
        margin: 0 auto 2.5rem;
        line-height: 1.6;
      }

      .btn-primary {
        background-color: #e67e22;
        border: none;
        padding: 12px 36px;
        font-weight: 600;
        font-size: 1.2rem;
        border-radius: 40px;
        box-shadow: 0 5px 15px rgb(230 126 34 / 0.5);
        transition: all 0.3s ease;
      }
      .btn-primary:hover {
        background-color: #d35400;
        box-shadow: 0 8px 20px rgb(211 84 0 / 0.7);
        transform: translateY(-3px);
      }

      /* Floating decorative circles */
      .hero::before,
      .hero::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        background: #e67e22aa;
        filter: blur(70px);
        z-index: 0;
      }
      .hero::before {
        width: 250px;
        height: 250px;
        top: -80px;
        left: -60px;
      }
      .hero::after {
        width: 200px;
        height: 200px;
        bottom: -60px;
        right: -50px;
      }

      /* About Section */
      .about {
        background: #fff;
        padding: 80px 20px;
        text-align: center;
        box-shadow: 0 0 30px rgb(0 0 0 / 0.05);
        border-radius: 12px;
        max-width: 900px;
        margin: -80px auto 100px; /* to overlap a bit hero */
        position: relative;
        z-index: 1;
      }
      .about h2 {
        font-weight: 700;
        font-size: 2.8rem;
        margin-bottom: 1rem;
        color: #2c3e50;
      }
      .about p.lead {
        font-size: 1.25rem;
        color: #555;
        margin-bottom: 1rem;
        line-height: 1.7;
      }

      /* Footer */
      .footer {
        background-color: #2c3e50;
        color: #fff;
        padding: 25px 20px;
        text-align: center;
        font-weight: 500;
        font-size: 1rem;
      }

      /* Responsive typography */
      @media (max-width: 768px) {
        .hero h1 {
          font-size: 2.8rem;
        }
        .about {
          margin: -60px 15px 80px;
          padding: 50px 15px;
        }
        .about h2 {
          font-size: 2.2rem;
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
            <a class="nav-link active" href="#">Beranda</a>
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
        Tracom adalah rumah makan yang berfokus pada sajian khas Betawi,
        terutama <strong>Ketupat Babanci</strong> dan <strong>Lontong Sayur</strong>.
        Kami mengedepankan rasa otentik dengan bahan segar dan resep tradisional
        yang diwariskan dari generasi ke generasi.
      </p>
      <p>
        Dengan suasana modern dan layanan ramah, kami siap menyambut Anda yang
        rindu cita rasa khas Jakarta tempo dulu.
      </p>
    </div>
  </section>

  
  <footer class="footer">
    <div class="container">&copy; 2025 Tracom. Semua Hak Dilindungi.</div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
