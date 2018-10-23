$(function navbar () {
  $('[data-toggle="overlayNav"]').each(function () {
    let $toggler = $(this);
    let $target = $($(this).data('target'));
    if ($target) {
      // $target.find('.overlay-navigation-close').on('click', function () {
      //   $target.removeClass('show');
      //   $toggler.toggleClass('collapsed');
      //   
      // })
      $(this).on('click', function () {
        $target.toggleClass('show');
        $(this).toggleClass('collapsed');
        $('body').toggleClass('show-navbar');
      })
    }
  })
});