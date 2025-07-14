<div class="block  wp-block {{ $block->classes }} {{ $block->style == 'alternative' ? 'bg-teal text-beige' : 'bg-mint' }}
{{ $block->block->align !== 'full' ? 'md:px-12' : '' }} overflow-hidden  relative py-12 md:py-16 not-prose"
    style="{{ $block->inlineStyle }}">

    <div class=" flex items-end container  !mx-0 lg:!mx-auto  relative   ">
        <div>
            <a href="{{ $link }}">
                <h2 class="type-xl mb-2">
                    {{ $heading }}</h2>
            </a>
            <div class="flex flex-row gap-8">

                @foreach ($contact_details as $contact)
                    <div class="flex flex-row items-center gap-2">
                        @if ($contact['icon'])
                            <div class="rounded-full bg-white p-1">
                                @svg($contact['icon'], 'w-6 h-6')
                            </div>
                        @endif
                        @if ($contact['text'] ?? false)
                            <div class="prose">
                                {!! Str::of($contact['text'])->replace(
                                        '[tel]',
                                        '<a class="!underline font-semibold" href="tel:' .
                                            get_field('company_phone', 'option') .
                                            '">' .
                                            get_field('company_phone', 'option') .
                                            '</a>',
                                    )->replace(
                                        '[email]',
                                        '<a class="!underline font-semibold" href="mailto:' .
                                            get_field('company_email', 'option') .
                                            '">' .
                                            get_field('company_email', 'option') .
                                            '</a>',
                                    ) !!}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <a href="{{ $link }}"
            class="ml-auto mr-4 inline-block duration-500 group-hover:translate-x-4 transition rounded-full bg-black p-3 md:p-4">
            @svg('arrow-right', ' text-lime block w-8 h-8 lg:w-12 lg:h-12')
        </a>
    </div>

    @if ($block->style == 'alternative')
        <svg xmlns="http://www.w3.org/2000/svg" class="absolute bottom-0 right-2/3 w-2/3 h-auto pointer-events-none"
            viewBox="0 0 288.24 111.46">
            <path fill="none" stroke="#eff2e2" stroke-miterlimit="10" stroke-width=".18"
                d="M.08 38.04S13.59 3.34 47.79.25c62.44-5.66 69.27 145.29 133.45 94.98 60.5-47.43 106.93 16.19 106.93 16.19" />
        </svg>
    @endif
</div>
