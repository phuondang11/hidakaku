<?php
// title
$meta_title = get_field( 'title' );
$GLOBALS[ 'title' ] = $meta_title ?  $meta_title : "";
// keywords
$meta_keywords = get_field( 'keywords' );
$GLOBALS[ 'keywords' ] = $meta_keywords;
// description
$meta_description = get_field( 'description' );
$GLOBALS[ 'description' ] = $meta_description;
// h1
$GLOBALS['h1'] = get_post_meta($post->ID, 'h1', true) ? get_post_meta($post->ID, 'h1', true) : "";
// h2
$GLOBALS[ 'h2' ] = get_the_title();
$GLOBALS[ 'pageClass' ] = "under";
$GLOBALS[ 'pageID' ] = $post->post_name;
$GLOBALS['bodyID'] = $post->post_name;
$GLOBALS['bodyClass'] = "under";
get_header();
?>
<main  class="clearfix">
    <div id="content">
        <?php
            if ( have_posts() ):
            while ( have_posts() ): the_post();
                the_content();
            endwhile;
            endif;
        ?>
    </div>
</main>
<?php get_footer(); ?>
