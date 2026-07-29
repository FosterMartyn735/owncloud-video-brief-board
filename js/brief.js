(function (OC, $) {
  'use strict';

  $(document).ready(function () {
    var $form = $('#video-brief-form');
    var $status = $('#video-brief-status');

    $form.on('submit', function (event) {
      event.preventDefault();
      $status.removeClass('error success').text('Saving brief...');

      $.ajax({
        url: OC.generateUrl('/apps/video_brief_board/briefs'),
        method: 'POST',
        data: $form.serialize(),
      }).done(function (response) {
        $status.addClass('success').text('Saved to ' + response.path);
      }).fail(function (xhr) {
        var response = xhr.responseJSON || {};
        $status.addClass('error').text(response.error || 'The brief could not be saved.');
      });
    });
  });
})(OC, jQuery);
