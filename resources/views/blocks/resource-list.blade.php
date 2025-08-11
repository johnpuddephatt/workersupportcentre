<div class="bg-beige alignfull py-8">
    <div>

        @if ($_GET['search'] ?? false)
            <div class=" wp-block justify-between mx-auto items-center flex ">
                <div class="type-lg">Search results</div>
                <div class="inline-flex overflow-hidden rounded-full border border-teal">
                    <h3 class="text-center pt-3 pb-2 p-2 px-4  ">Resources containing
                        "{{ $_GET['search'] }}"</h3>

                    <a aria-label="Clear search" href="{{ get_permalink() }}"
                        class="bg-teal focus-visible:outline-2  -outline-offset-2 outline-teal focus-within:bg-white focus-within:text-teal text-white px-4 pt-3 pb-2  ">
                        @svg('x', 'w-6 h-6')
                    </a>
                </div>
            </div>
        @elseif($_GET['type'] ?? false)
            <div class=" wp-block justify-between mx-auto items-center flex flex-col lg:flex-row gap-4">

                <div class="type-lg">Search results</div>
                <div class="inline-flex overflow-hidden rounded-full border border-teal">

                    <div class="  text-center pt-3 pb-2 p-2 px-4 ">
                        "{{ get_term($_GET['type'])->name }}"
                    </div>

                    <a aria-label="Clear search" href="{{ get_permalink() }}"
                        class="bg-teal focus-visible:outline-2  -outline-offset-2 outline-teal focus-within:bg-white focus-within:text-teal text-white px-4 pt-3 pb-2  ">
                        @svg('x', 'w-6 h-6')</a>
                </div>
            </div>
        @else
            <form action="{{ get_permalink() }}" class=" px-4 wp-block mx-auto" method="GET">

                <div class="flex flex-col gap-4 lg:flex-row lg:justify-between lg:items-center">
                    <label for="resource-search" class="sr-only">Search resources</label>
                    <div class="flex flex-grow">
                        <input name="search" type="search"
                            class=" bg-white focus-visible:outline-2  -outline-offset-2 outline-teal py-2 pl-4 pr-0 text-lg  w-full max-w-xs"
                            placeholder="Search by resource title..." id="resource-search" />
                        <button type="submit"
                            class="bg-teal focus-visible:outline-2  -outline-offset-2 outline-teal focus-within:bg-white focus-within:text-teal text-white px-4 py-2 text-lg  ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.25 4.5a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5zM16.5 16.5l4.5 4.5" />
                            </svg>
                        </button>
                    </div>
                    <div class="relative ">
                        <select onchange="this.form.submit()"
                            class="w-full lg:max-w-xs appearance-none focus-visible:outline-2  -outline-offset-2 outline-teal border bg-white border-beige px-4 py-2 pr-8 text-lg lg:pr-12"
                            name="type">
                            <option value="">All types</option>

                            @foreach ($types as $key => $type)
                                <option {{ $type->term_id == ($_GET['type'] ?? null) ? 'selected' : null }}
                                    value="{{ $type->term_id }}">
                                    {!! $type->name !!}</option>
                            @endforeach
                        </select>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="1.5"
                            class="pointer-events-none absolute right-3 top-3 h-6 w-6" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>

<div class="wp-block px-4 my-8 lg:my-16 {{ $block->classes }}" style="{{ $block->inlineStyle }}">
    @forelse ($resources as $resource)
        <x-resource-card :resource="$resource" />
    @empty
        <div class=" text-center py-24  bg-beige p-8">
            No resources found.
        </div>
    @endforelse
</div>
