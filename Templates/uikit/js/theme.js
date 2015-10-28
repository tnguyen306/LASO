/* ============================================================================
  - Description : Theme utility functions
============================================================================= */
// UTILS
// -------------------------------------------------
var htmlMap = {"&": "&amp;","<": "&lt;",">": "&gt;",'"': '&quot;',"'": '&#39;',"/": '&#x2F;'};

function toJsonFormat(str) {
  str = str.replace(/([a-zA-Z0-9]+?):/g, '"$1":');
  str= str.replace(/:(?!true|false)([a-zA-Z]+)/g, ':"$1"');
  str = str.replace(/'/g, '"');
  return str;
}

function jsonify(str) {
  str = toJsonFormat(str);
  return jQuery.parseJSON(str);
}

function escapeHtml(string) {
  return String(string).replace(/[&<>"'\/]/g, function (s) {
    return htmlMap[s];
  });
}

// PRELOADER
// -------------------------------------------------
$(window).load(function() {
  $('.page-preloader .anim').fadeOut(); 
  $('.page-preloader').fadeOut();
  $('body').delay(350).queue(function() {
    $(this).removeClass("preload");
  });
})


$().ready(function() {

  // NAV TOGGLER
  // -------------------------------------------------
  var $toggleEl = $(".nav-top");
  var triggerH = $toggleEl.height();
  var $navBlock = $(".nav-block");
  
  function autoToggleNav() {
    if($(window).width() > 767 ) {
      if (window.scrollY > triggerH) {
        //toggleEl.hide();
        $navBlock.addClass("top-close");
      } else {
        //toggleEl.show();
        $navBlock.removeClass("top-close");
      }
    }
  }
  
  autoToggleNav();
  
  $(window).scroll(function() {
    autoToggleNav();
  });
  
  // rare moments when switching between screens
  $(window).resize(function() {
    if($(window).width() < 767 ) {
      //toggleEl.hide();
    } else {
      //toggleEl.show();
    }
  });
  
  // SCROLLER
  // -------------------------------------------------
  var navH = $(".nav-main").height();
  
  $('.scroll-to, .navbar-nav a').click(function(e){
    var link = $(this).attr('href');
    $(link).ScrollTo({
      offsetTop: navH,	
    });
  });
  
  $('body').scrollspy({
    offset: navH
  });

  // WOW
  // -------------------------------------------------
  new WOW().init();
  
  // PRETTY PHOTO
  // -------------------------------------------------
  $("a[data-gal^='prettyPhoto']").prettyPhoto({hook:'data-gal'});
  
  // CODE FORMATTER
  // -------------------------------------------------
  $(".format-code").each(function() {
    var cleanHtml = escapeHtml($(this).html());
    $(this).html(cleanHtml);
  });
  
  $(".hl-code").each(function(i, block) {
    hljs.highlightBlock(block);
  });
  
  // UL TOGGLE
  // -------------------------------------------------
  $( ".ul-toggle li" ).click(function() {
    $(this).toggleClass('active').find("ul").toggle( "slow");

  });
  
});

// PRODUCT TOGGLE
// -------------------------------------------------
function changeView(view) {
  switch (view) {
    case "grid":
    $('.product-grid').removeClass('listview');
    $('.product-grid > div').removeClass('reset-col');
    break;
    case "list":
    $('.product-grid').addClass('listview');
    $('.product-grid > div').addClass('reset-col');
    break;
  }
}

