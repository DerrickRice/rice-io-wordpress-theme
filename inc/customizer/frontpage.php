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
}
add_action( 'customize_register', 'perfect_portfolio_customize_register_frontpage' );
