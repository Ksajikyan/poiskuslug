<?php get_header();
$categories = get_terms( 'category', 'orderby=count&hide_empty=0' );
$parent_categories = array();
$main = array();
foreach($categories as $cat)
{
    $cat = (array)$cat;
    if($cat['parent']==8)
    {
        $main[$cat['parent']][] = $cat;
    }
}
$args_city = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_option_all'  => __( 'город' ),
    'show_count'         => 0,
    'hide_empty'         => 0,
    'use_desc_for_title' => 1,
    'child_of'           => 15,
    'name'               =>'order_city_ID',
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => 3,
    'title_li'           => __( 'Categories' ),
    'show_option_none'   => __( '' ),
    'number'             => null,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => null,
    'required'           => true,
    'class'              => 'form-control'
);
$args_order_category = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_option_all'  => __( 'категорию заказа' ),
    'show_count'         => 0,
    'hide_empty'         => 0,
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
    'walker'             => null,
    'required'           => true,
    'class'              => 'form-control'
);
?>
<div id="content">
    <div class="home_text"> <h3>Перестаньте искать исполнителей пусть они найдут вас. <br> оставьте заявку на нашем сайте и получите до 6 разных предложены от 6 разных компании <br> выберете наиболее подходящего исполнителя и начните работу</h3> </div>
<div class="add-order-block" style="text-shadow: none;">
<div class="inner-content">
    <form class="form-inline" method="POST" action="<?php echo site_url();?>/home/order/">
        <div class="form-group">
            <?php wp_dropdown_categories( $args_order_category ); ?>
        </div>
        <div class="form-group">
           <?php wp_dropdown_categories( $args_city ); ?>
        </div>
        <button type="submit" class="btn btn-primary add_order">Добавить заказ</button>
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
                <div class="icolist__txt big">
                    <b>1. Добавьте заявку</b>
                </div>
            </li>
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/2.png" alt="" class="loaded">
                </div>
                <div class="icolist__txt big">
                    <b>2. Сравните условия</b>
                </div>
            </li>
            <li class="icolist__itm last">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/3.png" alt="" class="loaded">
                </div>
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
                <div class="icolist__txt">
                    <div class="icolist__title">5–15 минут</div>
                    <div class="icolist__note">Среднее время ожидания первого предложения</div>
                </div>
            </li>
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/bubbles.png" alt="" class="loaded">
                </div>
                <div class="icolist__txt">
                    <div class="icolist__title">7596 отзывов</div>
                    <div class="icolist__note">Помогут вам легко найти отличного исполнителя</div>
                </div>
            </li>
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/nocomission.png" alt="" class="loaded">
                </div>
                <div class="icolist__txt">
                    <div class="icolist__title">Никакой комиссии</div>
                    <div class="icolist__note">Вы работаете напрямую с выбранным вами исполнителем</div>
                </div>
            </li>
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/builders.png" alt="" class="loaded">
                </div>
                <div class="icolist__txt">
                    <div class="icolist__title">7–8 предложений</div>
                    <div class="icolist__note">Средняя активность исполнителей</div>
                </div>
            </li>
            <li class="icolist__itm">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/piggy-bank.png" alt="" class="loaded">
                </div>
                <div class="icolist__txt">
                    <div class="icolist__title">20–60% экономии</div>
                    <div class="icolist__note">Вы сами выбираете лучшие условия из предложенных</div>
                </div>
            </li>
            <li class="icolist__itm last">
                <div class="icolist__pic">
                    <img src="/poiskuslug/wp-content/themes/pitch/images/home/thumbsup.png" alt="" class="loaded">
                </div>
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
get_footer();