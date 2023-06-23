<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funeral Home</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa fa-cross"></i> FUN-erals</a>
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
      <h1 class="display-4">Unusual Funeral Services</h1>
      <p class="lead">Providing dignified funerals to honor and celebrate the lives of loved ones.</p>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2>About Us</h2>
          <p>Welcome to FUN-erals, where we bring a touch of laughter to the afterlife. Our mission is to celebrate lives
            with a twist, crafting unique and unforgettable farewells that honor individuality. With elegance and a hint
            of humor, we create heartfelt experiences that lighten the load of mourning and leave lasting memories.
            Join us on this journey of love, laughter, and reminiscence as we honor lives in a way that's eternally FUN.</p>
        </div>
        <div class="col-lg-6">
          <img src="{{ asset('images/main.jpg') }}" alt="About" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="bg-light py-5">
    <div class="container">
      <h2 class="text-center mb-4">Our Services</h2>
      <div class="row">
        @forelse ($offers as $offer )
        <div class="col-lg-4">
            <div class="card mb-4">
              <img src="{{ asset('images/'.$offer->id.'.jpg') }}" height="250px" alt="Service 1" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{$offer->name}}</h5>
                <p class="card-text">{{$offer->description}}</p>
              </div>
              <div class="card-footer text-muted">
                Price {{$offer->price}} PLN
              </div>
            </div>
          </div>
        @empty
            <h1>Currently there are no offers</h1>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Order funeral</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="container mt-5 mb-5">
                @if (session('error'))
                    <div class="row d-flex justify-content-center">
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="row d-flex justify-content-center">
                        <div class="col-6">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
          <form method="POST" action="{{route('store.order')}}">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Your Surname</label>
                <input type="text" class="form-control" id="surame" name="surname" required>
              </div>
              <div class="mb-3">
                <label for="pesel" class="form-label">Your PESEL</label>
                <input type="text" class="form-control" id="pesel" name="pesel" maxlength="11" required>
              </div>
              <div class="mb-3">
                <label for="phone_number" class="form-label">Your Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" maxlength="9" required>
              </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name ="email" required>
            </div>
            <div class="mb-3">
                <label for="offer_id" class="form-label">Offer you are interested in</label>
                <select class="form-select" name="offer_id" id="offer_id" required>
                    @forelse ($offers as $offer)
                        <option value={{ $offer->id }}>
                            {{ $offer->name }}</option>
                    @empty
                        <option value='0'>There are no offerts</option>
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" id="date"
                    aria-describedby="dateHelp" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" name="time" id="time" required>
            </div>
            <div class="mb-3">
                <label for="promo_code" class="form-label">Promo code</label>
                <input type="text" class="form-control" id="promo_code" name="promo_code">
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
