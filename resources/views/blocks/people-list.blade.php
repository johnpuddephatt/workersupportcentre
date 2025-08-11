<div class="wp-block my-8 lg:my-16 {{ $block->classes }}" style="{{ $block->inlineStyle }}">
    @if ($title)
        <h2 class="type-2xl text-center mb-12">{{ $title }}</h2>
    @endif

    @if ($people)
        @if ($block->style == 'grid')
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($people as $person)
                    <div class="flex flex-col">
                        <div class="overflow-hidden size-28 lg:size-32 rounded-full">
                            @if (has_post_thumbnail($person->ID))
                                {!! get_the_post_thumbnail($person->ID, 'square', [
                                    'class' =>
                                        'h-32 object-center !my-0 block w-32 group-hover:scale-105 ease-in-out transition-transform duration-1000',
                                ]) !!}
                            @else
                                <div class="size-28 lg:size-32 bg-beige">
                                </div>
                            @endif
                        </div>
                        <h3 class="type-lg mt-4">{{ $person->post_title }}</h3>
                        <div class="font-normal">{{ get_field('role_title', $person->ID) }}</div>

                    </div>
                @endforeach
            </div>
        @else
            <div class="">
                @foreach ($people as $person)
                    <details x-data="{ open: false }">
                        <summary @click="console.log(open);open = !open" style="font-size: 1em !important;"
                            class="not-prose group relative flex flex-row items-center gap-2 !pt-4 !pb-4 p-4 pr-24 transition md:gap-4 md:p-6">

                            <div class="flex-none size-28 lg:size-32  overflow-hidden rounded-full">
                                @if (has_post_thumbnail($person->ID))
                                    {!! get_the_post_thumbnail($person->ID, 'square', [
                                        'class' =>
                                            ' h-auto !my-0 block size-28 lg:size-32 object-cover  group-hover:scale-105 ease-in-out transition-transform duration-1000',
                                    ]) !!}
                                @else
                                    <div class="size-28 lg:size-32 bg-beige ">

                                    </div>
                                @endif
                            </div>

                            <div class="py-2">
                                <h3 class="type-lg ">{{ $person->post_title }}</h3>
                                <div class="font-normal">{{ get_field('role_title', $person->ID) }}</div>
                            </div>

                            {{-- <div class="ml-auto rounded-full bg-white bg-opacity-60 p-4 transition group-hover:bg-opacity-100">
              <x-icon.plus x-show="!open" class="h-6 w-6 text-blue" />
              <x-icon.minus x-show="open" class="h-6 w-6 text-blue" />
            </div> --}}
                        </summary>

                        <div class="p-4 pt-0 md:p-6 prose">
                            {!! $person->post_content !!}
                        </div>
                    </details>
                @endforeach
            </div>
        @endif
    @endif
</div>
