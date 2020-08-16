<?php
/**
 * The main template file
 * 
 */
get_header();
?>
<?php 
var_dump( get_theme_mod('enable_dark_autoswitch', true));
if (have_posts()) {
    while (have_posts()) {
        the_post();
    }
} else {
    echo "No posts found";
}
?>