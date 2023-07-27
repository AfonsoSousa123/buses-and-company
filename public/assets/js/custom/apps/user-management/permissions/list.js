"use strict";

// Class definition
const KTUsersPermissionsList = function () {
    // Shared variables
    let datatable;
    let table;

    // Init add schedule modal
    const initPermissionsList = () => {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY").format(); // select date from 2nd column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

         // Init datatable --- more info on datatables: https://datatables.net/manual/
         datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'columnDefs': [
                { orderable: false, targets: 2 }, // Disable ordering on column 2 (assigned)
                { orderable: false, targets: 4 }, // Disable ordering on column 5 (actions)
            ]
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    const handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-permissions-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Delete permission
    const handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-permissions-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent form
                const formDelete = e.target.closest('form');

                // Select parent row
                const parent = e.target.closest('tr');

                // Get permission name
                const permissionName = parent.querySelectorAll('td')[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Tem a certeza que pretende remover a permissão " + permissionName + " ?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, tenho!",
                    cancelButtonText: "Não, cancela",
                    customClass: {
                        confirmButton: "btn fw-bold btn-light-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        formDelete.submit();
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "Permissão " + permissionName + " não foi removida.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, entendido!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Delete permission
    const handleRestoreRows = () => {
        // Select all delete buttons
        const restoreButtons = table.querySelectorAll('[data-kt-permissions-table-filter="restore_row"]');

        restoreButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent form
                const formDelete = e.target.closest('form');

                // Select parent row
                const parent = e.target.closest('tr');

                // Get permission name
                const permissionName = parent.querySelectorAll('td')[0].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Tem a certeza que pretende restaurar a permissão " + permissionName + " ?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, tenho!",
                    cancelButtonText: "Não, cancela",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        formDelete.submit();
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: "Permissão " + permissionName + " não foi restaurada.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, entendido!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }


    return {
        // Public functions
        init: function () {
            table = document.querySelector('#kt_permissions_table');

            if (!table) {
                return;
            }

            initPermissionsList();
            handleSearchDatatable();
            handleDeleteRows();
            handleRestoreRows();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersPermissionsList.init();
});
