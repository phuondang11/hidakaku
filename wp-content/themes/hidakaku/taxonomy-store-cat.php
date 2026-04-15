<?php
error_reporting(0);

// Lấy category hiện tại
$store_term = get_queried_object();
$store_taxonomy_name = $store_term ? $store_term->name : '';
$store_taxonomy_slug = $store_term ? $store_term->slug : '';

$GLOBALS['title'] = $store_taxonomy_name . "｜";
$GLOBALS['keywords'] = $store_taxonomy_name . "｜";
$GLOBALS['description'] = $store_taxonomy_name . "｜";
$GLOBALS['h1'] = $store_taxonomy_name . "｜";
$GLOBALS['h2'] = $store_taxonomy_name;
$GLOBALS['pageClass'] = "under store";

get_header();
?>

<main class="clearfix">
    <div id="content">
        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li class="home"><a href="<?php bloginfo('url') ?>">HOME</a></li>
                    <li><a href="<?php bloginfo('url') ?>/store/">店舗一覧</a></li>
                    <li><?php echo esc_html($store_taxonomy_name); ?></li>
                </ul>
            </div>
        </div>

        <div id="top_info">
            <div class="inner">
                <div class="topinfo_en">
                    <p>Store List</p>
                </div>
                <h2 class="topinfo_ja"><?php echo esc_html($store_taxonomy_name); ?></h2>
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

                $store_term = get_queried_object();

                if ( $store_categories && ! is_wp_error( $store_categories ) ) : ?>
                    <ul>
                        <?php foreach ( $store_categories as $category ) : 
                            $active_class = ($store_term && $store_term->slug === $category->slug) ? 'active' : '';
                        ?>
                            <li>
                                <a class="<?php echo esc_attr($active_class); ?>" href="<?php echo esc_url( get_term_link( $category, 'store-cat' ) ); ?>">
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

                    <div class="store_row">
                        <div class="store_box">
                            <div class="store_ttl_big">
                                <p><?php echo esc_html($store_taxonomy_name); ?></p>
                            </div>

                            <div class="store_content">
                                <div class="store_flex">

                                    <?php
                                    $stores = new WP_Query(array(
                                        'post_type' => 'store',
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'store-cat',
                                                'field' => 'term_id',
                                                'terms' => $store_term->term_id,
                                            ),
                                        ),
                                        'posts_per_page' => -1,
                                    ));

                                    if ($stores->have_posts()) :
                                        while ($stores->have_posts()) : $stores->the_post();
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
                                                            <a target="_blank" href="<?php echo esc_url($google_map); ?>">
                                                                <?php echo esc_html($address); ?>
                                                                <span class="map">map</span>
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile;
                                        wp_reset_postdata();
                                    else : ?>
                                        <p class="no-store">このエリアに店舗はありません。</p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<?php get_footer(); ?>
