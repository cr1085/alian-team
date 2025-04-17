<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function relationship_coach_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'relationship-coach', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'relationship_coach_theme_setup', 100 );

function relationship_coach_styles() {
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];

    wp_enqueue_style( 'coachpress-lite', get_template_directory_uri()  . '/style.css', array( 'animate' ) );
    wp_enqueue_style( 'relationship-coach', get_stylesheet_directory_uri() . '/style.css', array( 'coachpress-lite' ), $version );

}
add_action( 'wp_enqueue_scripts', 'relationship_coach_styles', 10 );

function relationship_coach_customize_script(){
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];

    wp_enqueue_script( 'relationship-coach-customize', get_stylesheet_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), $version, true );

}
add_action( 'customize_controls_enqueue_scripts', 'relationship_coach_customize_script' );


function relationship_coach_customizer_register( $wp_customize ) {

    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel              = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority           = 10;
    $wp_customize->get_section( 'background_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority = 15;

    $wp_customize->get_setting('primary_font')->default   = array(                                         
        'font-family' => 'Lato',
        'variant'     => 'regular',
    );
    $wp_customize->get_setting('secondary_font')->default      = 'Jost';
    $wp_customize->get_setting('tertiary_font')->default       = 'Waterfall';
    
    if( coachpress_lite_is_wheel_of_life_activated() ){
        $wp_customize->get_setting( 'wheeloflife_color' )->default = '#d6e8ed';
    }
    
	
	/** Header Layout Settings */
    $wp_customize->add_section(
        'header_layout_settings',
        array(
            'title'    => __( 'Header Layout', 'relationship-coach' ),
            'priority' => 10,
            'panel'    => 'layout_settings',
        )
    );
    
    /** Header layout */
    $wp_customize->add_setting( 
        'header_layout', 
        array(
            'default'           => 'four',
            'sanitize_callback' => 'coachpress_lite_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new CoachPress_Lite_Radio_Image_Control(
            $wp_customize,
            'header_layout',
            array(
                'section'     => 'header_layout_settings',
                'label'       => __( 'Header Layout', 'relationship-coach' ),
                'description' => __( 'Choose the layout of the header for your site.', 'relationship-coach' ),
                'choices'     => array( 
                    'one'   => get_stylesheet_directory_uri() . '/images/header/one.jpg',
                    'four'  => get_stylesheet_directory_uri() . '/images/header/four.jpg',
                )
            )
        )
    );

    /** Static Banner Layout Settings */
    $wp_customize->add_section(
        'cta_static_banner_layout_settings',
        array(
            'title'    => __( 'CTA Static Banner Layout', 'relationship-coach' ),
            'priority' => 30,
            'panel'    => 'layout_settings',
        )
    );
    
    $wp_customize->add_setting( 
        'cta_static_banner_layout', 
        array(
            'default'           => 'five',
            'sanitize_callback' => 'coachpress_lite_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
        new CoachPress_Lite_Radio_Image_Control(
            $wp_customize,
            'cta_static_banner_layout',
            array(
                'section'     => 'cta_static_banner_layout_settings',
                'label'       => __( 'CTA Static Banner Layout', 'relationship-coach' ),
                'description' => __( 'Choose the layout of the cta static banner for your site.', 'relationship-coach' ),
                'choices'     => array(
                    'one'   => get_stylesheet_directory_uri() . '/images/static_banner/cta_one.jpg',
                    'five' => get_stylesheet_directory_uri() . '/images/static_banner/cta_five.jpg',
                )
            )
        )
    );

    $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'coachpress_lite_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new CoachPress_Lite_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Load Google Fonts Locally', 'relationship-coach' ),
                'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'relationship-coach' )
            )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'coachpress_lite_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new CoachPress_Lite_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Preload Local Fonts', 'relationship-coach' ),
                'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'relationship-coach' ),
                'active_callback' => 'coachpress_lite_ed_localgoogle_fonts'
            )
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'relationship-coach' ); ?></span>
        
        <input type="button" class="button button-primary relationship-coach-flush-local-fonts-button" name="relationship-coach-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'relationship-coach' ); ?>" />
    <?php
    $relationship_coach_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'relationship-coach' ),
            'section'       => 'typography_settings',
            'description'   => $relationship_coach_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'coachpress_lite_ed_localgoogle_fonts'
        )
    );

    $wp_customize->add_setting(
        'header_contact_button',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'header_contact_button',
        array(
            'label'         => __( 'Header Contact Button', 'relationship-coach' ),
            'description'   => __( 'This button shows only on header layout 2.', 'relationship-coach' ),
            'section'       => 'header_settings',
            'type'          => 'text',
        )
    );

    $wp_customize->add_setting(
        'header_contact_url',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw', 
        )
    );
    
    $wp_customize->add_control(
        'header_contact_url',
        array(
            'label'     => __( 'Header Contact Button', 'relationship-coach' ),
            'section'   => 'header_settings',
            'type'      => 'url',
        )
    );
}
add_action( 'customize_register', 'relationship_coach_customizer_register', 40 );

/**
 * Form 
*/
function relationship_coach_contact_button(){ 
    $header_contact_button = get_theme_mod( 'header_contact_button' );
    $header_contact_url = get_theme_mod( 'header_contact_url' );
    if( $header_contact_button && $header_contact_url ) : ?>
        <div class="button-wrap">
            <a href="<?php echo esc_url( $header_contact_url ); ?>" class="btn-readmore btn-two"><?php echo esc_html( $header_contact_button ); ?></a>
        </div>
    <?php
    endif;
}

/**
 * Parents Function
 */
require get_stylesheet_directory() . '/inc/parent-functions.php'; 
