<!DOCTYPE html>
<html>
<head>
    @if (isset($products))
    <title>Lrvl :: {{ generateCategoryTitle(Request::url()) }}</title>
    <meta name="description" content="{{ generateCategoryTitle(Request::url()) }}" />
    @elseif (isset($product))
    <title>Lrvl :: {{ generateCategoryTitle(Request::url()) }}</title>
    <meta name="description" content="{{ $product['description'] }}" />
    @else
    <title>Lrvl :: Electronice, TV, Laptop</title>
    <meta name="description" content="Electronice, TV, Laptop" />
    @endif
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--theme-style-->
    <link href="{{ asset('css/style4.css') }}" rel="stylesheet" type="text/css" >
    <!--//theme-style-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <!--- start-rate---->
    <script type="text/javascript" src="{{ asset('js/jstarbox.js') }}"></script>
    <link href="{{ asset('css/jstarbox.css') }}" rel="stylesheet" type="text/css" >
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!---//End-rate---->
    <link href="{{ asset('css/form.css') }}" rel="stylesheet" type="text/css" >

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-83749069-1', 'auto');
        ga('send', 'pageview');

    </script>

</head>