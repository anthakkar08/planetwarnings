<?php
/**
 *   Template Name:  Full Width Page (no sidebar)
 */

wp_enqueue_style('bootstrap');
wp_enqueue_style('font-awesome');
wp_enqueue_style('roboto-font');
wp_enqueue_style('style-css');
 
get_header();
?>

<div id="content-full" class="grid col-940 team-wrapper">

    <?php if (have_posts()) { ?>

        <?php while (have_posts()) { the_post(); ?>
            <?php
                the_content();
            ?>
        <?php } ?>

<?php } ?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>