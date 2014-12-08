<?php
/**
 * Header Template main template
 */
//wp_enqueue_script('jquery-11');
wp_enqueue_script('jquery-ui');
wp_enqueue_script('googlemap');
wp_enqueue_script('jsapi');
wp_enqueue_script('maphelper');
wp_enqueue_script('infobox');
wp_enqueue_script('timecube');

wp_enqueue_style('bootstrap');
wp_enqueue_style('font-awesome');
wp_enqueue_style('roboto-font');
wp_enqueue_style('jquery-ui');
wp_enqueue_style('jqueryscript');
wp_enqueue_style('timecube');
wp_enqueue_style('style-css');

?>
<!doctype html>
<!--[if !IE]>
<html class="no-js non-ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php wp_title('&#124;', true, 'right'); ?></title>

        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
        <style type="text/css">
            #infobox{
                background:#fff;           
                padding: 5px 10px;
                font-size: 14px;
                font-weight: 500;
                color: #666666;
                border: 1px solid #0793cc;
                border-radius : 5px; 
            }
            #time-line-design{
                margin-top: 50px;
            }
            .time-line-container{
                text-align: center;      
            }
            .earth-quake-small-logo{
                text-align: right;                
            }
            #map-canvas{
                width: 100%;
                height:400px;
            }
            #content-wrapper{
                float: left;
            }
            a#prev-link {
                left: 37px;
            }
            a#next-link {
                left:572px;
            }
        </style>
        <script type="text/javascript">
            var earthQuakeData  = null;
            var timeCubeOptions = {};
            var map;

            function initialize() {
              var mapOptions = {
                zoom: 8,
                center: new google.maps.LatLng(-34.397, 150.644)
              };
              map = new google.maps.Map(document.getElementById('map-canvas'),
                  mapOptions);
            }

            google.maps.event.addDomListener(window, 'load', initialize);

            jQuery(document).ready(function(){

                document.body.addEventListener('touchstart', function(e){  
                    // allow clicks on links within the moveable area
                    e.preventDefault();

                    if($(e.target).is('a, iframe')) {                   
                        return true;
                    }

                });


                document.body.addEventListener('touchmove', function(e){ 
                    e.preventDefault();
                });


                jQuery.ajax({
                    url: "https://usgs-66d07c05404e.my.apitools.com/fdsnws/event/1/query?starttime=2014-8-07%2000:00:00&minmagnitude=6&format=geojson&endtime=2014-12-07%2023:59:59&orderby=time",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        earthQuakeData  = [];                    
                        for(i = 0; i< data.features.length;i++){
                            earthQuakeData.push({
                                title: data.features[i].properties.place,
                                description: "Magnitude of Earth Quake is "+ data.features[i].properties.mag,
                                startDate : (new Date(data.features[i].properties.time)),
                                endDate: null,
                                lat:data.features[i].geometry.coordinates[1],
                                lang:data.features[i].geometry.coordinates[0],
                                mag : data.features[i].properties.mag
                            });
                        }
                    }
                });

                var setInterval = window.setInterval(function(){

                    if(earthQuakeData != 'null' || earthQuakeData != ''){
                        timeCubeOptions = {
                                data: earthQuakeData.reverse(),
                                granularity: "month",
                                startDate: new Date(earthQuakeData[0].startDate),
                                endDate: new Date(earthQuakeData[earthQuakeData.length - 1].startDate),
                                nextButton: jQuery("#next-link"),
                                previousButton: jQuery("#prev-link"),
                                showDate: true
                        };
                        jQuery("#timeline").timeCube(timeCubeOptions);

                        clearInterval(setInterval);
                    }
                 },2000);         


            });
        </script>
    </head>

    <body id="map-container">
