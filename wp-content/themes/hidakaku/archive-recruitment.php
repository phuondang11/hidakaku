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
                    <li>採用情報</li>
                </ul>
            </div>
        </div>
        <div id="top_info">
            <div class="inner">
                <div class="topinfo_en">
                    <p>Recruitment</p>
                </div>
                <h2 class="topinfo_ja">採用情報</h2>
            </div>
        </div>

        <div class="inner clearfix">

            <section class="clearfix">
                <div class="recruitment_demo">
                    <p>HIDAKAGUでは、家具づくりを通して人々の暮らしを豊かにすることを目指し、<br class="">ともに成長できる仲間を募集しています。</p>
                    <p>応募ご希望の方は、詳細をご確認の上、<br class="sp"><a href="#re_form" class="link">下記の応募フォーム</a>よりご連絡ください。</p>
                </div>
            </section>

            <section class="clearfix">
                <div class="re_width">
                    <div class="re_list">
                        <!-- fix -->
                        <?php
                            $args = array(
                                'post_type' => 'recruitment',
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'posts_per_page' => 3,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            );

                            $the_query = new WP_Query($args);

                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) : $the_query->the_post();

                                    $img_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url($post->ID) : get_bloginfo('template_url') . '/images/dummy.jpg';

                                    $dt_labels = [
                                        '仕事内容',
                                        '勤務地',
                                        '採用方法',
                                        '応募資格',
                                        '勤務時間',
                                        '休日',
                                        '仕事内容',
                                        '勤務地',
                                        '給与',
                                        '諸手当',
                                        '昇給・賞与',
                                        '福利厚生'
                                    ];
                            ?>
                                    <div class="re_row">
                                        <div class="re_ttl">
                                            <p><?php the_title(); ?></p>
                                        </div>

                                        <div class="re_content">
                                            <div class="re_table">

                                                <?php
                                                for ($i = 1; $i <= 12; $i++):
                                                    $value = trim(get_post_meta(get_the_ID(), "label_$i", true));
                                                    if ($value === '') continue;
                                                ?>
                                                    <dl>
                                                        <dt><?php echo esc_html($dt_labels[$i - 1]); ?></dt>
                                                        <dd><?php echo nl2br(esc_html($value)); ?></dd>
                                                    </dl>
                                                <?php endfor; ?>

                                            </div>
                                        </div>
                                    </div>

                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>

                        <!-- fix -->
                    </div>
                </div>
            </section>

            <section class="clearfix">
                <div class="topinfo_en mt_custom" id="re_form">
                    <p>Application Form</p>
                </div>
                <h3 class="topinfo_ja">応募フォーム</h3>
                <div class="re_des02">
                    <p>採用ご希望の方は、以下のフォームへ記入し、お気軽にご連絡くださいませ。</p>
                </div>
                <div class="form_width">
                    <?php echo do_shortcode('[contact-form-7 id="f08006c" title="Contact Recruitment"]'); ?>
                </div>
            </section>

        </div>

    </div>
</main>
<!-- content end -->
<!-- main end -->
<?php get_footer(); ?>
