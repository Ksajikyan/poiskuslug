<?php echo
get_header();
$user_id=get_current_user_id();
$author_id=$post->post_author;

if($user_id == $author_id){

    ?>
    <style type="text/css">.wpcr3_show_btn{
        visibility: hidden;
}</style>
    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
					__('добавлено %s %s', 'pitch'),
					get_the_date(),
                    get_post_meta( get_the_ID(), 'order_user_name', true )

				);
				the_tags(__(' tagged: ', 'pitch'));
				?>
			</div>
			<div id="pgwSlideshow" class="content entry-content">
				<?php the_content() ?>
                </div>
            <div class="thumbnail">
                <?php the_post_thumbnail() ?>
                </div>
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
