<?php
/*
Template Name: Member
*/

get_header(); ?>

    <div id="post-single">
        <div class="container">
            <div class="post-container">
                <h1 class="post-title"><?php the_title() ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="entry-content" style="width: 70%; float: left;">
                        <?php echo the_content(); ?>
                    </div>

                    <div id="primary-sidebar" class="primary-sidebar widget-area order_sidebar" role="complementary">
                        <?php dynamic_sidebar( 'home_right_2' ); ?>
                    </div>
                <?php
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                ?>
            </div>
            <div class="content clearfix"></div>

        </div>

    </div>

<?php
get_footer();
?>