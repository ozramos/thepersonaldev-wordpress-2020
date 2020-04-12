import 'superfish'

(($, wp) => {
  // Superfish
  $('.desktop-main-menu-wrap ul.menu').superfish()
  
  // Hamburger
  $('.mobile-main-menu-hamburger').click(function () {
    $('body').toggleClass('mobile-main-menu-is-open')
  })

  // Submenu expand
  $('.mobile-main-menu-wrap .menu-item-has-children > a').click(function () {
    $(this).parent().toggleClass('sub-menu-visible')
    return false
  })
})(window.jQuery, window.wp)