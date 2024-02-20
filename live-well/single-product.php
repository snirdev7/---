<?php
/**
 * The template for displaying single product
 *
 * @package live
 */
get_header();
$image                       = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
$tags 				         = get_the_tags($post->ID);
$url    			         = urlencode( get_permalink( $post ) );
$title  			         = addcslashes( get_the_title(), "'" );
$whatsappUrl   		         = 'whatsapp://send?text=' . $title . ' ' . $url;
// ACF
$weight                      = get_field('weight');
$description                 = get_field('description');
$ingredients                 = get_field('ingredients');
$instructions                = get_field('instructions');
$allergen_information        = get_field('allergen_information');
$calories                    = get_field('calories');
$total_fats                  = get_field('total_fats');
$saturated_fatty             = get_field('saturated_fatty');
$trans_fatty                 = get_field('trans_fatty');
$cholesterol                 = get_field('cholesterol');
$sodium                      = get_field('sodium');
$carbohydrates               = get_field('carbohydrates');
$sugars                      = get_field('sugars');
$dietary_fiber               = get_field('dietary_fiber');
$proteins                    = get_field('proteins');
$calcium                     = get_field('calcium');
$iron                        = get_field('iron');
$b12                         = get_field('b12');
$potassium                   = get_field('potassium');
$kosher                      = get_field('kosher');
$rich_protein                = get_field('rich_protein');
$no_preservatives            = get_field('no_preservatives');
$gmo                         = get_field('gmo');
$natural                     = get_field('natural');
$organic                     = get_field('organic');
$vegan                       = get_field('vegan');
$made_in_israel              = get_field('made_in_israel');
?>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php the_breadcrumb('mt-4');?>
            </div>
        </div>
    </div>
