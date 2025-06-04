@if ($show_filter)
    <div class="bg-beige alignfull py-8">
        <div>

            @if ($_GET['search'] ?? false)
                <div class=" wp-block justify-between mx-auto items-center flex ">
                    <div class="type-lg">Search results</div>
                    <div class="inline-flex overflow-hidden rounded-full border border-teal">
                        <h3 class="text-center pt-3 pb-2 p-2 px-4  ">Articles containing
                            "{{ $_GET['search'] }}"</h3>

                        <a aria-label="Clear search" href="{{ get_permalink(get_option('page_for_posts')) }}"
                            class="bg-teal focus-visible:outline-2  -outline-offset-2 outline-teal focus-within:bg-white focus-within:text-teal text-white px-4 pt-3 pb-2  ">
                            @svg('x', 'w-6 h-6')
                        </a>
                    </div>
                </div>
            @elseif($_GET['category'] ?? false)
                <div class=" wp-block justify-between mx-auto items-center flex ">

                    <div class="type-lg">Search results</div>
                    <div class="inline-flex overflow-hidden rounded-full border border-teal">

                        <h3 class="  text-center pt-3 pb-2 p-2 px-4 ">Articles of category
                            "{{ get_term($_GET['category'])->name }}"
                        </h3>

                        <a aria-label="Clear search" href="{{ get_permalink(get_option('page_for_posts')) }}"
                            class="bg-teal focus-visible:outline-2  -outline-offset-2 outline-teal focus-within:bg-white focus-within:text-teal text-white px-4 pt-3 pb-2  ">
                            @svg('x', 'w-6 h-6')</a>
                    </div>
                </div>
            @else
                <form action="{{ get_permalink(get_option('page_for_posts')) }}" class=" wp-block mx-auto"
                    method="GET">

                    <div class="flex justify-between items-center">
                        <label for="resource-search" class="sr-only">Search news</label>
                        <div class="flex flex-grow">
                            <input name="search" type="search"
                                class=" bg-white focus-visible:outline-2  -outline-offset-2 outline-teal py-2 pl-4 pr-0 text-lg  w-full max-w-xs"
                                placeholder="Search by article title..." id="news-search" />
                            <button type="submit"
                                class="bg-teal focus-visible:outline-2  -outline-offset-2 outline-teal focus-within:bg-white focus-within:text-teal text-white px-4 py-2 text-lg  ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 4.5a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5zM16.5 16.5l4.5 4.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="relative ml-auto">
                            <select onchange="this.form.submit()"
                                class="max-w-xs appearance-none focus-visible:outline-2  -outline-offset-2 outline-teal border bg-white border-beige px-4 py-2 pr-8 text-lg lg:pr-12"
                                name="category">
                                <option value="">All categories</option>

                                @foreach ($categories as $key => $category)
                                    <option {{ $category->term_id == ($_GET['category'] ?? null) ? 'selected' : null }}
                                        value="{{ $category->term_id }}">
                                        {!! $category->name !!}</option>
                                @endforeach
                            </select>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                stroke-width="1.5" class="pointer-events-none absolute right-3 top-3 h-6 w-6"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endif

<div class="wp-block {{ $block->classes }} {{ $block->block->align ? 'container' : null }} {{ $image ? 'flex gap-8 xl:gap-12' : null }} {{ $image && $block->block->align === 'full' ? ' xl:gap-8 ' : null }} {{ $block->block->align ? 'lg:flex-row' : '' }} flex-col not-prose relative z-10 mx-auto my-16 2xl:my-24"
    style="{{ $block->inlineStyle }}">
    @if ($image)
        <div class="hidden lg:block overflow-hidden w-full lg:basis-1/2 relative">
            {!! wp_get_attachment_image($image, 'square', false, [
                'sizes' => ' (min-width: 1200px) 40vw, (min-width: 800px) 55vw, 75vw',
                'class' => 'inset-0 absolute w-full h-full object-cover object-center',
            ]) !!}
        </div>
    @endif
    <div class="lg:basis-1/2 px-8 pt-12 pb-4">

        @if ($title)
            <h2 class="type-2xl mb-12">{{ $title }}</h2>
        @endif

        <div class="max-w-4xl gap-6 mb-16 divide-y border-b border-b-lime divide-lime">
            @forelse ($news as $post)
                <x-post-card :post="$post" :large="!$image" :show_image="$show_image" :show_excerpt="$show_excerpt" />
            @empty
                <div class="text-center py-24 bg-beige">
                    <p class="text-lg">No news articles found.</p>
                </div>
            @endforelse
        </div>

        <div class="max-w-4xl text-center">
            @if ($read_more_link)
                <a class="!underline  underline-offset-8 font-semibold" href="{{ $read_more_link['url'] }}"
                    target="{{ $read_more_link['target'] }}">{{ $read_more_link['title'] }}
                </a>
            @endif
        </div>
    </div>
</div>
