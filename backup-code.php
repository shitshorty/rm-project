<?php
/**
 * Created by PhpStorm.
 * User: ShiTsHorTY
 * Date: 24/12/18
 * Time: 04:54
 */

//    /*plugins/content-views-query-and-display-post-page/content-views.php   restrict_ct_view()     */

function restrict_ct_view(){

//// Design Division /////////
    remove_menu_page( 'content-views' );          //

}
add_action( 'admin_menu', 'restrict_ct_view' );









//    /*plugins/visualcomposer/env.php   restrict_vcv(),restrict_pluginlist()    */

function restrict_vcv(){

//// Design Division /////////
    remove_menu_page( 'vcv-settings' );        //

}
add_action( 'admin_menu', 'restrict_vcv' );
function restrict_pluginlist() {
    global $wp_list_table;
    $hidearr = array('bulletproof-security/bulletproof-security.php',
        'content-views-query-and-display-post-page/content-views.php',
        'pt-content-views-pro/content-views.php',
        'revslider/revslider.php',
        'visualcomposer/plugin-wordpress.php'
    );
    $myplugins = $wp_list_table->items;
    foreach ($myplugins as $key => $val) {
        if (in_array($key,$hidearr)) {
            unset($wp_list_table->items[$key]);
        }
    }
}
add_action('pre_current_active_plugins', 'restrict_pluginlist');





//    /*plugins/revslider/revslider.php   restrict_revslider()    */

function restrict_revslider(){

//// Design Division /////////
    remove_menu_page( 'revslider' );        //

}
add_action( 'admin_menu', 'restrict_revslider' );

