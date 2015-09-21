<?php
/*
Template Name: Profile
*/

get_header(); ?>
    <ul>
        <?php


        $args = array('category' => 9 );

        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php the_comment();?>

            </li>
        <?php endforeach;
        wp_reset_postdata();?>

    </ul>


    <div id="post-single">
        <div class="container">
            <div class="post-container">
                <h1 class="post-title"><?php the_title() ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="entry-content">
                        <?php echo the_content(); ?>

                    </div>
                <?php
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                ?>
            </div>
            <div class="content clearfix">

            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php get_footer();

?>