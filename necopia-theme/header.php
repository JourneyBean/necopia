<?php
/**
 * Header for all pages
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="" >

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
// Site Header
?>
<header id="site-header" class="header" role="banner">

    <div class="header-bar">

        <div class="header-bar-site">
        
        </div>

        <?php 
        // Nav-bar on demand
        if (has_nav_menu( 'navbarmenu' )) { ?>

        <div class="header-bar-nav">
            <nav>
                <?php wp_nav_menu(['theme_location' => 'navbarmenu']);?>
            </nav>
        </div>

        <?php 
        } ?>


    </div>

</header>