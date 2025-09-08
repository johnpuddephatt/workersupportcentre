<div class="ml-8 max-lg:right-8 max-md:right-4 max-lg:absolute max-md:top-26 max-lg:top-28" id="google_translate_element">
</div>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout
                .HORIZONTAL,
            includedLanguages: {!! get_field('google_translate_languages', 'option')
                ? '"' . get_field('google_translate_languages', 'option') . '"'
                : '"en,fr,de,es,it,nl,pt,ru,zh-CN,ja,ko"' !!},


        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

<style>
    #google_translate_element {
        width: 11em;
    }

    .goog-te-gadget {
        font-size: 1rem;
        color: inherit;
        font-family: inherit;
        width: 11rem;
        overflow: hidden;
        margin-top: -0.5rem;
    }

    .goog-te-gadget+.goog-te-gadget {
        display: none;
    }

    .goog-te-gadget>span {
        display: none;
    }

    .goog-te-gadget-simple {
        border: none !important;
        font-size: 1rem;
        color: black;
        font-family: inherit;
        padding: 0.6rem 1.5rem;
        border-radius: 5px;
    }

    .goog-te-combo {
        width: 11rem;
        font-family: inherit;
        font-size: 0.95rem;
        margin: 0 0 0 !important;
        border: 1px solid #ccc;
        padding: 0 0.5rem;
    }

    .goog-te-gadget-simple::before {
        content: "Translate this site";
        font-weight: 600;
        color: inherit;
        font-family: inherit;
    }

    .goog-te-gadget-simple * {
        display: none;
    }
</style>
