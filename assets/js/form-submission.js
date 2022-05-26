$('#gform').on('submit', function(e) {
    $('#gform *').fadeOut(200);
    $('#gform').prepend('Your submission has been processed...');
    });