</div>
<div class="product-content">
    <div class="container">
        <div class="row g-lg-5">
            <div class="col-lg-6 right-content">
                <?php if ( $image ) : ?>
                    <div class="wrap-image">
                        <img src="<?php echo $image[0]; ?>" alt="">
                    </div>
                <?php else : ?>
                    <?php echo getImage('product-placeholder.jpg','border') ?>
                <?php endif; ?>
                <div class="icons">
                    <?php if ( $made_in_israel ) : ?>
                        <?php echo getImage('made-in-israel-ico.svg'); ?>
                    <?php endif; ?>
                    <?php if ( $vegan ) : ?>
                        <?php //echo getImage('vegan-ico.svg'); ?>
                        <?php echo getImage('vegan-friendly-ico.svg'); ?>
                    <?php endif; ?>
                    <?php if ( $organic ) : ?>
                        <?php echo getImage('organic-ico.svg'); ?>
                    <?php endif; ?>
                    <?php if ( $made_in_israel ) : ?>
                        <?php echo getImage('agriculture-ico.svg'); ?>
                    <?php endif; ?>
                    <?php if ( $gmo ) : ?>
                        <?php echo getImage('gmo2-ico.svg'); ?>
                    <?php endif; ?>
                </div>
                <div class="more-info">
                    <ul>
                        <?php if ( $rich_protein ) : ?>
                            <li>
                                <?php echo getImage('protein-ico.svg'); ?>
                                <span><?php echo __('Rich Protein', 'live'); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if ( $no_preservatives ) : ?>
                            <li>
                                <?php echo getImage('no-preservatives-ico.svg'); ?>
                                <span><?php echo __('No Preservatives', 'live'); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if ( $gmo ) : ?>
                            <li>
                                <?php echo getImage('gmo-ico.svg'); ?>
                                <span><?php echo __('No Genetic Engineering', 'live'); ?></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="share">
					<span><?php echo __('Share', 'wordpress'); ?></span>
					<a title="facebook" href="https://facebook.com/sharer.php?u=<?php echo $url; ?>" class="facebook">
						<svg fill="#336138" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="0 0 512 512" xml:space="preserve">
							<g id="7935ec95c421cee6d86eb22ecd11b7e3">
								<path style="display: inline;" d="M283.122,122.174c0,5.24,0,22.319,0,46.583h83.424l-9.045,74.367h-74.379 c0,114.688,0,268.375,0,268.375h-98.726c0,0,0-151.653,0-268.375h-51.443v-74.367h51.443c0-29.492,0-50.463,0-56.302 c0-27.82-2.096-41.02,9.725-62.578C205.948,28.32,239.308-0.174,297.007,0.512c57.713,0.711,82.04,6.263,82.04,6.263 l-12.501,79.257c0,0-36.853-9.731-54.942-6.263C293.539,83.238,283.122,94.366,283.122,122.174z"> </path>
							</g>
						</svg>
					</a>
					<a class="prevent_popup whatsapp" href="https://api.whatsapp.com/send?text=<?php echo $title; ?>&nbsp;-&nbsp;<?php echo $url; ?>" target="_blank">
						<svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.35493 17.3906L6.67546 17.5875C7.85101 18.3062 9.2063 18.685 10.5881 18.6812C12.6617 18.641 14.6343 17.7878 16.0726 16.3092C17.5108 14.8305 18.2971 12.8473 18.2586 10.7953C18.2912 8.74703 17.5023 6.76945 16.0646 5.29554C14.627 3.82162 12.6578 2.97147 10.5881 2.93122C8.51547 2.97432 6.54456 3.82839 5.10691 5.30641C3.66926 6.78444 2.88202 8.76598 2.91756 10.8172C2.90996 12.2539 3.29162 13.6665 4.02283 14.9078L4.22177 15.2359L3.45914 18.1781L6.35493 17.3906ZM0.950195 20.7812L2.32072 15.5093C1.53202 14.0679 1.11445 12.4563 1.10493 10.8172C1.06056 8.28361 2.03451 5.83628 3.81272 4.01301C5.59093 2.18974 8.02791 1.13973 10.5881 1.09372C13.1444 1.14545 15.5757 2.19797 17.3492 4.02061C19.1226 5.84325 20.0936 8.28732 20.0491 10.8172C20.0936 13.347 19.1226 15.7911 17.3492 17.6137C15.5757 19.4363 13.1444 20.4889 10.5881 20.5406C9.01422 20.5376 7.46805 20.1306 6.10072 19.3593L0.950195 20.7812Z" fill="#346139"/>
							<path d="M14.1138 12.1734C13.9286 12.018 13.7089 11.9082 13.4726 11.8531C13.2363 11.798 12.9901 11.799 12.7543 11.8562C12.4006 11.9984 12.1796 12.5672 11.9475 12.8625C11.899 12.9266 11.8291 12.9717 11.7502 12.9898C11.6712 13.0078 11.5884 12.9976 11.5164 12.9609C10.2171 12.428 9.13816 11.4759 8.45484 10.2593C8.39178 10.1861 8.35714 10.0931 8.35714 9.99684C8.35714 9.90063 8.39178 9.80757 8.45484 9.73434C8.71859 9.47617 8.91244 9.15645 9.01852 8.80466C9.03452 8.4241 8.94671 8.0463 8.76431 7.71091C8.57642 7.29528 8.37747 6.71559 7.97958 6.48591C7.78625 6.39975 7.57197 6.37044 7.36228 6.40147C7.15259 6.4325 6.95634 6.52256 6.79694 6.66091C6.5246 6.90614 6.31014 7.2077 6.16879 7.54416C6.02744 7.88063 5.96266 8.24376 5.97905 8.60778C5.97868 8.81372 6.00091 9.01909 6.04537 9.22028C6.18001 9.69918 6.37692 10.1588 6.63116 10.5875C6.81691 10.9079 7.01983 11.2182 7.23905 11.5172C7.94021 12.5097 8.83452 13.3538 9.86958 14C10.3776 14.3282 10.923 14.5962 11.4943 14.7984C12.0833 15.0722 12.7378 15.1783 13.3843 15.1047C13.7565 15.0412 14.1074 14.8883 14.406 14.6595C14.7047 14.4307 14.9421 14.1329 15.0975 13.7922C15.1933 13.5833 15.2204 13.3499 15.1748 13.125C15.0754 12.6656 14.4785 12.3922 14.0696 12.1734" fill="#346139"/>
						</svg>
					</a>
                    <a class="prevent_popup to-reipes-btn btn" href="<?php echo get_permalink( 203 ); ?>">
                        <span>
                            <?php echo __('To Recipes', 'live'); ?>
                        </span>
                        <?php echo getImage('to-recipes-ico.svg'); ?>
                    </a>
				</div>
                <!-- Product Type -->
                <ul class="product-type">
                <?php if ( $natural ) : ?>
                    <li class="natural"><?php echo __('Natural', 'live'); ?></li>
                <?php endif; ?>
                <?php if ( $organic ) : ?>
                    <li class="organic"><?php echo __('Organic', 'live'); ?></li>
                <?php endif; ?>
                <?php if ( $vegan ) : ?>
                    <li class="vegan"><?php echo __('Vegan', 'live'); ?></li>
                <?php endif; ?>
                </ul>
                <!-- Product Type -->
            </div>
            <div class="col-lg-6 left-content">
                <h1 class="special-title">
                    <span><?php the_title(); ?></span>
                </h1>
                <div class="weight"><?php echo $weight . ' ' .  __('Grams', 'live'); ?></div>
                <div class="details">
                    <p class="description"><?php echo $description; ?></p>
                    <!-- ingredients -->
                    <?php if ( $ingredients ) : ?>
                        <h3><?php echo __('Component', 'live'); ?></h3>
                        <p class="ingredients"><?php echo $ingredients; ?></p>
                    <?php endif; ?>
                    <!-- ingredients -->
                    <!-- instructions -->
                    <?php if ( $instructions ) : ?>
                        <h3><?php echo __('Instructions', 'live'); ?></h3>
                        <p class="instructions"><?php echo $instructions; ?></p>
                    <?php endif; ?>
                    <!-- instructions -->
                    <!-- Allergen information -->
                    <?php if ( $allergen_information ) : ?>
                        <p class="allergen-information">
                            <span><?php echo __('Allergen Information', 'live'); ?></span>
                            <?php echo $allergen_information; ?>
                        </p>
                    <?php endif; ?>
                    <!-- Allergen information -->
                    <!-- Table -->
                    <table>
                        <tbody>
                            <tr>
                                <th><?php echo __('Nutritional value', 'live'); ?></th>
                                <th class="text-center"><?php echo __('In 100 grams of product', 'live'); ?></th>
                            </tr>
                            <?php if ( $calories != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Energy (calories)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $calories; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $total_fats != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Total fats (grams) of which:', 'live'); ?></td>
                                    <td class="text-center"><?php echo $total_fats; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $saturated_fatty != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Saturated fatty acids (grams)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $saturated_fatty; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $trans_fatty != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Trans fatty acids (grams)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $trans_fatty; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $cholesterol != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Cholesterol (mg)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $cholesterol; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $sodium != '' ) : ?>
                                <tr>
                                    <td><?php echo __('sodium (mg)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $sodium; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $carbohydrates != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Total carbohydrates (grams) from:', 'live'); ?></td>
                                    <td class="text-center"><?php echo $carbohydrates; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $sugars != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Sugars (grams)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $sugars; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $dietary_fiber != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Dietary fiber (grams)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $dietary_fiber; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $proteins != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Proteins (grams)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $proteins; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $calcium != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Calcium (mg)', 'live'); ?></td>
                                    <td class="text-center"><?php echo $calcium; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $iron != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Iron', 'live'); ?></td>
                                    <td class="text-center"><?php echo $iron; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $b12 != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Vitamin B12', 'live'); ?></td>
                                    <td class="text-center"><?php echo $b12; ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if ( $potassium != '' ) : ?>
                                <tr>
                                    <td><?php echo __('Potassium', 'live'); ?></td>
                                    <td class="text-center"><?php echo $potassium; ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!-- Table -->
                    <!-- kosher -->
                    <?php if ( $kosher ) : ?>
                        <h3><?php echo __('Kosher', 'live'); ?></h3>
                        <p class="kosher"><?php echo $kosher; ?></p>
                    <?php endif; ?>
                    <!-- kosher -->
                    </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_footer();