<?php
	//UL Lists check & alt	
	function check_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="checks">', do_shortcode($content)); return $content;
	}
	function alt_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="alt">', do_shortcode($content)); return $content;
	}

	add_shortcode('check_list', 'check_list');
	add_shortcode('alt_list', 'alt_list');
	
	//Blockquote small
	function blockquote_small( $atts, $content = null ) {
	$content = str_replace('<blockquote>', '<blockquote class="small">', do_shortcode($content)); return $content;
	}
	add_shortcode('blockquote_small', 'blockquote_small');
	
	//Grids/Columns
	
	function one_half( $atts, $content = null ) {
	return '<div class="column col_6">'.do_shortcode($content).'</div>';
	}	
	
	add_shortcode('one_half', 'one_half');
	
	
	function one_third( $atts, $content = null ) {
	return '<div class="column col_4">'.do_shortcode($content).'</div>';
	}
	
	add_shortcode('one_third', 'one_third');

	
	function one_fourth( $atts, $content = null ) {
	return '<div class="column col_3">'.do_shortcode($content).'</div>';
	}
	
	add_shortcode('one_fourth', 'one_fourth');
	
	
	
	function two_third( $atts, $content = null ) {
	return '<div class="column col_8">'.do_shortcode($content).'</div>';
	}
	
	add_shortcode('two_third', 'two_third');
		

	function three_fourth_last( $atts, $content = null ) {
	return '<div class="column col_9">'.do_shortcode($content).'</div>';
	}	
	
	add_shortcode('three_fourth', 'three_fourth');
	
	
	//Tooltips
	function tooltip ( $atts, $content = null ) {	
		extract( shortcode_atts( array(
		'style' => 'tooltip',
		'text' => ''
		), $atts ) );
    
		return '<span class="'.esc_attr($style).'" title="'.esc_attr($text).'">'.$content.'</span>';	
	}
	add_shortcode('tooltip', 'tooltip');
	
	//Tooltips HTML
	function tooltip_html ( $atts, $content = null ) {	
		extract( shortcode_atts( array(
		'style' => 'tooltip',
		'text' => ''
		), $atts ) );
    
		return '<span class="'.esc_attr($style).'" title="'.esc_attr($text).'">'.$content.'</span>';	
	}
	add_shortcode('tooltip_html', 'tooltip_html');
	
	//Button
	function button( $atts, $content = null ) {
	
	extract(shortcode_atts(array(
		'size'		=>	'small',
		'icon'		=>	'',
		'color'		=>	'',
		'style'		=>	''
    ), $atts));
	
   	return '<button class="button '.$size.' '.$style.' '.$color.'" href="'.$url.'">' . do_shortcode($content) . '</button>';
	}

	add_shortcode('button', 'button');

?>