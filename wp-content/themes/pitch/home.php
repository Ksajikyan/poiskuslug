<?php get_header();

/// get categories
$categories = get_terms( 'category', 'orderby=count&hide_empty=0' );

$parent_categories = array();
//foreach($categories as $category){
//    if($category['parent']==0){
//        $parent_categories[$category['id']] = $category;
//    }
//}

$main = array();
foreach($categories as $cat)
{
    $cat = (array)$cat;
    if($cat['parent']==8)
    {
        $main[$cat['parent']][] = $cat;
    }
}
//var_dump($main); exit;
$args_city = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_count'         => 0,
    'hide_empty'         => 1,
    'use_desc_for_title' => 1,
    'child_of'           => 15,
//    'child_of'           => 9,
    'name'               =>'order_city_ID',
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => 2,
    'title_li'           => __( 'Categories' ),
    'show_option_none'   => __( '' ),
    'number'             => null,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => null
);
$args_order_category = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_count'         => 0,
    'hide_empty'         => 1,
    'use_desc_for_title' => 1,
    'child_of'           => 18,
    'name'               =>'order_category_ID',
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => 2,
    'title_li'           => __( 'Categories' ),
    'show_option_none'   => __( '' ),
    'number'             => null,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => null
);
//wp_list_categories( $args_city );



?>
<ul>
<?php// wp_list_categories('orderby=id&show_count=1&use_desc_for_title=0&child_of=15');exit; ?>
</ul>

<!--<div id="content">-->
<!--<div class="add-order-block" style="text-shadow: none;">-->
<!--<div class="inner-content">-->
<!---->
<!--    <form class="form-inline" method="POST" action="--><?php //echo site_url();?><!--/order-3/">-->
<!--        <div class="form-group">-->
<!--            <ul class="form-control">--><?php //wp_dropdown_categories( $args_order_category ); ?><!--</ul>-->
<!--            <label class="label_order" for="exampleInputEmail2">Мне требуется</label>-->
<!---->
<!---->
<!--                <input name="category" type="text" data-toggle="dropdown" class="form-control category" id="exampleInputName2" placeholder="Ремонт квартиры под ключ">-->
<!--<!--                <a id="dLabel" role="button"  class="btn btn-primary" data-target="#">-->
<!--<!--                    Dropdown <span class="caret"></span>-->
<!--<!--                </a>-->
<!--                <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">-->
<!--                    --><?php //foreach($main as $cat=>$categories){
//                        if($categories['parent_id']==0){
//                            echo '<li class="dropdown-submenu">
//                                  <a tabindex="-1" data-value="'.$categories['id'].'" >'.$categories['description'].'</a>';
//
//
//                                  echo '<ul class="dropdown-menu">
//                                      <li><a tabindex="-1" data-value="11" href="#">Вскрытие и установка замкаl</a></li>
//                                      <li><a tabindex="-1" data-value="11" href="#">Вскрытие и установка замкаl</a></li>
//
//                                      </ul>';
//
//                                  echo '</li>';
//                        }
//
//                    }?>
<!--                    <li class="dropdown-submenu">-->
<!--                    <a tabindex="-1" data-value="11" >Мелкие бытовые услуги</a>-->
<!--                    <ul class="dropdown-menu">-->
<!--                        <li><a tabindex="-1" data-value="11" href="#">Вскрытие и установка замкаl</a></li>-->
<!--                        <li><a tabindex="-1" data-value="11" href="#">Вскрытие и установка замкаl</a></li>-->
<!---->
<!--                        </ul>-->
<!--                    </li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li class="dropdown-submenu">-->
<!--                    <li><a href="#">Some other action</a></li>-->
<!--                    <li class="divider"></li>-->
<!--                    <li class="dropdown-submenu">-->
<!--                        <a tabindex="-1" href="#">Hover me for more options</a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><a tabindex="-1" href="#">Second level</a></li>-->
<!--                            <li class="dropdown-submenu">-->
<!--                                <a href="#">Even More..</a>-->
<!--                                <ul class="dropdown-menu">-->
<!--                                    <li><a href="#">3rd level</a></li>-->
<!--                                    <li><a href="#">3rd level</a></li>-->
<!--                                </ul>-->
<!--                            </li>-->
<!--                            <li><a href="#">Second level</a></li>-->
<!--                            <li><a href="#">Second level</a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->



<div id="content">
<div class="add-order-block" style="text-shadow: none;">
<div class="inner-content">
    <form class="form-inline" method="POST" action="<?php echo site_url();?>/order-3/">
        <div class="form-group">
            <ul class="form-control"><?php wp_dropdown_categories( $args_order_category ); ?></ul>
        </div>
        <div class="form-group">


<!--            <input name="city" type="text" class="form-control city" id="exampleInputEmail2">-->

           <ul class="form-control"><?php wp_dropdown_categories( $args_city ); ?></ul>
        </div>
        <button type="submit" class="btn btn-default add_order">Добавить заказ</button>
    </form>
    </div>
    </div>
</div>
    <div class="icolist-wrap js-preloadpics">
        <ul class="icolist inner-content">
            <div class="main-master"></div>
            <li class="icolist__itm first">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/1.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt big">
                    <b>1. Добавьте заявку</b>
                </div>
            </li>
            <!--
                   -->
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/2.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt big">
                    <b>2. Сравните условия</b>
                </div>
            </li>
            <!--
                   -->
            <li class="icolist__itm last">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/3.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt big">
                    <b>3. Начните работу</b>
                </div>
            </li>
        </ul>
        <ul class="icolist icolist--s inner-content">
            <li class="icolist__itm first">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/watch.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt">
                    <div class="icolist__title">5–15 минут</div>
                    <div class="icolist__note">Среднее время ожидания первого предложения</div>
                </div>
            </li>
            <!--
                   -->
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/bubbles.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt">
                    <div class="icolist__title">7596 отзывов</div>
                    <div class="icolist__note">Помогут вам легко найти отличного исполнителя</div>
                </div>
            </li>
            <!--
                   -->
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/nocomission.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt">
                    <div class="icolist__title">Никакой комиссии</div>
                    <div class="icolist__note">Вы работаете напрямую с выбранным вами исполнителем</div>
                </div>
            </li>
            <!--
                   -->
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/builders.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt">
                    <div class="icolist__title">7–8 предложений</div>
                    <div class="icolist__note">Средняя активность исполнителей</div>
                </div>
            </li>
            <!--
                   -->
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/piggy-bank.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt">
                    <div class="icolist__title">20–60% экономии</div>
                    <div class="icolist__note">Вы сами выбираете лучшие условия из предложенных</div>
                </div>
            </li>
            <!--
                   -->
            <li class="icolist__itm last">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/thumbsup.png" alt="" class="loaded">
                </div>
                <!--
                           -->
                <div class="icolist__txt">
                    <div class="icolist__title">Ответственная работа</div>
                    <div class="icolist__note">Зная, что вы оставите отзыв, исполнитель работает ответственно
                    </div>
                </div>
            </li>
        </ul>
    </div>


<div class="clear"></div>

<?php
//dynamic_sidebar( 'home_right_1' );
get_footer();