<x-frontend.layout>
    @section('title','Details')
     <!-- Hero -->
     <section id="heroSection" class="container relative max-w-screen-xl pt-10 pb-24 bg-slate-900">
        <div class="flex flex-wrap items-center justify-between w-full gap-8">
            <div class="w-full max-w-[400px] flex flex-col gap-4">
                <div class="inline-flex gap-[6px] items-center bg-amber-400 rounded-full px-4 py-[6px] w-max">
                    <img src="{{ asset('assets/svgs/ic-champion-cup.svg') }}" alt="tickety-assets">
                    <p class="text-sm font-semibold text-dark-indigo">
                        The Best Cinema
                    </p>
                </div>
                <h1 class="text-[36px] md:text-[48px] text-white font-bold">
                    XXI <br>
                    <span
                        class="text-slate-200 bg-slate-700 rounded-xl inline-flex items-center h-[49px] w-max text-[30px]">Your Favorite Cinema</span>
                    
                </h1>
                <div class="mt-[14px]">
                    <a href="#eventSection" class="btn btn-outline">
                        Explore Now
                    </a>
                </div>
            </div>

            <img src="{{ asset('assets/images/gambar-1.jpg') }}" class="max-w-[584px] max-h-[400px] w-full h-full rounded-xl"
                alt="tickety-assets">
        </div>
    </section>
     <!-- Wavy line ornament -->
     <img src="{{ asset('assets/svgs/wavy-line-1.svg') }}" class="absolute -z-10 md:top-[160px] w-full"
     alt="tickety-assets">

    <!-- Event Section -->
    <section id="eventSection" class="container relative max-w-screen-xl py-10 bg-slate-900">
        <!-- Section Header -->
        <div class="flex justify-between items-center gap-4 mb-[50px]">
            <h5 class="text-[24px] md:text-[38px] font-bold text-white">
                <span class="text-slate-600">Choose</span> Your Favorite <br>
                <span class="text-slate-600">Movie</span>
            </h5>

            @if (!request()->has('all_events'))
        <a href="{{ request()->fullUrlWithQuery(['all_events' => 1]) }}" class="btn btn-outline btn-success">
          View All
        </a>
      @endif
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
            @foreach ($events as $event)
                <x-frontend.card-event :cover="$event->thumbnail" :title="$event->name" :isPopular="$event->is_popular" :icon="$event->icon" :category="$event->category->name"
                    :date="$event->start_time" :price="$event->start_from" :description="$event->headline" :route="route('detail', $event->slug)">
                </x-frontend.card-event>
            @endforeach
        </div>
    </section>
</x-frontend.layout>
