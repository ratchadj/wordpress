<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php

// ====================================================
// creating actions that will allow us to to load the code directly
// ====================================================

function yydev_tag_manager_head() {
    do_action( 'yydev_tag_manager_head' );
} // function yydev_above_footer() {

function yydev_tag_manager_below_body() {
    do_action( 'yydev_tag_manager_below_body' );
} // function yydev_tag_manager_below_body() {

function yydev_tag_manager_before_closing_body() {
    do_action( 'yydev_tag_manager_before_closing_body' );
} // function yydev_tag_manager_before_end_body() {

// ====================================================
// Output all the tags into the site
// ====================================================

// getting the data from the databse
$tagmanager_content_output = $wpdb->get_results("SELECT * FROM " . $yydev_tags_table_name . " WHERE page_id = 0");
$yydev_tag_manager_head = ''; $yydev_tag_body_tag = ''; $yydev_tag_footer_tag = '';

if($tagmanager_content_output > 0) {

    // organize the tags data
    foreach($tagmanager_content_output as $tagmanager_content_output_data) {

        $tag_type = $tagmanager_content_output_data->tag_type;
        $tag_code = $tagmanager_content_output_data->tag_code;

        if( $tag_type === "head" ) {

            // converting the array to data
            $yydev_tag_manager_head = explode("###^^^", $tagmanager_content_output_data->tag_code);
            $yydev_tag_manager_head = implode("\n", $yydev_tag_manager_head);
            $yydev_tag_manager_head = stripslashes_deep($yydev_tag_manager_head);

        } elseif( $tag_type === "body" ) {
            $yydev_tag_body_tag = stripslashes_deep($tagmanager_content_output_data->tag_code);

            $yydev_tag_body_tag = explode("###^^^", $tagmanager_content_output_data->tag_code);
            $yydev_tag_body_tag = implode("\n", $yydev_tag_body_tag);
            $yydev_tag_body_tag = stripslashes_deep($yydev_tag_body_tag);

        } elseif( $tag_type === "footer" ) {

            $yydev_tag_footer_tag = explode("###^^^", $tagmanager_content_output_data->tag_code);
            $yydev_tag_footer_tag = implode("\n", $yydev_tag_footer_tag);
            $yydev_tag_footer_tag = stripslashes_deep($yydev_tag_footer_tag);

        } // if( $tag_type === "head" ) {

    } // foreach($tagmanager_content_output as $tagmanager_content_output_data) {

} // if($tagmanager_content_output > 0) {

// ====================================================
// Adding the <head> tags
// ====================================================

if(!empty($yydev_tag_manager_head)) {

    // ------------------------------------------------
    // loading the code above footer with wp_head()
    // ------------------------------------------------

    add_action('wp_head', function() use($yydev_tag_manager_head, $yydev_tagmanager_settings) {

        yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings);

        if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {
            echo "\n" . $yydev_tag_manager_head . "\n";
        } // if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

     }, 9999); // add_action('wp_head', function() use($yydev_tag_manager_head, $yydev_tagmanager_settings) {

    // ------------------------------------------------
    // loading with direct plugin tag
    // ------------------------------------------------
    
    add_action('yydev_tag_manager_head', function() use($yydev_tag_manager_head, $yydev_tagmanager_settings) {

        if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {
        echo "\n" . $yydev_tag_manager_head . "\n";
        } // if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

     }, 9999); // add_action('wp_head', function() use($yydev_tag_manager_head, $yydev_tagmanager_settings) {

} // if(!empty($yydev_tag_manager_head)) {


// ====================================================
// Adding the after <body> tags
// ====================================================

// ----------------------------------------------------
// Adding the code if the theme not support after body tags
// ----------------------------------------------------

if(!empty($yydev_tag_body_tag)) {

    // ------------------------------------------------
    // loading the code above below <body> using ob_start
    // ------------------------------------------------

    // checking which way we should load the code with
    if( intval(get_option('yydev_tag_mangage_wp_body_open')) == 1 ) {

        // ------------------------------------------------
        // loading the below body code using wp_body_open()
        // ------------------------------------------------

        add_action('wp_body_open', function() use($yydev_tag_body_tag, $yydev_tagmanager_settings) {

            if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {
                echo "\n" . $yydev_tag_body_tag . "\n";
            } // if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

         }, 1); // add_action('wp_head', function() use($yydev_tag_body_tag, $yydev_tagmanager_settings) {
         
    } else { // if( intval(get_option('yydev_tag_mangage_wp_body_open')) == 1 ) {

        // ------------------------------------------------
        // loading the code above below <body> using ob_start
        // ------------------------------------------------

        add_action('wp_head', function() {
            ob_start();
         }); // add_action('wp_head', function() {

        add_action( 'wp_footer', function() use($yydev_tag_body_tag, $yydev_tagmanager_settings) {

            if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

                $yydev_buffer  = ob_get_clean();
                $yydev_str_replace ='/<[bB][oO][dD][yY]\s[A-Za-z]{2,5}[A-Za-z0-9 "_=\-\.]+>|<body>/';
                ob_start();

                if( preg_match($yydev_str_replace, $yydev_buffer, $yydev_buffer_return) ) {

                    $yydev_new_code = $yydev_buffer_return[0] . $yydev_tag_body_tag;
                    $yydev_new_code = preg_replace($yydev_str_replace, $yydev_new_code, $yydev_buffer);
                    
                    echo $yydev_new_code;

                } // if( preg_match($yydev_str_replace, $yydev_buffer, $yydev_buffer_return) ) {

                ob_flush();

            } // if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

        }); // add_action( 'wp_footer', function() use($yydev_tag_body_ta, $yydev_tagmanager_settingsg) {

    } // } else { // if( intval(get_option('yydev_tag_mangage_wp_body_open')) == 1 ) {

    // ------------------------------------------------
    // loading with direct plugin tag
    // ------------------------------------------------

    add_action('yydev_tag_manager_below_body', function() use($yydev_tag_body_tag, $yydev_tagmanager_settings) {

        if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {
            echo "\n" . $yydev_tag_body_tag . "\n";
        } // if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

     }, 9999); // add_action('wp_head', function() use($yydev_tag_body_tag, $yydev_tagmanager_settings) {

} // if(!empty($yydev_tag_body_tag)) {

// ====================================================
// Adding the footer tags
// ====================================================

if(!empty($yydev_tag_footer_tag)) {

    // ------------------------------------------------
    // loading the code above footer with wp_footer()
    // ------------------------------------------------
    
    add_action('wp_footer', function() use($yydev_tag_footer_tag, $yydev_tagmanager_settings) {

        if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {
            echo "\n" . $yydev_tag_footer_tag . "\n";
        } // if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

     }, 9999); // add_action('wp_footer', function() use($yydev_tag_footer_tag, $yydev_tagmanager_settings) {

    // ------------------------------------------------
    // loading with direct plugin tag
    // ------------------------------------------------
    
    add_action('yydev_tag_manager_before_closing_body', function() use($yydev_tag_footer_tag, $yydev_tagmanager_settings) {
        
        if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {
            echo "\n" . $yydev_tag_footer_tag . "\n";
        } // if( yydev_tagmanager_exclude_pages_check($yydev_tagmanager_settings) ) {

     }, 9999); // add_action('wp_head', function() use($yydev_tag_footer_tag, $yydev_tagmanager_settings) {

} // if(!empty($yydev_tag_footer_tag)) {
