
<header id="header">

    <?php
    // Header Top Bar
    if( repair_opt( 'repair-header-top-bar-toggle' ) ) { ?>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                        <?php
                        $args = array(
    	                    'theme_location' => 'social-menu',
    	                    'container'      => '',
    	                    'depth'          => 1,
    	                    'menu_class'     => 'nav-social',
    	                    'fallback_cb'    => 'repair_social_navwalker::fallback',
    	                    'walker'         => new repair_social_navwalker(),
                        );
                        wp_nav_menu( $args );
                        ?>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                        <?php if( repair_opt( 'repair-header-top-phone' ) ) {
                            echo '<a href="tel:'. repair_opt( 'repair-header-top-phone' ) .'">'. repair_opt( 'repair-header-top-phone' ) .'</a>';
                        }
                        if( repair_opt( 'repair-header-top-email' ) ) {
                            echo '<a href="mailto:'. repair_opt( 'repair-header-top-email' ) .'">'. repair_opt( 'repair-header-top-email' ) .'</a>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <?php 
    } ?>

    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <?php
            // Header Logo
            echo repair_theme_logo();
            ?>
            <nav id="nav-menu-container">
                <?php
                //
                if( has_nav_menu( 'primary-menu' ) ) {
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'nav-menu sf-js-enabled sf-arrows',
                        'fallback_cb'    => 'repair_bootstrap_navwalker::fallback',
                        'walker'         => new repair_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->
