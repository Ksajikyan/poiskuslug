<?php if(have_posts()) :  ?>
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
				<div class="clear"></div>
			</div>
		<?php endwhile; ?>
		
		<div class="pagination">
			<?php if($GLOBALS['wp_query']->max_num_pages > 1) : ?><div class="separator"></div><?php endif ?>
			<?php posts_nav_link(' ', __('Newer Entries', 'pitch'), __('Older Entries', 'pitch')); ?>
			<?php if($GLOBALS['wp_query']->max_num_pages > 1) : ?><div class="clear"></div><div class="separator"></div><?php endif ?>
		</div>
	</div>
<?php endif ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <?php if(function_exists('get_all_thumbnails')) get_all_thumbnails(); ?>
    <?php the_content();?>
<?php endwhile; endif;?>