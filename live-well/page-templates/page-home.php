<?php
    /*
    Template Name: Homepage
    */
    __('Homepage', 'live');
    get_header();
    $post_id = get_the_ID();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
    // ACF
    $home_slider              = get_field('home_slider');
    $home_slogan              = get_field('home_slogan');
    $home_product_title       = get_field('home_product_title');
    $home_recipes_title       = get_field('home_recipes_title');
    $home_recipes_sub_title   = get_field('home_recipes_sub_title');
    $home_recipes_pic         = get_field('home_recipes_pic');
    $home_instagram_title     = get_field('home_instagram_title');
?>
<?php if ( $image ) : ?>
	<div class="hero-banner hero-home-banner" style="background-image: url('<?php echo $image[0]; ?>');"></div>
    <?php elseif ( $home_slider ) : ?>
    <div class="hero-banner hero-home-banner">
        <div class="swiper carousel">
            <?php
            if ( $home_slider ) :
                echo '<div class="swiper-wrapper">';
                    foreach ($home_slider as $slide) :
                    // Fields
                    $picture    =  $slide['picture'];
                    ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $picture; ?>" alt="">
                    </div>
                    <?php
                    endforeach;
                echo '</div>';
            endif;
            ?>
            <!-- navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Dots -->
            <div class="swiper-pagination"></div>
            <!-- navigation -->
        </div>
    </div>
<?php endif; ?>
<section class="home-slogan">
    <div class="container">
        <p><?php echo $home_slogan; ?></p>
    </div>
</section>
<section class="home-products">
    <div class="container">
        <h2><?php echo $home_product_title; ?></h2>
        <?php
            $product_cats = get_terms( array(
                'taxonomy'   => 'product-category',
                'hide_empty' => true,
            ) );
            if ($product_cats){
                echo '<div class="row all-products g-4 py-4">';
                foreach ($product_cats as $cat) {
                    # fields...
                    $cat_id     = $cat->term_id;
                    $thumb      = get_field('hero_image', 'product-category_' . $cat->term_id );
                    $cat_name   = $cat->name;
                    ?>
                    <div class="col-6 col-sm-4 col-lg-3">
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
</section>
<div class="container">
    <section class="home-recipes">
        <div class="row">
            <div class="col-lg-7">
                <div class="wrap">
                    <h2 class="special-title center invert"><span><?php echo $home_recipes_title; ?></span></h2>
                    <h3><?php echo $home_recipes_sub_title; ?></h3>
                    <?php //echo do_shortcode('[wpdreams_ajaxsearchpro id=1]'); ?>
                    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for=""><?php echo __('By Product', 'live'); ?></label>
                                <?php
                                    $args = array(
                                        'post_type'         => 'product',
                                        'posts_per_page'    => -1,
                                    );
                                    $products = get_posts( $args );
                                    if ($products) {
                                        echo '<select name="s" class="form-select">';
                                        foreach ($products as $p) {
                                            $title      = get_the_title($p);
                                            echo '<option>' . $title . '</option>';
                                        }
                                        echo '</select>';
                                    }
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <label for=""><?php echo __('By Category', 'live'); ?></label>
                                <?php
                                    $product_cats = get_terms( array(
                                        'taxonomy'   => 'product-category',
                                        'hide_empty' => true,
                                    ) );
                                    if ($product_cats) {
                                        echo '<select name="cat" class="form-select">';
                                        foreach ($product_cats as $cat) {
                                            $cat_id     = $cat->term_id;
                                            $cat_name   = $cat->name;
                                            echo '<option>' . $cat_name . '</option>';
                                        }
                                        echo '</select>';
                                    }
                                ?>
                            </div>
                            <div class="col-12">
                                <input class="submit" type="submit" value="<?php echo __('Search Recipe', 'live'); ?>">
                            </div>
                        </div>
                        <input type="hidden" name="post_type" value="recipe" />
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <img class="home-recipes-pic" src="<?php echo $home_recipes_pic; ?>" alt="">
            </div>
        </div>
    </section>
</div>
<section class="home-instagram"> <div class="container">
        <h2>
            <?php echo $home_instagram_title; ?>
            <?php echo getImage('instagram-ico.svg'); ?>
        </h2>
        <div class="row g-2 py-5 justify-content-between">
            <?php
            $photos = get_instagram_media( 'IGQVJWcGdKUWJBYVVpQ0w5YTgwRk9DSlRWZAG93NkFLN3ZA2Ymk5elJ3SmdFT01zeWdaMjVvb0M4eXpyN0tGRUFRQThxUk9VX0ZANd2pOa2JCMnptUllFNmg1WjN1c1d1ekRqc2pDeEhxMEtrdUt2a1JWcAZDZD', '6322816367795193');
               if ($photos) {
                foreach ($photos as $photo) {
                    # code...
                    // esc_url( $photo->permalink );

                    ?>
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="box">
                            <a href="<?php echo esc_url( $photo->permalink );?>" target="_blank">
                                <?php if ($photo->media_type === 'IMAGE') { ?>
                                    <img width="400" height="400" src="<?php echo $photo->media_url; ?>" alt="<?php echo htmlspecialchars( mb_substr( $photo->caption, 0, 60 ) ); ?> ...">
                                <?php } elseif ($photo->media_type === 'VIDEO') {  ?>
                                    <img width="400" height="400" src="<?php echo $photo->thumbnail_url; ?>" alt="<?php echo htmlspecialchars( mb_substr( $photo->caption, 0, 60 ) ); ?> ...">
                                <?php } ?>
                            </a>
                        </div>
                    </div>
                    <?php
                }
               }
            ?>
        </div>
    </div>
</section>
<?php
    get_footer();