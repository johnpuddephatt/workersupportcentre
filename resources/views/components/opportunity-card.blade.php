  <a href="{{ get_permalink($opportunity->ID) }}"
      class="group relative flex  w-full items-center overflow-hidden rounded-small bg-beige p-4 !no-underline md:p-8">

      <div class="flex-1">

          <h3 class="type-lg mb-4 !mt-0 !text-black">{{ $opportunity->post_title }}
          </h3>

          <div class="flex flex-col !font-normal md:flex-row md:items-center md:gap-3">
              @if (get_field('deadline', $opportunity->ID))
                  <div class="flex items-center gap-2">
                      <span class="inline-block -mt-0.5  rounded-full bg-black p-1">
                          <x-heroicon-o-calendar class="h-5 w-5 text-white" />
                      </span>
                      <span class="">Closing date:</span>

                      {{ date(get_option('date_format'), strtotime(get_field('deadline', $opportunity->ID))) }}

                  </div>
              @endif

          </div>

      </div>
      <span
          class="ml-auto lg:mr-4 inline-block duration-500 group-hover:translate-x-4 transition rounded-full bg-lime p-2.5 group-hover:bg-lime">
          @svg('arrow-right', ' block size-6 lg:size-10')
      </span>
  </a>
