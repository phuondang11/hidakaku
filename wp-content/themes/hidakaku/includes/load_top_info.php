

<?php
		$obj = get_queried_object();
		$GLOBALS['h2'] = get_the_title();
		$GLOBALS['bodyID'] = $post->post_name;
?>
    <?php if(is_page('phpversion')){ ?>
        <?php
            global $post;
            $post_slug = $post->post_name;
        ?>
        <div id="top_info" class="top-info-img">
            <div class="inner">
                <h2>
                    <img src="<?php echo bloginfo("template_url") ?>/images/<?php echo $post_slug; ?>_img1.jpg" alt="">
                </h2>
            </div>
        </div>
    <?php } else { ?>
        <div id="top_info">
            <div class="inner">
                <h2>
                    <span class="en"><?php $post_name = $post->post_name; $post_name = str_replace('_', ' ', $post_name); echo $post_name; ?></span>
                    <span class="ja"><?php echo $GLOBALS['h2']; ?></span>
                </h2>
            </div>
        </div>
    <?php }
?>











