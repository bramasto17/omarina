<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        @include('Layouts/head')
    </head>
    <body ng-app="LumpiaOmarinaApp">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Navigation & Logo-->
        @include('Layouts/header')

        @yield('Content')

	    <!-- Footer -->
	    @include('Layouts/footer')

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="Assets/js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="Assets/js/bootstrap.min.js"></script>
        <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
        <script src="Assets/js/jquery.fitvids.js"></script>
        <script src="Assets/js/jquery.sequence-min.js"></script>
        <script src="Assets/js/jquery.bxslider.js"></script>
        <script src="Assets/js/main-menu.js"></script>
        <script src="Assets/js/template.js"></script>

    </body>

    <script src="AngularJS/app.js"></script> <!-- load our application -->
    
    @yield('PartialScript')
    
</html>