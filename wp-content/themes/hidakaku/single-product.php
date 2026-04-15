<?php
error_reporting(0);
if ( have_posts() ):
    while ( have_posts() ): the_post();
$post_categories = wp_get_object_terms( get_the_ID(), 'product-cat', '' );
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
$GLOBALS[ 'pageClass' ] = "under product";

get_header();
?>
<main class="clearfix">

    <!-- fixed -->
    <div id="content">

        <div id="topic_path">
            <div class="inner clearfix">
                <ul>
                    <li class="home"><a href="<?php bloginfo('url') ?>/">HOME</a></li>
                    <li><a href="<?php bloginfo('url') ?>/product/">製品一覧</a></li>
                    <li>製品名</li>
                </ul>
            </div>
        </div>

        <div class="inner clearfix">

            <section class="clearfix">
                <div class="product_detail_flex">

                    <div class="product_detail_left">
                        <div class="product_detail_gallery">
                            <!--  -->
                            <?php 
                            $image_group = get_field('image_all');
                            $images = [];
                            if ($image_group) {
                                for ($i = 1; $i <= 10; $i++) {
                                    $field_name = 'image_' . $i;
                                    if (!empty($image_group[$field_name])) {
                                        $images[] = $image_group[$field_name];
                                    }
                                }
                            }
                            $image_count = count($images);
                            if ($image_count > 0) :
                            ?>
                            <div class="product_detail_gallery" data-count="<?php echo $image_count; ?>">

                                <div class="product_detail_gallery_big_all">
                                    <div class="pdt_img product_detail_gallery_big slider-for">
                                        <?php foreach ($images as $img): ?>
                                            <div class="item_sl"><img src="<?php echo esc_url($img['url']); ?>" alt=""></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <div class="product_detail_gallery_small_all">
                                    <div class="pdt_img product_detail_gallery_small slider-nav">
                                        <?php foreach ($images as $img): ?>
                                            <div class="item_sl"><img src="<?php echo esc_url($img['url']); ?>" alt=""></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                            </div>
                            <?php endif; ?>
                            <!--  -->
                        </div>
                    </div>

                    <div class="product_detail_right">
                        <div class="product_detail_right_title">
                            <?php
                                $terms = get_the_terms(get_the_ID(), 'product-cat');

                                $cat_item = '';
                                $cat_series = '';

                                if ($terms && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {

                                        if ($term->parent == 16) {
                                            $cat_item = $term->name;
                                        }

                                        if ($term->parent == 15) {
                                            $cat_series = $term->name;
                                        }
                                    }
                                }

                                // $tb03 = get_field('tb03');
                                ?>

                               <!-- fix -->
                               <?php
                                    $terms = get_the_terms(get_the_ID(), 'product-cat');
                                    $cat_output = '';
                                    if (!empty($terms) && !is_wp_error($terms)) {
                                        $term = $terms[0];
                                        $term_id = $term->term_id;

                                        $transcription = get_field('transcription', 'product-cat_' . $term_id);

                                        if (!empty($transcription)) {
                                            $cat_output = $transcription;
                                        } else {
                                            $cat_output = $term->name;
                                        }
                                    }
                            ?>
                            <div class="pdt_dt_ttl01">
                                <p><?php echo esc_html($cat_output); ?></p>
                            </div>

                            <div class="pdt_dt_ttl02">
                                <p><?php echo $cat_series; ?></p>
                            </div>

                            <?php
                            $rows = get_field('combo');
                            $tb03_add_first = '';
                            if ($rows) {
                                $tb03_add_first = $rows[0]['tb03_add'];
                            }
                            ?>
                            <div class="pdt_dt_ttl03" id="tb03_main">
                                <?php echo esc_html($tb03_add_first); ?>
                            </div>


                        </div>

                        <?php if ( have_rows('combo') ) : ?>
                            <div class="product_detail_right_type">
                                <div class="product_detail_right_type_ttl">
                                    <p>タイプ（選択してください）</p>
                                </div>

                                <div class="product_detail_right_type_item">
                                    <?php
                                    $rows = get_field('combo');
                                    $combo_data = [];
                                    ?>

                                    <?php if ($rows): ?>
                                        <select id="comboSelect">
                                            <?php foreach ($rows as $i => $row): 
                                                $name  = $row['name_combo'];
                                                $price = $row['price_combo'];
                                                $tb03_add = $row['tb03_add'];
                                                $tb_add = [];
                                                for ($j = 1; $j <= 10; $j++) {
                                                    $field_key = sprintf('tb%02d_add', $j);
                                                    $tb_add[$field_key] = isset($row[$field_key]) ? $row[$field_key] : '';
                                                }
                                                $combo_data[$i] = $tb_add;
                                            ?>
                                            <option 
                                                value="<?php echo $i; ?>" 
                                                data-price="<?php echo esc_attr($price); ?>"
                                                data-tb03_add="<?php echo esc_attr($row['tb03_add']); ?>"
                                                <?php 
                                                foreach ($tb_add as $key => $val) {
                                                    echo ' data-' . $key . '="' . esc_attr($val) . '" ';
                                                }
                                                ?>
                                            >
                                                <?php echo esc_html($name); ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="product_detail_right_price">
                                <div class="product_detail_right_price_ttl">
                                    <p>価格（税込）<span class="number"></span></p>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="product_detail_right_brief">
                            <?php
                                $product_label_3_description = get_field('product_label_3_description');
                                echo $product_label_3_description
                            ?>
                        </div>

                        <div class="product_detail_right_btn_all">
                            <!-- fix -->
                            <?php
                            $rows = get_field('combo');
                            $tb01_add_first = $rows ? $rows[0]['tb01_add'] : '';
                            $tb03_add_first = $rows ? $rows[0]['tb03_add'] : '';
                            $contact_url = add_query_arg(
                                array(
                                    'job01' => urlencode($tb01_add_first),
                                    'job02' => urlencode($tb03_add_first),
                                ),
                                home_url('/contact/')
                            );
                            ?>
                            <p class="btn">
                                <a href="<?php echo esc_url($contact_url); ?>">
                                    この製品について問い合わせる
                                </a>
                            </p>
                            <!-- fix -->
                            <?php
                            $u_product_link_website = get_field('u_product_link_website');
                            if(!empty($u_product_link_website)):
                            ?>
                            <p class="btn">
                                <a target="_blank" href="<?php echo esc_url($u_product_link_website); ?>">オンラインショップへ</a>
                            </p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- field table -->
                        <?php
                        $fields = [
                            'tb01' => 'シリーズ名',
                            'tb02' => 'アイテム名',
                            'tb03' => '品名',
                            'tb04' => '材種',
                            'tb05' => '塗装色',
                            'tb06' => '張地',
                            'tb07' => '座面仕様',
                            'tb08' => 'サイズ',
                            'tb09' => '重量',
                            'tb10' => '備考',
                        ];

                        $has_value = false;
                        foreach ($fields as $key => $label) {
                            if (!empty(get_field($key))) {
                                $has_value = true;
                                break;
                            }
                        }

                        if ($has_value): ?>
                            <div class="product_detail_right_information">
                                <div class="product_detail_right_information_ttl">
                                    <p>製品情報</p>
                                </div>

                                <div class="product_detail_right_information_text">
                                <?php foreach ($fields as $key => $label): 
                                    $value = get_field($key);
                                    if (!empty($value)):?>
                                        <dl>
                                            <dt><?php echo esc_html($label); ?></dt>
                                            <dd id="<?php echo esc_attr($key); ?>">
                                                <?php echo esc_html($value); ?>
                                            </dd>
                                        </dl>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- field table -->

                    </div>

                </div>
            </section>


            <section class="clearfix">
                <div class="product_other">
                    <div class="product_other_ttl">
                        <div class="product_other_en">
                            <p>Our Products</p>
                        </div>
                        <div class="product_other_ja">
                            <p>関連製品</p>
                        </div>
                    </div>
                    <div class="product_other_content">
                        <!-- fix -->
                        <div class="product_other_list">
