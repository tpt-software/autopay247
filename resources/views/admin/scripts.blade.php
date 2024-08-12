<script src="{{ asset('assets/admin/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/libs/popper/popper.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
<script src="{{ asset('assets/admin/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/admin/js/main.js')}}"></script>
<script src="{{ asset('assets/admin/js/search.js')}}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/admin/js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
