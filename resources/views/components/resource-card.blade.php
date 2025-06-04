@props(['resource'])

<div class="not-prose bg-mint my-8 group relative container py-4 flex gap-4 flex-row items-center  overflow-hidden">

    <div class="flex-1 ">

        <h3 class="mt-auto type-xl  mb-2">{{ $resource->post_title }}
        </h3>

        <p class="mt-3  max-w-md ">{!! wp_trim_words(get_the_excerpt($resource->ID), 15) !!}</p>

        <x-button class="mt-8 after:inset-0 after:absolute" label="Read more" :url="get_permalink($resource->ID)" />

    </div>

</div>
