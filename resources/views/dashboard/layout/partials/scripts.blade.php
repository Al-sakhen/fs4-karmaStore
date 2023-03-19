<!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('dashboard/plugins/toastr/toastr.min.js') }}"></script>
<script>
    @if (session()->has('success'))
        toastr.success("{{ session('success') }}")
    @endif
    @if (session()->has('error'))
        toastr.error("{{ session('error') }}")
    @endif
</script>
@stack('js')
