<?php
/**
 * Active Callback
 * 
 * @package Perfect_Portfolio
*/

function perfect_portfolio_blog_view_all_ac(){
    $blog = get_option( 'page_for_posts' );
    if( $blog ) return true;
    
    return false; 
}
