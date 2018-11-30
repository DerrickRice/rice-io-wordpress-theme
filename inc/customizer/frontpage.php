<?php
/**
 * Perfect Portfolio Front Page Settings
 *
 * @package Perfect_Portfolio
 */

function perfect_portfolio_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'Front Page Settings', 'perfect-portfolio' ),
            'description' => __( 'Customize About, Gallery, Services, Call To Action, Latest Posts, settings.', 'perfect-portfolio' ),
        ) 
    );

    /** Blog Section */
    $wp_customize->add_section(
        'blog_section',
        array(
            'title'    => __( 'Blog Section', 'perfect-portfolio' ),
            'priority' => 77,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Blog Options */
    $wp_customize->add_setting(
        'ed_blog_section',
        array(
            'default'           => true,
            'sanitize_callback' => 'perfect_portfolio_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Perfect_Portfolio_Toggle_Control(
            $wp_customize,
            'ed_blog_section',
            array(
                'label'       => __( 'Enable Blog Section', 'perfect-portfolio' ),
                'description' => __( 'Enable to show blog section.', 'perfect-portfolio' ),
                'section'     => 'blog_section',
            )            
        )
    );

    /** Blog title */
    $wp_customize->add_setting(
        'blog_section_title',
        array(
            'default'           => __( 'Articles', 'perfect-portfolio' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_title',
        array(
            'section' => 'blog_section',
            'label'   => __( 'Blog Title', 'perfect-portfolio' ),
            'type'    => 'text',
        )
    );

    // Selective refresh for blog title.
    $wp_customize->selective_refresh->add_partial( 'blog_section_title', array(
        'selector'            => '.article-section .tc-wrapper h2.section-title',
        'render_callback'     => 'perfect_portfolio_blog_section_title_selective_refresh',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
    ) );
    
    /** View All Label */
    $wp_customize->add_setting(
        'blog_view_all',
        array(
            'default'           => __( 'View All', 'perfect-portfolio' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_view_all',
        array(
            'label'           => __( 'View All Label', 'perfect-portfolio' ),
            'section'         => 'blog_section',
            'type'            => 'text',
            'active_callback' => 'perfect_portfolio_blog_view_all_ac'
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'blog_view_all', array(
        'selector' => '.article-section .tc-wrapper .btn-readmore',
        'render_callback' => 'perfect_portfolio_get_blog_view_all_btn',
    ) ); 
    /** Blog Section Ends **/
        
}
add_action( 'customize_register', 'perfect_portfolio_customize_register_frontpage' );
