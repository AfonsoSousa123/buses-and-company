"use strict";

// Class definition
const KTSigninGeneral = function() {
    // Elements
    let form;
    let submitButton;
    let validator;

    // Handle form
    const handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'username': {
                        validators: {
                            notEmpty: {
                                message: 'É necessário preencher o nome de utilizador!'
                            }
                        }
                    },
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'É necessário preencher a password!'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        // Handle form submit
        submitButton.addEventListener('click', function (e) {
            // Prevent button default action
            e.preventDefault();

            // Validate form
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click
                    submitButton.disabled = true;

                    // submits the form
                    form.submit();
                } else {
                    submitButton.disabled = false;
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Existem alguns erros detectados!!!",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, continuar!",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    });
                }
            });
        });
    }

    // Public functions
    return {
        // Initialization
        init: function() {
            form = document.querySelector('#kt_sign_in_form');
            submitButton = document.querySelector('#kt_sign_in_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTSigninGeneral.init();
});
