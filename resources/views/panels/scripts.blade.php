<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<link rel="stylesheet" href="{{ asset(mix('js/scripts/extensions/ext-component-toastr.js')) }}" />

@livewireScripts

<script type="text/javascript">
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14, height: 14
            });
        }
    })

    window.addEventListener('flash-msg', event => {

        let title = event.detail.type.charAt(0).toUpperCase() + event.detail.type.slice(1) + '!'

        toastr[event.detail.type](event.detail.message, title),
        toastr.options = {
            "closeButton": true,
        }
    });
</script>
@stack('page-script')
<!-- END: Page JS-->
