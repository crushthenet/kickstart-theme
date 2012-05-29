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
	
	// Tabs
	
	function tab_group( $atts, $content ){
	$GLOBALS['tab_count'] = 0;
	
	do_shortcode( $content );
	
	if( is_array( $GLOBALS['tabs'] ) ){
	foreach( $GLOBALS['tabs'] as $tab ){
	$tabs[] = '<li><a class="" href="#">'.$tab['title'].'</a></li>';
	$panes[] = '<div class="pane"><h3>'.$tab['title'].'</h3>'.$tab['content'].'</div>';
	}
	$return = "\n".'<!-- the tabs --><ul class="tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" --><div class="panes">'.implode( "\n", $panes ).'</div>'."\n";
	}
	return $return;
	}
	add_shortcode( 'tabgroup', 'tab_group' );
	
	function tabs( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d'
	), $atts));
		
	$t = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$t] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );
	
	$GLOBALS['tab_count']++;
	}
	add_shortcode( 'tab', 'tabs' );
	
	// Toggle
	function toggle_acc( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'title' => '',
	'style' => 'list'
	    ), $atts));
	output;
	$output .= '<div class="'.$style.'"><p class="trigger"><a href="#">' .$title. '</a></p>';
	$output .= '<div class="toggle_container"><div class="block">';
	$output .= do_shortcode($content);
	$output .= '</div></div></div>';
	
	return $output;
	}
	add_shortcode('toggle', 'toggle_acc');

?>