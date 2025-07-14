@extends('frontend.layout')

@section('title', 'Image Gallery')

@section('content')
    <div id="image_gallery" class="bg-gray-100">
        <div class="max-w-screen-2xl mx-auto py-20 grid justify-items-center">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Gallery</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium">Image Gallery</h2>
                <p class="text-dark/60 leading-relaxed font-medium max-w-xl">
                    It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.
                </p>
            </div>


            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                @foreach ($gallery as $image)
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ Storage::url($image->file) }}" alt="">
                    </div>
                @endforeach
                {{-- <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.cessnalifeline.com/media/imagegallery/template/Ct_Scan.jpeg" alt="">
                </div> --}}
                {{-- <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.cessnalifeline.com/media/imagegallery/template/Laser.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.cessnalifeline.com/media/imagegallery/template/Physio.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.cessnalifeline.com/media/imagegallery/template/Dog_waiting_area.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.cessnalifeline.com/media/imagegallery/template/treatment_area.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.cessnalifeline.com/media/imagegallery/template/inpatient_area.jpeg" alt="">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg"
                        src="https://www.cessnalifeline.com/media/imagegallery/template/Ct_scan_Dr.Ramesh.jpeg" alt="">
                </div> --}}
            </div>

        </div>
    </div>
@endsection
