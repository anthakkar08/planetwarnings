<?php
/**
 * Template Name:  Main page template
 *
 * @file           main-page-template.php
 * @package        Responsive
 */

add_action( 'wp_enqueue_scripts', function(){
    /**
     * Remove the theme's Default Stylesheet
     */
    wp_dequeue_style( 'responsive-style' );
    wp_dequeue_style( 'responsive-media-queries' );
});

get_header('main-template');
?>
<div class="wrapper">
    <div id="map_canvas"></div>
    <div class="main-page-small-logo">
        <a href="<?php echo esc_url(home_url('home')); ?>">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo-small.gif" />
        </a>
    </div>
</div>
<?php
    get_footer('main-template');

