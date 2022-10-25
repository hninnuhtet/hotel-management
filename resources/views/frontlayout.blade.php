<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="{{ asset("/vendor/jquery/jquery.min.js") }}"></script>
    <title>Home Page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="#">A Hotel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
              <a class="nav-link active" aria-current="page" href="#">Services</a>
              <a class="nav-link" href="#">Gallery</a>
              <a class="nav-link" href="{{url('page/about_us')}}">About Us</a>
              <a class="nav-link" href="{{url('page/contact_us')}}">Contact Us</a>
              @if(Session::has('customerlogin'))
              <a class="nav-link" href="{{url('customer/add-testimonial')}}">Add Testimonial</a>
              <a class="nav-link" href="{{url('logout')}}">Logout</a>
              <a class="nav-link btn btn-danger btn-sm" href="{{url('booking')}}">Booking</a>
              @else
              <a class="nav-link" href="{{url('login')}}">Login</a>
              <a class="nav-link" href="{{url('register')}}">Register</a>              
              <a class="nav-link btn btn-danger btn-sm" href="#">Booking</a>
              @endif
            </div>
          </div>
        </div>
      </nav>
<main>
    @yield('content')
</main>
</body>
</html>