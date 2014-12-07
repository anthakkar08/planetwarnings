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


wp_enqueue_style('bootstrap');
wp_enqueue_style('font-awesome');
wp_enqueue_style('roboto-font');
//wp_enqueue_style('gmap');
wp_enqueue_style('jquery-ui');
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
            html, body, #map_canvas {
                height: 100%;
                margin: 0px;
                padding: 0px;
                position: relative;
            }
            .chart_ct {
                width:850px;
                display:block;
                background:#FFF;
                border:1px solid #F00;
                padding:25px;
                text-align:center; 
            }
            .chart_ct h2 {
                font-size:16px; 
            }
            .chart_ct .country_flag {
                float:left; 
            }
            .chart_div{
                width:750px; 
                height:250px;
                margin:0px auto; 
            }
            .main-page-small-logo{
                position:absolute;
                right:15px;
                bottom:15px;
                z-index:20px;
                 
            }
            .main-page-small-logo img {
                width:100px; 
            }
            
        </style>
<script type="text/javascript">
        var map;
        var mapDiv;
        var geocoder;
        var marker;
        
        var country         = null;
        var country_chart   = null;
        
        // Infobox Default Settings
        var infoboxOptions  = {
            content                 : '',
            disableAutoPan          : false,
            maxWidth                : 0,
            pixelOffset             : new google.maps.Size(-400,-300),
            zIndex                  : null,
            boxStyle                : { 
                background  : "url('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/examples/tipbox.gif') no-repeat",
                opacity     : 0.95
            },
            closeBoxMargin          : "20px",
            closeBoxURL             : "http://www.google.com/intl/en_us/mapfiles/close.gif",
            infoBoxClearance        : new google.maps.Size(1, 1),
            isHidden                : false,
            pane                    : "floatPane",
            enableEventPropagation  : false
        };
        var infobox         = null;
        
        var chartBase       = 'https://chart.googleapis.com/chart?chst=';
            
            jQuery(document).ready(function() {
                
                var styleOff = [{ visibility: 'off' }];
                var stylez = [
                    {   featureType: 'administrative',
                        elementType: 'labels',
                        stylers: styleOff},
                    {   featureType: 'administrative.province',
                        stylers: styleOff},
                    {   featureType: 'administrative.locality',
                        stylers: styleOff},
                    {   featureType: 'administrative.neighborhood',
                        stylers: styleOff},
                    {   featureType: 'administrative.land_parcel',
                        stylers: styleOff},
                    {   featureType: 'poi',
                        stylers: styleOff},
                    {   featureType: 'landscape',
                        stylers: styleOff},
                    {   featureType: 'road',
                        stylers: styleOff}
                ];
                
                geocoder    = new google.maps.Geocoder();
                
                mapDiv      = document.getElementById('map_canvas');
                map         = new google.maps.Map(mapDiv, {
                    center                : new google.maps.LatLng(53.012924,18.59848), // needs to get this corrected
                    zoom                  : 2,
                    mapTypeId             : 'Border View',
                    draggableCursor       : 'pointer',
                    draggingCursor        : 'wait',
                    mapTypeControlOptions : {
                        mapTypeIds        : ['Border View']
                    }
                });
                var customMapType = new google.maps.StyledMapType(stylez,{name: 'Border View'});
                
                map.mapTypes.set('Border View', customMapType);
                /*marker = new google.maps.Marker({
                    position: new google.maps.LatLng(53.012924,18.59848),
                    map: map
                });*/
                
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = new google.maps.LatLng(position.coords.latitude,
                                                       position.coords.longitude);

                      map.setCenter(pos);
                      var mev = {
                        stop: null,
                        latLng: pos
                        }   

                        google.maps.event.trigger(map, 'click', mev);
                    }, function() {
                        // goe Location service fail function
                    });
                } 
                
                google.maps.event.addListener(map, 'click', bnpw_mapclick);
                
                jQuery('.search-btn').click(function() {
                    getLocation(jQuery('#search_txt').val());
                });
            });
                
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 500,
                    values: [ 75, 300 ],
                    slide: function( event, ui ) {
                        jQuery( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                    }
                });
                jQuery( "#amount" ).val( "$" + jQuery( "#slider-range" ).slider( "values", 0 ) +
                    " - $" + jQuery( "#slider-range" ).slider( "values", 1 ) );
            });
        </script>
    </head>

    <body id="map-container">
