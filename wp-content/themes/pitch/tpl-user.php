<?php
/*
Template Name: User
*/

get_header(); ?>
<?php
$url = $_SERVER['REQUEST_URI'];
$data = parse_url($url);
$number = basename($data['path'], '.html');
$user_ID = get_current_user_id();
?>


    <div id="post-single">
        <div class="container">
            <div class="post-container">
                <h1 class="post-title"><?php the_title() ?></h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="entry-content">
                        <?php echo the_content(); ?>
                        <?php
                        if($user_ID == $number){
                            echo '<button class="add_post"> Добавить работу </button>';
                        }
                        ?>
                    </div>
                <?php
                endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                ?>
            </div>



            <div class="clear"></div>
        </div>
    </div>

<?php get_footer();

?>