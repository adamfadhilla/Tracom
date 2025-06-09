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
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
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
        background: #FCEFB4; /* Background lembut */
        color: #5E4118; /* Teks utama */
        margin: 0;
        padding: 0;
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
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
        transition: all 0.3s ease;
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

      /* About Section Styles */
      .about-section {
        margin-top: 3rem;
        text-align: left;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
      }

      .about-section h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #306F38;
        margin-bottom: 1rem;
      }

      .about-section ul {
        padding-left: 1.2rem;
      }

      .about-section ul li {
        margin-bottom: 0.6rem;
        font-size: 1.1rem;
        color: #5E4118;
        line-height: 1.6;
      }

      .product-highlight {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
        margin-top: 1rem;
      }

      .product-item {
        background: #FCEFB4;
        padding: 1rem 1.5rem;
        border-left: 6px solid #306F38;
        border-radius: 8px;
      }

      .product-item strong {
        font-size: 1.2rem;
        color: #306F38;
      }

      .company-profile {
        background: #fdf5cc;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-top: 2rem;
      }

      .company-profile table {
        width: 100%;
        border-collapse: collapse;
      }

      .company-profile td {
        padding: 0.5rem 0;
        vertical-align: top;
        font-size: 1.05rem;
        color: #5E4118;
      }

      .company-profile td:first-child {
        font-weight: 600;
        width: 160px;
      }

      /* Responsive tweaks */
      @media (max-width: 768px) {
        .hero {
          padding: 120px 20px 100px;
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
        
        .about-section h3 {
          font-size: 1.5rem;
        }

        .product-item {
          font-size: 0.95rem;
        }

        .company-profile td {
          font-size: 0.95rem;
          display: block;
          width: 100%;
        }
        
        .company-profile td:first-child {
          width: 100%;
          padding-top: 0.8rem;
          border-bottom: 1px dashed #306F38;
        }
      }
    </style>
</head>
<body>
  <!-- Include Navbar Partial -->
  @include('partials.navbar')

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
        Tracom (Tradevis Company) adalah perusahaan kuliner yang bergerak di bidang makanan tradisional Indonesia. Berdiri dengan semangat melestarikan cita rasa lokal, Tracom mengangkat dua sajian khas yang menggugah selera: <strong>Lontong Sayur</strong> dan <strong>Ketupat Babanci</strong>.
      </p>
      <p>
        Mengusung konsep rasa otentik dan bahan-bahan pilihan, Tracom hadir sebagai pelopor kuliner tradisional yang dikemas secara modern dan higienis, namun tetap mempertahankan keaslian rasa.
      </p>
      <p>
        Kami percaya bahwa makanan bukan sekadar konsumsi, melainkan warisan budaya yang patut dijaga dan diperkenalkan ke generasi muda maupun pasar yang lebih luas.
      </p>

      <div class="about-section">
        <h3>Visi</h3>
        <p>
          Menjadi perusahaan kuliner terdepan dalam menghadirkan makanan tradisional Indonesia yang berkualitas, otentik, dan dicintai oleh semua kalangan.
        </p>
      </div>

      <div class="about-section">
        <h3>Misi</h3>
        <ul>
          <li>Menyajikan lontong sayur dan ketupat babanci dengan rasa yang konsisten, lezat, dan higienis.</li>
          <li>Melestarikan kuliner khas Indonesia melalui inovasi dan pendekatan modern.</li>
          <li>Memberikan pelayanan terbaik kepada pelanggan dengan harga yang terjangkau.</li>
          <li>Meningkatkan kesejahteraan masyarakat melalui pemberdayaan tenaga kerja lokal.</li>
          <li>Membangun jaringan distribusi dan pemasaran yang luas, baik offline maupun online.</li>
        </ul>
      </div>

      <div class="about-section">
        <h3>Produk Unggulan</h3>
        <div class="product-highlight">
          <div class="product-item">
            <strong>Lontong Sayur:</strong> Lontong lembut dengan kuah sayur khas, disajikan dengan pelengkap seperti telur, tahu, tempe, dan kerupuk.
          </div>
          <div class="product-item">
            <strong>Ketupat Babanci:</strong> Sajian khas Betawi yang langka, dengan kuah rempah kental dan isian ketupat yang nikmat, cocok untuk pecinta cita rasa unik.
          </div>
        </div>
      </div>

      <div class="about-section">
        <h3>Profil Perusahaan</h3>
        <div class="company-profile">
          <table>
            <tr>
              <td>Nama Perusahaan</td>
              <td>: Tracom (Tradevis Company)</td>
            </tr>
            <tr>
              <td>Bidang Usaha</td>
              <td>: Kuliner / Makanan Tradisional</td>
            </tr>
            <tr>
              <td>Produk Utama</td>
              <td>: Lontong Sayur & Ketupat Babanci</td>
            </tr>
            <tr>
              <td>Bentuk Usaha</td>
              <td>: Usaha Mikro, Kecil, dan Menengah (UMKM)</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>: Jalan Tomang Rayang No. 56 RT 01/RW 01, Tomang, Kec. Grogol Petamburan, Jakarta Barat</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>: tracompany@gmail.com</td>
            </tr>
            <tr>
              <td>Instagram</td>
              <td>: @tracom.____</td>
            </tr>
            <tr>
              <td>Telp / Fax</td>
              <td>: (021) 80637704 / (021) 80637706</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">&copy; 2025 Tracom. Semua Hak Dilindungi.</div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Add scroll effect for navbar
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.custom-navbar');
      if (window.scrollY > 10) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // Cart functionality
    function updateCartCount() {
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

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
      updateCartCount();
      
      // Animate elements when they come into view
      const animateOnScroll = function() {
        const elements = document.querySelectorAll('.about, .about-section, .product-item');
        
        elements.forEach(element => {
          const elementPosition = element.getBoundingClientRect().top;
          const windowHeight = window.innerHeight;
          
          if (elementPosition < windowHeight - 100) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
          }
        });
      };
      
      // Set initial state for animated elements
      document.querySelectorAll('.about-section, .product-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      });
      
      // Add scroll event listener
      window.addEventListener('scroll', animateOnScroll);
      animateOnScroll(); // Run once on load
    });

    // Update cart when storage changes (for multi-tab usage)
    window.addEventListener('storage', updateCartCount);
  </script>
</body>
</html>