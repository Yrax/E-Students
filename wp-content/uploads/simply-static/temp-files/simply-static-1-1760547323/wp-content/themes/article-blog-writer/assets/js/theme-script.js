function article_blog_writer_openNav() {
  jQuery(".sidenav").addClass('show');
}
function article_blog_writer_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function article_blog_writer_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const article_blog_writer_nav = document.querySelector( '.sidenav' );

      if ( ! article_blog_writer_nav || ! article_blog_writer_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...article_blog_writer_nav.querySelectorAll( 'input, a, button' )],
        article_blog_writer_lastEl = elements[ elements.length - 1 ],
        article_blog_writer_firstEl = elements[0],
        article_blog_writer_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && article_blog_writer_lastEl === article_blog_writer_activeEl ) {
        e.preventDefault();
        article_blog_writer_firstEl.focus();
      }

      if ( shiftKey && tabKey && article_blog_writer_firstEl === article_blog_writer_activeEl ) {
        e.preventDefault();
        article_blog_writer_lastEl.focus();
      }
    } );
  }
  article_blog_writer_keepFocusInMenu();
} )( window, document );

var article_blog_writer_btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    article_blog_writer_btn.addClass('show');
  } else {
    article_blog_writer_btn.removeClass('show');
  }
});

article_blog_writer_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

window.addEventListener('load', (event) => {
  jQuery(".loading").delay(2000).fadeOut("slow");
});

// for toggle 
jQuery(document).ready(function ($) {
  const toggleBtn = $('#toggleButton');

  toggleBtn.on('click', function () {
    $('body').toggleClass('dark-theme');
    $(this).toggleClass('active');
  });
});

jQuery(document).ready(function() {
    var owl = jQuery('.banner-post .owl-carousel');
    owl.owlCarousel({
    margin: 0,
    nav:false,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 5000,
    loop: true,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      576: {
        margin: 0,
        items: 1
      },
      768: {
        items: 1
      },
      1000: {
        items: 1
      },
      1200: {
        items: 1
      }
    },
    autoplayHoverPause : false,
    mouseDrag: true
  });
});