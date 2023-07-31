"use strict";

// Class definition
const KTAppCalendar = function () {
    // Shared variables
    // Calendar variables
    let data = {
        id: '',
        eventName: '',
        eventDescription: '',
        eventLocation: '',
        startDate: '',
        endDate: '',
        allDay: false
    };
    let popover;
    let popoverState = false;

    // Add event variables
    let table;
    let busesName;
    let searchForm;
    let busesDescription;
    let prodYearFlatpickr;
    let prodYearDatepicker;
    let modal;
    let modalTitle;
    let form;
    let validator;
    let addButton;
    let submitButton;
    let cancelButton;
    let closeButton;
    let busesDeleteButtons;
    let sendButton;
    let busesSendForm;
    let allDayToggle;
    let datepickerWrappers;

    // dropzone variables
    let myDropzone
    let image;
    let imageSize;
    let updateButton;
    let newImageBtn;
    let existingImageBtn;
    let list;

    // Init validator
    const initValidator = function initValidator() {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(form, {
            // Set the default locale
            locale: 'pt_PT',
            localization: FormValidation.locales.pt_PT,

            fields: {
                'licence_plate': {
                    validators: {
                        notEmpty: {
                            message: 'Licence Plate is mandatory'
                        },
                        stringLength: {
                            max: 150,
                            min: 3,
                            message: 'Licence Plate cannot be less than 3, nor more than 150 chars.',
                        },
                    }
                },
                'brand_select': {
                    validators: {
                        notEmpty: {
                            message: 'Brand is mandatory'
                        },
                    }
                },
                'model': {
                    validators: {
                        notEmpty: {
                            message: 'Model is mandatory'
                        },
                    }
                },
                'company_select': {
                    validators: {
                        notEmpty: {
                            message: 'Company is mandatory'
                        },
                    }
                },
                'bus_state': {
                    validators: {
                        notEmpty: {
                            message: 'State is mandatory'
                        },
                    }
                },
                'description': {
                    validators: {
                        stringLength: {
                            max: 500,
                            min: 5,
                            message: 'A descrição do evento não pode ter menos de 5, nem mais do que 500 carateres.',
                        },
                    }
                },
                'prod_year': {
                    validators: {
                        notEmpty: {
                            message: 'Production Year is madatory.',
                        },
                        date: {
                            format: 'DD-MM-YYYY',
                            message: 'The production year is invalid.',
                        },
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                }),
            }
        })

        // Select2 validation integration
        $(form.querySelector('[name="brand_select"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('brand_select');
        });
        // Select2 validation integration
        $(form.querySelector('[name="company_select"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('company_select');
        });
        // Select2 validation integration
        $(form.querySelector('[name="bus_state"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('bus_state');
        });
    };

    // Initialize datepickers --- more info: https://flatpickr.js.org/
    const initDatepickers = () => {
        prodYearFlatpickr = flatpickr(prodYearDatepicker, {
            dateFormat: "d-m-Y",
        });

        // startFlatpickr = flatpickr(startDatepicker, {
        //     mode: 'range'
        //     dateFormat: "d-m-Y",
        // });
        //
        // endFlatpickr = flatpickr(endDatepicker, {
        //     dateFormat: "d-m-Y",
        // });
    }

    // Init dropzone
    const initDropzone = () => {
        // set the dropzone container id
        const id = "#kt_upload_image_dropzone";
        const dropzone = document.querySelector(id);

        // set the preview element template
        let previewNode = dropzone.querySelector(".dropzone-item");
        previewNode.id = "";
        let previewTemplate = previewNode.parentNode.innerHTML;
        previewNode.parentNode.removeChild(previewNode);

        myDropzone = new Dropzone(id, { // Make the whole body a dropzone
            url: "null", // Set the url for your upload script location
            method: "post",
            paramName: "image",
            createImageThumbnails: true,
            maxThumbnailFilesize: imageSize,
            withCredentials: false,
            previewTemplate: previewTemplate,
            acceptedFiles: '.jpg, .jpeg',
            uploadMultiple: false,
            maxFiles: 1,
            maxFilesize: imageSize, // Max filesize in MB
            autoProcessQueue: false, // Stop auto upload
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: id + " .dropzone-items", // Define the container to display the previews
            clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
        });

        myDropzone.on("addedfile", function (file) {
            if (file) {
                existingImageBtn.style.display = "none";
            }
            // Hook the file to the image input
            list.items.add(file);
            image.files = list.files;
            // console.log('image', image.files);

            file.previewElement.querySelector(id + " .dropzone-start").onclick = function () {

            };

            const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
            dropzoneItems.forEach(dropzoneItem => {
                dropzoneItem.style.display = '';
            });
            dropzone.querySelector('.dropzone-select').style.display = "none";
            dropzone.querySelector('.dropzone-remove-all').style.display = "inline-block";
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("complete", function (file) {
            const progressBars = dropzone.querySelectorAll('.dz-complete');
            setTimeout(function () {
                progressBars.forEach(progressBar => {
                    progressBar.querySelector('.progress-bar').style.opacity = "0";
                    progressBar.querySelector('.progress').style.opacity = "0";
                    progressBar.querySelector('.dropzone-start').style.opacity = "0";
                });
            }, 200);
        });

        // Setup the button for remove all files
        dropzone.querySelector(".dropzone-remove-all").addEventListener('click', function (file) {
            list.items.remove(file);
            image.files = list.files;

            Swal.fire({
                text: "Tem a certeza que deseja remover a imagem?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim tenho!",
                cancelButtonText: "Não, voltar atrás!",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    dropzone.querySelector('.dropzone-select').style.display = "inline-block";
                    dropzone.querySelector('.dropzone-remove-all').style.display = "none";
                    existingImageBtn.style.display = "inline-flex";
                    myDropzone.removeAllFiles(true);
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "A imagem não foi removida!",
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

        // On all files completed upload
        myDropzone.on("queuecomplete", function (progress) {
            const uploadIcons = dropzone.querySelectorAll('.dropzone-upload');
            uploadIcons.forEach(uploadIcon => {
                uploadIcon.style.display = "none";
            });
        });

        // On all files removed
        myDropzone.on("removedfile", function (file) {
            if (myDropzone.files.length < 1) {
                dropzone.querySelector('.dropzone-select').style.display = "inline-block";
                dropzone.querySelector('.dropzone-remove-all').style.display = "none";
                existingImageBtn.style.display = "inline-flex";
            }
        });
    }

    // Handle add button
    const handleAddButton = () => {
        addButton.addEventListener('click', e => {
            // hidePopovers();
            handleNewEvent();
        });
    }

    // Handle add new event
    const handleNewEvent = () => {
        // Update modal title
        // modalTitle.innerText = "Create Bus";

        const format = (item) => {
            if (!item.id) {
                return item.text;
            }

            let url = item.element.getAttribute('data-kt-select2-image');
            let imgContainer = $('<div >');
            let img = $("<img>", {
                class: "rounded me-2",
                width: 100,
                src: url
            });
            imgContainer.prepend(img);
            let spanContainer = $('<div >');
            let span = $("<span>", {
                text: " " + item.text,
                class: 'text-break'
            });
            spanContainer.prepend(span);

            let container = $('<div class="d-flex flex-row align-items-center">');
            container.prepend(imgContainer);
            container.append(spanContainer);
            return container;
        }

        // // Init Select2 --- more info: https://select2.org/
        // $('#event_images').select2({
        //     templateResult: function (item) {
        //         return format(item);
        //     }
        // });
        //
        // $('#event_images').on('select2:select', function () {
        //     newImageBtn.style.display = "none";
        // });
        //
        // $('#event_images').on('select2:unselect', function () {
        //     newImageBtn.style.display = "inline-flex";
        // });

        modal.show();

        // Select2 validation integration
        $(form.querySelector('[name="brand_select"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('brand_select');
        });
        // Select2 validation integration
        $(form.querySelector('[name="company_select"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('company_select');
        });
        // Select2 validation integration
        $(form.querySelector('[name="bus_state"]')).on('change', function() {
            // Revalidate the color field when an option is chosen
            validator.revalidateField('bus_state');
        });

        // Handle submit form
        submitButton.addEventListener('click', function (e) {
            // Prevent default button action
            e.preventDefault();

            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        // Show popup confirmation
                        Swal.fire({
                            text: "Tem a certeza que pretende criar este Evento?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Sim, cria-o!",
                            cancelButtonText: "Não, volta atrás!",
                            customClass: {
                                confirmButton: "btn btn-light-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then(function (result) {
                            if (result.value) {
                                // Show loading indication
                                submitButton.setAttribute('data-kt-indicator', 'on');
                                submitButton.disabled = true;
                                form.submit(); // Submit form
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: "O Evento não foi criado!.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, entendido!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    }
                                });
                                submitButton.setAttribute('data-kt-indicator', 'off');
                                submitButton.disabled = false;
                            }
                        });
                    } else {
                        // Show popup warning
                        Swal.fire({
                            text: "It looks like you have some errors, fix them and try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, understood!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }
                });
            }
        });
    }

    // Handle delete event
    const handleDeleteEvent = () => {
        busesDeleteButtons.forEach(d => {
            d.addEventListener('click', e => {
                e.preventDefault();

                // Select parent form
                const formDelete = e.target.closest('form');

                Swal.fire({
                    text: "Tem a certeza que pretende remover este Evento?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, tenho!",
                    cancelButtonText: "Não, volta atrás!",
                    customClass: {
                        confirmButton: "btn btn-danger",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        submitButton.disabled = true;
                        formDelete.submit();
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "O Evento não foi apagado!",
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
        });
    }

    // Handle cancel button
    const handleCancelButton = () => {
        // Edit event modal cancel button
        cancelButton.addEventListener('click', function (e) {
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
                    existingImageBtn.style.display = "inline-flex";
                    newImageBtn.style.display = "inline-flex";
                    myDropzone.removeAllFiles(true);
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "O Formulário não foi cancelado!",
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
    }

    // Handle close button
    const handleCloseButton = () => {
        // Edit event modal close button
        closeButton.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                text: "Tem a certeza que pretende cancelar?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Sim, tenho!",
                cancelButtonText: "Não, volta atrás",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form
                    validator.resetForm();
                    existingImageBtn.style.display = "inline-flex";
                    newImageBtn.style.display = "inline-flex";
                    myDropzone.removeAllFiles(true);
                    modal.hide(); // Hide modal
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "O Evento não foi cancelado!",
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
    }

    // Helper functions

    // Reset form validator on modal close
    const resetFormValidator = (element) => {
        // Target modal hidden event --- For more info: https://getbootstrap.com/docs/5.0/components/modal/#events
        element.addEventListener('hidden.bs.modal', e => {
            if (validator) {
            }
        });
    }

    // const handleSearchButton = function() {
    //     let searchButton = document.querySelector('#search-submit-btn');
    //
    //     searchButton.addEventListener('click', function (e) {
    //         // Show loading indication
    //         searchButton.setAttribute('data-kt-indicator', 'on');
    //         setTimeout(function(){
    //             searchButton.removeAttribute('data-kt-indicator');
    //         },2000);
    //     });
    // }

    // Handle action button
    const handleActionButton = () => {
        const buttons = document.querySelectorAll('[data-kt-table-widget-4="expand_row"]');

        buttons.forEach((button, index) => {
            button.addEventListener('click', e => {
                e.stopImmediatePropagation();
                e.preventDefault();

                setTimeout(function () {
                    if (button.classList.contains('active')) {
                        button.classList.remove('active');
                    } else {
                        button.classList.add('active');
                    }
                },100)
            });
        });
    }

    return {
        // Public Functions
        init: function () {
            // Define variables
            table = document.querySelector('#kt_project_users_table');
            let element = document.getElementById('kt_modal_add_buses');

            // forms
            form = element.querySelector('#kt_modal_add_buses_form');
            searchForm = document.getElementById('buses_search');

            // modal
            // modalTitle = form.querySelector('[data-kt-calendar="title"]');
            modal = new bootstrap.Modal(element);

            // inputs
            // datepickerWrappers = form.querySelectorAll('[data-kt-calendar="datepicker"]');
            // busesName = form.querySelector('[name="calendar_buses_name"]');
            // busesDescription = form.querySelector('[name="calendar_buses_description"]');
            prodYearDatepicker = form.querySelector('#kt_datepicker_prod_year');
            imageSize = document.querySelector('#image_size').innerText;

            // buttons
            addButton = document.querySelector('[data-bs-target="#kt_modal_add_buses"]');
            submitButton = form.querySelector('#kt_modal_add_buses_submit');
            cancelButton = form.querySelector('#kt_modal_add_buses_cancel');
            closeButton = element.querySelector('#kt_modal_add_buses_close');
            updateButton = document.getElementById('btn-img-update');
            busesDeleteButtons = document.querySelectorAll('a[data-kt-busesmanager-table-filter="delete_row"]');
            newImageBtn = form.querySelector('#new_image_btn');
            existingImageBtn = form.querySelector('#existing_image_btn');

            list = new DataTransfer();
            image = document.getElementById('image');

            initValidator();
            handleActionButton();
            initDatepickers();
            initDropzone();
            handleAddButton();
            handleDeleteEvent();
            handleCancelButton();
            handleCloseButton();
            // handleSearchButton();
            resetFormValidator(element);
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppCalendar.init();
});
