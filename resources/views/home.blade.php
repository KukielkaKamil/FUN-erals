<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funeral Home</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Funeral Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero bg-dark text-white text-center py-5">
    <div class="container">
      <h1 class="display-4">Compassionate Funeral Services</h1>
      <p class="lead">Providing dignified funerals to honor and celebrate the lives of loved ones.</p>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2>About Us</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam congue orci ut metus sollicitudin, at
            faucibus neque gravida. Fusce varius, nibh id lacinia malesuada, sem risus dignissim neque, in euismod
            est nibh sed mauris.</p>
        </div>
        <div class="col-lg-6">
          <img src="path/to/about-image.jpg" alt="About" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="bg-light py-5">
    <div class="container">
      <h2 class="text-center mb-4">Our Services</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <img src="path/to/service-1.jpg" alt="Service 1" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Funeral Planning</h5>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-4">
            <img src="path/to/service-2.jpg" alt="Service 2" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Cremation Services</h5>
              <p class="card-text">Nullam congue orci ut metus sollicitudin, at faucibus neque gravida.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-4">
            <img src="path/to/service-3.jpg" alt="Service 3" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Memorial Events</h5>
              <p class="card-text">Fusce varius, nibh id lacinia malesuada, sem risus dignissim neque.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Contact Us</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p>&copy; 2023 Funeral Home. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
