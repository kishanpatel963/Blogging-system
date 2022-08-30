<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> 
    @include('include.head')

<body>
    @include('include.header')
    
    <div class="main-wrapper">
	    @yield('content')
		
        @include('include.footer')
    </div><!--//main-wrapper-->
    @include('include.script')

</body>
</html> 

