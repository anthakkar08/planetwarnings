<?php
/**
 *
 * Template Name:  Message template page
 *
 */

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('jquery-11');
    wp_enqueue_style('roboto-font');    
    wp_enqueue_style('style-css');
});
get_header();
?>

<div id="content-full" class="grid col-940">

    <?php if (have_posts()) { ?>

        <?php while (have_posts()) { the_post(); ?>
            <div class="about-message-container">
                <?php
                    the_content();
                ?>
            </div>          
        <?php } ?>

<?php } ?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>
