
@if(session()->has('success'))
    <script>
        setTimeout(function(){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.success('{{ session()->get('success') }}');
        }, 1000);
    </script>
@endif

@if(session()->has('error'))
    <script>
        setTimeout(function(){
            // Toggle toastr
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.error('{{ session()->get('error') }}');
        }, 1000);
    </script>
@endif

