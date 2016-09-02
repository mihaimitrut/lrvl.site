@include('header')
<body>
<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class=" logo">
                <a href="index.html"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="col-sm-5 col-md-offset-2  header-login">
                <ul >
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                </ul>
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



                <!----->

                <!---pop-up-box---->
                <link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" >
                <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
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
<div class="banner-top">
    <div class="container">
        <h1>{{ $product['title'] }}</h1>
        <em></em>
        <h2><a href="{{ Url::to('/') }}">Acasa</a></h2>
    </div>
</div>
<div class="single">

    <div class="container">
        <div class="col-md-9">
            <div class="col-md-5 grid">
                <div class="flexslider">
                    <ul class="slides">
                        <li data-thumb="{{ asset('images/si.jpg') }}">
                            <div class="thumb-image"> <img src="<?php echo asset('product/'.processImage($product['image'])); ?>" data-imagezoom="true" class="img-responsive"> </div>
                        </li>

                        {{--<li data-thumb="{{ asset('images/si1.jpg') }}">--}}
                            {{--<div class="thumb-image"> <img src="{{ asset('images/si1.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>--}}
                        {{--</li>--}}
                        {{--<li data-thumb="{{ asset('images/si2.jpg') }}">--}}
                            {{--<div class="thumb-image"> <img src="{{ asset('images/si2.jpg') }}" data-imagezoom="true" class="img-responsive"> </div>--}}
                        {{--</li>--}}

                    </ul>
                </div>
            </div>
            <div class="col-md-7 single-top-in">
                <div class="span_2_of_a1 simpleCart_shelfItem">
                    <h3><?php echo $product['title']; ?></h3>
                    <p class="in-para"><?php echo $product['category']; ?></p>
                    <div class="price_single">
                        <span class="reducedfrom item_price"><?php echo $product['price']; ?> lei</span>
                        <a href="<?php echo $product['aff_code']; ?>" target="_blank">click pentru oferta</a>
                        <div class="clearfix"></div>
                    </div>
                    <h4 class="quick">Descriere:</h4>
                    <p class="quick_desc"><?php echo $product['description']; ?></p>
                    {{--<div class="wish-list">--}}
                        {{--<ul>--}}
                            {{--<li class="wish"><a href="#"><span class="glyphicon glyphicon-check" aria-hidden="true"></span>Add to Wishlist</a></li>--}}
                            {{--<li class="compare"><a href="#"><span class="glyphicon glyphicon-resize-horizontal" aria-hidden="true"></span>Add to Compare</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="quantity">--}}
                        {{--<div class="quantity-select">--}}
                            {{--<div class="entry value-minus">&nbsp;</div>--}}
                            {{--<div class="entry value"><span>1</span></div>--}}
                            {{--<div class="entry value-plus active">&nbsp;</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!--quantity-->
                    <script>
                        $('.value-plus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                            divUpd.text(newVal);
                        });

                        $('.value-minus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                            if(newVal>=1) divUpd.text(newVal);
                        });
                    </script>
                    <!--quantity-->

                    <a href="<?php echo $product['aff_code']; ?>" target="_blank" class="add-to item_add hvr-skew-backward">Cumpara</a>
                    <div class="clearfix"> </div>
                </div>

            </div>
            <div class="clearfix"> </div>
            <!---->
            <div class="tab-head">
                <nav class="nav-sidebar">
                    <ul class="nav tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">Descriere</a></li>
                        <li class=""><a href="#tab2" data-toggle="tab">Informatii aditionale</a></li>
                        {{--<li class=""><a href="#tab3" data-toggle="tab">Reviews</a></li>--}}
                    </ul>
                </nav>
                <div class="tab-content one">
                    <div class="tab-pane active text-style" id="tab1">
                        <div class="facts">
                            <p><?php echo $product['description']; ?>'</p>
                        </div>

                    </div>
                    <div class="tab-pane text-style" id="tab2">

                        <div class="facts">
                            <p > Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections </p>
                            <ul >
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Multimedia Systems</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Digital media adapters</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Set top boxes for HDTV and IPTV Player  </li>
                            </ul>
                        </div>

                    </div>
                    <div class="tab-pane text-style" id="tab3">

                        <div class="facts">
                            <p > There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined </p>
                            <ul>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Research</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Design and Development</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Porting and Optimization</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>System integration</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Verification, Validation and Testing</li>
                                <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Maintenance and Support</li>
                            </ul>
                        </div>

                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
            <!---->
        </div>
        <!----->

        <div class="col-md-3 product-bottom product-at">
            <!--categories-->
            @include('categories_right')
            <!--initiate accordion-->
            {{--<script type="text/javascript">--}}
                {{--$(function() {--}}
                    {{--var menu_ul = $('.menu-drop > li > ul'),--}}
                            {{--menu_a  = $('.menu-drop > li > a');--}}
                    {{--menu_ul.hide();--}}
                    {{--menu_a.click(function(e) {--}}
                        {{--e.preventDefault();--}}
                        {{--if(!$(this).hasClass('active')) {--}}
                            {{--menu_a.removeClass('active');--}}
                            {{--menu_ul.filter(':visible').slideUp('normal');--}}
                            {{--$(this).addClass('active').next().stop(true,true).slideDown('normal');--}}
                        {{--} else {--}}
                            {{--$(this).removeClass('active');--}}
                            {{--$(this).next().stop(true,true).slideUp('normal');--}}
                        {{--}--}}
                    {{--});--}}

                {{--});--}}
            {{--</script>--}}
            <!--//menu-->
            {{--<section  class="sky-form">--}}
                {{--<h4 class="cate">Discounts</h4>--}}
                {{--<div class="row row1 scroll-pane">--}}
                    {{--<div class="col col-4">--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Upto - 10% (20)</label>--}}
                    {{--</div>--}}
                    {{--<div class="col col-4">--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>40% - 50% (5)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}


            <!---->
            {{--<section  class="sky-form">--}}
                {{--<h4 class="cate">Type</h4>--}}
                {{--<div class="row row1 scroll-pane">--}}
                    {{--<div class="col col-4">--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Sofa Cum Beds (30)</label>--}}
                    {{--</div>--}}
                    {{--<div class="col col-4">--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bags  (30)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Caps & Hats (30)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jackets & Coats   (30)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jeans  (30)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Shirts   (30)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Sunglasses  (30)</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Swimwear  (30)</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}
            {{--<section  class="sky-form">--}}
                {{--<h4 class="cate">Brand</h4>--}}
                {{--<div class="row row1 scroll-pane">--}}
                    {{--<div class="col col-4">--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Roadstar</label>--}}
                    {{--</div>--}}
                    {{--<div class="col col-4">--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Levis</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Persol</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Edwin</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>New Balance</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Paul Smith</label>--}}
                        {{--<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ray-Ban</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--brand-->
<div class="container">
    <div class="brand">
        <div class="col-md-3 brand-grid">
            <img src="images/ic.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-3 brand-grid">
            <img src="images/ic1.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-3 brand-grid">
            <img src="images/ic2.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-3 brand-grid">
            <img src="images/ic3.png" class="img-responsive" alt="">
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//brand-->
</div>

</div>
<!--//content-->
<!--//footer-->
<div class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="col-md-3 footer-middle-in">
                <a href="index.html"><img src="images/log.png" alt=""></a>
                <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor lorem.</p>
            </div>

            <div class="col-md-3 footer-middle-in">
                <h6>Information</h6>
                <ul class=" in">
                    <li><a href="404.html">About</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="contact.html">Site Map</a></li>
                </ul>
                <ul class="in in1">
                    <li><a href="#">Order History</a></li>
                    <li><a href="wishlist.html">Wish List</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Tags</h6>
                <ul class="tag-in">
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">Sed</a></li>
                    <li><a href="#">Ipsum</a></li>
                    <li><a href="#">Contrary</a></li>
                    <li><a href="#">Chunk</a></li>
                    <li><a href="#">Amet</a></li>
                    <li><a href="#">Omnis</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-middle-in">
                <h6>Newsletter</h6>
                <span>Sign up for News Letter</span>
                <form>
                    <input type="text" value="Enter your E-mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <ul class="footer-bottom-top">
                <li><a href="#"><img src="images/f1.png" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/f2.png" class="img-responsive" alt=""></a></li>
                <li><a href="#"><img src="images/f3.png" class="img-responsive" alt=""></a></li>
            </ul>
            <p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//footer-->
<script type="text/javascript" src="{{ asset('js/imagezoom.js') }}"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="{{ asset('js/jquery.flexslider.js') }}"></script>
<link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" >

<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>

<script type="text/javascript" src="{{ asset('js/simpleCart.min.js') }}"></script>
<!-- slide -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>


</body>
</html>