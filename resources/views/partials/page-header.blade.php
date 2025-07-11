<div class="wp-block  bg-beige mb-8 overflow-hidden relative py-16 not-prose">
    <div class="container">

        <div
            class=" relative items-center flex flex-col-reverse  gap-8 lg:gap-12 xl:gap-16 2xl:gap-24 lg:grid lg:grid-cols-2">
            <div class="">
                <h1 class="type-2xl type-underlined mb-6  md:mb-8 ">
                    {!! $title !!}</h1>
                <div class=" max-w-md">{!! get_the_excerpt() !!}</div>

            </div>
            {!! get_the_post_thumbnail(null, 'landscape', [
                'sizes' => ' (min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                'class' => 'w-full h-auto lg:mt-4  ',
            ]) !!}
        </div>
    </div>
</div>
