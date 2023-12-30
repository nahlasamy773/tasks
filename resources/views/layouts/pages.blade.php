<!doctype html>
<html class="no-js" lang="zxx">


  @include('includes.head')


    <body>
    @include('includes.preloader')

	
		<!-- Header Area -->
		
        @include('includes.header')
   <!-- this the  content will be displayed between header aand footer -->
        @yield('content')

       
			@include('includes.footer')

		
            @include('includes.copyright')


	
	    @include('includes.footerJs')

    </body>
</html>