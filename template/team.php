<?php
/**
 *
 * Template Name:  Team page template
 *
 */

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('roboto-font');
    wp_enqueue_style('style-css');
});
        
get_header();
?>

<div id="content-full" class="grid col-940 team-wrapper">

    <?php if (have_posts()) { ?>

        <?php while (have_posts()) { the_post(); ?>
            
            <h2>Barodian ninjas</h2>
            <div class="row team-row-main mrg-bottom25">
                <div class="col-lg-3 ninja-left">
                    <img src="<?php bloginfo('template_directory');?>/images/team/ninja1.png" alt="anand"/>
                </div>
                <div class="col-lg-6 content-center">
                    <h5>Leonardo As Anand Thakkar</h5>
                    <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-lg-3 ninja-right">
                    <img src="<?php bloginfo('template_directory');?>/images/team/anand.png" alt="anand"/>
                </div>
                <div class="clearfix"></div>
            </div>
    
            <div class="row team-row-main mrg-bottom25 git-block">
                <div class="col-lg-3 ninja-left">
                    <img src="<?php bloginfo('template_directory');?>/images/team/sh-left.jpg" alt="SH"/>
                </div>
                <div class="col-lg-6 content-center">                    
                    <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-lg-3 ninja-right">
                    <img src="<?php bloginfo('template_directory');?>/images/team/SH_N.jpg" alt="SH"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row team-row-main mrg-bottom25">
                <div class="col-lg-3 ninja-left">
                    <img src="<?php bloginfo('template_directory');?>/images/team/ninja4.png" alt="Himal"/>
                </div>
                <div class="col-lg-6 content-center">
                    <h5>Raphael as Himal Thakkar</h5>
                    <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-lg-3 ninja-right">
                    <img src="<?php bloginfo('template_directory');?>/images/team/himal.png" alt="Himal"/>
                </div>
                <div class="clearfix"></div>
            </div>
    
            <div class="row team-row-main mrg-bottom25">
                <div class="col-lg-3 ninja-left">
                    <img src="<?php bloginfo('template_directory');?>/images/team/ninja4.png" alt="Supriya"/>
                </div>
                <div class="col-lg-6 content-center">
                    <h5>Raphael as Supriya Sharma</h5>
                    <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-lg-3 ninja-right">
                    <img src="<?php bloginfo('template_directory');?>/images/team/sup.png" alt="Supriya"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row team-row-main mrg-bottom25">
                <div class="col-lg-3 ninja-left">
                    <img src="<?php bloginfo('template_directory');?>/images/team/ninja2.png" alt="Dharmik"/>
                </div>
                <div class="col-lg-6 content-center">
                    <h5>Donatello As Dharmik solanki</h5>
                    <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-lg-3 ninja-right">
                    <img src="<?php bloginfo('template_directory');?>/images/team/dharmik.png" alt="Dharmik"/>
                </div>
                <div class="clearfix"></div>
            </div>
    
            <div class="row team-row-main mrg-bottom25">
                <div class="col-lg-3 ninja-left">
                    <img src="<?php bloginfo('template_directory');?>/images/team/ninja3.png" alt="Silpi"/>
                </div>
                <div class="col-lg-6 content-center">
                    <h5>Michelangelo as Silpi vyas</h5>
                    <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                <div class="col-lg-3 ninja-right">
                    <img src="<?php bloginfo('template_directory');?>/images/team/shilpi.png" alt="shilpi"/>
                </div>
                <div class="clearfix"></div>
            </div>
    
            

        <?php } ?>

<?php } ?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>
