<?php
/**
 * Template Name:  Earthquake page template
 *
 * @file           earth-quake-template.php
 * @package        Responsive
 */

add_action( 'wp_enqueue_scripts', function(){
    /**
     * Remove the theme's Default Stylesheet
     */
    wp_dequeue_style( 'responsive-style' );
    wp_dequeue_style( 'responsive-media-queries' );
});

get_header('earthqauke');
?>
<div class="wrapper">
    <div id="map-canvas"></div>
    <div class="clearfix"></div>   
    <div class="row" id="time-line-design">
        <div class="col-lg-4 timeline-heading">
            <h2><?php echo __('Timeline For past 5 months Earthquakes'); ?></h2>
            <p><?php echo __('(Click on markers to view location on the map.)'); ?></p>
        </div>
        <div class="time-line-container col-lg-6">
            <div id="content-wrapper">
                <div id="timeline" class="timeCube"></div>
                <div id="swipe"></div>
            </div>
            <a href="#" onclick="return false;" id="next-link"></a> <a href="#" onclick="return false;" id="prev-link" class="disabled"></a>            
        </div>
        <div class="earth-quake-small-logo col-lg-2">
            <a href="<?php echo esc_url(home_url('home')); ?>">
                <img src="<?php bloginfo('template_directory'); ?>/images/logo-small.gif" />
            </a>
        </div>
    </div>
    
</div>
<?php
    get_footer('main-template');