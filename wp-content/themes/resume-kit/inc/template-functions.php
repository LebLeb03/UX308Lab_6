<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Resume kit
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function resume_kit_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'resume_kit_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function resume_kit_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'resume_kit_pingback_header');

function resume_kit_add_span_to_first_word($title)
{
	// Split the title into the first word and the rest of the string
	$words = explode(' ', $title, 2);
	$first_word = $words[0];
	$rest_of_title = isset($words[1]) ? $words[1] : '';

	// Wrap the first word in a <span> tag
	$first_word = '<span class="rskit-introfirst">' . $first_word . '</span>';

	// Concatenate the wrapped first word with the rest of the string
	$enhanced_title = $first_word . ' ' . $rest_of_title;

	// Return the resulting string
	return $enhanced_title;
}
