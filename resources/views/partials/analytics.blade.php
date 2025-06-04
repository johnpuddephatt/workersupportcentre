<script async src="https://www.googletagmanager.com/gtag/js?id={{ $analytics }}"></script>

<script>
    if (localStorage.getItem('cookiesAccepted') === 'true') {
        window.dataLayer = window.dataLayer || [];

        console.log('Google Analytics loaded:', '{{ $analytics }}');

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '{{ $analytics }}');
    }
</script>
