<?php if(have_posts()) :  ?>
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
	<div id="loop" class="loop-posts customer-loop">
		<?php while(have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID() ?>" <?php post_class() ?>>
				<div class="post-info customer-posts">
					<div class="date">
						<span class="day"><?php echo get_the_date('d') ?></span>
						<span class="month-year"><?php echo get_the_date('M') ?><br/><?php echo get_the_date('Y') ?></span>
					</div>
					
					<div class="extras">
						<div class="categories">
							<?php the_category(', ') ?>
						</div>
						<div class="comment-count">
							<?php
								$comments = get_comment_count(get_the_ID());
								if($comments['approved'] > 0){
									printf(__('%s Comments', 'pitch'), $comments['approved']);
								}
							?>
						</div>
						<div class="customer_info">
<!--							--><?php //printf(__('By %s', 'pitch'), get_the_author_link()) ?>
<!--                        --><?php //echo (get_post_meta(get_the_ID(), 'wp_custom_attachment', true));
//                        echo  (get_post_meta( get_the_ID(), 'order_user_name', true ));
//                        echo(get_post_meta( get_the_ID(), 'order_user_email', true ));
//                        echo(get_post_meta( get_the_ID(), 'order_user_tel', true ));
//                        echo(get_post_meta( get_the_ID(), 'order_start_day', true ));
//                        echo(get_post_meta( get_the_ID(), 'order_location', true )); ?>
                            <!--							--><?php //printf(__('By %s', 'pitch'), get_the_author_link()) ?>
                            <?php echo (get_post_meta(get_the_ID(), 'wp_custom_attachment', true)); ?>
                            <br><div class="customer_name">имя заказчика -  <?php echo  (get_post_meta( get_the_ID(), 'order_user_name', true )); ?> </div><br>
                            <?php //echo(get_post_meta( get_the_ID(), 'order_user_email', true ));
                            // echo(get_post_meta( get_the_ID(), 'order_user_tel', true )); ?>
                            <br><br><div class="customer_start_day"> когда начать работу -  <?php echo(get_post_meta( get_the_ID(), 'order_start_day', true )); ?> </div>
                            <div class="order_location"> место работы -  <?php echo(get_post_meta( get_the_ID(), 'order_location', true )); ?> </div>

						</div>
					</div>
				</div>
				<div class="post-main customer-post-main">
					<a href="<?php the_permalink() ?>"><?php echo get_the_post_thumbnail() ?></a>
					
					<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
					
					<div class="excerpt content">
						<?php the_excerpt() ?>
					</div>

					<div class="read-more">
						<a href="<?php the_permalink() ?>">
							<?php _e('Read More', 'pitch') ?>
							<i></i>
						</a>
					</div>
				</div>


<!--				<div class="clear"></div>-->
			</div>
            <div class="row">
            <div class="order_image_1">
                <?php if(get_post_meta( get_the_ID(), 'order_image0', true )!='') {
                    echo '<a href="'.site_url().'/wp-content/uploads/'.get_post_meta(get_the_ID(), 'order_image0', true).'" title="'.get_post_meta(get_the_ID(), 'order_image0', true).'" data-gallery><img class="image_1 img-rounded" src="' . site_url() . '/wp-content/uploads/' . get_post_meta(get_the_ID(), 'order_image0', true) . '"></a>';
                }
                if(get_post_meta( get_the_ID(), 'order_image1', true )!='') {
                    echo '<a href="'.site_url().'/wp-content/uploads/'.get_post_meta(get_the_ID(), 'order_image1', true).'" title="'.get_post_meta(get_the_ID(), 'order_image1', true).'" data-gallery><img class="image_1 img-rounded" src="' . site_url() . '/wp-content/uploads/' . get_post_meta(get_the_ID(), 'order_image1', true) . '"></a>';
                }
                if(get_post_meta( get_the_ID(), 'order_image2', true )!='') {
                    echo '<a href="'.site_url().'/wp-content/uploads/'.get_post_meta(get_the_ID(), 'order_image2', true).'" title="'.get_post_meta(get_the_ID(), 'order_image2', true).'" data-gallery><img class="image_1 img-rounded" src="' . site_url() . '/wp-content/uploads/' . get_post_meta(get_the_ID(), 'order_image2', true) . '"></a>';
                }
                ?>

            </div>
            </div>
		<?php endwhile; ?>

		<div class="pagination">
			<?php if($GLOBALS['wp_query']->max_num_pages > 1) : ?><div class="separator"></div><?php endif ?>
			<?php posts_nav_link(' ', __('Newer Entries', 'pitch'), __('Older Entries', 'pitch')); ?>
			<?php if($GLOBALS['wp_query']->max_num_pages > 1) : ?><div class="clear"></div><div class="separator"></div><?php endif ?>
		</div>
	</div>
<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
    <div id="primary-sidebar" class="primary-sidebar widget-area order_sidebar" role="complementary">
        <?php dynamic_sidebar( 'home_right_1' ); ?>
    </div><!-- #primary-sidebar
<?php endif; ?>
    </div>

<?php endif ?>


<?php if(get_the_author()==get_current_user_id()){

}
?>
<!--<div class="order_sidebar">-->
<!--    --><?php //dynamic_sidebar( 'home_right_1' ); ?>
<!--</div>-->
<?php //if ( is_active_sidebar( 'home_right_1' ) ) : ?>
<!--<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">-->
<!--    --><?php //dynamic_sidebar( 'home_right_1' ); ?>
<!--</div><!-- #primary-sidebar-->
<?php //endif; ?>

