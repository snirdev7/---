<?php
    /*
    Template Name: Products Catalog
    */
    __('Products Catalog', 'live');
    get_header();
    // ACF
?>
<div class="container">
    <div class="row blog-heading top-bar pt-0">
        <!-- <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="special-title">
                <span><?php the_title(); ?></span>
            </h1>
        </div> -->
        <div class="col-lg-6 d-lg-flex align-items-lg-center justify-content-lg-end">
            <!-- Search Form -->
            <?php /* ?>
            <div class="form">
                <div class="input-group">
                    <input type="text" placeholder="<?php echo __( 'Search recipe...', 'live' )?>" class="form-control"/>
                </div>
            </div>
            <?php */ ?>
            <!-- Search Form -->
        </div>
    </div>
    <?php
        $product_cats = get_terms( array(
            'taxonomy'   => 'product-category',
            'hide_empty' => true,
        ) );
        if ($product_cats){
            echo '<div class="row all-recipes gy-4 g-lg-5 pb-4 pt-0">';
            foreach ($product_cats as $cat) {
                # fields...
                $cat_id     = $cat->term_id;
                $thumb      = get_field('hero_image', 'product-category_' . $cat->term_id );
                $cat_name   = $cat->name;
                ?>
                <div class="col-6 col-lg-3 recipe-item" data-title="<?php echo str_replace(' ', ' ',$cat_name);?>">
                    <a href="<?php echo get_term_link($cat->term_id); ?>" class="box">
                        <?php if( $thumb ) : ?>
                            <img src="<?php echo $thumb; ?>" alt="">
                        <?php else : ?>
                            <?php echo getImage('p-1.jpg'); ?>
                        <?php endif; ?>
                        <h3><?php echo $cat_name; ?></h3>
                    </a>
                </div>
                <?php
            }
            echo '</div>';
        }
    ?>
</div>
<?php
    get_footer();