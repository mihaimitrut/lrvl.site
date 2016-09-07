@include('header')
<body>
<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class=" logo">
                <a href="{{ URL::to('/') }}"><img src="images/logo.png" alt=""></a>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="col-sm-5 col-md-offset-2  header-login">

            </div>

            <div class="col-sm-5 header-social">
                <ul >
                    <li><a href="#"><i></i></a></li>
                    <li><a href="#"><i class="ic1"></i></a></li>
                    <li><a href="#"><i class="ic2"></i></a></li>
                    <li><a href="#"><i class="ic3"></i></a></li>
                    <li><a href="#"><i class="ic4"></i></a></li>
                </ul>

            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="container">

        <div class="head-top">

            <div class="col-sm-8 col-md-offset-2 h_menu4">
                <nav class="navbar nav_bottom" role="navigation">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>

                @include('categories_menu')

                </nav>
            </div>
            <div class="col-sm-2 search-right">

                @include('categories_menu2')


                <!---pop-up-box---->
                <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
                <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
                <!---//pop-up-box---->
                <div id="small-dialog" class="mfp-hide">
                    <div class="search-top">
                        <div class="login-search">
                            <input type="submit" value="">
                            <input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}">
                        </div>
                        <p>Shopin</p>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                            fixedContentPos: false,
                            fixedBgPos: true,
                            overflowY: 'auto',
                            closeBtnInside: true,
                            preloader: false,
                            midClick: true,
                            removalDelay: 300,
                            mainClass: 'my-mfp-zoom-in'
                        });

                    });
                </script>
                <!----->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--banner-->
<div class="banner">
    <div class="container">
        <section class="rw-wrapper">
            <h1 class="rw-sentence">
                <span style="color: #FFFFFF">IT &amp; Tehnologie</span>
                <div class="rw-words rw-words-1" style="color: #FFFFFF">
                    <span style="color: #FFFFFF">Monitoare</span>
                    <span style="color: #FFFFFF">Placi video</span>
                    <span style="color: #FFFFFF">Hard Disk-uri</span>
                </div>
                <div class="rw-words rw-words-2" style="color: #FFFFFF">
                    <span style="color: #FFFFFF">Servere, Componente &amp; UPS</span>
                    <span style="color: #FFFFFF">TV, Audio, Foto & Gaming</span>
                </div>
            </h1>
        </section>
    </div>
</div>
<!--content-->
<div class="content">
    <div class="container">

        <!--products-->
        <div class="content-mid">
            <h3>Produse in trend</h3>
            <label class="line"></label>

            <?php $products = array_chunk($products, 4); ?>

            @foreach ($products as $pr)

            <div class="mid-popular">

                @foreach ($pr as $product)


                <div class="col-md-3 item-grid simpleCart_shelfItem">
                    <div class=" mid-pop">
                        <div class="pro-img">
                            <img src="<?php echo asset('product/'.processImage($product['image'])); ?>" class="img-responsive" alt="">
                            <div class="zoom-icon ">
                                <a class="picture" href="images/pc.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                <a href="{{  URL::to('/') }}/{{ $product['category_slug'].'/'.$product['title_slug'] }}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                            </div>
                        </div>
                        <div class="mid-1">
                            <div class="women">
                                <div class="women-top">
                                    <span>{{ $product['category'] }}</span>
                                    <h6><a href="{{  URL::to('/') }}/{{ $product['category_slug'].'/'.$product['title_slug'] }}">{{ $product['title'] }}</a></h6>
                                </div>
                                <div class="img item_add">
                                    <a href="{{ $product['aff_code'] }}"><img src="images/ca.png" alt=""></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mid-2">
                                <p ><em class="item_price">{{ $product['price'] }} lei</em></p>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>

                </div>

                @endforeach

                <div class="clearfix"></div>
            </div>

            @endforeach

        </div>
        <!--//products-->
        <!--brand-->

        <!--//brand-->
    </div>

</div>
<!--//content-->
@include('footer')