<?php
    /*
    Template Name: Blog
    */
    __('Blog', 'live');
    get_header();
    $post_id = get_the_ID();
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
    // ACF
    $blog_excerpt       = get_field('blog_excerpt');
?>
<?php if ( $image ) : ?>
	<div class="hero-banner hero-banner-blog" style="background-image: url('<?php echo $image[0]; ?>');"></div>
<?php endif; ?>
<div class="container">
    <div class="row blog-heading">
        <div class="col-lg-4">
            <h1 class="special-title">
                <span><?php the_title(); ?></span>
            </h1>
        </div>
        <div class="col-lg-8 d-flex align-items-lg-center">
            <p class="excerpt"><?php echo $blog_excerpt; ?></p>
        </div>
    </div>
    <?php
        // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
                'post_type' => 'post',
                'posts_per_page' => '9',
        );

        // The Query
        $query = new WP_Query( $args );
        $i = 0;

        // The Loop
        if ( $query->have_posts() ) {
            echo '<div class="row wrap-blog gx-lg-4 gy-lg-3">';
            while ( $query->have_posts() ) {
                $query->the_post();
                $i++;
                //Get post thumbnail
                $post_id = get_the_ID();
                $image              = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog-post-thumb' );
                $author_id			= $post->post_author;
                $author_name 		= get_the_author_meta( 'display_name', $author_id );
                ?>
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <a href="<?php echo get_the_permalink(); ?>" class="card-img">
                            <?php if( $image ) : ?>
                                <img src="<?php echo $image[0]; ?>" alt="">
                            <?php endif; ?>
                        </a>
                        <div class="card-body">
                            <div class="meta">
                                <div class="date-read">
                                    <?php echo '<span class="author-name">' . $author_name . '</span>' . ' | ' .  reading_time() .' ' . __('read' , 'live') . ' | ' .  get_the_time('F j, Y'); ?>
                                </div>
                            </div>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <h2 class="card-title"><?php echo get_the_title(); ?></h2>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            // End post
                }
                echo '</div>';
            }
            else {
                // no posts found
        }
        // Restore original Post Data
        wp_reset_postdata();
    ?>
</div>
<?php
    get_footer();