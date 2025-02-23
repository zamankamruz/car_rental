<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- CSS Files -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<style>
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      background: rgba(255, 255, 255, 0.95);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.6rem;
      color: #007bff;
    }
    .navbar-nav .nav-link {
      padding: 0.75rem 1rem;
      font-size: 1.1rem;
      color: #333;
      transition: color 0.3s ease, transform 0.2s ease;
    }
    .navbar-nav .nav-link:hover {
      color: #007bff;
      transform: scale(1.1);
    }
    .navbar-toggler {
      border: none;
      outline: none;
    }

  </style>


<body>
  <!-- Header Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <!-- Logo on the Left -->
      <a class="navbar-brand" href="{{ url('/') }}">Car rental</a>

      <!-- Toggle Button for Mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigation Items -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Centered Navigation Links -->
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.about') }}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.rentals.index') }}">rentals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('frontend.contact') }}">Contact</a>
          </li>
        </ul>

        <!-- Right-Aligned Authentication Links -->
        <ul class="navbar-nav ms-auto">
          @guest
            <!-- If not logged in -->
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @if(Route::has('register'))
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Singup</a>
              </li>
            @endif
          @else
            <!-- If logged in -->
            <li class="nav-item">
              @auth
                @if(auth()->user()->isAdmin())
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                @else
                  <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                @endif
              @endauth
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="main-content py-4">
    @yield('content')
  </main>

  <!-- JavaScript Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  
  @yield('scripts') <!-- Section for page-specific scripts -->
</body>
</html>
