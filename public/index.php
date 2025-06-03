<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kost Care Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      html {
        scroll-behavior: smooth;
      }

      .btn-white {
        background-color: white;
        color: #333;
        font-size: 0.8rem;
        padding: 6px 16px;
        border-radius: 20px;
        font-weight: 500;
        border: 1px solid #ccc;
      }

      .wave {
        display: block;
        margin-bottom: -1px;
      }

      section {
        padding: 80px 0;
      }

      .carousel-item {
        height: 100vh;
        min-height: 400px;
        background: no-repeat center center scroll;
        background-size: cover;
        position: relative;
      }

      .carousel-caption {
        bottom: 40%;
      }

      .carousel-caption h1 {
        font-size: 3rem;
      }

      .carousel-caption p {
        font-size: 1.2rem;
      }

      .overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.3);
      }

      .navbar-light .navbar-nav .nav-link {
        color: #333;
        font-weight: 500;
      }

      .navbar-light .navbar-brand {
        color: #222;
        font-weight: bold;
      }

      .bg-light-gray {
        background-color: #f8f9fa;

      }
      .btn-login {
        border: 2px solid #333;
        border-radius: 20px;
        padding: 5px 18px;
        font-weight: 500;
        color: #333;
        transition: all 0.3s ease;
        background-color: transparent;
        }

        .btn-login:hover {
        background-color: #333;
        color: white;
        }

    </style>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">Kost Care</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto me-3">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
        <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
      </ul>
      <a href="login.php" class="btn btn-login">Login</a>
    </div>
  </div>
</nav>


    <!-- Carousel Section -->
    <header id="home">
      <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/1600x900/?room,interior');">
            <div class="overlay"></div>
            <div class="carousel-caption text-center text-white">
              <h1>Kost Care</h1>
              <p>Sistem manajemen kost yang aman dan terintegrasi</p>
              <a href="#fitur" class="btn btn-white">Pelajari lebih lanjut</a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Wave transition -->
    <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
      <path fill="#f8f9fa" fill-opacity="1" d="M0,0 C480,100 960,0 1440,100 L1440,0 L0,0 Z"></path>
    </svg>

    <!-- Fitur Section -->
    <section id="fitur" class="bg-light-gray text-dark">
      <div class="container text-center">
        <h2 class="mb-2">Fitur Unggulan</h2>
        <br>
        <br>
        <div class="row">
          <div class="col-md-6">
            <h5>Pelaporan Mudah</h5>
            <p>Penghuni dapat melaporkan keluhan langsung melalui aplikasi.</p>
          </div>
          <div class="col-md-6">
            <h5>Manajemen Risiko</h5>
            <p>Admin dapat menganalisis risiko dan menampilkan visualisasi data.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="bg-white text-dark">
      <div class="container text-center">
        <h2 class="mb-4">Hubungi Kami</h2>
        <p>Email: kostcare@example.com</p>
        <p>Telepon: +62 812-3456-7890</p>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
