<?php
/*
Template Name: Master
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
                <div id="postBox">
                    <form id="new_post" name="new_post" method="post" action="" enctype="multipart/form-data">
                        <p class="post_title"><label for="post_title">Title</label><br />
                            <input type="text" id="post_title" value="" tabindex="1" name="post_title"/>
                        </p>
                        <p class="post_content"><label for="post_content">Content</label><br/>
                            <textarea id="post_content" tabindex="3" name="post_content"  rows="6"></textarea>
                        </p>
                        <input type="submit" id="submitPost" value="Publish"/>

                        <p class="post_category">
                            <label for="post_category" >Category:</label>
                            <?php $categories = wp_dropdown_categories("echo=0&hide_empty=0&selected=0");
                            preg_match_all('/\s*<option class="(\S*)" value="(\S*)">(.*)<\/option>\s*/', $categories, $matches, PREG_SET_ORDER);
                            echo "<select id='post_category' name='post_category'>";
                            foreach ($matches as $match){
                                echo "<option value='{$match[2]}'>{$match[3]}</option>";
                            }
                            echo "</select><br />\n";
                            ?></p>
                        <p class="post_tags">
                            <label for="post_tags">Tags:</label>
                            <input type="text" value="" tabindex="5" size="20" name="post_tags" id="post_tags" /><small>(Comma seperated)</small>
                        </p>
                        <div style="clear:both;"></div>
                        <p><label for="attachment">Files: </label><input type="file" id="attachment">
                        <div id="attachment_list"></div></p>

                        <input type="hidden" name="post_type" id="post_type" value="post" />
                        <input type="hidden" name="add_new_post" value="post" />
                        <?php wp_nonce_field( 'new-post' ); ?>
                    </form>
                </div>
                <script>
                    var multi_selector = new MultiSelector( document.getElementById( 'attachment_list' ), 0 );
                    multi_selector.addElement( document.getElementById( 'attachment' ) );
                </script>
            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php get_footer();

?>