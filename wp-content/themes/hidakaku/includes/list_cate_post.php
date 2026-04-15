<ul>
    <?php
    $taxonomies = array(
        'case-cat',
    );
    $args = array(
        'posts_per_page' => -1,
        'order'             => 'desc',
        'hide_empty'        => false,
        'exclude'           => array(),
        'exclude_tree'      => array(),
        'include'           => array(),
        'number'            => '',
        'fields'            => 'all',
        'slug'              => '',
        'parent'            => '',
        'hierarchical'      => true,
        'child_of'          => 0,
        'get'               => '',
        'name__like'        => '',
        'description__like' => '',
        'pad_counts'        => false,
        'offset'            => '',
        'search'            => '',
        'cache_domain'      => 'core',
    );
    $terms_list = get_terms($taxonomies, $args);
    ?>
    <?php
        foreach($terms_list as $terms) : setup_postdata($terms); ?>
        <li><a href="<?php bloginfo( 'url' ); ?>/case/<?php echo $terms->slug; ?>"><?php echo $terms->name; ?></a></li>
    <?php
        endforeach;
        wp_reset_query();
    ?>
</ul>