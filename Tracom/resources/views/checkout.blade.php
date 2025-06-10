<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Checkout & Pembayaran QRIS | Tracom</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #306F38;
      --primary-light: #4CAF50;
      --primary-dark: #1B5E20;
      --secondary: #5E4118;
      --secondary-light: #8D6E63;
      --accent: #FCEFB4;
      --light: #FFF9E6;
      --light-gray: #F5F5F5;
      --dark: #3A2C0D;
      --white: #FFFFFF;
      --success: #4CAF50;
      --warning: #FFC107;
      --error: #F44336;
      --border-radius: 12px;
      --box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    body {
      font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: var(--light);
      color: var(--dark);
      line-height: 1.6;
    }
    
    .container {
      max-width: 1200px;
      margin-top: 30px;
      margin-bottom: 50px;
    }
    
    .section-box {
      background: var(--white);
      border-radius: var(--border-radius);
      padding: 32px;
      box-shadow: var(--box-shadow);
      margin-bottom: 30px;
      border: none;
      transition: var(--transition);
    }
    
    .section-box:hover {
      box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    }
    
    .btn-confirm {
      background-color: var(--primary);
      border: none;
      padding: 16px 42px;
      color: var(--white);
      font-weight: 600;
      border-radius: 50px;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font-size: 1.1rem;
      letter-spacing: 0.5px;
      box-shadow: 0 4px 12px rgba(48, 111, 56, 0.2);
    }
    
    .btn-confirm:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(48, 111, 56, 0.3);
    }
    
    .btn-confirm:active {
      transform: translateY(0);
    }
    
    .total-text {
      font-size: 1.5rem;
      font-weight: bold;
      color: var(--primary);
    }
    
    .qris-container {
      margin: 20px auto;
      padding: 24px;
      background: var(--white);
      border-radius: var(--border-radius);
      box-shadow: 0 4px 16px rgba(0,0,0,0.05);
      border: 1px solid rgba(0,0,0,0.05);
      max-width: 300px;
      position: relative;
      overflow: hidden;
    }
    
    .qris-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 8px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
    }
    
    .qris-img {
      max-width: 100%;
      height: auto;
      margin: 0 auto;
      display: block;
      transition: var(--transition);
      border: 1px solid #eee;
      border-radius: 8px;
    }
    
    .qris-img:hover {
      transform: scale(1.03);
    }
    
    .menu-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 14px 0;
      border-bottom: 1px dashed rgba(0,0,0,0.08);
      transition: var(--transition);
    }
    
    .menu-item:hover {
      background-color: rgba(0,0,0,0.02);
      padding-left: 8px;
      padding-right: 8px;
      border-radius: 6px;
    }
    
    .menu-item:last-child {
      border-bottom: none;
    }
    
    .menu-name {
      font-weight: 500;
      color: var(--dark);
    }
    
    .menu-price {
      font-weight: 600;
      color: var(--primary);
    }
    
    .payment-instruction {
      background: var(--light-gray);
      border-radius: var(--border-radius);
      padding: 20px;
      margin-top: 24px;
      font-size: 0.95rem;
      border-left: 4px solid var(--primary);
    }
    
    .instruction-step {
      display: flex;
      gap: 12px;
      margin-bottom: 12px;
      align-items: flex-start;
      padding: 8px 0;
    }
    
    .step-number {
      background: var(--primary);
      color: var(--white);
      width: 24px;
      height: 24px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.9rem;
      flex-shrink: 0;
      font-weight: 600;
    }
    
    .upload-area {
      border: 2px dashed #ddd;
      border-radius: var(--border-radius);
      padding: 30px;
      text-align: center;
      cursor: pointer;
      transition: var(--transition);
      margin-top: 10px;
      background: var(--light-gray);
      position: relative;
      overflow: hidden;
    }
    
    .upload-area:hover {
      border-color: var(--primary);
      background: rgba(76, 175, 80, 0.05);
    }
    
    .upload-area i {
      font-size: 2rem;
      color: var(--primary);
      margin-bottom: 10px;
    }
    
    .upload-preview {
      max-width: 100%;
      max-height: 200px;
      margin-top: 15px;
      border-radius: 8px;
      display: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border: 1px solid #eee;
    }
    
    .form-label {
      font-weight: 600;
      color: var(--secondary);
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    
    .form-control {
      padding: 12px 16px;
      border-radius: 8px;
      border: 1px solid #ddd;
      transition: var(--transition);
    }
    
    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
    }
    
    h1 {
      color: var(--secondary);
      font-weight: 700;
      margin-bottom: 30px;
      position: relative;
      display: inline-block;
      font-size: 2.2rem;
    }
    
    h1:after {
      content: '';
      position: absolute;
      bottom: -12px;
      left: 0;
      width: 80px;
      height: 5px;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      border-radius: 3px;
    }
    
    h4 {
      color: var(--secondary);
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .nav-pills .nav-link.active {
      background-color: var(--primary);
      color: var(--white);
      box-shadow: 0 4px 8px rgba(48, 111, 56, 0.2);
    }
    
    .nav-pills .nav-link {
      color: var(--secondary);
      border: 1px solid #ddd;
      margin-right: 8px;
      margin-bottom: 8px;
      border-radius: 50px;
      padding: 8px 16px;
      font-weight: 500;
      transition: var(--transition);
    }
    
    .nav-pills .nav-link:hover {
      border-color: var(--primary);
      color: var(--primary);
    }
    
    .countdown-timer {
      background: var(--primary);
      color: white;
      padding: 8px 16px;
      border-radius: 50px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .progress-container {
      height: 6px;
      background: #eee;
      border-radius: 3px;
      margin: 20px 0;
      overflow: hidden;
    }
    
    .progress-bar {
      height: 100%;
      background: linear-gradient(90deg, var(--primary), var(--secondary));
      width: 100%;
      transition: width 1s linear;
    }
    
    .payment-methods {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
      margin-top: 20px;
    }
    
    .payment-method {
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 12px;
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      transition: var(--transition);
      flex: 1;
      min-width: 120px;
    }
    
    .payment-method:hover {
      border-color: var(--primary);
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    
    .payment-method.active {
      border-color: var(--primary);
      background: rgba(76, 175, 80, 0.05);
    }
    
    .payment-method img {
      height: 24px;
      width: auto;
    }
    
    @media (max-width: 768px) {
      .container {
        margin-top: 20px;
        margin-bottom: 30px;
        padding: 0 15px;
      }
      
      .section-box {
        padding: 24px;
      }
      
      h1 {
        font-size: 1.8rem;
      }
      
      h1:after {
        bottom: -8px;
        width: 60px;
      }
      
      .btn-confirm {
        padding: 14px 32px;
        font-size: 1rem;
        width: 100%;
        justify-content: center;
      }
      
      .payment-method {
        min-width: calc(50% - 10px);
      }
    }
    
    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    
    .pulse {
      animation: pulse 2s infinite;
    }
    
    /* Floating notification */
    .notification {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: var(--primary);
      color: white;
      padding: 16px 24px;
      border-radius: 8px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
      display: flex;
      align-items: center;
      gap: 12px;
      z-index: 1000;
      transform: translateY(100px);
      opacity: 0;
      transition: all 0.4s ease;
    }
    
    .notification.show {
      transform: translateY(0);
      opacity: 1;
    }
    
    .notification i {
      font-size: 1.5rem;
    }
  </style>
</head>
<body>

@include('partials.navbar')

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-3 mx-3" role="alert">
    <i class="fas fa-check-circle me-2"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="container">
  <div class="text-center mb-5">
    <h1>Checkout & Pembayaran</h1>
    <div class="countdown-timer">
      <i class="fas fa-clock"></i>
      <span id="countdown">Selesaikan dalam 15:00</span>
    </div>
    <div class="progress-container">
      <div class="progress-bar" id="progress-bar"></div>
    </div>
  </div>

  <form action="{{ route('checkout.process') }}" method="POST" enctype="multipart/form-data" id="checkout-form">
    @csrf

    <div class="row">
      <!-- Form Data Pelanggan -->
      <div class="col-lg-6">
        <div class="section-box">
          <h4><i class="fas fa-user-circle"></i>Informasi Pelanggan</h4>
          <p class="text-muted mb-4">Mohon isi data diri Anda untuk proses pemesanan</p>
          
          <div class="mb-4">
            <label for="nama" class="form-label">
              <i class="fas fa-user"></i> Nama Lengkap
            </label>
            <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') }}" placeholder="Masukkan nama lengkap">
            @error('nama')
              <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-4">
            <label for="telepon" class="form-label">
              <i class="fas fa-phone"></i> No. Telepon
            </label>
            <input type="text" class="form-control" id="telepon" name="telepon" required value="{{ old('telepon') }}" placeholder="Contoh: 081234567890">
            @error('telepon')
              <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="bukti_pembayaran" class="form-label">
              <i class="fas fa-camera"></i> Upload Bukti Pembayaran
            </label>
            <div class="upload-area" id="upload-area">
              <i class="fas fa-cloud-upload-alt"></i>
              <h5 class="mb-2">Seret & Lepas File Disini</h5>
              <p class="text-muted">Atau klik untuk memilih file</p>
              <small class="text-muted">Format: JPG, PNG (Maks. 2MB)</small>
            </div>
            <input type="file" class="form-control d-none" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*" required>
            @error('bukti_pembayaran')
              <div class="text-danger small mt-2">{{ $message }}</div>
            @enderror
            <img id="uploadPreview" class="upload-preview mt-3" src="#" alt="Preview Bukti Pembayaran" />
          </div>
        </div>
      </div>

      <!-- Ringkasan Pesanan & QRIS -->
      <div class="col-lg-6">
        <div class="section-box">
          <h4><i class="fas fa-receipt"></i>Ringkasan Pesanan</h4>
          <p class="text-muted mb-3">Detail pesanan Anda</p>
          
          <div id="summary-list" class="mb-3"></div>
          
          <hr class="my-4" />
          
          <div class="d-flex justify-content-between align-items-center total-text mb-4">
            <span>Total Pembayaran</span>
            <span id="summary-total">Rp 0</span>
          </div>

          <h4><i class="fas fa-qrcode"></i>Metode Pembayaran</h4>
          <p class="text-muted mb-3">Pilih metode pembayaran yang diinginkan</p>
          
          <div class="payment-methods">
            <div class="payment-method active" data-method="qris">
              <img src="https://images.seeklogo.com/logo-png/39/2/quick-response-code-indonesia-standard-qris-logo-png_seeklogo-391791.png" alt="QRIS">
              <span>QRIS</span>
            </div>
          
          <div id="qris-section">
            <div class="mt-4">
              <ul class="nav nav-pills mb-3" id="qris-tabs" role="tablist">
                <!-- Tabs will be generated dynamically -->
              </ul>
              
              <div class="tab-content" id="qris-content">
                <!-- QRIS content will be generated dynamically -->
              </div>
            </div>
          </div>
          
          <div id="bank-transfer-section" style="display: none;">
            <div class="mt-4">
              <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Silakan transfer ke rekening berikut:
              </div>
              <div class="bank-account">
                <div class="d-flex justify-content-between mb-2">
                  <span>Bank Mandiri</span>
                  <strong>1234 5678 9012 3456</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                  <span>Bank BCA</span>
                  <strong>9876 5432 1098 7654</strong>
                </div>
                <div class="d-flex justify-content-between">
                  <span>Bank BRI</span>
                  <strong>5678 9012 3456 7890</strong>
                </div>
                <p class="mt-3 text-muted"><small>Gunakan kode unik <strong id="unique-code">123</strong> di akhir nominal transfer</small></p>
              </div>
            </div>
          </div>
          
          <div id="ewallet-section" style="display: none;">
            <div class="mt-4">
              <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i> Pilih e-wallet untuk melihat nomor tujuan pembayaran
              </div>
              <select class="form-select mb-3">
                <option selected>Pilih E-Wallet</option>
                <option>Gopay</option>
                <option>OVO</option>
                <option>Dana</option>
                <option>ShopeePay</option>
              </select>
              <div class="text-center">
                <button class="btn btn-outline-primary">Tampilkan QR Code</button>
              </div>
            </div>
          </div>
          
          <div class="payment-instruction mt-4">
            <h5 class="mb-3"><i class="fas fa-info-circle me-2"></i>Petunjuk Pembayaran:</h5>
            <div class="instruction-step">
              <div class="step-number">1</div>
              <div>Pilih metode pembayaran di atas</div>
            </div>
            <div class="instruction-step">
              <div class="step-number">2</div>
              <div id="instruction-step-2">Scan QRIS menggunakan aplikasi mobile banking/e-wallet</div>
            </div>
            <div class="instruction-step">
              <div class="step-number">3</div>
              <div>Upload bukti pembayaran di form sebelah kiri</div>
            </div>
            <div class="instruction-step">
              <div class="step-number">4</div>
              <div>Klik tombol "Konfirmasi Pembayaran"</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn-confirm pulse">
        <i class="fas fa-check-circle"></i> Konfirmasi Pembayaran
      </button>
      <p class="text-muted mt-3"><small>Dengan mengklik tombol ini, Anda menyetujui <a href="#">Syarat & Ketentuan</a> kami</small></p>
    </div>
  </form>
</div>

<div class="notification" id="notification">
  <i class="fas fa-check-circle"></i>
  <div>Pembayaran berhasil diverifikasi!</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const summaryList = document.getElementById('summary-list');
    const summaryTotal = document.getElementById('summary-total');
    const checkoutForm = document.getElementById('checkout-form');
    const qrisTabs = document.getElementById('qris-tabs');
    const qrisContent = document.getElementById('qris-content');
    const uploadInput = document.getElementById('bukti_pembayaran');
    const uploadArea = document.getElementById('upload-area');
    const uploadPreview = document.getElementById('uploadPreview');
    const countdownElement = document.getElementById('countdown');
    const progressBar = document.getElementById('progress-bar');
    const notification = document.getElementById('notification');
    const paymentMethods = document.querySelectorAll('.payment-method');
    const qrisSection = document.getElementById('qris-section');
    const bankTransferSection = document.getElementById('bank-transfer-section');
    const ewalletSection = document.getElementById('ewallet-section');
    const instructionStep2 = document.getElementById('instruction-step-2');
    const uniqueCodeElement = document.getElementById('unique-code');

    // Sample QRIS data (in a real app, this would come from your backend)
    const qrisData = {
      'lontong-sayur': {
        name: 'Lontong Sayur',
        qrisImage: '{{ asset("images/qris/lontong-sayur.png") }}',
        account: 'Bank ABC - 1234567890'
      },
      'ketupat-babanci': {
        name: 'Ketupat Babanci',
        qrisImage: '{{ asset("images/qris/ketupat-babanci.png") }}',
        account: 'Bank XYZ - 0987654321'
      },
      'nasi-uduk': {
        name: 'Nasi Uduk',
        qrisImage: '{{ asset("images/qris/nasi-uduk.png") }}',
        account: 'Bank DEF - 5678901234'
      }
    };

    // Generate random unique code
    const uniqueCode = Math.floor(100 + Math.random() * 900);
    uniqueCodeElement.textContent = uniqueCode;

    // Cart data
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Countdown timer (15 minutes)
    let timeLeft = 15 * 60; // 15 minutes in seconds
    const totalTime = timeLeft;
    
    function updateCountdown() {
      const minutes = Math.floor(timeLeft / 60);
      const seconds = timeLeft % 60;
      
      countdownElement.textContent = `Selesaikan dalam ${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      
      // Update progress bar
      const progressPercentage = (timeLeft / totalTime) * 100;
      progressBar.style.width = `${progressPercentage}%`;
      
      // Change color when time is running out
      if (timeLeft < 300) { // 5 minutes left
        countdownElement.parentElement.style.background = 'linear-gradient(90deg, #FF5722, #F44336)';
        progressBar.style.background = 'linear-gradient(90deg, #FF5722, #F44336)';
      }
      
      if (timeLeft <= 0) {
        clearInterval(countdownInterval);
        countdownElement.textContent = "Waktu habis!";
        showNotification("Waktu pembayaran telah habis", "error");
      } else {
        timeLeft--;
      }
    }
    
    const countdownInterval = setInterval(updateCountdown, 1000);
    updateCountdown();

    // Show notification function
    function showNotification(message, type = "success") {
      const icon = type === "success" ? "fa-check-circle" : "fa-exclamation-circle";
      notification.innerHTML = `<i class="fas ${icon}"></i><div>${message}</div>`;
      
      if (type === "success") {
        notification.style.background = "var(--primary)";
      } else {
        notification.style.background = "var(--error)";
      }
      
      notification.classList.add("show");
      
      setTimeout(() => {
        notification.classList.remove("show");
      }, 5000);
    }

    // Render order summary
    function renderSummary() {
      let total = 0;
      summaryList.innerHTML = '';

      if (cart.length === 0) {
        summaryList.innerHTML = '<div class="alert alert-info">Tidak ada item dalam keranjang.</div>';
        summaryTotal.textContent = 'Rp 0';
        return;
      }

      cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const div = document.createElement('div');
        div.classList.add('menu-item');
        div.innerHTML = `
          <div>
            <span class="menu-name">${item.name}</span>
            <small class="text-muted d-block">${item.quantity} × Rp ${item.price.toLocaleString('id-ID')}</small>
          </div>
          <span class="menu-price">Rp ${itemTotal.toLocaleString('id-ID')}</span>
        `;
        summaryList.appendChild(div);
      });

      summaryTotal.textContent = `Rp ${total.toLocaleString('id-ID')}`;
    }

    // Render QRIS tabs
  // Render QRIS tabs
function renderQRISTabs() {
  qrisTabs.innerHTML = '';
  qrisContent.innerHTML = '';
  
  // Get all menu items from cart (not unique)
  if (cart.length === 0) {
    qrisContent.innerHTML = '<div class="alert alert-info">Tidak ada item dalam keranjang.</div>';
    return;
  }

  cart.forEach((menuItem, index) => {
    const qrisItem = qrisData[menuItem.id] || qrisData['lontong-sayur']; // Fallback
    
    // Create tab
    const tabItem = document.createElement('li');
    tabItem.className = 'nav-item';
    tabItem.role = 'presentation';
    
    const tabButton = document.createElement('button');
    tabButton.className = `nav-link ${index === 0 ? 'active' : ''}`;
    tabButton.id = `pills-${menuItem.id}-${index}-tab`;
    tabButton.setAttribute('data-bs-toggle', 'pill');
    tabButton.setAttribute('data-bs-target', `#pills-${menuItem.id}-${index}`);
    tabButton.type = 'button';
    tabButton.role = 'tab';
    tabButton.setAttribute('aria-controls', `pills-${menuItem.id}-${index}`);
    tabButton.setAttribute('aria-selected', index === 0 ? 'true' : 'false');
    tabButton.textContent = menuItem.name;
    
    tabItem.appendChild(tabButton);
    qrisTabs.appendChild(tabItem);
    
    // Create content
    const contentDiv = document.createElement('div');
    contentDiv.className = `tab-pane fade ${index === 0 ? 'show active' : ''}`;
    contentDiv.id = `pills-${menuItem.id}-${index}`;
    contentDiv.role = 'tabpanel';
    contentDiv.setAttribute('aria-labelledby', `pills-${menuItem.id}-${index}-tab`);
    contentDiv.innerHTML = `
      <div class="text-center">
        <div class="qris-container">
          <img src="${qrisItem.qrisImage}" alt="QRIS ${menuItem.name}" class="qris-img mb-3">
          <p class="text-muted"><small>Untuk pembayaran ${menuItem.name}</small></p>
          <p class="text-muted"><small>${qrisItem.account}</small></p>
        </div>
      </div>
    `;
    
    qrisContent.appendChild(contentDiv);
  });
}

    // Payment method selection
    paymentMethods.forEach(method => {
      method.addEventListener('click', function() {
        // Remove active class from all methods
        paymentMethods.forEach(m => m.classList.remove('active'));
        
        // Add active class to clicked method
        this.classList.add('active');
        
        const selectedMethod = this.dataset.method;
        
        // Show corresponding section
        qrisSection.style.display = selectedMethod === 'qris' ? 'block' : 'none';
        bankTransferSection.style.display = selectedMethod === 'bank-transfer' ? 'block' : 'none';
        ewalletSection.style.display = selectedMethod === 'ewallet' ? 'block' : 'none';
        
        // Update instruction
        if (selectedMethod === 'qris') {
          instructionStep2.textContent = 'Scan QRIS menggunakan aplikasi mobile banking/e-wallet';
        } else if (selectedMethod === 'bank-transfer') {
          instructionStep2.textContent = 'Transfer ke rekening yang tertera di atas';
        } else {
          instructionStep2.textContent = 'Ikuti petunjuk pembayaran e-wallet yang dipilih';
        }
      });
    });

    // Upload area functionality
    uploadArea.addEventListener('click', function() {
      uploadInput.click();
    });

    // Drag and drop functionality
    uploadArea.addEventListener('dragover', function(e) {
      e.preventDefault();
      this.style.borderColor = 'var(--primary)';
      this.style.background = 'rgba(76, 175, 80, 0.1)';
    });

    uploadArea.addEventListener('dragleave', function() {
      this.style.borderColor = '#ddd';
      this.style.background = 'var(--light-gray)';
    });

    uploadArea.addEventListener('drop', function(e) {
      e.preventDefault();
      this.style.borderColor = '#ddd';
      this.style.background = 'var(--light-gray)';
      
      if (e.dataTransfer.files.length) {
        uploadInput.files = e.dataTransfer.files;
        handleFileUpload(e.dataTransfer.files[0]);
      }
    });

    uploadInput.addEventListener('change', function(e) {
      if (this.files && this.files[0]) {
        handleFileUpload(this.files[0]);
      }
    });

    function handleFileUpload(file) {
      // Validate file type
      const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
      if (!validTypes.includes(file.type)) {
        showNotification('Format file tidak valid. Harus JPG/PNG', 'error');
        uploadInput.value = '';
        return;
      }
      
      // Validate file size (max 2MB)
      if (file.size > 2 * 1024 * 1024) {
        showNotification('Ukuran file terlalu besar. Maksimal 2MB.', 'error');
        uploadInput.value = '';
        return;
      }
      
      const reader = new FileReader();
      
      reader.onload = function(event) {
        uploadPreview.style.display = 'block';
        uploadPreview.src = event.target.result;
        uploadArea.innerHTML = '<i class="fas fa-check-circle"></i><h5 class="mb-2">File berhasil diunggah</h5>';
        showNotification('Bukti pembayaran berhasil diunggah');
      }
      
      reader.readAsDataURL(file);
    }

    // Form submission
    checkoutForm.addEventListener('submit', function(e) {
      if (cart.length === 0) {
        e.preventDefault();
        showNotification('Keranjang belanja kosong. Silakan tambah produk terlebih dahulu.', 'error');
        return;
      }
      
      // Validate file upload
      if (!uploadInput.files || uploadInput.files.length === 0) {
        e.preventDefault();
        showNotification('Harap upload bukti pembayaran terlebih dahulu', 'error');
        return;
      }
      
      // Send cart data as hidden input
      const inputCart = document.createElement('input');
      inputCart.type = 'hidden';
      inputCart.name = 'cart_data';
      inputCart.value = JSON.stringify(cart);
      checkoutForm.appendChild(inputCart);
      
      // Send payment method
      const selectedMethod = document.querySelector('.payment-method.active').dataset.method;
      const inputMethod = document.createElement('input');
      inputMethod.type = 'hidden';
      inputMethod.name = 'payment_method';
      inputMethod.value = selectedMethod;
      checkoutForm.appendChild(inputMethod);
      
      // Show loading state
      const submitButton = checkoutForm.querySelector('button[type="submit"]');
      submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
      submitButton.disabled = true;
    });

    // Initialize
    renderSummary();
    renderQRISTabs();
  });
</script>
</body>
</html>