
jQuery(document).ready(function($){

    $('#header-r .head-search-form').hide();
    $('#header-r .header-search > .search-toggle-btn').click(function(e){
        $(this).siblings('.head-search-form').slideToggle();
        e.stopPropagation();
    });
    $('#header-r .head-search-form').click(function(e){
        e.stopPropagation();
    });

    $(window).click(function(){
        $('.head-search-form').slideUp();
    });

    $('#header-r .toggle-btn').click(function(e){
        $('body').addClass('menu-toggled');
        e.stopPropagation();
    });
    $('#header-r .menu-wrap').click(function(e){
        e.stopPropagation();
    });
    $(window).click(function(e){
        $('body').removeClass('menu-toggled');
    });

    $('#site-header .main-navigation .toggle-button').click(function(){
        $('body').removeClass('menu-toggled');
    });

    $('.main-navigation ul li.menu-item-has-children').append('<span><i class="fa fa-angle-down"></i></span>');
    $('.main-navigation ul li ul').hide();
    $('.main-navigation ul li span').on('click', function(){
        $(this).siblings('ul').slideToggle();
    });

    var winWidth = $(window).width();
    $(window).scroll(function(){
        if($(this).scrollTop() > 200) {
            $('.back-to-top').addClass('show');
        }
        else{
            $('.back-to-top').removeClass('show');
        }
    });

    $('.back-to-top').click(function(){
        $('html, body').animate({
            scrollTop:0
        }, 1000);
    });

    if( $('.widget_rrtc_description_widget').length ){
        $('.description').each(function(){
            var psw = new PerfectScrollbar('.widget_rrtc_description_widget .rtc-team-holder-modal .text-holder .description');
        });
    }

    if( $('#header-r .menu-wrap').length ){
        var psw = new PerfectScrollbar('.menu-wrap');
    }

    var $grid = $('.article-wrap.grid').imagesLoaded( function() {
          $grid.isotope({
            itemSelector: '.post',
            percentPosition: true,
            gutter: 10,
            masonry: {
              columnWidth: '.grid-sizer'
            }
          });
        });
}); //document close
