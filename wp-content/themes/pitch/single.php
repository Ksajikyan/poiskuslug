<?php echo
get_header();
$user_id=get_current_user_id();
$author_id=$post->post_author;

if($user_id == $author_id){

    ?>
    <style type="text/css">.wpcr3_show_btn{
        visibility: hidden;
}</style>
    <?php
}else{

    ?>
    <style type="text/css">.wpcr3_show_btn{
        visibility: visible;
    }</style>
    <?php
}


the_post(); ?>




<div id="post-single" <?php post_class() ?>>
	<div class="container">
		<div class="post-container">
			<h1 class="post-title"><?php the_title() ?></h1>
			<div class="post-info">
				<?php
				printf(
					__('Post on %s by %s', 'pitch'),
					get_the_date(),
                    get_post_meta( get_the_ID(), 'order_user_name', true )

				);
				the_tags(__(' tagged: ', 'pitch'));
				?>
			</div>
			<div class="content entry-content">
				<?php the_content() ?>
                <?php the_post_thumbnail() ?>
				<div class="clear"></div>
				<?php wp_link_pages() ?>
			</div>

			
			<?php comments_template() ?>
		</div>
		<?php get_sidebar() ?>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer();
