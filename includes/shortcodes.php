<?php

	/* BUTTON SHORTCODES
	================================================== */

	function button_blue($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button blue" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_blue', 'button_blue');

	function button_red($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button red" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_red', 'button_red');

	function button_green($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button green" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_green', 'button_green');

	function button_orange($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button orange" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_orange', 'button_orange');

	function button_yellow($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button yellow" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_yellow', 'button_yellow');

	function button_pink($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button pink" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_pink', 'button_pink');

	function button_purple($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button purple" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_purple', 'button_purple');

	function button_lightblue($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button lightblue" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_lightblue', 'button_lightblue');

	function button_turquoise($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button turquoise" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_turquoise', 'button_turquoise');

	function button_black($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button black" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_black', 'button_black');

	function button_grey($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button grey" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_grey', 'button_grey');

	function button_white($atts, $content = null) {
	   extract(shortcode_atts(array('link' => '#'), $atts));
	   return '<a class="button white" href="'.$link.'"><span>' . do_shortcode($content) . '</span></a>';
	}
	add_shortcode('button_white', 'button_white');


	/* ALERT SHORTCODES
	================================================== */

	function alert_clear( $atts, $content = null ) {
	   return '<div class="alert clear">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_clear', 'alert_clear');

	function alert_red( $atts, $content = null ) {
	   return '<div class="alert red">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_red', 'alert_red');

	function alert_green( $atts, $content = null ) {
	   return '<div class="alert green">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_green', 'alert_green');

	function alert_blue( $atts, $content = null ) {
	   return '<div class="alert blue">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('alert_blue', 'alert_blue');

	/* COLUMN SHORTCODES
	================================================== */

	function one_third( $atts, $content = null ) {
	   return '<div class="one_third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_third', 'one_third');

	function one_third_last( $atts, $content = null ) {
	   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_third_last', 'one_third_last');

	function two_third( $atts, $content = null ) {
	   return '<div class="two_third">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('two_third', 'two_third');

	function two_third_last( $atts, $content = null ) {
	   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('two_third_last', 'two_third_last');

	function one_half( $atts, $content = null ) {
	   return '<div class="one_half">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_half', 'one_half');

	function one_half_last( $atts, $content = null ) {
	   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_half_last', 'one_half_last');

	function one_fourth( $atts, $content = null ) {
	   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_fourth', 'one_fourth');

	function one_fourth_last( $atts, $content = null ) {
	   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_fourth_last', 'one_fourth_last');

	function three_fourth( $atts, $content = null ) {
	   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fourth', 'three_fourth');

	function three_fourth_last( $atts, $content = null ) {
	   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('three_fourth_last', 'three_fourth_last');

	function one_fifth( $atts, $content = null ) {
	   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_fifth', 'one_fifth');

	function one_fifth_last( $atts, $content = null ) {
	   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_fifth_last', 'one_fifth_last');

	function two_fifth( $atts, $content = null ) {
	   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('two_fifth', 'two_fifth');

	function two_fifth_last( $atts, $content = null ) {
	   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('two_fifth_last', 'two_fifth_last');

	function three_fifth( $atts, $content = null ) {
	   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fifth', 'three_fifth');

	function three_fifth_last( $atts, $content = null ) {
	   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('three_fifth_last', 'three_fifth_last');

	function four_fifth( $atts, $content = null ) {
	   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('four_fifth', 'four_fifth');

	function four_fifth_last( $atts, $content = null ) {
	   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('four_fifth_last', 'four_fifth_last');

	function one_sixth( $atts, $content = null ) {
	   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_sixth', 'one_sixth');

	function one_sixth_last( $atts, $content = null ) {
	   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('one_sixth_last', 'one_sixth_last');

	function five_sixth( $atts, $content = null ) {
	   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('five_sixth', 'five_sixth');

	function five_sixth_last( $atts, $content = null ) {
	   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
	}
	add_shortcode('five_sixth_last', 'five_sixth_last');

?>