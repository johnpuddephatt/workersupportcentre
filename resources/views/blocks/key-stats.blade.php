<div class="mx-auto container wp-block {{ $block->block->align == 'full' ? 'alignwide' : '!max-w-6xl' }}  relative py-16 lg:py-24 not-prose"
    style="{{ $block->inlineStyle }}">

    <div class="relative">
        <div class="flex gap-8 flex-col lg:flex-row">
            <div class="flex-1">
                <h2
                    class="type-2xl  text-balance text-center {{ $block->block->align ? 'mb-8 lg:mb-20 ' : 'mb-6 md:mb-8' }}">
                    {{ $heading }}</h2>

            </div>

        </div>

        <div>
            <div class="flex flex-col lg:flex-row  justify-center lg:mt-24 gap-8 lg:gap-24 xl:gap-32">
                @foreach ($stats as $stat)
                    <div class="basis-[100%]">

                        <div
                            class="mx-auto size-48 flex items-center justify-center flex-col bg-teal p-4 text-center rounded-full lg:-mt-24 mb-4">
                            <h3 class="text-6xl font-black mt-2 antialiased tracking-tighter text-white leading-none">
                                {{ $stat['number'] }}</h3>
                            </h3>

                        </div>

                        <div class="text-center font-bold prose max-w-xs mx-auto lg:max-w-xl">
                            {!! $stat['description'] !!}
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>

</div>
