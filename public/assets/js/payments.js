// Add this to your blade or a JS file
$(document).on('submit', '.ajax-stk-pay', function(e) {
    e.preventDefault();
    var $form = $(this);
    $.ajax({
        url: $form.attr('action'),
        method: 'POST',
        data: $form.serialize(),
        success: function(response) {
            // Check for Safaricom response codes
            if(response.ResponseCode === "0" || response.ResponseDescription === "Success. Request accepted for processing") {
                alert('STK Push sent! Check your phone to complete payment.');
            } else {
                alert('STK Push failed: ' + (response.errorMessage || response.ResponseDescription || 'Unknown error'));
            }
        },
        error: function(xhr) {
            alert('Error: ' + (xhr.responseJSON.message || 'Could not initiate payment.'));
        }
    });
});