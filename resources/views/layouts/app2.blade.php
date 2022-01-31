<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@yield('title', 'Eloquent More')
	</title>


	<!-- font-awesome cdn -->
	<link rel="stylesheet" href=" {{ asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">

	<!-- parsley css -->
	<link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
  
  {{-- select to css --}}
  <link href="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css') }}" rel="stylesheet" />

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="">

  {{-- nav start --}}
  <div class="container mb-5">
      <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand text-primary" href="/">Laravel University</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        @if (Auth::check())          
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
          </li>
          <li>
            <form action="{{ route('logout') }}" method="POST">
             @csrf
              <input type="submit" value="logout" class="logout">
            </form>
          </li>

        @else
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>

        @endif

      </ul>
    </div>
  </nav>
  </div>
  {{-- nav ends --}}      
      
      {{-- main content goes here --}}
    	@yield('content')

	<!-- bootstrap js -->
	<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/parsley.min.js') }}"></script>
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js') }}"></script>
  <script>
    $('.carousel').carousel()
  </script>

  @yield('scripts')
</body>
</html>



<!-- 

/*

{{--
			<?php echo "<pre>"; ?>
			{{ print_r($student) }}
			<?php echo "</pre>"; ?>



--}}
*/



 -->

