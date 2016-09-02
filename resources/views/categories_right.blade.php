<div class=" rsidebar span_1_of_left">
    <h4 class="cate">Categories</h4>
    <ul class="menu-drop">
        <li class="item1"><a href="#"></a>
            <ul class="cute">
                @foreach( $categories as $category)
                    <li class="subitem1"><a href="<?php echo URL::to('/')."/".$category['category_slug']; ?>"><?php echo $category['category']; ?></a></li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>