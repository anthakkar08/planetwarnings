<?php
/**
 *
 * Template Name:  Bug report form page
 *
 */
wp_enqueue_script('jquery-11');
wp_enqueue_script('sprintly-js');
wp_enqueue_script('sprintly-conn');

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('roboto-font');
    wp_enqueue_style('jquery-ui');
    wp_enqueue_style('style-css');
});
        
add_action('wp_head', function() {
            ?>
            <script type="text/javascript">
                $.noConflict();
                jQuery(document).ready(function(){
                    jQuery('.sbmt-btn').click(function(){
                        error = false;
                        if(jQuery('#title').val() == '') {
                            error = true;
                            jQuery('.error-input').append('Title can\'t be empty').show();
                            jQuery('#title').addClass('error-fld');
                        }
                        if(error == false) {
                            var new_item = sprintly_api.item.add({
                                type: 'defect',
                                title: "'"+jQuery('#title').val()+"'",
                                score: 'S',
                                status: 'backlog',
                                assigned_to: 31303,
                                description: "'"+jQuery('#suggestion').val()+"'",
                                tags: ['bug']
                            });

                            if(new_item != null) {
                                jQuery('.field').val('');
                                alert('Thank you for you response!');
                            }
                        }
                    });
                });
            </script>

            <?php
        });
        

get_header();
?>

<div id="content-full" class="grid col-940">

    <?php if (have_posts()) { ?>

        <?php while (have_posts()) {
            the_post();
            ?>

            <form action="#" method="post" class="Bug-report-form">
                <h3><?php _e('Did you find any bug? Report Here!', 'hk'); ?></h3>
                <div class="form-group">
                    <label for="title"><?php _e('Title'); ?> </label>
                    <input type="text" name="title" id="title" class="field form-control" placeholder="<?php _e('Title');?>" />
                </div>
                <div class="form-group">
                    <label for="suggestion"><?php _e('Suggestion'); ?> </label>
                    <textarea placeholder="<?php _e('Any Suggestion','hk');?>" rows="3" name="description" class="field form-control" id="suggestion" ></textarea>
                </div>                
                <div class="form-group">
                    <input type="button" value="Send" class="sbmt-btn btn btn-primary" />
                </div>
                <div class="alert alert-danger error-input" role="alert"></div>
            </form>

        <?php } ?>

<?php } ?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>
