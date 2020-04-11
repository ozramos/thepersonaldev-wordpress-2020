(($, wp) => {
  wp.customize('tpd_navbar_callout_label', (val) => {
    val.bind(newVal => {
      $('.navbar-callout').text(newVal)
    })
  })
})(window.jQuery, window.wp)