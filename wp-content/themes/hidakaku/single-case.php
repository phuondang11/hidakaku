<?php
error_reporting(0);
if ( have_posts() ):
    while ( have_posts() ): the_post();
$post_categories = wp_get_object_terms( get_the_ID(), 'case-cat', '' );
$post_categories_name = $post_categories[ 0 ]->name;
// title
$meta_title = get_field( 'title' );
if ( $meta_title == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'title' ] = $title_post . "｜";
} else {
    $GLOBALS[ 'title' ] = $meta_title;
}
// keywords
$meta_keywords = get_field( 'keywords' );
if ( $meta_keywords == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'keywords' ] = "";
} else {
    $GLOBALS[ 'keywords' ] = $meta_keywords;
}
//  description
$meta_description = get_field( 'description' );
if ( $meta_description == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'description' ] = "";
} else {
    $GLOBALS[ 'description' ] = $meta_description;
}
// H1 
$meta_h1 = get_field( 'h1' );
if ( $meta_h1 == "" ) {
    $title_post = get_the_title();
    $GLOBALS[ 'h1' ] = '';
} else {
    $GLOBALS[ 'h1' ] = $meta_h1;
}
// H2
$GLOBALS[ 'h2' ] = 'テストタイトル';
$GLOBALS[ 'pageClass' ] = "under case";

get_header();
?>
<main class="clearfix">
    <div id="top_info">
        <div class="inner">
            <h2>
                <span class="en">case</span>
                <span class="ja">テストタイトル</span>
            </h2>
        </div>
    </div>
    <!-- * -->
    <div id="topic_path">
        <div class="inner clearfix">
            <ul>
            <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
            <li><a href="<?php echo home_url(); ?>/case/">List</a></li>
            <?php
            $post_categories = wp_get_object_terms( get_the_ID(), 'case-cat', '' );
            foreach ( $post_categories as $postcat1 ) {
                echo '<li><a href="' . esc_url( get_category_link( $postcat1->term_id ) ) . '">' . esc_html( $postcat1->name ) . '</a></li>';
            }
            ?>
            <li><?php echo the_title(); ?></li>
            </ul>
        </div>
    </div>
    <!-- content start -->
    <div id="content" class="clearfix">
        <div class="inner">
            <h3><?php the_title(); ?></h3>

            <section class="clearfix">
                <?php the_content(); ?>
            </section>

            <!-- PREV next post -->
            <?php 
                $next_post = get_next_post();
                $prev_post = get_previous_post();
                if($prev_post) {
                    $prev_url = get_permalink($prev_post->ID);
                }
                if($next_post) {
                    $next_url = get_permalink($next_post->ID);
                }
            ?>
            <section class="clearfix">
                <ul class="list_anchor_fun">
                    <?php if (!empty($prev_post)) { ?>
                    <li><a class="btn_main color_white" href="<?php echo $prev_url; ?>">&lt;&nbsp;前の記事へ</a></li><?php } ?>
                    <li><a class="btn_main color_white" href="<?php echo bloginfo("url"); ?>/case/">一覧へ戻る</a></li>
                    <?php if (!empty($next_post)) { ?>
                    <li><a class="btn_main color_white" href="<?php echo $next_url; ?>">次の記事へ&nbsp;&gt;</a></li><?php } ?>
                </ul>
            </section>
            <!-- PREV next post -->
        </div>
    </div>
</main>
<?php
get_footer();
endwhile;
endif;
?>
