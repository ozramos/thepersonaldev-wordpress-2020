import 'superfish'

(($, wp) => {
  $('.desktop-main-menu-wrap ul.menu').superfish()
  
  $('.mobile-main-menu-hamburger').click(function () {
    $('body').toggleClass('mobile-main-menu-is-open')
  })
})(window.jQuery, window.wp)