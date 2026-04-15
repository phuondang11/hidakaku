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
                    <li class="home"><a href="<?php bloginfo('url') ?>/">HOME</a></li>
                    <li>製品一覧</li>
                </ul>
            </div>
        </div>
        <div id="top_info">
            <div class="inner">
                <div class="topinfo_en">
                    <p>Out Produtcts</p>
                </div>
                <h2 class="topinfo_ja">製品一覧</h2>
            </div>
        </div>

        <div class="inner clearfix">
            <section class="clearfix">
                <div class="product_list">
                    <div class="product_left">
                        <!-- fix  -->
                        <div class="product_sidebar_list">
                            <div class="product_sidebar_col">
                                <div class="product_sidebar_ttl active">
                                    <p>シリーズから探す</p>
                                </div>
                                <div class="product_sidebar_item">
                                    <ul>
                                        <?php
                                        $child_series = get_terms(array(
                                            'taxonomy'   => 'product-cat',
                                            'hide_empty' => false,
                                            'parent'     => 15,
                                        ));

                                        if (!empty($child_series) && !is_wp_error($child_series)) {
                                            foreach ($child_series as $term) {
                                                echo '<li><a href="#" class="product-cat-link" data-cat-id="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- <div class="product_sidebar_col s02">
                                <div class="product_sidebar_ttl">
                                    <p>アイテムから探す</p>
                                </div>
                                <div class="product_sidebar_item">
                                    <ul>
                                        <?php
                                        $child_item = get_terms(array(
                                            'taxonomy'   => 'product-cat',
                                            'hide_empty' => false,
                                            'parent'     => 16,
                                        ));

                                        if (!empty($child_item) && !is_wp_error($child_item)) {
                                            foreach ($child_item as $term) {
                                                echo '<li><a href="#" class="product-cat-link" data-cat-id="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="product_sidebar_col s02">
                                <div class="product_sidebar_ttl">
                                    <p>アイテムから探す</p>
                                </div>
                                <div class="product_sidebar_item">
                                    <ul>
                                        <?php
                                        $parent_id = 23;
                                        $child_items = get_terms(array(
                                            'taxonomy'   => 'product-cat',
                                            'hide_empty' => false,
                                            'parent'     => $parent_id,
                                        ));

                                        if (!empty($child_items) && !is_wp_error($child_items)) {
                                            foreach ($child_items as $term) {
                                                echo '<li><a href="#" class="product-cat-link" data-cat-id="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</a></li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- fix  -->
                    </div>
                    <div class="product_right">
                        <div class="product_right_head">
                            <div class="product_right_rs01">
                                <div class="product_rs01_ttl">
                                    <p>検索結果：</p>
                                </div>
                                <div class="product_rs01_item">
                                    <ul></ul>
                                </div>
                            </div>
                            <div class="product_right_rs02">
                                <div class="product_rs02_ttl">
                                    <p>表示件数：</p>
                                </div>
                                <?php
                                $args = array(
                                    'post_type'      => 'product',
                                    'posts_per_page' => -1,
                                );

                                $query = new WP_Query($args);
                                $total_posts = $query->found_posts;

                                $display_limit = 20;
                                $display_count = min($query->post_count, $display_limit);

                                ?>
                                <div class="product_rs02_item">
                                    <p><span id="currentCount"><?php echo $display_count; ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="product_right_body">

                            <div class="product_flexin">
                                <!-- fix -->
                                <?php
// LẤY CATEGORY ĐANG SHOW (ví dụ cate01, cate02, cate03)
// parent = 15 là category cha (giữ nguyên theo code cũ của bạn)
$categories = get_terms([
    'taxonomy'   => 'product-cat',
    'parent'     => 15,
    'hide_empty' => true,
    'orderby'    => 'term_order',
]);

if (!empty($categories) && !is_wp_error($categories)) :

    foreach ($categories as $cat) :

        // QUERY PRODUCT THEO CATEGORY
        $args = [
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'tax_query'      => [
                [
                    'taxonomy' => 'product-cat',
                    'field'    => 'term_id',
                    'terms'    => $cat->term_id,
                ]
            ]
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();

                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                if (!$thumb) {
                    $thumb = get_template_directory_uri() . '/images/dummy.jpg';
                }

                // ==== GIỮ NGUYÊN LOGIC CATEGORY CŨ ====
                $terms = get_the_terms(get_the_ID(), 'product-cat');
                $cat_item = '';
                $cat_series = '';
                $cat_item_new = '';
                $cat_ids = [];

                if ($terms && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $cat_ids[] = $term->term_id;

                        if ($term->parent == 15) {
                            $transcription = get_field('transcription', 'product-cat_' . $term->term_id);
                            $cat_item   = $transcription ? $transcription : $term->name;
                            $cat_series = $term->name;
                        }

                        if ($term->parent == 23) {
                            $cat_item_new = $term->name;
                        }
                    }
                }

                // ==== GIỮ NGUYÊN ACF ====
                $tb03_add = '';
                if (have_rows('combo')) {
                    the_row();
                    $tb03_add = get_sub_field('tb03_add');
                }
                ?>

                <div class="product_col find_a"
                    data-cat-ids="<?php echo esc_attr(implode(',', $cat_ids)); ?>"
                    data-cat-item="<?php echo esc_attr($cat_item); ?>"
                    data-cat-series="<?php echo esc_attr($cat_series); ?>"
                    data-name-new="<?php echo esc_attr($cat_item_new); ?>">

                    <div class="product_box">

                        <div class="product_img">
                            <img width="240"
                                 src="<?php echo esc_url($thumb); ?>"
                                 alt="<?php the_title(); ?>">
                        </div>

                        <div class="product_info">
                            <div class="product_info_ttl_ja">
                                <p><?php echo esc_html($cat_item); ?></p>
                            </div>

                            <div class="product_info_ttl_en">
                                <a href="<?php the_permalink(); ?>">
                                    <?php echo esc_html($cat_series); ?>
                                </a>
                            </div>

                            <div class="product_info_des">
                                <p><?php echo esc_html($tb03_add); ?></p>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
            endwhile;
            wp_reset_postdata();
        endif;

    endforeach;

endif;
?>


                                <!-- fix -->
                            </div>

                        </div>
                    </div>
                </div>
            </section>

            <section class="clearfix">
                <!-- <?php echo do_shortcode('[product_pagination]'); ?> -->
                <div id="js-pagination" class="product_pagination"></div>
            </section>

        </div>


    </div>
</main>
<!-- content end -->
<!-- main end -->
<?php get_footer(); ?>