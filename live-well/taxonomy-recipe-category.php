<?php
    /*
    ** Template for recipes category **
    */
    get_header();
    $current_cat                = get_queried_object();
    $current_cat_id             = $current_cat->term_id;
    $current_cat_name           = $current_cat->name;
    $current_cat_description    = $current_cat->description;
    $terms = get_terms( array(
        'taxonomy' => 'recipe-category',
        'hide_empty' => false,
    ) );
    // ACF
    $image          = get_field('hero_image', $current_cat);
    $header_image   = get_field('header_image', $current_cat);
?>
<?php if ( $header_image ) : ?>
	<div class="hero-banner hero-banner-products" style="background-image: url('<?php echo $header_image; ?>');"></div>
<?php else : ?>
    <div class="hero-banner hero-banner-products"></div>
<?php endif; ?>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php the_breadcrumb('mt-4');?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row blog-heading">
        <div class="col-lg-4">
            <h1 class="special-title">
                <span><?php echo $current_cat_name; ?></span>
            </h1>
        </div>
        <div class="col-lg-8 d-flex align-items-lg-center">
            <p class="excerpt"><?php echo $current_cat_description; ?></p>
        </div>
    </div>
    <div class="row wrap-products g-3">
        <?php
            $args = array(
                'post_type'         => 'recipe',
                'posts_per_page'    => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'recipe-category',
                        'field'    => 'term_id',
                        'terms'    => $current_cat_id,
                    ),
                ),
            );
            $products = get_posts( $args );
            if ($products){
                foreach ($products as $p) {
                    # fields...
                    $title      = get_the_title($p);
                    $thumb      = wp_get_attachment_image_src( get_post_thumbnail_id( $p->ID ), 'products-thumb' );
                    ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card">
                            <a style="color:inherit;" href="<?php echo get_the_permalink($p->ID); ?>" class="card-img">
                                <?php if( $thumb ) : ?>
                                    <img src="<?php echo $thumb[0]; ?>" alt="">
                                <?php else : ?>
                                    <?php echo getImage('product-placeholder.jpg') ?>
                                <?php endif; ?>
                            <div class="card-body text-center">
                                <h2 class="special-title center"><span><?php echo $title; ?></span></h2>
                            </div>
							</a>
                            </div>
                        </div>
                        <?php
                }
            }
            ?>
    </div>
    <div class="help-text">
        <ul class="product-type">
            <li class="natural"><?php echo __('Natural', 'live'); ?></li>
            <li class="organic"><?php echo __('Organic', 'live'); ?></li>
            <li class="vegan"><?php echo __('Vegan', 'live'); ?></li>
        </ul>
    </div>
</div>
<?php
    get_footer();