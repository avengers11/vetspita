@extends('frontend.layout')

@section('title', 'Our Team')

@section('content')
    <div>
        <div class="max-w-screen-2xl mx-auto py-20 grid justify-items-center">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Doctors</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium">Our Outstanding Doctors</h2>
                <p class="text-dark/60 leading-relaxed font-medium max-w-xl">
                    It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.
                </p>
            </div>
            <div class="swiper teamSwiper">
                <div class="swiper-wrapper">
                    @foreach ($members as $item)
                        <div class="swiper-slide">
                            <div class="w-full relative">
                                <img class="h-[500px] w-full object-cover object-top shadow-lg"
                                    src="{{ Storage::url($item->image) }}" alt="">
                                <div
                                    class="absolute w-full h-full top-0 left-0 bg-transparent hover:bg-light/80 transition-all duration-500 grid place-items-center group">
                                    <a href="{{ route('teamProfile', $item) }}"
                                        class="bg-secondary group-hover:scale-100 scale-0 delay-100 origin-center hover:bg-secondary_dark text-light duration-300 transition-all block text-center px-8 py-3 uppercase tracking-widest"
                                        href="">
                                        View Profile
                                    </a>
                                </div>
                            </div>
                            <div class="py-6 text-center">
                                <h3 class="text-xl font-semibold mb-2 tracking-wide">{{ $item->name }}</h3>
                                <p class="text-dark/60 font-medium text-sm uppercase tracking-wider">
                                    {{ $item->designation }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
@endsection
