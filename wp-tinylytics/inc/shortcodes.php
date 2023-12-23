<?php

/*
 *
 * Shortcode options for WP Tinylytics
 * Since version 1.0.2
 *
 */

// *** Kudos shortcode
function tinylytics_kudos_function() {
	$kudos = get_option('tinylytics_kudos', 0);
	if ($kudos === '1') {
		return '<button class="tinylytics_kudos" data-path="'. wp_make_link_relative(get_permalink()) .'"></button>';
	}
}
add_shortcode('tinykudos','tinylytics_kudos_function');

// *** Hits shortcode
function tinylytics_hits_function() {
	$hits = get_option('tinylytics_hits', 0);
	if ($hits === '1') {
		return '<span class="tinylytics_hits" data-path="'. wp_make_link_relative(get_permalink()) .'"></span>';
	}
}
add_shortcode('tinyhits','tinylytics_hits_function');

// *** Web ring shortcode
function tinylytics_webring_function() {
	$webring = get_option('tinylytics_webring', 0);
	$webring_label = get_option('tinylytics_webring_label');
	$avatars = get_option('tinylytics_avatars', 0);
	if ($webring === '1') {
		$show_avatar = $avatars ? '<img class="tinylytics_webring_avatar" src="" style="display: none"/>' : '';
		if ($webring_label === '') {
			$output = '<span class="tiny_webring"><a href="" class="tinylytics_webring" target="_blank" title="Tinylytics Web Ring">🕸️' . $show_avatar . '💍</a></span>';
		} else {
			$output = '<span class="tiny_webring"><a href="" class="tinylytics_webring" target="_blank" title="Tinylytics Web Ring">'. $show_avatar . $webring_label . '</a></span>';
		}
	}
	return $output;
}
add_shortcode('tinywebring','tinylytics_webring_function');

// *** Country flags shortcode
function tinylytics_flags_function() {
	$flags = get_option('tinylytics_flags', 0);
	if ($flags === '1') {
		return '<p><span class="tinylytics_countries"></span></p>';
	}
}
add_shortcode('tinyflags','tinylytics_flags_function');

// *** Stats shortcode
function tinylytics_stats_function() {
	$stats = get_option('tinylytics_stats', 0);
	$hits = get_option('tinylytics_hits', 0);
	$uptime = get_option('tinylytics_uptime', 0);
	$output = '';
	if ($stats === '1' && $hits === '1') {
		$output .= '<span class="tiny_counter"><a href="" target="_blank" class="tinylytics_public_stats">My Stats</a>: <span class="tinylytics_hits"></span></span>';
	}
	else if ($hits === '1') {
		$output .= '<span class="tiny_counter"><a href="https://tinylytics.app">Tinylytics</a>: <span class="tinylytics_hits"></span></span>';
	}
	if ($uptime === '1') {
		$output .= ' <span class="tiny_uptime">Uptime: <span class="tinylytics_uptime"></span></span>';
	}
	return $output;
}
add_shortcode('tinystats','tinylytics_stats_function');

?>