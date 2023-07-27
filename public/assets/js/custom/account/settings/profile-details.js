"use strict";

// Class definition
const KTAccountSettingsProfileDetails = function () {
    // Private variables
    let form;
    let submitButton;
    let validation;
    let avatarSize;

    // Private functions
    const initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    avatar: {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png',
                                type: 'image/jpg,image/jpeg,image/png',
                                maxSize: avatarSize,
                                message: 'O avatar tem um tamanho máximo de ' + formatBytes(avatarSize) + '.',
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                    })
                }
            }
        );
    }


    const handleForm = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function (status) {
                if (status == 'Valid') {


                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Tem a certeza que pretende atualizar seu Perfil?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Sim, tenho!",
                        cancelButtonText: "Não, cancela",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function (result) {
                        if (result.value) {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');
                            // Disable button
                            submitButton.disabled = true;
                            // updates the user
                            form.submit();
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text:"Utilizador não foi atualizado.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, entendido!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });

                } else {
                    swal.fire({
                        text: "Foram detetados alguns erros no formulário, por favor, corrija-os e tente novamente.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, entendido!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';

        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

        const i = Math.floor(Math.log(bytes) / Math.log(k));

        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_profile_update_form');
            submitButton = form.querySelector('#kt_profile_update_form_submit');
            avatarSize = document.getElementById('avatar_size').innerText;

            initValidation();
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsProfileDetails.init();
});
