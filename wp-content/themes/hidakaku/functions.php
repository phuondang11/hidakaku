<?php

// ================ DEFAULT SETTING ===================
//add Featured Image
add_theme_support( 'post-thumbnails' );

//remove_filter( 'the_excerpt', 'wpautop' );
/*increa limit upload file*/
@ini_set( 'upload_max_size', '64M' );
@ini_set( 'post_max_size', '64M' );
@ini_set( 'max_execution_time', '300' );
/*--add feature images--*/
//ADD MENU
if ( function_exists( 'register_nav_menu' ) ) {
    register_nav_menu( 'main-menu', 'Main Menu' );
}
//EXCERPT
add_post_type_support( 'page', 'excerpt' );

function close_tags( $text ) {
    $patt_open = "%((?<!</)(?<=<)[\s]*[^/!>\s]+(?=>|[\s]+[^>]*[^/]>)(?!/>))%";
    $patt_close = "%((?<=</)([^>]+)(?=>))%";
    if ( preg_match_all( $patt_open, $text, $matches ) ) {
        $m_open = $matches[ 1 ];
        if ( !empty( $m_open ) ) {
            preg_match_all( $patt_close, $text, $matches2 );
            $m_close = $matches2[ 1 ];
            if ( count( $m_open ) > count( $m_close ) ) {
                $m_open = array_reverse( $m_open );
                foreach ( $m_close as $tag )$c_tags[ $tag ]++;
                foreach ( $m_open as $k => $tag )
                    if ( $c_tags[ $tag ]-- <= 0 )$text .= '</' . $tag . '>';
            }
        }
    }
    return $text;
}

function content_by_id( $num, $id ) {
    $post_content = get_post( $id );
    $theContent = $post_content->post_content;
    $output = preg_replace( '/<img[^>]+./', '', $theContent );
    $limit = $num + 1;
    $content = explode( ' ', $output, $limit );
    array_pop( $content );
    $content = implode( " ", $content );
    $content = strip_tags( $content, '<p><a><address><a><abbr><acronym><b><big><blockquote><br><caption><cite><class><code><col><del><dd><div><dl><dt><em><font><h1><h2><h3><h4><h5><h6><hr><i><img><ins><kbd><li><ol><p><pre><q><s><span><strike><strong><sub><sup><table><tbody><td><tfoot><tr><tt><ul><var>' );
    $a = close_tags( $content );
    $b = $a . " ...";
    return $b;
} //REMOVE NEXT ENTRIES

require_once( dirname( __FILE__ ) . '/includes/shortcode.php' );
require_once( dirname( __FILE__ ) . '/includes/create_posttype.php' );
require_once( dirname( __FILE__ ) . '/includes/add_image_size.php' );
add_image_size( 'img_480x300', 480, 300, true );
add_image_size( 'img_1050x700', 1050, 700, true );
add_image_size( 'img_330x256', 330, 256, true );
add_image_size( 'img_1920x850', 1920, 850, true );
add_image_size( 'img_1280x824', 1280, 824, true );

function theme_sources() {
    // cancel jquery of wordpress
    // wp_deregister_script('jquery'); 
    // ========== CSS ==========
    if ( is_front_page() || is_home() ) {
        wp_enqueue_style( 'style', get_theme_file_uri( '/css/styles.css' ) );
        wp_enqueue_style( 'responsive', get_theme_file_uri( '/css/responsive.css' ) );
    }else{
	    wp_enqueue_style( 'style', get_theme_file_uri( '/css/styles.css' ) );
        wp_enqueue_style( 'responsive', get_theme_file_uri( '/css/responsive.css' ) );
        wp_enqueue_style( 'under', get_theme_file_uri( '/css/under.css' ) );
        wp_enqueue_style( 'under_responsive', get_theme_file_uri( '/css/under_responsive.css' ) );
    }

    // ========== END CSS ==========
	wp_enqueue_script( 'jquery-js', get_theme_file_uri( '/js/jquery.js' ), array(), '', 1 );
    // JAVASCRIPT
    if ( is_front_page() || is_home() || is_singular('product') ) {	
		wp_enqueue_script( 'slick-min-js', get_theme_file_uri( '/js/slick.min.js' ), array(), '', 1 );
        wp_enqueue_script( 'aos-js', get_theme_file_uri( '/js/aos.js' ), array(), '', 1 );     
        wp_enqueue_script( 'top-js', get_theme_file_uri( '/js/top.js' ), array(), '', 1 );     
    } 
    if ( is_singular('product') ) {	
        wp_enqueue_style( 'slick', get_theme_file_uri( '/css/slick.css' ) );
		wp_enqueue_script( 'slick-min-js', get_theme_file_uri( '/js/slick.min.js' ), array(), '', 1 );
    }
    wp_enqueue_script( 'sweetlink', get_theme_file_uri( '/js/sweetlink.js' ), array(), '', 1 );
	wp_enqueue_script( 'common-js', get_theme_file_uri( '/js/common.js' ), array(), '', 1 );
}
add_action( 'wp_enqueue_scripts', 'theme_sources' );
// ================ END DEFAULT SETTING ===================
function wpb_set_post_views( $postID ) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
function wpb_get_post_views( $postID ) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return 0;
    }
    return $count;
}
function content_number( $num, $content ) {
    $a = strip_tags( $content );
    if ( strlen( $a ) > $num )
    {
        $a = mb_substr( $a, 0, $num ) . '…';
    }
    return $a;
}

