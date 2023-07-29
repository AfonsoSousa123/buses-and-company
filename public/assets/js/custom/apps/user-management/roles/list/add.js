"use strict";

// Class definition
const KTUsersAddRole = function () {
    // Shared variables
    let element = document.getElementById('kt_modal_add_role');
    let form = element.querySelector('#kt_modal_add_role_form');
    let modal = new bootstrap.Modal(element);

    // Init add schedule modal
    const initAddRole = () => {
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
                                message: 'Nome do papel é obrigatório!'
                            },
                            stringLength: {
                                max: 100,
                                min: 3,
                                message: 'O nome do papel não pode ter menos de 3, nem mais do que 100 carateres.',
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
                                message: 'É obrigatória a indicação de, pelo menos uma permissão para cada papel!'
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
        const closeButton = element.querySelector('[data-kt-roles-modal-action="close"]');
        closeButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Tem a certeza que pretende sair?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, tenho!",
                cancelButtonText: "Não, volta atrás",
                customClass: {
                    confirmButton: "btn btn-light-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset();
                    validator.resetForm();
                    modal.hide(); // Hide modal
                }
            });
        });

        // Cancel button handler
        const cancelButton = element.querySelector('[data-kt-roles-modal-action="cancel"]');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();

            Swal.fire({
                text: "Tem a certeza que pretende cancelar?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, tenho!",
                cancelButtonText: "Não, volta atrás",
                customClass: {
                    confirmButton: "btn btn-light-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    validator.resetForm();
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Formulário não foi cancelado!.",
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
         const submitButton = element.querySelector('[data-kt-roles-modal-action="submit"]');
         submitButton.addEventListener('click', function (e) {
             // Prevent default button action
             e.preventDefault();

             // Validate form before submit
             if (validator) {
                 validator.validate().then(function (status) {
                     if (status == 'Valid') {
                         Swal.fire({
                             text: "Tem a certeza que pretende submeter o Papel?",
                             icon: "warning",
                             showCancelButton: true,
                             buttonsStyling: false,
                             confirmButtonText: "Sim, tenho!",
                             cancelButtonText: "Não, volta atrás",
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
                                     text: "O formulário não foi enviado!",
                                     icon: "error",
                                     buttonsStyling: false,
                                     confirmButtonText: "Ok, entendido!",
                                     customClass: {
                                         confirmButton: "btn btn-primary",
                                     }
                                 });
                                 // Show loading indication
                                 submitButton.setAttribute('data-kt-indicator', 'off');
                                 // Enable button
                                 submitButton.disabled = false;
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

    // Select all handler
    const handleSelectAll = () =>{
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
            initAddRole();
            handleSelectAll();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddRole.init();
});
