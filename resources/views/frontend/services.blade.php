@extends('frontend.layout')

@section('title', 'Services')

@section('content')
    <div id="services">
        <div class="max-w-screen-2xl mx-auto py-20 px-10">
            <div class="mb-8 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Services</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">Vetspital Services</h2>
                <p class="text-dark/60 leading-relaxed font-medium max-w-xl">
                    It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.
                </p>
            </div>

            <div class="grid justify-center">
                <div class="mb-10 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                        data-tabs-toggle="#default-styled-tab-content"
                        data-tabs-active-classes="text-primary_dark hover:text-primary_dark border-primary_dark"
                        data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                        role="tablist">
                        @foreach ($categories as $category)
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 border-b-2 rounded-t-lg uppercase tracking-wider"
                                    id="{{ $category->id }}-styled-tab" data-tabs-target="#styled-{{ $category->id }}"
                                    type="button" role="tab" aria-controls="{{ $category->id }}"
                                    aria-selected="false">{{ $category->name }}
                                    ({{ $category->services->count() }})
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            @foreach ($categories as $category)
                <div id="default-styled-tab-content">
                    <div class="hidden p-4 rounded-lg" id="styled-{{ $category->id }}" role="tabpanel"
                        aria-labelledby="{{ $category->id }}-tab">
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($category->services as $service)
                                <div
                                    class="p-12 bg-white border border-dark/5 shadow-lg flex flex-col space-y-7 hover:shadow-2xl hover:-translate-y-4 transition-all duration-300">
                                    <h5 class="text-2xl font-medium leading-relaxed dark:text-white">
                                        {{ $service->title }}
                                    </h5>
                                    <p class="text-dark/60">unde omnis iste natus error sit volupta accusant dolore
                                        rem aperiam</p>
                                    <div class="h-48 flex-grow w-full overflow-hidden">
                                        <img class="w-full h-full object-cover scale-100 hover:scale-125 transition-all duration-300"
                                            src="{{ Storage::url($service->image) }}" alt="" />
                                    </div>
                                    <div>
                                        <a href="{{ route('serviceDetails', $service) }}"
                                            class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs flex flex-col group w-max gap-1">
                                            <span>read more</span>
                                            <span
                                                class="h-[2px] w-6 bg-primary_dark group-hover:bg-secondary_dark group-hover:w-full transition-all duration-300"></span>
                                        </a>
                                    </div>
                                    {{-- <div class="p-3">
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{ $service->short_description }}</p>
                                        <a href="{{ route('serviceDetails', $service) }}"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center bg-primary transition-all duration-300 rounded-lg hover:bg-secondary hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            Read more
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
