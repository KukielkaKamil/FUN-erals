<!doctype html>
<html lang="en">

<head>
    <title>Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat" />
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #178834">
            <div class="container-fluid">
                <a class="navbar-brand"
                    href=@can('is-admin')
              {{ route('dashboard.index') }}
              @endcan
                    @cannot('is-admin')
              {{ route('worker.index') }}
              @endcannot><i
                        class="fas fa-cross"></i> FUN-erals</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @can('is-admin')
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href={{ route('dashboard.index') }}>Funerals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.new') }}">New submissions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.workers') }}">Workers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.offers') }}">Offer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.clients') }}">Clients</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.promocodes') }}">Promo Codes</a>
                            </li>
                        @endcan
                        @cannot('is-admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('worker.index') }}">Funerals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('worker.history') }}">History</a>
                            </li>
                        @endcannot
                    </ul>
                    <div class="d-flex" role="search">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="triggerId"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="triggerId">
                                <a class="dropdown-item" href="{{ route('passwd', Auth::user()->id) }}">Change
                                    password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
