<div class="cookie-notice  fixed bottom-0 left-0 right-0 z-20  bg-beige py-3 shadow">
    <div class="container flex flex-col lg:flex-row lg:items-center gap-3">
        <p class="font-medium leading-none pt-1">
            {{ get_field('privacy_banner', 'option') }} <a class="!underline  !decoration-black"
                href=" {{ get_privacy_policy_url() }}">Find
                out more</a>
        </p>
        <div class="ml-auto flex gap-8 ">
            <button class="decline-cookies underline leading-none py-2 pt-3 ">Decline</button>

            <x-button class="accept-cookies !border-lime !pl-8 !font-normal" label="Accept"></x-button>
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
