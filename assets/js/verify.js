(function () {
    "use strict";

    let forms = document.querySelectorAll('.php-email-form');

    $('#gform').on('submit', function (e) {

        let thisForm = this;
        
        thisForm.querySelector('.loading').classList.add('d-block');
        thisForm.querySelector('.error-message').classList.remove('d-block');
        thisForm.querySelector('.sent-message').classList.remove('d-block');

        let formData = new FormData(thisForm);

        php_email_form_submit(thisForm, formData);

    });

    function php_email_form_submit(thisForm, action, formData) {
        try {
            data => {
                thisForm.querySelector('.loading').classList.remove('d-block');
                if (data.trim() == 'OK') {
                    thisForm.querySelector('.sent-message').classList.add('d-block');
                    thisForm.reset();
                } else {
                    throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action);
                }
            }
        }
        catch (error) {
            displayError(thisForm, error);
        }
    }

    function displayError(thisForm, error) {
        thisForm.querySelector('.loading').classList.remove('d-block');
        thisForm.querySelector('.error-message').innerHTML = error;
        thisForm.querySelector('.error-message').classList.add('d-block');
    }

})();
