<?php

add_action( 'admin_menu'    , 'bnpw_admin_menu' );

function bnpw_admin_menu(){
    
    $page = add_menu_page(__('Earthquake Importer','hk'), __('Earthquake Importer','hk'), 'manage_options', 'pa_analytics', 'bnpw_earthquake_important_page','dashicons-chart-bar',63);
    
    
}

function bnpw_earthquake_important_page(){
    
    $url = 'http://comcat.cr.usgs.gov/fdsnws/event/1/query?starttime=2014-11-30%2000:00:00&minmagnitude=1&format=geojson&endtime=2014-12-07%2023:59:59&orderby=time';
    $request    = new WP_Http();
    $result     = $request->request( $url );
    $json       = $result['body'];
    
    echo "<pre>";
    print_r($request);
    print_r(json_decode($json));
    echo "</pre>";
    
    ?>
    <H2>Earthe Quake importar</h2>
    
    <?php
}