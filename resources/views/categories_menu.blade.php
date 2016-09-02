<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
    <ul class="nav navbar-nav nav_1">
        <li><a class="color" href="{{  URL::to('/') }}">Acasa</a></li>

        <li class="dropdown mega-dropdown active">
            <a class="color1" href="#" class="dropdown-toggle" data-toggle="dropdown">Categorii<span class="caret"></span></a>
            <div class="dropdown-menu ">
                <div class="menu-top">

<?php $categories = array_chunk($categories, ceil(sizeof($categories)/5)); ?>
<?php foreach ($categories as $category) { ?>
<div class="col1">
    <div class="h_nav">
        {{--<h4>Submenu111</h4>--}}
        <ul>
            <?php foreach ($category as $c) { ?>
            <li><a href="<?php echo URL::to('/')."/".$c['category_slug']; ?>"><?php echo $c['category']; ?></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>


    <div class="col1 col5">
        <img src="images/me.png" class="img-responsive" alt="">
    </div>
    <div class="clearfix"></div>
                </div>
            </div>
        </li>


        {{--<li><a class="color3" href="product.html">Sale</a></li>--}}
        {{--<li><a class="color4" href="404.html">About</a></li>--}}
        {{--<li><a class="color5" href="typo.html">Short Codes</a></li>--}}
        {{--<li ><a class="color6" href="contact.html">Contact</a></li>--}}
    </ul>
</div><!-- /.navbar-collapse -->
