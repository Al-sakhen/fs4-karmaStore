<script src="{{ asset('front/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
 crossorigin="anonymous"></script>
<script src="{{ asset('front/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('front/js/nouislider.min.js') }}"></script>
<script src="{{ asset('front/js/countdown.js') }}"></script>
<script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('front/js/gmaps.min.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>

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
