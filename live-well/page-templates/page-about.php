<?php
    /*
    Template Name: About
    */
    __('About', 'live');
    get_header();
    $post_id = get_the_ID();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
    // ACF
    $about_slogan       = get_field('about_slogan');
    $about_content      = get_field('about_content');
    $about_main_pic     = get_field('about_main_pic');
?>
<?php if ( $image ) : ?>
	<div class="hero-banner" style="background-image: url('<?php echo $image[0]; ?>');"></div>
<?php endif; ?>
<div class="container">
    <h1 class="special-title center text-center about-special-title">
        <span><?php the_title(); ?></span>
    </h1>
    <div class="about-slogan">
        <?php echo $about_slogan; ?>
    </div>
    <div class="row pt-4 pb-5 g-lg-5">
        <div class="col-lg-6">
            <img src="<?php echo $about_main_pic; ?>" alt="">
        </div>
        <div class="col-lg-6 about-content">
            <?php echo $about_content; ?>
        </div>
    </div>
</div>
<?php
    get_footer();