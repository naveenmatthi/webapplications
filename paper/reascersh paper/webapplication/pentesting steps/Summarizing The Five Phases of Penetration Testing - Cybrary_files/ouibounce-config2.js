jQuery(function($) {
  "use strict";

    ouibounce($('#js-optin-wrap')[0], {
      // Uncomment the line below if you want the modal to appear every time
      // More options here: https://github.com/carlsednaoui/ouibounce
      //aggressive: true,
      cookieName: 'teamn',
      sitewide: true,
    });

  $("#js-optin-submit").click(function(event) {
    event.preventDefault();

    $(this).val('Subscribing...').prop('disabled');

    var data = {
      'action': 'process_optin_submission',
      'nonce': window.OuibounceVars.nonce,
      'email': $('#js-optin-email').val()
    };

    $.post(window.OuibounceVars.ajaxUrl, data, function(response) {
      console.log('Server returned:', response);

      // Handle the response (take care of error reporting!)
      $('#js-optin-step1').hide().next('#js-optin-step2').show();
    });
  });

  $('.js-optin-close').on('click', function(event) {
    event.preventDefault();
    $('#js-optin-wrap').hide();
  });
});

