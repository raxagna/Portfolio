$('#gform').on('submit', function(e) {
    forms = document.querySelectorAll('.php-email-form')
    forms.querySelector('.sent-message').classList.add('d-block');
    });