<div class="wp-block bg-beige alignfull  overflow-hidden relative py-16 not-prose">
    <div class="container alignwide">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 191.87 185.09"
            class="absolute right-1/2 top-1/2 translate-x-16 translate-y-8 w-1/3">
            <path fill="none" stroke="#caeb61" stroke-miterlimit="10" stroke-width=".5"
                d="M.5 185.08C-6.02 50.26 119.37 169.13 115.02 83.6 111.12 6.82 191.85.25 191.85.25" />
        </svg>
        <div
            class=" relative flex flex-col-reverse justify-between lg:items-center gap-8 lg:gap-12 xl:gap-24 lg:flex-row">
            <div class="">
                <div>{{ get_the_date() }}</div>
                <h1 class="type-2xl type-underlined mb-6  md:mb-8  !decoration-orange">
                    {{ get_the_title() }}</h1>

                @php
                    global $post;
                @endphp
                @if ($post->post_excerpt)
                    <div class="type-lg max-w-md">
                        {!! $post->post_excerpt !!}
                    </div>
                @endif

            </div>
            @if (has_post_thumbnail())
                {!! get_the_post_thumbnail(null, 'square', ['class' => ' rounded-full w-64 h-auto']) !!}
            @endif

        </div>
    </div>
</div>
<div class="container alignwide  ">

    <div class="py-16 pb-40 prose post-content max-w-none lg:border-r lg:border-r-lime xl:prose-lg">

        @php(the_content())

    </div>

</div>
