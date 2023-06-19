<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logowanie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container h-100">
      <div class="d-flex align-items-center justify-content-center">
        <div class="card mt-md-5 mt-sm-3">
            @if (session('error'))
            <div class="row d-flex justify-content-center">
                <div class="alert alert-danger">{{ session('error') }}</div>
            </div>
        @endif
        <div class="card-header">
            <h3>FUN-erals</h3>
          </div>
        @if ($errors->any())
            <div class="row d-flex justify-content-center">
                <div class="col">
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
          <div class="card-body">
            <form method = "POST" action="{{ route('login.authenticate') }}" class="needs-validation" novalidate>
                @csrf
                <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="email">Email address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"/>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name ="password" class="form-control" />
              </div>

              <!-- Submit button -->
              <div class="d-grid">
                <input type="submit" class="btn btn-primary mb-4" value="Sign in">
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
