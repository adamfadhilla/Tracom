<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Tracom - Kuliner Khas Betawi Autentik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Nikmati Lontong Sayur dan Ketupat Babanci khas Betawi dengan cita rasa otentik dari Tracom. Warisan kuliner tradisional dengan sentuhan modern.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
      :root {
        --primary: #306F38;
        --secondary: #BB9479;
        --dark: #5E4118;
        --light: #FCEFB4;
        --cream: #FFF6DE;
      }

      /* Base Styles */
      body {
        font-family: 'Poppins', sans-serif;
        background: var(--light);
        color: var(--dark);
        margin: 0;
        padding: 0;
        line-height: 1.6;
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
      }

      /* Hero Section */
      .hero {
        background: linear-gradient(135deg, var(--light) 0%, #FFFFFF 100%);
        padding: 140px 20px 120px;
        text-align: center;
        position: relative;
        overflow: hidden;
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
      }

      .hero h1 {
        font-size: clamp(2.8rem, 5vw, 4rem);
        font-weight: 900;
        margin-bottom: 1.5rem;
        color: var(--primary);
        text-shadow: 1px 1px 6px rgba(48, 111, 56, 0.2);
        letter-spacing: 1.5px;
        line-height: 1.2;
      }

      .hero p {
        font-size: clamp(1rem, 2.5vw, 1.3rem);
        color: var(--dark);
        max-width: 650px;
        margin: 0 auto 3rem;
        line-height: 1.8;
        opacity: 0.9;
      }

      /* Button Styles */
      .btn-tracom {
        background-color: var(--secondary);
        border: none;
        padding: 14px 44px;
        font-weight: 700;
        font-size: 1.25rem;
        border-radius: 50px;
        box-shadow: 0 6px 18px rgba(187, 148, 121, 0.6);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        color: white;
        cursor: pointer;
        letter-spacing: 1px;
        position: relative;
        overflow: hidden;
      }

      .btn-tracom:hover {
        background-color: var(--dark);
        box-shadow: 0 10px 28px rgba(94, 65, 24, 0.8);
        transform: translateY(-3px);
      }

      .btn-tracom:active {
        transform: translateY(1px);
      }

      .btn-tracom::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(255,255,255,0.2), transparent);
        border-radius: 50px;
      }

      /* Decorative Elements */
      .hero-decor {
        position: absolute;
        border-radius: 50%;
        background: rgba(187, 148, 121, 0.15);
        filter: blur(75px);
        z-index: 1;
        animation: float 8s ease-in-out infinite;
      }

      .decor-1 {
        width: 280px;
        height: 280px;
        top: -100px;
        left: -80px;
      }

      .decor-2 {
        width: 220px;
        height: 220px;
        bottom: -80px;
        right: -70px;
        animation-delay: 2s;
      }

      .decor-3 {
        width: 180px;
        height: 180px;
        top: 50%;
        right: 10%;
        animation-delay: 4s;
      }

      /* About Section */
      .about {
        background: white;
        padding: 100px 30px;
        text-align: center;
        box-shadow: 0 0 40px rgba(0, 0, 0, 0.06);
        border-radius: 16px;
        max-width: 1200px;
        margin: -90px auto 120px;
        position: relative;
        z-index: 2;
      }

      .section-title {
        font-weight: 800;
        font-size: 2.8rem;
        margin-bottom: 3rem;
        color: var(--primary);
        position: relative;
        display: inline-block;
      }

      .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--secondary);
        border-radius: 2px;
      }

      .lead-text {
        font-size: 1.3rem;
        color: var(--dark);
        margin-bottom: 2rem;
        line-height: 1.8;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
      }

      /* Content Sections */
      .content-section {
        text-align: left;
        max-width: 800px;
        margin: 0 auto 3rem;
        padding: 0 20px;
      }

      .content-section h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 1.5rem;
        position: relative;
        padding-left: 15px;
      }

      .content-section h3::before {
        content: '';
        position: absolute;
        left: 0;
        top: 8px;
        height: 60%;
        width: 5px;
        background: var(--secondary);
        border-radius: 3px;
      }

      .content-section ul {
        padding-left: 1.5rem;
        list-style-type: none;
      }

      .content-section ul li {
        margin-bottom: 1rem;
        font-size: 1.1rem;
        color: var(--dark);
        line-height: 1.7;
        position: relative;
        padding-left: 30px;
      }

      .content-section ul li::before {
        content: '\f00c';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: var(--primary);
      }

      /* Product Highlights */
      .product-highlight {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
      }

      .product-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
      }

      .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
      }

      .product-image {
        height: 200px;
        background-size: cover;
        background-position: center;
        position: relative;
      }

      .product-image::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
      }

      .product-body {
        padding: 1.5rem;
      }

      .product-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.5rem;
      }

      .product-desc {
        color: var(--dark);
        opacity: 0.9;
        font-size: 1rem;
        line-height: 1.6;
      }

      /* Company Profile */
      .company-profile {
        background: var(--cream);
        padding: 2rem;
        border-radius: 12px;
        margin-top: 3rem;
        border: 1px dashed var(--secondary);
      }

      .profile-table {
        width: 100%;
        border-collapse: collapse;
      }

      .profile-table tr:not(:last-child) {
        border-bottom: 1px solid rgba(94, 65, 24, 0.1);
      }

      .profile-table td {
        padding: 1rem 0;
        vertical-align: top;
        font-size: 1.05rem;
        color: var(--dark);
      }

      .profile-table td:first-child {
        font-weight: 600;
        width: 180px;
        color: var(--primary);
      }

      /* Footer */
      .footer {
        background-color: var(--primary);
        color: white;
        padding: 50px 20px 30px;
        text-align: center;
        font-weight: 500;
        position: relative;
        overflow: hidden;
      }

      .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 10px;
        background: linear-gradient(90deg, var(--secondary), var(--primary));
      }

      .footer-content {
        max-width: 800px;
        margin: 0 auto;
      }

      .social-links {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin: 2rem 0;
      }

      .social-link {
        color: white;
        font-size: 1.5rem;
        transition: transform 0.3s ease, color 0.3s ease;
      }

      .social-link:hover {
        color: var(--light);
        transform: translateY(-3px);
      }

      .copyright {
        margin-top: 2rem;
        font-size: 0.9rem;
        opacity: 0.8;
      }

      /* Animations */
      @keyframes float {
        0%, 100% {
          transform: translateY(0) translateX(0);
        }
        50% {
          transform: translateY(20px) translateX(10px);
        }
      }

      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }

      /* Responsive Design */
      @media (max-width: 992px) {
        .hero {
          padding: 120px 20px 100px;
          min-height: auto;
        }
        
        .about {
          padding: 80px 20px;
          margin: -70px auto 100px;
        }
      }

      @media (max-width: 768px) {
        .hero h1 {
          font-size: 2.5rem;
        }
        
        .section-title {
          font-size: 2.2rem;
        }
        
        .lead-text {
          font-size: 1.1rem;
        }
        
        .btn-tracom {
          padding: 12px 36px;
          font-size: 1.1rem;
        }
        
        .content-section {
          padding: 0 15px;
        }
        
        .content-section h3 {
          font-size: 1.5rem;
        }
        
        .product-highlight {
          grid-template-columns: 1fr;
        }
        
        .company-profile {
          padding: 1.5rem;
        }
        
        .profile-table td {
          display: block;
          width: 100%;
          padding: 0.8rem 0;
        }
        
        .profile-table td:first-child {
          width: 100%;
          padding-bottom: 0.3rem;
          border-bottom: 1px dashed var(--secondary);
        }
        
        .profile-table tr:not(:last-child) td:first-child {
          padding-top: 1.2rem;
        }
      }

      @media (max-width: 576px) {
        .hero {
          padding: 100px 20px 80px;
        }
        
        .hero h1 {
          font-size: 2.2rem;
        }
        
        .about {
          padding: 60px 20px;
          margin: -50px 15px 80px;
        }
        
        .section-title {
          font-size: 2rem;
          margin-bottom: 2rem;
        }
      }
    </style>
