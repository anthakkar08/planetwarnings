<!DOCTYPE html>
<html>
    <head>
        <title>Planet Warnings</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,700,400" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/firstpage.css" />
        <script type="text/javascript">
            jQuery().ready(function(){
                var myBox1 = document.getElementById('frame-2');
                myBox1.addEventListener('webkitAnimationEnd',function( event ) { 
                myBox1.style.display = 'none'; }, false);
            
                var myBox2 = document.getElementById('frame-3');
                myBox2.addEventListener('webkitAnimationEnd',function( event ) { 
                myBox2.style.display = 'none'; }, false);

            });
        </script>
    </head>
    <body>
        <div class="frontpage-anmiation">
        <div class="container">
    <div class="header">
        <div class="clr"></div>
    </div>
    <div class="sp-container">
        <div class="sp-content">
            <div class="sp-globe"></div>
            <h2 class="frame-1">As a part of World's First Global Virtual #HACKATHON<br> by Koding</h2>
                <h2 class="frame-2">We tried to debug the Earth..</h2>
                <div id="frame-2" class="frame-2">
                    <img src="<?php bloginfo('template_directory'); ?>/images/koding.jpg" />
                </div>
            	
                <div id="frame-3" class="frame-3">
                    <img src="<?php bloginfo('template_directory'); ?>/images/elog.jpg" />
                    <br/>
                    <br/>
                    <h2 class="frame-3">..and encountered various warnings from past!</h2>
                </div                
                <h2 class="frame-4">Now!</h2>
                <h2 class="frame-5"><span>Take action to save the planet.</span> <br><span>Love life.</span> </h2>
                <a class="sp-circle-link" href="<?php echo esc_url(home_url('map')); ?>">Join us!</a>
        </div>
    </div>
</div>
        </div>
    </body>
</html>
