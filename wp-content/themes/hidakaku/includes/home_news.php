<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
global $post;
global $wp_query;
$args = array(
    'post_type' => 'case',
    'orderby' => 'date',
    'order' => 'DESC',
    'numberposts' => -1,
    'paged' => $paged,
);
$wp_query = new WP_Query( $args );
$post_array = get_posts( $args );
if ( $post_array ):
    foreach ( $post_array as $post ):
        setup_postdata( $post );
$post_categories = wp_get_post_categories( get_the_ID() );
$time = get_the_date( 'Y.m.d', $post->ID );
?>
<li>
    <span><?php echo get_the_date('Y.m.d'); ?></span>
    <p><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></p>
</li>

<?php
endforeach;
wp_reset_postdata();
?>
<?php
endif;
wp_reset_query();
?>
