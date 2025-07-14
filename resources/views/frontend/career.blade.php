@extends('frontend.layout')

@section('title', 'Career')

@section('content')
    <div id="career">
        <div class="max-w-screen-2xl mx-auto py-20">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Career</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium">Our Vacancies</h2>
                <p class="text-dark/60 leading-relaxed font-medium max-w-xl">
                    It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.
                </p>
            </div>
            <div class="space-y-5">
                @foreach ($careers as $career)
                    <div>
                        <div class="career-card px-5 py-4 shadow-lg border rounded-md">
                            <h2 class="text-lg font-semibold pb-3 border-b mb-3">{{ $career->name }}</h2>
                            <div class="text-sm space-y-2 mb-3">
                                <p><span class="font-semibold">Location:</span> {{ $career->address }}</p>
                                <p><span class="font-semibold">Vacancy:</span> {{ $career->vacancy }}</p>
                            </div>
                            <div
                                class="career-description text-sm description overflow-hidden max-h-0 transition-all ease-linear delay-0 duration-1000">
                                {!! $career->details !!}</div>
                            <div class="flex gap-2 mt-3">
                                <button type="button"
                                    class="career-toggle-btn read-more-btn text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                    Read more
                                </button>
                                <a href="{{ $career->form_url }}"
                                    class="apply-now-btn bg-secondary border-secondary transition-all duration-300 uppercase hover:bg-secondary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                                    Apply now
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.career-toggle-btn').on('click', function() {
                const card = $(this).closest('.career-card');
                const description = card.find('.career-description');
                const isCollapsed = description.css('max-height') === '0px';

                if (isCollapsed) {
                    description.css('max-height', 'max-content'); // Adjust max-height as needed
                    $(this).text('Read less');
                } else {
                    description.css('max-height', '0px');
                    $(this).text('Read more');
                }
            });
        });
    </script>
@endpush
