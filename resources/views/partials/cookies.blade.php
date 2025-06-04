<div class="cookie-notice border-t fixed bottom-0 left-0 right-0 z-20 border-black bg-beige py-6 shadow">
    <div class="container flex items-center gap-3">
        <p class="font-medium">
            {{ get_field('privacy_banner', 'option') }} <a class="underline" href=" {{ get_privacy_policy_url() }}">Find
                out more</a>
        </p>
        <div class="ml-auto flex flex-col-reverse gap-1 md:flex-row">
            <button
                class="decline-cookies is-light block rounded-small border-2 border-blue-bright px-6 py-2 font-semibold !no-underline transition duration-300 hover:bg-green hover:bg-opacity-20">Decline</button>
            <button
                class="accept-cookies block rounded-small border-2 border-blue-bright bg-blue-bright px-12 py-2 font-semibold text-white !no-underline transition duration-300 hover:bg-green">Accept</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cookieNotice = document.querySelector('.cookie-notice');
        const acceptButton = document.querySelector('.accept-cookies');
        const declineButton = document.querySelector('.decline-cookies');

        if (localStorage.getItem('cookiesAccepted') === 'true') {
            cookieNotice.style.display = 'none';
        }

        acceptButton.addEventListener('click', function() {
            localStorage.setItem('cookiesAccepted', 'true');
            cookieNotice.style.display = 'none';
            window.location.reload(false);
        });

        declineButton.addEventListener('click', function() {
            localStorage.setItem('cookiesAccepted', 'false');
            cookieNotice.style.display = 'none';
        });
    });
</script>
