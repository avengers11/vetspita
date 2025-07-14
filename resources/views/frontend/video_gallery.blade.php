@extends('frontend.layout')

@section('title', 'Video Gallery')

@section('content')
    <div id="video_gallery" class="bg-gray-100">
        <div class="max-w-screen-2xl mx-auto py-20">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Gallery</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium">Video Gallery</h2>
                <p class="text-dark/60 leading-relaxed font-medium max-w-xl">
                    It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.
                </p>
            </div>
            <div class="grid grid-cols-4 gap-8">
                @foreach ($gallery as $video)
                    <iframe class="w-full h-56" src="{{ $video->file }}" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                    </iframe>
                @endforeach

                {{-- <iframe class="w-full h-56" src="https://www.youtube.com/embed/mVNoS8pZ-CA?si=t2R2eOXjh-x7DHKR"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
                <iframe class="w-full h-56" src="https://www.youtube.com/embed/mVNoS8pZ-CA?si=t2R2eOXjh-x7DHKR"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
                <iframe class="w-full h-56" src="https://www.youtube.com/embed/mVNoS8pZ-CA?si=t2R2eOXjh-x7DHKR"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
                <iframe class="w-full h-56" src="https://www.youtube.com/embed/mVNoS8pZ-CA?si=t2R2eOXjh-x7DHKR"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
                <iframe class="w-full h-56" src="https://www.youtube.com/embed/mVNoS8pZ-CA?si=t2R2eOXjh-x7DHKR"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe> --}}
            </div>

        </div>
    </div>
@endsection
