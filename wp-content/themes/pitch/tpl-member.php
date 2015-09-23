<?php
/*
Template Name: Member
*/

get_header(); ?>
<?php
?>


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
<?php
if($user_ID == $number){
    echo '<button class="add_post"> Add Post </button>';
}
?>
                </div>
            <div class="clear"></div>
        </div>
    </div>

<?php dynamic_sidebar( 'home_right_1' );
get_footer();

?>