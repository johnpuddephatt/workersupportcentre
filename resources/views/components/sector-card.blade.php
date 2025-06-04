@props(['sector'])

<div class="not-prose bg-beige my-8 group relative container py-4 flex gap-4 flex-row items-center  overflow-hidden">

    <div class="flex-1 ">

        <h3 class="mt-auto type-2xl type-underlined decoration-black mb-2">{{ $sector->post_title }}
        </h3>

        <p class="mt-3  max-w-md ">{!! wp_trim_words(get_the_excerpt($sector->ID), 15) !!}</p>

        <x-button class="mt-8 after:inset-0 after:absolute" label="Read more" :url="get_permalink($sector->ID)" />

    </div>
    <div class="h-full rounded-full w-32 max-w-[30%] flex-none overflow-hidden bg-blue-light md:w-64">
        {!! get_the_post_thumbnail($sector->ID, 'square', [
            'sizes' => '25vw',
            'class' => ' aspect-square h-full w-full object-cover transition duration-1000 group-hover:scale-105',
        ]) !!}
    </div>

</div>
