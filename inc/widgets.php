<?php
/**
 * Perfect Portfolio Widget Areas
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Perfect_Portfolio
 */

function perfect_portfolio_widgets_init(){
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'perfect-portfolio' ),
            'id'          => 'sidebar',
            'description' => __( 'Default Sidebar', 'perfect-portfolio' ),
        ),
    );

    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
            'name'          => esc_html( $sidebar['name'] ),
            'id'            => esc_attr( $sidebar['id'] ),
            'description'   => esc_html( $sidebar['description'] ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title" itemprop="name">',
            'after_title'   => '</h2>',
        ) );
    }
}
add_action( 'widgets_init', 'perfect_portfolio_widgets_init' );
