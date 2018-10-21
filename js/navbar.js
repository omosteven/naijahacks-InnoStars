$(function navbar () {
  $('[data-toggle="overlayNav"]').each(function () {
    let $target = $($(this).data('target'));
    if ($target) {
      $target.find('.overlay-navigation-close').on('click', function () {
        $target.removeClass('show');
      })
      $(this).on('click', function () {
        $target.addClass('show');
      })
    }
  })
});