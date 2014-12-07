<?php
/**
 *
 * Template Name:  Suggestion form page
 *
 */
//wp_enqueue_script('jquery-11');
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
                //$.noConflict();
                jQuery(document).ready(function(){
                    jQuery('.sbmt-btn').click(function(){
                        error = false;
                        if(jQuery('#profession').val() == '') {
                            error = true;
                            jQuery('.error-input').append('Profession can\'t be empty<br />').show();
                            jQuery('#profession').addClass('error-fld');
                        }
                        if(jQuery('#change').val() == '') {
                            error = true;
                            jQuery('.error-input').append('Extra Feature can\'t be empty<br />').show();
                            jQuery('#change').addClass('error-fld');
                        }
                        if(jQuery('#advantage').val() == '') {
                            error = true;
                            jQuery('.error-input').append('Advatages can\'t be empty<br />').show();
                            jQuery('#advantage').addClass('error-fld');
                        }
                        if(error == false) {
                            jQuery('.error-input').html('').hide();
                            var new_item = sprintly_api.item.add({
                                type: 'story',
                                who: "'"+jQuery('#profession').val()+"'",
                                what: "'"+jQuery('#change').val()+"'",
                                why: "'"+jQuery('#advantage').val()+"'",
                                score: 'S',
                                status: 'backlog',
                                assigned_to: 31303,
                                description: "'"+jQuery('#description').val()+"'",
                                tags: ['test', 'abc', '123']
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

            <form action="#" method="post" class="suggestion-form">
                <h3><?php _e('Your valuable suggestions are invited here!', 'hk'); ?></h3>
                <div class="form-group">
                    <label for="profession"><?php _e('I am a'); ?> </label>
                    <input type="text" name="profession" id="profession" class="field form-control" placeholder="<?php _e('Engineer,Accountant,HR','hk');?>" />
                </div>
                <div class="form-group">
                    <label for="change"><?php _e('I want', 'hk'); ?> </label>
                    <input type="text" name="change" id="change" class="field form-control" placeholder="<?php _e('Extra feature you want?','hk');?>" />
                </div>
                <div class="form-group">
                    <label for="advantage"><?php _e('So that'); ?> </label>
                    <input type="text" name="advantage" id="advantage" class="field form-control" placeholder="<?php _e("Advantage you'll get after integration of the feature");?>" /> 
                </div>
                <div class="form-group">
                    <textarea placeholder="<?php _e('Any Suggestion','hk');?>" rows="3" name="description" class="field form-control" id="description" ></textarea>
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
