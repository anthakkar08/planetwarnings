<?php
/**
 * Header Template main template
 */
wp_enqueue_script('jquery-11');
wp_enqueue_script('jquery-ui');
wp_enqueue_script('jquery-map');

wp_enqueue_style('bootstrap');
wp_enqueue_style('font-awesome');
wp_enqueue_style('roboto-font');
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
            html, body, #map-canvas {
                height: 100%;
                margin: 0px;
                padding: 0px;
                position: relative;
            }
        </style>
        <script>
            var map;
            var mapStyle = [{
                    'featureType': 'all',
                    'elementType': 'all',
                    'stylers': [{'visibility': 'off'}]
                }, {
                    'featureType': 'landscape',
                    'elementType': 'geometry',
                    'stylers': [{'visibility': 'on'}, {'color': '#fcfcfc'}]
                }, {
                    'featureType': 'water',
                    'elementType': 'labels',
                    'stylers': [{'visibility': 'off'}]
                }, {
                    'featureType': 'water',
                    'elementType': 'geometry',
                    'stylers': [{'visibility': 'on'}, {'hue': '#5f94ff'}, {'lightness': 60}]
                }];

            google.maps.event.addDomListener(window, 'load', function() {
                map = new google.maps.Map(document.getElementById('map-canvas'), {
                    center: { lat: 20, lng: -160 },
                    zoom: 3,
                    styles: mapStyle
                });

                map.data.setStyle(styleFeature);

                // Get the earthquake data (JSONP format)
                // This feed is a copy from the USGS feed, you can find the originals here:
                //   http://earthquake.usgs.gov/earthquakes/feed/v1.0/geojson.php
                var script = document.createElement('script');
                script.setAttribute('src','<?php bloginfo('template_directory'); ?>/json/quakes.geo.json');
                document.getElementsByTagName('head')[0].appendChild(script);
            });

            // Defines the callback function referenced in the jsonp file.
            function eqfeed_callback(data) {
                map.data.addGeoJson(data);
            }

            function styleFeature(feature) {
                var low = [151, 83, 34];   // color of mag 1.0
                var high = [5, 69, 54];  // color of mag 6.0 and above
                var minMag = 1.0;
                var maxMag = 6.0;

                // fraction represents where the value sits between the min and max
                var fraction = (Math.min(feature.getProperty('mag'), maxMag) - minMag) / (maxMag - minMag);

                var color = interpolateHsl(low, high, fraction);

                return {
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        strokeWeight: 0.5,
                        strokeColor: '#fff',
                        fillColor: color,
                        fillOpacity: 2 / feature.getProperty('mag'),
                        // while an exponent would technically be correct, quadratic looks nicer
                        scale: Math.pow(feature.getProperty('mag'), 2)
                    },
                    zIndex: Math.floor(feature.getProperty('mag'))
                };
            }

            function interpolateHsl(lowHsl, highHsl, fraction) {
                var color = [];
                for (var i = 0; i < 3; i++) {
                    // Calculate color based on the fraction.
                    color[i] = (highHsl[i] - lowHsl[i]) * fraction + lowHsl[i];
                }

                return 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)';
            }
                
            function getLocation(address) {
                if(address != '') {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode( { 'address': address}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();
                            initialize(latitude,longitude);
                        }
                    });
                } else {
                    navigator.geolocation.getCurrentPosition(function(position){
                        initialize(position.coords.latitude,position.coords.longitude);
                    });
                } 
            }
            
            function initialize(latitude,longitude) {
                var mapOptions = {
                    center: { lat: latitude, lng: longitude},
                    zoom: 5
                };
                var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);            }

            
            jQuery(document).ready(function() {
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
