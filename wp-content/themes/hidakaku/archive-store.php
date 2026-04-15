<?php
error_reporting(0);
$GLOBALS[ 'title' ] = "";
$GLOBALS[ 'keywords' ] = "";
$GLOBALS[ 'description' ] = "";
$GLOBALS[ 'h1' ] = "";
$GLOBALS[ 'pageClass' ] = "under";
get_header();
?>
<!-- main start -->
<main id="" class="clearfix">
    <div id="content">

        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li class="home"><a href="<?php bloginfo('url') ?>">HOME</a></li>
                    <li>店舗一覧</li>
                </ul>
            </div>
        </div>
        <div id="top_info">
            <div class="inner">
                <div class="topinfo_en">
                    <p>Store List</p>
                </div>
                <h2 class="topinfo_ja">店舗一覧</h2>
            </div>
        </div>

        <div class="inner clearfix">

            <div class="frame_category">
                <div class="frame_cat_ttl">
                    <p>エリアから探す</p>
                </div>
                <div class="frame_cat_item">
                    <?php
                    $store_categories = get_terms( array(
                        'taxonomy' => 'store-cat',
                        'hide_empty' => false,
                    ) );
                    if ( $store_categories && ! is_wp_error( $store_categories ) ) : ?>
                        <ul>
                            <?php foreach ( $store_categories as $category ) : ?>
                                <li>
                                    <a href="<?php echo esc_url( get_term_link( $category, 'store-cat' ) ); ?>">
                                        <?php echo esc_html( $category->name ); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <div class="store_section">
                <div class="store_list">
                <!-- fix  -->
                    <?php
                        $store_categories = get_terms( array(
                            'taxonomy' => 'store-cat',
                            'hide_empty' => true,
                        ) );
                        if ( $store_categories && ! is_wp_error( $store_categories ) ) :
                            foreach ( $store_categories as $category ) : ?>
                                <div class="store_row">
                                    <div class="store_box">
                                        <div class="store_ttl_big">
                                            <p><?php echo esc_html( $category->name ); ?></p>
                                        </div>

                                        <div class="store_content">
                                            <div class="store_flex">

                                                <?php
                                                $stores = new WP_Query( array(
                                                    'post_type' => 'store',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'store-cat',
                                                            'field'    => 'term_id',
                                                            'terms'    => $category->term_id,
                                                        ),
                                                    ),
                                                    'posts_per_page' => -1,
                                                ) );

                                                if ( $stores->have_posts() ) :
                                                    while ( $stores->have_posts() ) : $stores->the_post(); 
                                                        $link_website = get_field('link_website_store');
                                                        $address = get_field('address');
                                                        $google_map = get_field('google_map');
                                                        ?>
                                                        <div class="store_col">
                                                            <div class="store_box">
                                                                <div class="store_ttl">
                                                                    <?php if($link_website){ ?>
                                                                    <a href="<?php echo esc_url($link_website); ?>" target="_blank">
                                                                        <?php the_title(); ?>
                                                                    </a>
                                                                    <?php }else{ ?>
                                                                        <a class="no_hover" href="#" target="_blank">
                                                                            <?php the_title(); ?>
                                                                        </a>
                                                                    <?php } ?>
                                                                </div>

                                                                <div class="store_address">
                                                                    <p>
                                                                        <?php
                                                                            if($google_map){
                                                                        ?>
                                                                            <a target="_blank" href="<?php echo esc_url($google_map); ?>">
                                                                                <?php echo esc_html($address); ?>
                                                                                <span class="map">map</span>
                                                                            </a>
                                                                        <?php }else{ ?>
                                                                            <a href="#">
                                                                                <?php echo esc_html($address); ?>
                                                                                <span class="map">map</span>
                                                                            </a>
                                                                        <?php } ?>
                                                                        
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endwhile; 
                                                    wp_reset_postdata();
                                                endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; 
                        endif; ?>
                <!-- fix  -->
                </div>
            </div>

        </div>

    </div>
</main>
<!-- content end -->
<!-- main end -->
<?php get_footer(); ?>
