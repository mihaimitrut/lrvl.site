@include('header')
<body>
<!--header-->
<div class="header">
    <div class="container">
        <div class="head">
            <div class=" logo">
                <a href="/"><img src="images/logo.png" alt=""></a>
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
                <!----->

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
<div class="banner-top">
    <div class="container">
        <h1>{{ generateCategoryTitle(Request::url()) }}</h1>
        <em></em>
        <h2><a href="{{ URL::to('/') }}">Acasa</a></h2>
    </div>
</div>
<!--content-->
<div class="product">
    <div class="container">
        <div class="col-md-9">
            <div class="mid-popular">

                @foreach ($products->toArray()['data'] as $product)

                <div class="col-md-4 item-grid1 simpleCart_shelfItem">
                    <div class=" mid-pop">
                        <div class="pro-img">
                            <img src="<?php echo asset('product/'.processImage($product['image'])); ?>" class="img-responsive" alt="">
                            <div class="zoom-icon ">
                                <a class="picture" href="images/pc2.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
                                <a href="{{  URL::to('/') }}/{{ $product['category_slug'].'/'.$product['title_slug'] }}"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                            </div>
                        </div>
                        <div class="mid-1">
                            <div class="women">
                                <div class="women-top">
                                    {{--<span>Men</span>--}}
                                    <h6><a href="{{  URL::to('/') }}/{{ $product['category_slug'].'/'.$product['title_slug'] }}">{{ $product['title'] }}</a></h6>
                                </div>
                                <div class="img item_add">
                                    <a href="{{ $product['aff_code'] }}" target="_blank"><img src="images/ca.png" alt=""></a>
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

                {{ $products->links() }}

            </div>
        </div>
        <div class="col-md-3 product-bottom">
            <!--categories-->
            @include('categories_right')
            <!--initiate accordion-->
            <script type="text/javascript">
                $(function() {
                    var menu_ul = $('.menu-drop > li > ul'),
                            menu_a  = $('.menu-drop > li > a');
                    menu_ul.hide();
                    menu_a.click(function(e) {
                        e.preventDefault();
                        if(!$(this).hasClass('active')) {
                            menu_a.removeClass('active');
                            menu_ul.filter(':visible').slideUp('normal');
                            $(this).addClass('active').next().stop(true,true).slideDown('normal');
                        } else {
                            $(this).removeClass('active');
                            $(this).next().stop(true,true).slideUp('normal');
                        }
                    });

                });
            </script>
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
    </div class="clearfix"></div>
<!--products-->

<!--//products-->
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
@include('footer')