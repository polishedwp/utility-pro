<?php

/**
 * This file contains elements for theme internationalization.
 *
 * @author Carrie Dils
 * @package Utility Pro
 * @subpackage Customizations
 */

add_action( 'after_setup_theme', 'utility_pro_i18n' );
/**
 * Load the child theme textdomain for internationalization.
 *
 * Must be loaded before Genesis Framework /lib/init.php is included.
 * Translations can be filed in the /languages/ directory.
 *
 * @since 1.0.0
 */
function utility_pro_i18n() {
    load_child_theme_textdomain( 'utility-pro', get_stylesheet_directory() . '/languages' );
}

/**
 * Build Google fonts URL.
 *
 * This function enqueues Google fonts in such a way that translators can easily turn on/off
 * the fonts if they do not contain the necessary character sets. Hat tip to Frank Klein for
 * the tutorial.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @since  1.0.0
 */
function utility_pro_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by these fonts, translate this to 'off'. Do not translate
    * into your own language.
    */
    $arvo = _x( 'on', 'Arvo font: on or off', 'utility-pro' );

    $pt_sans = _x( 'on', 'PT Sans font: on or off', 'utility-pro' );

    if ( 'off' !== $arvo || 'off' !== $pt_sans ) {
        $font_families = array();

        if ( 'off' !== $arvo ) {
            $font_families[] = 'Arvo:400,700';
        }

        if ( 'off' !== $pt_sans ) {
            $font_families[] = 'PT Sans:400,700';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }

    return $fonts_url;
}