{{-- $block->block->align  --}}

<div class="wp-block bg-beige alignfull  overflow-hidden relative py-16 not-prose">
    <div class="container">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 191.87 185.09"
            class="absolute right-1/2 top-1/2 translate-x-16 translate-y-8 w-1/3">
            <path fill="none" stroke="#caeb61" stroke-miterlimit="10" stroke-width=".5"
                d="M.5 185.08C-6.02 50.26 119.37 169.13 115.02 83.6 111.12 6.82 191.85.25 191.85.25" />
        </svg>
        <div class=" relative flex flex-col-reverse lg:items-center gap-8 lg:gap-12 xl:gap-24 lg:grid lg:grid-cols-2">
            <div class="">
                <a href="{{ get_permalink(get_option('page_for_resources')) }}">Resources </a>
                <h1 class="type-2xl type-underlined mb-6  md:mb-8  !decoration-black">
                    {{ get_the_title() }}</h1>

            </div>

        </div>
    </div>
</div>

<div class="container py-16">
    <div class="prose xl:prose-lg">
        {!! get_field('content') !!}
    </div>
</div>

@if ($file_uploads || $external_links || $file_oembeds)
    <div class="bg-beige bg-opacity-50 pb-16 pt-4 lg:pb-32">

        <div class="container">

            @if (count($file_oembeds))

                <h2 class="mb-8 mt-12 type-2xl">Videos &amp; media</h2>

                <div class="flex flex-col gap-8">
                    @foreach ($file_oembeds as $file_oembed)
                        @if ($file_oembed && isset($file_oembed['embed']))
                            <div class="max-w-3xl bg-white overflow-hidden rounded-lg">
                                <div class="embedded-iframe  aspect-[2] relative">
                                    {!! $file_oembed['embed'] !!}
                                </div>
                                {{-- @if (isset($file_oembed['label']))
                                    <p class="bg-white px-4 py-4 text-xl font-bold leading-tight">
                                        {{ $file_oembed['label'] }}</p>
                                @endif --}}
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            @if (count($file_uploads))

                <h2 class="mb-8 mt-12  type-2xl">Downloads</h2>

                <div class="flex flex-col gap-4">

                    @foreach ($file_uploads as $file_upload)
                        <x-file-card :href="$file_upload['file']['url']" :title="$file_upload['title']" :subtitle="$file_upload['subtitle']" :size="$file_upload['file']['filesize']"
                            :extension="explode('.', $file_upload['file']['filename'])[1]" />
                    @endforeach
                </div>
            @endif

            @if (count($external_links))

                <h2 class="mb-8 mt-12 type-2xl">Links</h2>

                <div class="flex max-w-4xl flex-col gap-4">
                    @foreach ($external_links as $external_link)
                        @if (isset($external_link['url']) && isset($external_link['title']))
                            <x-link-card :href="$external_link['url']" :title="$external_link['title']" :subtitle="$external_link['subtitle']" />
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endif
