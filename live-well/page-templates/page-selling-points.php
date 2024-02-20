<?php
    /*
    Template Name: Selling Points
    */
    __('Selling Points', 'live');
    get_header();
    // ACF
?>
<div class="container">
    <div class="row blog-heading top-bar pt-3">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h1 class="special-title">
                <span><?php the_title(); ?></span>
            </h1>
        </div>
        <div class="col-lg-6 d-lg-flex align-items-lg-center justify-content-lg-end">
            <!-- Search Form -->
            <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                <div class="input-group">
                    <input type="search" placeholder="<?php echo __( 'Search for a city, region, or name...', 'live' )?>" class="form-control" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo __( 'Search...', 'live' )?>" />
                </div>
            </form>
            <!-- Search Form -->
        </div>
    </div>
    <div class="selling-points">
        <div class="row g-lg-5">
            <?php
                // Get the repeater field values from ACF
                $selling_points = get_field('selling_points');

                // Group the rows by the value of the sub field
                $groups = array();
                if ($selling_points) {
                    foreach ($selling_points as $row) {
                        $sub_field_value = $row['region'];
                        if (!isset($groups[$sub_field_value])) {
                            $groups[$sub_field_value] = array();
                        }
                        $groups[$sub_field_value][] = $row;
                    }
                }

                // Output the groups of rows
                if (!empty($groups)) {
                    foreach ($groups as $sub_field_value => $rows) {
                        // Output the group heading
                        echo '<div class="col-lg-6">';
                            echo '<div class="region">';
                            echo '<h2>' . $sub_field_value . '</h2>';

                            // Output the rows in this group
                            if (!empty($rows)) {
                                echo '<div class="info">';
                                foreach ($rows as $row) {
                                    // Output the values of the fields in this row
                                    echo '<h3>' . $row['name'] . '</h3>';
                                    echo '<p class="address">
                                    <svg width="13" height="19" viewBox="0 0 13 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.50013 8.07142C7.36801 8.07142 8.07156 7.36787 8.07156 6.5C8.07156 5.63212 7.36801 4.92857 6.50013 4.92857C5.63226 4.92857 4.92871 5.63212 4.92871 6.5C4.92871 7.36787 5.63226 8.07142 6.50013 8.07142Z" stroke="#97C93D" stroke-miterlimit="10"/>
                                        <path d="M12 6.69248C11.9863 3.54832 9.5378 1 6.49998 1C3.46216 1 1 3.54832 1 6.69248C1 10.7614 6.49081 17.238 6.49081 17.238C6.49081 17.238 12.018 10.7614 12 6.69248Z" stroke="#97C93D" stroke-miterlimit="10"/>
                                    </svg>
                                    ' . $row['address'] . '</p>';
                                    if ( $row['phone'] ) :
                                    echo '<p class="phone">
                                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 3C1 1.89543 1.89543 1 3 1H7.30645C8.41102 1 9.30645 1.89543 9.30645 3V15.0937C9.30645 16.1983 8.41102 17.0938 7.30645 17.0938H3C1.89543 17.0938 1 16.1983 1 15.0938V3Z" stroke="#97C93D" stroke-miterlimit="10"/>
                                        <path d="M4.11523 3.03831H6.19185" stroke="#97C93D" stroke-miterlimit="10" stroke-linecap="round"/>
                                        <path d="M5.15294 15.0555C5.43966 15.0555 5.6721 14.823 5.6721 14.5363C5.6721 14.2496 5.43966 14.0172 5.15294 14.0172C4.86622 14.0172 4.63379 14.2496 4.63379 14.5363C4.63379 14.823 4.86622 15.0555 5.15294 15.0555Z" stroke="#97C93D" stroke-miterlimit="10" stroke-linejoin="bevel"/>
                                    </svg>
                                    ' . $row['phone'] . '</p>';
                                    endif;
                                }
                                echo '</div>';
                            }
                            echo '</div>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </div>

</div>
<?php
    get_footer();