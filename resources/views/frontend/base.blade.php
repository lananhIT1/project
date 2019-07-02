<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Stories foods and drink</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/frontend/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/frontend/animate.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/frontend/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/frontend/ionicons.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/frontend/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    @stack('css')
  </head>
  <body>
  	<header style="margin-top:20px;">
  		@if(Session::has('user'))
        <div class="col-md-12 col-sm-12 col-lg-12" >
          <form action="{{ route('fr.logout') }}" method="POST">
            <button style="background-color:white;border:none;" id="btn-logout">Đăng xuất</button>
            @csrf
          </form>
          {{-- <ul style="text-align:right;" >
            <li style="display:inline"><a href="">Đăng xuất</a></li>
            <li style="display:inline"><a href="">Đăng kí</a></li>
          </ul> --}}
        </div>
      @else
  			<div class="col-md-12 col-sm-12 col-lg-12">
  				<ul style="text-align:right;">
  					<li style="display:inline;"><a href="{{ route('fr.login') }}">Đăng nhập</a></li>
  					<li style="display:inline;margin-left:10px;"><a href="" style="color:black;">Đăng kí</a></li>
  				</ul>
  			</div>
  		@endif
  	</header>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar" style="margin-top:-15px;">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Stories<span>.</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ route('fr.homePage') }}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
            @foreach($cat as $key=>$item)
	          <li class="nav-item"><a href="{{ route('fr.categorie',['id'=>$item['id']]) }}" class="nav-link">{{ $item['name_cat'] }}</a></li>
            @endforeach
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	@yield('content')
   
		
	<section class="ftco-subscribe ftco-section bg-light">
      <div class="overlay">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-8 text-wrap text-center heading-section ftco-animate">
              <h2 class="mb-4"><span>Subcribe to our Newsletter</span></h2>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <footer class="ftco-footer ftco-footer-2 ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Stories</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Terms of Uses</a></li>
                <li><a href="#" class="py-2 d-block">About Stories</a></li>
                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                <li><a href="#" class="py-2 d-block">Accessibility Help</a></li>
                <li><a href="#" class="py-2 d-block">Advertise with us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Categories</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Food</a></li>
                <li><a href="#" class="py-2 d-block">Restaurant</a></li>
                <li><a href="#" class="py-2 d-block">Dessert</a></li>
                <li><a href="#" class="py-2 d-block">Lifestyle</a></li>
                <li><a href="#" class="py-2 d-block">Recipes</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/frontend/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/frontend/aos.js') }}"></script>
  <script src="{{ asset('js/frontend/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/frontend/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('js/frontend/google-map.js') }}"></script>
  <script src="{{ asset('js/frontend/main.js') }}"></script>
  
    @stack('js')

  </body>
</html>