</head>
<body>
  <!-- Navbar -->
  @include('partials.navbar')

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-decor decor-1"></div>
    <div class="hero-decor decor-2"></div>
    <div class="hero-decor decor-3"></div>
    
    <div class="hero-content animate__animated animate__fadeIn">
      <h1 class="animate__animated animate__fadeInDown">Rasa Autentik Betawi Dalam Setiap Suapan</h1>
      <p class="animate__animated animate__fadeIn animate__delay-1s">
        Tracom menghadirkan Lontong Sayur dan Ketupat Babanci dengan resep turun-temurun, 
        mempertahankan keaslian cita rasa khas Betawi yang mulai langka.
      </p>
      <div class="animate__animated animate__fadeIn animate__delay-2s">
        <a href="{{ route('menu') }}" class="btn btn-tracom">
          Jelajahi Menu <i class="fas fa-utensils ms-2"></i>
        </a>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="about">
    <div class="container">
      <h2 class="section-title">Tentang Tracom</h2>
      <p class="lead-text">
        Tracom (Tradevis Company) adalah pelestari kuliner tradisional Indonesia dengan fokus pada 
        hidangan khas Betawi. Kami berkomitmen menghadirkan <strong>Lontong Sayur</strong> dan 
        <strong>Ketupat Babanci</strong> dengan cita rasa otentik yang konsisten.
      </p>
      
      <div class="content-section animate__animated" data-animate="animate__fadeIn">
        <h3>Visi Kami</h3>
        <p>
          Menjadi pelopor kuliner tradisional Indonesia yang mampu memadukan keautentikan rasa dengan 
          standar modern, sehingga dapat dinikmati oleh berbagai generasi tanpa kehilangan esensi 
          budaya aslinya.
        </p>
      </div>

      <div class="content-section animate__animated" data-animate="animate__fadeIn">
        <h3>Misi Kami</h3>
        <ul>
          <li>Mempertahankan resep asli dengan bahan-bahan pilihan berkualitas tinggi</li>
          <li>Mengemas kuliner tradisional dengan standar higienis modern</li>
          <li>Menjangkau pasar yang lebih luas melalui inovasi distribusi</li>
          <li>Mendidik generasi muda untuk mencintai kuliner tradisional</li>
          <li>Memberdayakan masyarakat lokal dalam rantai produksi</li>
        </ul>
      </div>

      <div class="content-section animate__animated" data-animate="animate__fadeIn">
        <h3>Produk Unggulan</h3>
        <div class="product-highlight">
          <div class="product-card">
            <div class="product-image" style="background-image: url({{ asset('img/lontong.jpeg') }});"></div>
            <div class="product-body">
              <h4 class="product-title">Lontong Sayur Betawi</h4>
              <p class="product-desc">
                Lontong lembut dengan kuah sayur labu siam khas, disajikan dengan telur, tahu, tempe, 
                dan kerupuk. Dilengkapi dengan bumbu kacang dan sambal yang membuat cita rasanya semakin kaya.
              </p>
            </div>
          </div>
          
          <div class="product-card">
            <div class="product-image" style="background-image: url({{ asset('img/ketupat.jpeg') }});"></div>
            <div class="product-body">
              <h4 class="product-title">Ketupat Babanci</h4>
              <p class="product-desc">
                Hidangan langka khas Betawi dengan kuah kental berempah, ketupat yang padat, dan 
                daging sapi pilihan. Perpaduan unik antara gurih, manis, dan pedas yang harmonis.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="content-section animate__animated" data-animate="animate__fadeIn">
        <h3>Profil Perusahaan</h3>
        <div class="company-profile">
          <table class="profile-table">
            <tr>
              <td>Nama Perusahaan</td>
              <td>: Tracom (Tradevis Company)</td>
            </tr>
            <tr>
              <td>Bidang Usaha</td>
              <td>: Kuliner Tradisional Indonesia</td>
            </tr>
            <tr>
              <td>Produk Utama</td>
              <td>: Lontong Sayur & Ketupat Babanci</td>
            </tr>
            <tr>
              <td>Bentuk Usaha</td>
              <td>: UMKM Berkembang</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>: Jl. Tomang Rayang No. 56, Grogol Petamburan, Jakarta Barat</td>
            </tr>
            <tr>
              <td>Kontak</td>
              <td>: (021) 80637704 | tracompany@gmail.com</td>
            </tr>
            <tr>
              <td>Sosial Media</td>
              <td>: @tracom.betawi (Instagram)</td>
            </tr>
            <tr>
              <td>Jam Operasional</td>
              <td>: Setiap hari 08.00 - 20.00 WIB</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div class="social-links">
        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
        <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
      </div>
      <p>Jl. Tomang Rayang No. 56, Jakarta Barat</p>
      <p>tracompany@gmail.com | (021) 80637704</p>
      <div class="copyright">
        &copy; 2025 Tracom. Semua Hak Dilindungi.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Initialize animations
    document.addEventListener('DOMContentLoaded', function() {
      // Update cart count
      function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalCount = cart.reduce((sum, item) => sum + item.quantity, 0);
        const cartCountEl = document.getElementById('cart-count');
        
        if (cartCountEl) {
          cartCountEl.textContent = totalCount;
          cartCountEl.style.display = totalCount > 0 ? 'flex' : 'none';
        }
      }
      
      updateCartCount();
      window.addEventListener('storage', updateCartCount);

      // Animate elements on scroll
      const animateOnScroll = function() {
        const elements = document.querySelectorAll('[data-animate]');
        const windowHeight = window.innerHeight;
        
        elements.forEach(element => {
          const elementPosition = element.getBoundingClientRect().top;
          const animationClass = element.getAttribute('data-animate');
          
          if (elementPosition < windowHeight - 100 && !element.classList.contains(animationClass)) {
            element.classList.add(animationClass);
          }
        });
      };
      
      // Initial animation trigger
      animateOnScroll();
      window.addEventListener('scroll', animateOnScroll);

      // Smooth scrolling for anchor links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute('href'));
          if (target) {
            window.scrollTo({
              top: target.offsetTop - 80,
              behavior: 'smooth'
            });
          }
        });
      });
    });

    // Button hover effect enhancement
    document.querySelectorAll('.btn-tracom').forEach(button => {
      button.addEventListener('mousemove', function(e) {
        const x = e.pageX - this.offsetLeft;
        const y = e.pageY - this.offsetTop;
        
        this.style.setProperty('--x', x + 'px');
        this.style.setProperty('--y', y + 'px');
      });
    });
  </script>
</body>
</html>