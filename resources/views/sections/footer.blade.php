<footer class="bg-teal text-white antialiased">

    <div class="container max-w-none py-16 flex items-start justify-between gap-8">
        <x-logo class="w-48 md:w-52 xl:w-64 2xl:w-[17rem]" :mono="true" />
        <div class="w-1/2 max-w-xl">

            <div>
                <p class="type-sm mb-2">{{ get_bloginfo('name') }}</p>
                <p>{{ get_field('company_address', 'options') }}</p>
                <p><a class="text-lime"
                        href="mailto:{{ get_field('company_email', 'options') }}">{{ get_field('company_email', 'options') }}</a>
                    | <a class="text-lime"
                        href="tel:{{ get_field('company_phone', 'options') }}">{{ get_field('company_phone', 'options') }}</a>
                </p>

                <p class="mt-8 type-xs">
                    {{ get_field('company_info', 'options') }}</p>
            </div>

            <div class="flex flex-row items-start gap-2 mt-4 md:mt-8 ">
                @if (get_field('social_media', 'option'))
                    @foreach (get_field('social_media', 'option') as $account)
                        <a rel="noopener" class="inline-block rounded-full bg-white p-2 text-teal"
                            aria-label="{{ $account['Type'] }} link" href="{{ $account['link'] }}" target="_blank">
                            <x-dynamic-component :component="'icon.' . strtolower($account['Type'])" class="mt-4" />
                        </a>
                    @endforeach
                @endif
            </div>

            <nav class="mt-8">
                <ul class="flex flex-row items-center gap-8">
                    @foreach ($footer_navigation as $item)
                        <li>
                            <a class="{{ $item->classes ?? 'text-blue-dark' }} inline-block"
                                href="{{ $item->url }}">{!! $item->label !!}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
</footer>
