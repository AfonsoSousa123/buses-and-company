"use strict";

// Class definition
const KTProjectUsers = function () {

    const initTable = function () {
        // Set date data order
        const table = document.getElementById('kt_project_users_table');

        if (!table) {
            return;
        }

        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[5].innerHTML, "D MMM, YYYY").format();
            dateRow[5].setAttribute('data-order', realDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        const datatable = $(table).DataTable({
            "info": false,
            'order': [],
            "columnDefs": [{
                "targets": [6, 7],
                "orderable": false
            }]
        });

        // Search --- official docs reference: https://datatables.net/reference/api/search()
        const filterSearch = document.querySelector('[name="name"]');
        if (filterSearch) {
            filterSearch.addEventListener('keyup', function (e) {
                datatable.search(e.target.value).draw();
            });
        }
    }

    // Public methods
    return {
        init: function () {
            initTable();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTProjectUsers.init();
});
