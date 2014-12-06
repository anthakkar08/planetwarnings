<?php
/**
 * Template Name:  Main page template
 *
 * @file           main-page-template.php
 * @package        Responsive
 */

add_action( 'wp_enqueue_scripts', function(){
    wp_dequeue_style( 'responsive-style' );
    wp_dequeue_style( 'responsive-media-queries' );
});
get_header('main-template');
?>
<div class="wrapper">
    <div class="static-block-top">
        <div class="row">
            <div class="col-xs-7">
                <div class="left-title-map-top">
                    <h1 class="">Small Arms and Ammunition — Imports &amp; Export</h1>
                    <p>An interactive visualization of government-authorized small arms and ammunition transfers from 1992 to 2010.</p>
                </div>
            </div>
            <div class="col-xs-4 pull-right">
                <div class="right-search-form row">
                    <div class="search-form-container col-xs-12">
                        <form action="javascript:" method="post" id="search-form">
                            <div class="left-btn-plus-minus">
                                <input type="button" value="—" class="zoom-btn-minus btn btn-primary">
                                <input type="button" value="+" class="zoom-btn-plus btn btn-primary">
                            </div>
                            <div class="input-group left-top-input">
                                <input type="text" class="form-control map-text-input" name="search_txt" id="search_txt" placeholder="Enter text">
                            </div>
                            <div class="clearfix"></div>
                            <div class="right-form-data">

                                <div class="left-bottom-input">
                                    <select class="form-control select-left-main pull-left">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <select class="form-control select-Right-main pull-right">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="search-btn-container">
                                    <input type="button" value="SEARCH" class="search-btn btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--<div class="row">
        <div class="col-xs-4 sidebar-left"></div>
        <div class="col-xs-8 content-right"></div>
        <div class="clearfix"></div>
    </div>-->
    <div class="bottom-scrollbar-container">
        <div class="bottom-scrollbar">                    
            <div id="slider-range"></div>
            <div class="bottom-scrollbar-info">
                <label for="amount">Price range:</label>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </div>
        </div>
    </div>
    <div id="map-canvas"></div>
</div>
<?php
    get_footer('main-template');
?>
