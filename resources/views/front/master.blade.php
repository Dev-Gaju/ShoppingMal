<!DOCTYPE HTML>
<html>
     @include('front.includes.header-link')
	<body>

	<div class="colorlib-loader"></div>

       @include('front.includes.header-menu')

            @yield('main-content')

      @include('front.includes.footer')

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>


	</body>
</html>

