"use strict";

// Class definition
const KTUsersUpdatePermissions = function () {
    // Shared variables
    let element = document.getElementById('kt_element_update_role');
    let form = element.querySelector('#kt_update_role_form');


    // Init add schedule modallet
    const initUpdatePermissions = () => {

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
                                message: 'O nome da permissão não pode ter menos de 3, nem mais do que 100 carateres.',
                            },
                        }
                    },
                    'description': {
                        validators: {
                            stringLength: {
                                max: 200,
                                min: 3,
                                message: 'A descrição não pode ter menos de 3, nem mais do que 200 carateres.',
                            },
                        }
                    },
                    'perms[]': {
                        validators: {
                            choice: {
                                min: 1,
                                message: 'É obrigatória a indicação de, pelo menos uma permissão para cada Papel.'
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

        // Submit button handler
        const submitButton = element.querySelector('[data-kt-roles-action="submit"]');
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        Swal.fire({
                            text: "Tem a certeza que pretende atualizar o Papel?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Sim, tenho!",
                            cancelButtonText: "No, volta atrás!",
                            customClass: {
                                confirmButton: "btn btn-light-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then(function (result) {
                            if (result.value) {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');
                                // Disable button
                                submitButton.disabled = true;
                                form.submit(); // Submit form
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "Formulário não foi enviado!.",
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
                            text: "Foram detetados erros no Formulário, por favor, corrija-os e tente novamente.",
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

    // Select all handler
    const handleSelectAll = () => {
        // Define variables
        const selectAll = form.querySelector('#kt_roles_select_all');
        const allCheckboxes = form.querySelectorAll('[type="checkbox"]');

        // Handle check state
        selectAll.addEventListener('change', e => {

            // Apply check state to all checkboxes
            allCheckboxes.forEach(c => {
                c.checked = e.target.checked;
            });
        });
    }

    return {
        // Public functions
        init: function () {
            initUpdatePermissions();
            handleSelectAll();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePermissions.init();
});
