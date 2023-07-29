"use strict";

// Class definition
const KTUsersAddPermission = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_add_permission');
    const form = element.querySelector('#kt_modal_add_permission_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    const initAddPermission = () => {

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        const validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Nome de variável é obrigatório!'
                            },
                            stringLength: {
                                max: 100,
                                min: 3,
                                message: 'O nome de variável não pode ter menos de 3, nem mais do que 100 carateres.',
                            },
                        }
                    },
                    'display_name': {
                        validators: {
                            notEmpty: {
                                message: 'Nome da permissão é obrigatório!'
                            },
                            stringLength: {
                                max: 100,
                                min: 3,
                                message: 'O nome de permissão não pode ter menos de 3, nem mais do que 100 carateres.',
                            },
                        }
                    },
                    'description': {
                        validators: {
                            stringLength: {
                                max: 100,
                                min: 3,
                                message: 'A descrição não pode ter menos de 3, nem mais do que 100 carateres.',
                            },
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                    })
                }
            }
        );

        // Close button handler
        const closeButton = element.querySelector('[data-kt-permissions-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Tem a certeza que pretende sair?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, tenho!",
                cancelButtonText: "Não, cancela!",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    validator.resetForm();
                    modal.hide(); // Hide modal
                }
            });
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-permissions-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Tem a certeza que pretende cancelar?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, tenho!",
                cancelButtonText: "Não, volta atrás!",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    validator.resetForm();
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "O formulário foi cancelado!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, entendido!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-permissions-modal-action="submit"]');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        Swal.fire({
                            text: "Tem a certeza que pretende criar a Permissão?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Sim, tenho!",
                            cancelButtonText: "Não, volta atrás!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then(function (result) {
                            if (result.value) {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');

                                // Disable button to avoid multiple click
                                submitButton.disabled = true;

                                // Submits the form
                                form.submit();
                            }  else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "O formulário não foi enviado!",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, entendido!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    }
                                });
                            }
                        });
                    } else {
                        // Show popup warning. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Foram detetados erros, por favor, corrija-os e tente novamente.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, entendido!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });
    }

    return {
        // Public functions
        init: function () {
            initAddPermission();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddPermission.init();
});
