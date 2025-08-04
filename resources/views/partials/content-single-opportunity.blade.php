  <div class="relative w-full overflow-hidden pb-72 pt-32">

      <div class="container flex flex-col-reverse gap-4 pb-4 lg:flex-row lg:items-end">
          <div class="relative z-10 lg:w-1/2">
              <a href="{{ get_permalink(get_option('page_for_opportunities')) }}" class="type-md mb-4 text-blue">Careers
                  &rsaquo;
              </a>
              <h1 class="type-2xl mb-4 text-blue-dark">{{ $post->post_title }}</h1>
              <div class="flex flex-col gap-1 md:flex-row md:gap-4">
                  @if (get_field('deadline', $post->ID))
                      <div class="flex items-center">
                          <span class="mr-1 inline-block rounded-full bg-black p-1 md:mr-2">
                              <x-heroicon-o-calendar class="h-5 w-5 text-white" />
                          </span>
                          <div class="type-sm">
                              Closing date:
                              {{ date(get_option('date_format') . ', ' . get_option('time_format'), strtotime(get_field('deadline', $post->ID))) }}
                          </div>
                      </div>
                  @endif

                  @if (get_field('salary', $post->ID))
                      <div class="flex items-center">
                          <span class="mr-1 inline-block rounded-full bg-black p-1 md:mr-2">
                              <x-heroicon-o-currency-pound class="h-5 w-5 text-white" />
                          </span>
                          <div class="type-sm">
                              Salary: {{ get_field('salary', $post->ID) }}
                          </div>
                      </div>
                  @endif
              </div>
          </div>

      </div>

      <div class="container relative flex flex-col items-start justify-between gap-8 lg:flex-row-reverse lg:gap-16">

          <div class=" w-full bg-black text-white p-8 lg:w-1/2 lg:max-w-md">
              <h3 class="type-lg">Key information</h3>
              <ul class="mt-4 list-inside list-disc space-y-2">
                  @if (get_field('location', $post->ID))
                      <li>Location: {{ get_field('location', $post->ID) }}</li>
                  @endif
                  @if (get_field('salary', $post->ID))
                      <li>
                          Salary: {{ get_field('salary', $post->ID) }}</li>
                  @endif
                  @if (get_field('deadline', $post->ID))
                      <li>Closing date:
                          {{ date(get_option('date_format') . ', ' . get_option('time_format'), strtotime(get_field('deadline', $post->ID))) }}
                      </li>
                  @endif
                  @if (get_field('interview_date', $post->ID))
                      <li>Interview date: {{ get_field('interview_date', $post->ID) }}</li>
                  @endif
                  @if (get_field('hours', $post->ID))
                      <li>Hours: {{ get_field('hours', $post->ID) }}</li>
                  @endif
                  @if (get_field('contract_type', $post->ID))
                      <li>Contract: {{ get_field('contract_type', $post->ID) }}</li>
                  @endif
              </ul>
              @if (get_option('page_for_applications'))
                  <div class="mt-8 text-center">
                      <x-button class="bg-white !px-16" label="Apply here" :url="get_permalink(get_option('page_for_applications')) . '?job_id=' . $post->ID" />
                  </div>
              @endif
          </div>

          <div class="prose pt-4 lg:pt-8 max-w-none lg:w-1/2">
              {{ the_content($post->ID) }}
          </div>

      </div>

  </div>
