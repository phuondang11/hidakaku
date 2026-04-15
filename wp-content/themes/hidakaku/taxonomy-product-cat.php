<?php
error_reporting(0);
$case_cat_exist = taxonomy_exists( 'case-cat' );
$case_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$case_taxonomy_name = $case_term->name; // will show the name
$case_taxonomy_slug = $case_term->slug;
$GLOBALS[ 'title' ] = $case_taxonomy_name . "｜";
$GLOBALS[ 'keywords' ] = $case_taxonomy_name . "｜";
$GLOBALS[ 'description' ] = $case_taxonomy_name . "｜";
$GLOBALS[ 'h1' ] = $case_taxonomy_name . "｜";
$GLOBALS[ 'h2' ] = $case_taxonomy_name;
$GLOBALS[ 'pageClass' ] = "under case";
$term_obj_list = get_the_terms( $post->ID, 'case-cat' );
$list_category_case = get_the_terms($post->ID, 'case-cat' );
get_header();
?>
<!-- main start -->
<main class="clearfix">

        <!-- #top_info -->
        <div id="top_info">
            <div class="inner">
                <h2>
                    <span class="en">Case</span>
                    <span class="ja"><?php echo $term_obj_list[0]->name; ?></span>
                </h2>
            </div>
        </div>

        <!-- #topic_path -->
        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
                    <li><a href="<?php echo home_url(); ?>/case/">症例一覧</a></li>
                    <?php
                        if ($list_category_case) : foreach($list_category_case as $case) : setup_postdata($post); 
                    ?>
                    <li><?php echo $case->name ?></li>
                    <?php  endforeach; endif; ?>
                </ul>
            </div>
        </div>

        <!-- content start -->
        <div id="content" class="clearfix">
            <div class="inner">
                <section class="clearfix"> 
                    <?php
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        global $post;
                        global $wp_query;
                        //  $posts_per_page = 10;
                        $args = array(
                            'post_type' => 'case',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'numberposts' => 10,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'case-cat',
                                'field' => 'slug',
                                'terms' => $case_taxonomy_slug
                                )
                            )  
                        );
                        $the_query = new WP_Query( $args );
                        $qa_posts = get_posts( $args );
                        if ( $qa_posts ) { 
                    ?>
                    <!-- Code HTML -- Start -->
                    <div class="clearfix">
                        <div class="case_list">
                            <?php  
                                foreach ( $qa_posts as $post ):
                                setup_postdata( $post );
                                $cate = get_the_category( $post->ID );
                                $post_categories = wp_get_post_categories( get_the_ID() );
                            ?>
                            <dl>
                                <dt> <?php echo get_the_date('Y.m.d'); ?> </dt>
                                <dd> <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a> </dd>
                            </dl>
                            <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                    <!-- Code HTML -- End -->
                    <?php } ?>
                </section>
                <section class="clearfix">
                </section>
            </div>
        </div>

</main>
<!-- main end -->
<?php get_footer(); ?>