<?php
$current_id = get_the_ID();

// Lấy tất cả term của sản phẩm hiện tại
$current_terms = wp_get_post_terms($current_id, 'product-cat', array('fields' => 'all'));

// Lọc ra những category con có parent = 23
$child_slugs = array();
if (!empty($current_terms) && !is_wp_error($current_terms)) {
    foreach ($current_terms as $term) {
        if ($term->parent == 23) {
            $child_slugs[] = $term->slug;
        }
    }
}

// Nếu có category con thì query sản phẩm khác
if (!empty($child_slugs)):

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 16,
        'orderby'        => 'DESC',
        'post__not_in'   => array($current_id),
        'tax_query'      => array(
            array(
                'taxonomy'         => 'product-cat',
                'field'            => 'slug',
                'terms'            => $child_slugs,
                'include_children' => false, // chỉ lấy đúng category con
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();

            $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            if (!$thumb) {
                $thumb = get_template_directory_uri() . '/images/dummy.jpg';
            }

            $terms = get_the_terms(get_the_ID(), 'product-cat');
            $cat_item = 'Empty';
            $cat_series = 'Empty';

            if ($terms && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    if ($term->parent == 15) {
                        $transcription = get_field('transcription', 'product-cat_' . $term->term_id);
                        $cat_item = $transcription ? $transcription : $term->name;
                        $cat_series = $term->name;
                    }
                }
            }
            ?>
            <div class="product_other_col find_a">
                <div class="product_other_box">
                    <div class="product_other_img">
                        <p>
                            <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>">
                        </p>
                    </div>

                    <div class="product_other_info">
                        <div class="product_other_txt01">
                            <p><?php echo esc_html($cat_item); ?></p>
                        </div>
                        <div class="product_other_txt02">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo esc_html($cat_series); ?>
                            </a>
                        </div>
<!-- <div class="product_other_txt03">
<?php
$combo_rows = get_field('combo', get_the_ID());
if ($combo_rows) {
    foreach ($combo_rows as $row) {
        // Giả sử row có field 'combo_cat_id' để phân loại
        if (isset($row['combo_cat_id']) && $row['combo_cat_id'] == $term->term_id) {
            echo '<p>' . esc_html($row['tb03_add']) . '</p>';
        }
    }
}
?>
</div> -->


                    </div>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;

endif;
?>
</div>

                        <!-- fix -->
                        <div class="product_other_btn">
                            <p class="btn">
                                <a href="<?php bloginfo('url') ?>/product/">製品一覧に戻る</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>


        </div>

    </div>
    <!-- fixed -->

</main>
<?php
get_footer();
endwhile;
endif;
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const select = document.getElementById("comboSelect");
    const priceSpan = document.querySelector(".product_detail_right_price_ttl .number");
    const contactLink = document.querySelector(".product_detail_right_btn_all a");

    function updateComboInfo() {
        const selected = select.options[select.selectedIndex];

        const priceText = selected.getAttribute("data-price");
        if (priceText) priceSpan.textContent = priceText;

        for (let i = 1; i <= 10; i++) {
            const tbId = "tb" + (i < 10 ? "0" + i : i);
            const dd = document.getElementById(tbId);
            if (dd) dd.textContent = selected.getAttribute("data-" + tbId + "_add") || "";
        }

        const tb03Main = document.getElementById("tb03_main");
        if (tb03Main) tb03Main.textContent = selected.getAttribute("data-tb03_add") || "";

        const job01 = encodeURIComponent(selected.getAttribute("data-tb01_add") || '');
        const job02 = encodeURIComponent(selected.getAttribute("data-tb03_add") || '');
        const baseUrl = "<?php echo home_url('/contact/'); ?>";
        contactLink.href = baseUrl + '?job01=' + job01 + '&job02=' + job02;
    }

    updateComboInfo();
    select.addEventListener("change", updateComboInfo);
});
</script>