// page Thanks
add_action( 'wp_footer', 'wpm_redirect_cf7_by_page' );
function wpm_redirect_cf7_by_page() {
    ?>
    <script type="text/javascript">
    document.addEventListener('wpcf7mailsent', function(event) {
        var path = window.location.pathname;

        if (path.includes('/contact')) {
            window.location.href = '<?php echo home_url('/contact/thanks/'); ?>';
        } else if (path.includes('/recruitment')) {
            window.location.href = '<?php echo home_url('/thanks/'); ?>';
        }

    }, false);
    </script>
    <?php
}

// PAGINATION CUSTOM STYLE
function product_pagination_shortcode() {
    global $wp_query;

    if ($wp_query->max_num_pages <= 1) return '';

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $total = $wp_query->max_num_pages;

    ob_start();
    ?>
    <div class="product_pagination">
        <div class="product_pagi_flex">

            <div class="product_pagi_prev_all flexing">
                <?php if ($paged > 1): ?>
                    <p class="prev_start"><a href="<?php echo esc_url(get_pagenum_link(1)); ?>">最初へ</a></p>
                    <p class="prev_item"><a href="<?php echo esc_url(get_pagenum_link($paged - 1)); ?>">前へ</a></p>
                <?php else: ?>
                    <p class="prev_start disabled">最初へ</p>
                    <p class="prev_item disabled">前へ</p>
                <?php endif; ?>
            </div>

            <div class="product_pagi_page">
                <p>
                <?php
                for ($i = 1; $i <= $total; $i++) {
                    if ($i == $paged) {
                        echo '<span class="current">'.$i.'</span>';
                    } else {
                        echo '<span><a href="'.esc_url(get_pagenum_link($i)).'">'.$i.'</a></span>';
                    }
                }
                ?>
                </p>
            </div>

            <div class="product_pagi_next_all flexing">
                <?php if ($paged < $total): ?>
                    <p class="next_item"><a href="<?php echo esc_url(get_pagenum_link($paged + 1)); ?>">次へ</a></p>
                    <p class="next_end"><a href="<?php echo esc_url(get_pagenum_link($total)); ?>">最後へ</a></p>
                <?php else: ?>
                    <p class="next_item disabled">次へ</p>
                    <p class="next_end disabled">最後へ</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('product_pagination', 'product_pagination_shortcode');
// =============== FIX PAGINATION

function add_custom_admin_css() {
    wp_enqueue_style(
        'custom-admin-style',
        get_template_directory_uri() . '/css/style_wp.css',
        array(),
        '1.0'
    );
}
add_action('admin_enqueue_scripts', 'add_custom_admin_css');

add_theme_support('title-tag');

// authen admin
add_action('login_init', function () {
	if (!is_user_logged_in()) {
		$user = 'admin';
		$pass = '06xhEtN7X8jA1aM';
  
		if (
			!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
			$_SERVER['PHP_AUTH_USER'] !== $user || $_SERVER['PHP_AUTH_PW'] !== $pass
		) {
			header('WWW-Authenticate: Basic realm="Private"');
			header('HTTP/1.0 401 Unauthorized');
			echo 'Unauthorized';
			exit;
		}
	}
});

// Remove WordPress version
remove_action('wp_head', 'wp_generator');

// Enable auto update WordPress core
add_filter('allow_major_auto_core_updates', '__return_true');
add_filter('allow_minor_auto_core_updates', '__return_true');
add_filter('auto_update_core', '__return_true');
?>