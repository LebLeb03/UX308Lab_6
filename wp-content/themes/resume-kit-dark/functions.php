<?php
/*This file is part of Resume Kit Dark child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
$resume_kit_dark_theme = wp_get_theme();
if (!defined('RESUME_KIT_DARK')) {
	// Replace the version number of the theme on each release.
	define('RESUME_KIT_DARK', $resume_kit_dark_theme->get('Version'));
}

function resume_kit_dark_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Outfit:400,400i,700,700i,900,900i';
	$font_families[] = 'Lato:400,400i,500,600,700,700i';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);

	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');


	return esc_url_raw($fonts_url);
}


function resume_kit_dark_enqueue_child_styles()
{
	wp_enqueue_style('resume-kit-dark-google-font', resume_kit_dark_fonts_url(), array(), null);
	wp_enqueue_style('resume-kit-dark-parent-style', get_template_directory_uri() . '/style.css', array('resume-kit-style'), RESUME_KIT_DARK, 'all');
	wp_enqueue_style('resume-kit-dark-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('bootstrap', 'resume-kit-style', 'resume-kit-main-style', 'resume-kit-default-style'), RESUME_KIT_DARK, 'all');
}
add_action('wp_enqueue_scripts', 'resume_kit_dark_enqueue_child_styles');





add_filter('excerpt_more', 'resume_kit_dark_exerpt_empty_string', 999);
function resume_kit_dark_exerpt_empty_string($more)
{
	if (is_admin()) {
		return $more;
	}
	return '';
}
function resume_kit_dark_excerpt_length($length)
{
	if (is_admin()) {
		return $length;
	}
	return 45;
}
add_filter('excerpt_length', 'resume_kit_dark_excerpt_length', 999);


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function resume_kit_dark_body_classes($classes)
{
	$classes[] = 'dark';
	$classes[] = 'resume-kit-dark';

	return $classes;
}
add_filter('body_class', 'resume_kit_dark_body_classes');

require get_stylesheet_directory() . '/inc/customizer.php';
