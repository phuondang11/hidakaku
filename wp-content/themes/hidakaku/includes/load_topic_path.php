<div id="topic_path">
    <div class="inner clearfix">
        <ul>
            <li><a href="#">ホーム</a></li>

            <!-- Page parents -->
            <?php if ( $post->post_parent ) { ?>
                <li><a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo get_the_title( $post->post_parent ); ?></a></li>
            <?php } ?>
            
            <!-- Page children -->
            <li><?php echo get_the_title() ?></li>
        </ul>
    </div>
</div>