"use strict";

// Class definition
const KTSearchHorizontal = function () {
    let form = document.querySelector('#emprestimos_search');
    let searchButton = document.querySelector('#search-submit-btn');

    const handleAdvancedSearchToggle = function () {
        let link = document.querySelector('#kt_horizontal_search_advanced_link');

        link.addEventListener('click', function (e) {
            e.preventDefault();

            if (link.innerHTML === "Pesquisa Avançada") {
                link.innerHTML = "Fechar Pesquisa Avançada";
            } else {
                link.innerHTML = "Pesquisa Avançada";
            }
        })
    }

    const initDatepicker = function() {
        // Data de Levantamento
        let fieldDate = $(form.querySelector('[name="field_date"]'));
        fieldDate.flatpickr({
            enableTime: false,
            dateFormat: "d, M Y",
        });
    }

    const handleSearchButton = function() {
        searchButton.addEventListener('click', function (e) {
            // Show loading indication
            searchButton.setAttribute('data-kt-indicator', 'on');
            setTimeout(function(){
                searchButton.removeAttribute('data-kt-indicator');
            },2000);
        });
    }

    // Public methods
    return {
        init: function () {
            handleSearchButton();
            initDatepicker();
            handleAdvancedSearchToggle();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTSearchHorizontal.init();
});
