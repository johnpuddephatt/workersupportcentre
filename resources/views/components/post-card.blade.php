@props(['post', 'show_image' => true, 'show_excerpt' => true, 'variant' => 'default', 'large' => false])

<a href="{{ get_permalink($post->ID) }}"
    class="not-prose group relative py-8 flex gap-4 flex-row items-center  overflow-hidden">
    @if ($show_image ?? false)
        <div class="w-28 {{ $large ? 'lg:w-36' : null }} max-w-[30%] flex-none overflow-hidden rounded-full">
            {!! get_the_post_thumbnail($post->ID, 'square', [
                'sizes' => '25vw',
                'class' => ' aspect-square h-full w-full object-cover transition duration-1000 group-hover:scale-105',
            ]) !!}
        </div>
    @endif

    <div class="flex-1 ">
        <div class="flex gap-2 items-end">
            <div>
                <div class="mb-2 text-sm font-bold leading-snug">
                    {{ get_the_date(null, $post->ID) }}</div>

                <h3 class="type-lg">{{ $post->post_title }}
                </h3>
            </div>
            <span
                class="ml-auto mr-4 inline-block duration-500 group-hover:translate-x-4 transition rounded-full bg-lime p-2.5 {{ $large ? 'translate-y-1/2' : null }} {{ $variant === 'default' ? 'group-hover:bg-lime' : 'group-hover:bg-teal' }}">
                @svg('arrow-right', ' block w-6 h-6' . ($large ? ' lg:w-12 lg:h-12 ' : null))
            </span>
        </div>
        @if ($show_excerpt)
            <p class="mt-3  hidden max-w-md md:block">{!! wp_trim_words(get_the_excerpt($post->ID), 15) !!}</p>
        @endif

    </div>

</a>
