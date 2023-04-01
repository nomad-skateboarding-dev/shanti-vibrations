<?php

/*	-----------------------------------------------------------------------------------------------
	THEME SUPPORTS
--------------------------------------------------------------------------------------------------- */

function shantivibrationsnsbnsb_setup() {

	add_theme_support( 'wp-block-styles' );

	add_editor_style( 'style.css' );

}
add_action( 'after_setup_theme', 'shantivibrationsnsbnsb_setup' );


/*	-----------------------------------------------------------------------------------------------
	ENQUEUE STYLESHEETS
--------------------------------------------------------------------------------------------------- */

function shantivibrationsnsbnsb_styles() {

	wp_enqueue_style( 'shantivibrationsnsbnsb-styles', get_theme_file_uri( '/style.css' ), array(), wp_get_theme( 'shantivibrationsnsbnsb' )->get( 'Version' ) );

}
add_action( 'wp_enqueue_scripts', 'shantivibrationsnsbnsb_styles' );


/*	-----------------------------------------------------------------------------------------------
	BLOCK PATTERNS
	Register theme specific block pattern categories. The patterns themselves are stored in /patterns/.
--------------------------------------------------------------------------------------------------- */

function shantivibrationsnsbnsb_register_block_patterns() {

	if ( ! function_exists( 'register_block_pattern_category' ) ) return;

	// The block pattern categories included in Shanti Vibrations NSB.
	$shantivibrationsnsbnsb_block_pattern_categories = apply_filters( 'shantivibrationsnsbnsb_block_pattern_categories', array(
		'shantivibrationsnsbnsb-blog'  => array(
			'label'			=> esc_html__( 'Shanti Vibrations NSB Blog', 'shantivibrationsnsbnsb' ),
		),
		'shantivibrationsnsbnsb-cta'  => array(
			'label'			=> esc_html__( 'Shanti Vibrations NSB Call to Action', 'shantivibrationsnsbnsb' ),
		),
		'shantivibrationsnsbnsb-general' => array(
			'label'			=> esc_html__( 'Shanti Vibrations NSB General', 'shantivibrationsnsbnsb' ),
		),
	) );

	// Sort the block pattern categories alphabetically based on the label value, to ensure alphabetized order when the strings are localized.
	uasort( $shantivibrationsnsbnsb_block_pattern_categories, function( $a, $b ) { 
		return strcmp( $a["label"], $b["label"] ); }
	);

	// Register block pattern categories.
	foreach ( $shantivibrationsnsbnsb_block_pattern_categories as $slug => $settings ) {
		register_block_pattern_category( $slug, $settings );
	}

}
add_action( 'init', 'shantivibrationsnsbnsb_register_block_patterns' );


/*	-----------------------------------------------------------------------------------------------
	BLOCK STYLES
	Register theme specific block styles.
--------------------------------------------------------------------------------------------------- */

if ( ! function_exists( 'shantivibrationsnsbnsb_register_block_styles' ) ) :
	function shantivibrationsnsbnsb_register_block_styles() {

		if ( ! function_exists( 'register_block_style' ) ) return;

		// Separator: Angled Separator
		register_block_style( 'core/separator', array(
			'name'  	=> 'shantivibrationsnsbnsb-angled-separator',
			'label' 	=> esc_html__( 'Angled', 'shantivibrationsnsbnsb' ),
		) );

		// Separator: Angled Separator Wide
		register_block_style( 'core/separator', array(
			'name'  	=> 'shantivibrationsnsbnsb-angled-separator-wide',
			'label' 	=> esc_html__( 'Angled Wide', 'shantivibrationsnsbnsb' ),
		) );
		
	}
	add_action( 'init', 'shantivibrationsnsbnsb_register_block_styles' );
endif;
