<?php
/**
 * Template Name:  Rules page
 *
 */
wp_enqueue_style('bootstrap');
wp_enqueue_style('font-awesome');
wp_enqueue_style('roboto-font');
wp_enqueue_style('style-css');
wp_enqueue_script('bootstrapjs');

add_action('wp_head',function(){ ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <?php
});
    
get_header();
?>

<div id="content-full" class="grid col-940">

    <?php if (have_posts()) { ?>

        <?php while (have_posts()) { the_post(); ?>
            <?php
                the_content();
            ?>
        <?php } ?>

<?php } ?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>