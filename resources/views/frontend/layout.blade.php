<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include your CSS files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <style>
        input[type=range]::-webkit-slider-thumb {
            pointer-events: all;
            width: 24px;
            height: 24px;
            -webkit-appearance: none;
            /* @apply w-6 h-6 appearance-none pointer-events-auto; */
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/toastr.js'])
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: "Inter", serif;
        }

        .swiper {
            width: 100%;
            height: 100%;
            padding-bottom: 3.5rem;
        }

        .swipe_up-animation {
            animation: swipe_up 0.5s ease-in-out;
        }

        @media screen and (max-width: 768px) {

            html {
                font-size: 80%;
            }
        }

        @media screen and (max-width: 500px) {

            html {
                font-size: 70%;
            }
        }


        @keyframes swipe_up {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0px);
                opacity: 1;
            }
        }
    </style>

</head>

<body class="text-dark overflow-x-hidden">
    <!-- Top Navbar -->
    {{-- <nav class="hidden md:block bg-dark text-sm text-light font-light tracking-wide md:px-20">
        <div class="flex-grow flex justify-between items-center max-w-screen-2xl py-2.5 mx-auto">
            <div class="flex gap-8">
                <div class="flex items-center gap-2">
                    <svg class="fill-light w-5 h-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M16.1007 13.359L15.5719 12.8272H15.5719L16.1007 13.359ZM16.5562 12.9062L17.085 13.438H17.085L16.5562 12.9062ZM18.9728 12.5894L18.6146 13.2483L18.9728 12.5894ZM20.8833 13.628L20.5251 14.2869L20.8833 13.628ZM21.4217 16.883L21.9505 17.4148L21.4217 16.883ZM20.0011 18.2954L19.4723 17.7636L20.0011 18.2954ZM18.6763 18.9651L18.7459 19.7119H18.7459L18.6763 18.9651ZM8.81536 14.7266L9.34418 14.1947L8.81536 14.7266ZM4.00289 5.74561L3.2541 5.78816L3.2541 5.78816L4.00289 5.74561ZM10.4775 7.19738L11.0063 7.72922H11.0063L10.4775 7.19738ZM10.6342 4.54348L11.2346 4.09401L10.6342 4.54348ZM9.37326 2.85908L8.77286 3.30855V3.30855L9.37326 2.85908ZM6.26145 2.57483L6.79027 3.10667H6.79027L6.26145 2.57483ZM4.69185 4.13552L4.16303 3.60368H4.16303L4.69185 4.13552ZM12.0631 11.4972L12.5919 10.9654L12.0631 11.4972ZM16.6295 13.8909L17.085 13.438L16.0273 12.3743L15.5719 12.8272L16.6295 13.8909ZM18.6146 13.2483L20.5251 14.2869L21.2415 12.9691L19.331 11.9305L18.6146 13.2483ZM20.8929 16.3511L19.4723 17.7636L20.5299 18.8273L21.9505 17.4148L20.8929 16.3511ZM18.6067 18.2184C17.1568 18.3535 13.4056 18.2331 9.34418 14.1947L8.28654 15.2584C12.7186 19.6653 16.9369 19.8805 18.7459 19.7119L18.6067 18.2184ZM9.34418 14.1947C5.4728 10.3453 4.83151 7.10765 4.75168 5.70305L3.2541 5.78816C3.35456 7.55599 4.14863 11.144 8.28654 15.2584L9.34418 14.1947ZM10.7195 8.01441L11.0063 7.72922L9.9487 6.66555L9.66189 6.95073L10.7195 8.01441ZM11.2346 4.09401L9.97365 2.40961L8.77286 3.30855L10.0338 4.99296L11.2346 4.09401ZM5.73263 2.04299L4.16303 3.60368L5.22067 4.66736L6.79027 3.10667L5.73263 2.04299ZM10.1907 7.48257C9.66189 6.95073 9.66117 6.95144 9.66045 6.95216C9.66021 6.9524 9.65949 6.95313 9.659 6.95362C9.65802 6.95461 9.65702 6.95561 9.65601 6.95664C9.65398 6.95871 9.65188 6.96086 9.64972 6.9631C9.64539 6.96759 9.64081 6.97245 9.63599 6.97769C9.62634 6.98816 9.61575 7.00014 9.60441 7.01367C9.58174 7.04072 9.55605 7.07403 9.52905 7.11388C9.47492 7.19377 9.41594 7.2994 9.36589 7.43224C9.26376 7.70329 9.20901 8.0606 9.27765 8.50305C9.41189 9.36833 10.0078 10.5113 11.5343 12.0291L12.5919 10.9654C11.1634 9.54499 10.8231 8.68059 10.7599 8.27309C10.7298 8.07916 10.761 7.98371 10.7696 7.96111C10.7748 7.94713 10.7773 7.9457 10.7709 7.95525C10.7677 7.95992 10.7624 7.96723 10.7541 7.97708C10.75 7.98201 10.7451 7.98759 10.7394 7.99381C10.7365 7.99692 10.7335 8.00019 10.7301 8.00362C10.7285 8.00534 10.7268 8.00709 10.725 8.00889C10.7241 8.00979 10.7232 8.0107 10.7223 8.01162C10.7219 8.01208 10.7212 8.01278 10.7209 8.01301C10.7202 8.01371 10.7195 8.01441 10.1907 7.48257ZM11.5343 12.0291C13.0613 13.5474 14.2096 14.1383 15.0763 14.2713C15.5192 14.3392 15.8763 14.285 16.1472 14.1841C16.28 14.1346 16.3858 14.0763 16.4658 14.0227C16.5058 13.9959 16.5392 13.9704 16.5663 13.9479C16.5799 13.9367 16.5919 13.9262 16.6024 13.9166C16.6077 13.9118 16.6126 13.9073 16.6171 13.903C16.6194 13.9008 16.6215 13.8987 16.6236 13.8967C16.6246 13.8957 16.6256 13.8947 16.6266 13.8937C16.6271 13.8932 16.6279 13.8925 16.6281 13.8923C16.6288 13.8916 16.6295 13.8909 16.1007 13.359C15.5719 12.8272 15.5726 12.8265 15.5733 12.8258C15.5735 12.8256 15.5742 12.8249 15.5747 12.8244C15.5756 12.8235 15.5765 12.8226 15.5774 12.8217C15.5793 12.82 15.581 12.8183 15.5827 12.8166C15.5862 12.8133 15.5895 12.8103 15.5926 12.8074C15.5988 12.8018 15.6044 12.7969 15.6094 12.7929C15.6192 12.7847 15.6265 12.7795 15.631 12.7764C15.6403 12.7702 15.6384 12.773 15.6236 12.7785C15.5991 12.7876 15.501 12.8189 15.3038 12.7886C14.8905 12.7253 14.02 12.3853 12.5919 10.9654L11.5343 12.0291ZM9.97365 2.40961C8.95434 1.04802 6.94996 0.83257 5.73263 2.04299L6.79027 3.10667C7.32195 2.578 8.26623 2.63181 8.77286 3.30855L9.97365 2.40961ZM4.75168 5.70305C4.73201 5.35694 4.89075 4.9954 5.22067 4.66736L4.16303 3.60368C3.62571 4.13795 3.20329 4.89425 3.2541 5.78816L4.75168 5.70305ZM19.4723 17.7636C19.1975 18.0369 18.9029 18.1908 18.6067 18.2184L18.7459 19.7119C19.4805 19.6434 20.0824 19.2723 20.5299 18.8273L19.4723 17.7636ZM11.0063 7.72922C11.9908 6.7503 12.064 5.2019 11.2346 4.09401L10.0338 4.99295C10.4373 5.53193 10.3773 6.23938 9.9487 6.66555L11.0063 7.72922ZM20.5251 14.2869C21.3429 14.7315 21.4703 15.7769 20.8929 16.3511L21.9505 17.4148C23.2908 16.0821 22.8775 13.8584 21.2415 12.9691L20.5251 14.2869ZM17.085 13.438C17.469 13.0562 18.0871 12.9616 18.6146 13.2483L19.331 11.9305C18.2474 11.3414 16.9026 11.5041 16.0273 12.3743L17.085 13.438Z"
                                fill="#F8F8FF"></path>
                        </g>
                    </svg>
                    <p>{{ getSettings('company_number') }}</p>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="fill-light w-4 h-4" viewBox="0 -5 32 32" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M29.000,22.000 L3.000,22.000 C1.346,22.000 -0.000,20.654 -0.000,19.000 L-0.000,3.000 C-0.000,1.346 1.346,-0.000 3.000,-0.000 L29.000,-0.000 C30.654,-0.000 32.000,1.346 32.000,3.000 L32.000,19.000 C32.000,20.654 30.654,22.000 29.000,22.000 ZM3.000,20.000 L29.000,20.000 C29.551,20.000 30.000,19.552 30.000,19.000 L30.000,3.317 L16.651,14.759 C16.463,14.920 16.232,15.000 16.000,15.000 C15.768,15.000 15.537,14.920 15.349,14.759 L2.000,3.317 L2.000,19.000 C2.000,19.552 2.449,20.000 3.000,20.000 ZM28.464,2.000 L3.536,2.000 L16.000,12.683 L28.464,2.000 Z">
                            </path>
                        </g>
                    </svg>
                    <p>{{ getSettings('company_email') }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <div class="flex items-center gap-2">
                    <svg class="fill-light w-4 h-4" viewBox="0 0 32 32" version="1.1"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>pin</title>
                            <path
                                d="M4 12q0-3.264 1.6-6.016t4.384-4.352 6.016-1.632 6.016 1.632 4.384 4.352 1.6 6.016q0 1.376-0.672 3.2t-1.696 3.68-2.336 3.776-2.56 3.584-2.336 2.944-1.728 2.080l-0.672 0.736q-0.256-0.256-0.672-0.768t-1.696-2.016-2.368-3.008-2.528-3.52-2.368-3.84-1.696-3.616-0.672-3.232zM8 12q0 3.328 2.336 5.664t5.664 2.336 5.664-2.336 2.336-5.664-2.336-5.632-5.664-2.368-5.664 2.368-2.336 5.632z">
                            </path>
                        </g>
                    </svg>
                    <p>{{ getSettings('company_address') }}</p>
                </div>
            </div>
        </div>
    </nav> --}}

    {{-- Main Navbar --}}
    <nav class="bg-light shadow-md px-5 sm:px-10 md:px-20">
        <div class="flex flex-wrap justify-between mx-auto max-w-screen-2xl">
            <div class="flex items-center gap-20">
                <a href="/" class="flex space-x-3 rtl:space-x-reverse py-3">
                    <img src="{{ Storage::url(getSettings('logo')) }}" class="h-16" alt="Vetspital Logo" />
                </a>

                <div class="hidden min-[1440px]:block px-4 uppercase tracking-wider text-sm h-full">
                    <button data-collapse-toggle="navbar-multi-level" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        aria-controls="navbar-multi-level" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>

                    <div class="hidden w-full md:block md:w-auto h-full" id="navbar-multi-level">
                        <ul
                            class="flex flex-col h-full font-medium border md:space-x-8 md:flex-row md:mt-0 md:border-0">
                            <li class="">
                                <a href="/"
                                    class="h-full grid place-items-center hover:text-primary_dark transition-all {{ Request::is('/') ? 'text-primary_dark' : 'text-dark' }}">
                                    Home
                                </a>
                            </li>
                            {{-- <li class="">
                                <a href="/our-team"
                                    class="h-full grid place-items-center hover:text-primary_dark transition-all {{ Request::is('our-team') ? 'text-primary_dark' : 'text-dark' }}">
                                    Our Team
                                </a>
                            </li> --}}
                            <li class="relative group/category">
                                <button
                                    class="h-full uppercase flex items-center font-medium hover:text-primary_dark transition-all {{ Request::routeIs('services*') ? 'text-primary_dark' : 'text-dark' }}">
                                    Our Services
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Categories Dropdown -->
                                <div
                                    class="swipe_up-animation absolute z-50 hidden group-hover/category:block text-xs w-max bg-light border border-gray-100 shadow-2xl">
                                    @foreach (serviceCatagories() as $category)
                                        <div class="p-4 relative group/service">
                                            <a href="/services"
                                                class="text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                                {{ $category->name }}
                                                <svg class="w-2.5 h-2.5 ms-3 -rotate-90" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </a>
                                            <!-- Services Dropdown -->
                                            <div
                                                class="swipe_up-animation top-5 left-full ms-[2px] absolute z-50 hidden group-hover/service:block text-xs w-max bg-light border border-gray-100 shadow-2xl">
                                                @foreach ($category->services as $service)
                                                    <div class="p-4">
                                                        <a href="{{ route('serviceDetails', $service) }}"
                                                            class="text-dark/50 hover:text-primary_dark transition-all">
                                                            {{ $service->title }}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </li>

                            <li class="relative group/package">
                                <button class="h-full uppercase flex items-center font-medium hover:text-primary_dark transition-all {{ Request::routeIs('plan*') ? 'text-primary_dark' : 'text-dark' }}">
                                    Our Packages
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Categories Dropdown -->
                                <div class="swipe_up-animation absolute z-50 hidden group-hover/package:block text-xs w-max bg-light border border-gray-100 shadow-2xl">
                                    @foreach (searchCategories() as $package)
                                        <div class="p-4 relative group/plan">
                                            <a href="/product/filter?package={{ $package->id }}"
                                                class="text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                                {{ $package->title }}
                                                <svg class="w-2.5 h-2.5 ms-3 -rotate-90" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </a>
                                            <!-- Services Dropdown -->
                                            <div
                                                class="swipe_up-animation top-5 left-full ms-[2px] absolute z-50 hidden group-hover/plan:block text-xs w-max bg-light border border-gray-100 shadow-2xl">
                                                @foreach ($package->plans as $plan)
                                                    <div class="p-4">
                                                        <a href="/product/filter?plan={{ $plan->id }}"
                                                            class="text-dark/50 hover:text-primary_dark transition-all">
                                                            {{ $plan->title }}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </li>


                            <li class="relative group/package">
                                <button
                                    class="h-full uppercase flex items-center font-medium hover:text-primary_dark transition-all {{ Request::routeIs('team') ? 'text-primary_dark' : 'text-dark' }}">
                                    Company
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Categories Dropdown -->
                                <div
                                    class="swipe_up-animation absolute z-50 hidden group-hover/package:block text-xs w-max bg-light border border-gray-100 shadow-2xl">

                                    <ul>
                                        <li class="p-4">
                                            <a href="/our-team"
                                                class="text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline {{ Request::routeIs('team') ? 'text-primary_dark' : 'text-dark' }}">
                                                Our Team
                                            </a>
                                        </li>

                                        <li class="p-4">
                                            <a href="{{ route('career.index') }}"
                                                class="text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                                Career
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="p-4 relative group/plan">
                                        <button
                                            class="text-dark/50 uppercase hover:text-primary_dark transition-all flex justify-between items-baseline">
                                            Gallery
                                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                            </svg>
                                        </button>
                                        <!-- Services Dropdown -->
                                        <div
                                            class="swipe_up-animation top-5 left-full ms-[2px] absolute z-50 hidden group-hover/plan:block text-xs w-max bg-light border border-gray-100 shadow-2xl">
                                            <div class="flex flex-col">
                                                <a href="{{ route('gallery.image') }}"
                                                    class="p-4 text-dark/50 hover:text-primary_dark transition-all">
                                                    Image Gallery
                                                </a>
                                                <a href="{{ route('gallery.video') }}"
                                                    class="p-4 text-dark/50 hover:text-primary_dark transition-all">
                                                    Video Gallery
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            {{-- <li class="relative group">
                                <button
                                    class="h-full uppercase flex items-center font-medium hover:text-primary_dark transition-all {{ Request::routeIs('gallery*') ? 'text-primary_dark' : 'text-dark' }}">
                                    Gallery
                                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div
                                    class="swipe_up-animation absolute z-50 hidden group-hover:block text-xs w-max bg-light border border-gray-100 shadow-2xl">
                                    <ul class="text-xs text-gray-700" aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('gallery.image') }}"
                                                class="p-4 text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">Image
                                                Gallery</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('gallery.video') }}"
                                                class="p-4 text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">Video
                                                Gallery</a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}
                            <li class="py-2">
                                <a href="{{ route('blog.blogs') }}"
                                    class="h-full grid place-items-center hover:text-primary_dark transition-all {{ Request::routeIs('blog*') ? 'text-primary_dark' : 'text-dark' }}">
                                    Blogs
                                </a>
                            </li>
                            {{-- <li class="py-2">
                                <a href="{{ route('career.index') }}"
                                    class="h-full grid place-items-center hover:text-primary_dark transition-all {{ Request::is('career') ? 'text-primary_dark' : 'text-dark' }}">
                                    Career
                                </a>
                            </li> --}}
                            <li class="py-2">
                                <a href="{{ route('appointment.index') }}"
                                    class="h-full grid place-items-center hover:text-primary_dark transition-all {{ Route::is('appointment.index') ? 'text-primary_dark' : 'text-dark' }}">
                                    Book Appointment
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- <form class="max-w-lg mx-auto">
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Your
                        Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
                        type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <div id="dropdown" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            @foreach (searchCategories() as $package)
                                <li>
                                    <button type="button"
                                        class="whitespace-nowrap inline-flex w-full px-4 py-2 hover:bg-gray-100">{{ $package->title }}</button>
                                </li>
                                @foreach ($package->plans as $plan)
                                    <li>
                                        <button type="button"
                                            class="whitespace-nowrap inline-flex w-full px-4 py-2 hover:bg-gray-100">--
                                            {{ $plan->title }}</button>
                                    </li>

                                    @php
                                        $categories = \App\Models\ProductCategory::where('plan_id', $plan->id)->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <li>
                                            <button type="button"
                                                class="whitespace-nowrap inline-flex w-full px-4 py-2 hover:bg-gray-100">----
                                                {{ $category->title }}</button>
                                        </li>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown"
                            class="block p-2.5 min-w-[20rem] z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-primary focus:border-primary"
                            placeholder="Search Packages, Plans..." required />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-dark bg-primary rounded-e-lg border border-primary focus:ring-4 focus:outline-none">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form> --}}

            <div class="flex items-center space-x-8 rtl:space-x-reverse">
                <a href="/wishlist" class="relative hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 fill-dark">
                        <path
                            d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8l0-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5l0 3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20-.1-.1s0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5l0 3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2l0-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z" />
                    </svg>
                    <span
                        class="absolute inline-flex items-center justify-center w-4 h-4 text-[10px] font-bold bg-primary text-white rounded-full -top-2 -end-2 dark:border-gray-900">
                        0
                    </span>
                </a>
                <a href="/cart" class="relative hidden">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 fill-dark">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path opacity="0.5"
                                d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z"
                                stroke-width="1.5"></path>
                            <path opacity="0.5"
                                d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z"
                                stroke-width="1.5"></path>
                            <path
                                d="M2.26121 3.09184L2.50997 2.38429H2.50997L2.26121 3.09184ZM2.24876 2.29246C1.85799 2.15507 1.42984 2.36048 1.29246 2.75124C1.15507 3.14201 1.36048 3.57016 1.75124 3.70754L2.24876 2.29246ZM4.58584 4.32298L5.20507 3.89983V3.89983L4.58584 4.32298ZM5.88772 14.5862L5.34345 15.1022H5.34345L5.88772 14.5862ZM20.6578 9.88275L21.3923 10.0342L21.3933 10.0296L20.6578 9.88275ZM20.158 12.3075L20.8926 12.4589L20.158 12.3075ZM20.7345 6.69708L20.1401 7.15439L20.7345 6.69708ZM19.1336 15.0504L18.6598 14.469L19.1336 15.0504ZM5.70808 9.76V7.03836H4.20808V9.76H5.70808ZM2.50997 2.38429L2.24876 2.29246L1.75124 3.70754L2.01245 3.79938L2.50997 2.38429ZM10.9375 16.25H16.2404V14.75H10.9375V16.25ZM5.70808 7.03836C5.70808 6.3312 5.7091 5.7411 5.65719 5.26157C5.60346 4.76519 5.48705 4.31247 5.20507 3.89983L3.96661 4.74613C4.05687 4.87822 4.12657 5.05964 4.1659 5.42299C4.20706 5.8032 4.20808 6.29841 4.20808 7.03836H5.70808ZM2.01245 3.79938C2.68006 4.0341 3.11881 4.18965 3.44166 4.34806C3.74488 4.49684 3.87855 4.61727 3.96661 4.74613L5.20507 3.89983C4.92089 3.48397 4.54304 3.21763 4.10241 3.00143C3.68139 2.79485 3.14395 2.60719 2.50997 2.38429L2.01245 3.79938ZM4.20808 9.76C4.20808 11.2125 4.22171 12.2599 4.35876 13.0601C4.50508 13.9144 4.79722 14.5261 5.34345 15.1022L6.43198 14.0702C6.11182 13.7325 5.93913 13.4018 5.83723 12.8069C5.72607 12.1578 5.70808 11.249 5.70808 9.76H4.20808ZM10.9375 14.75C9.52069 14.75 8.53763 14.7482 7.79696 14.6432C7.08215 14.5418 6.70452 14.3576 6.43198 14.0702L5.34345 15.1022C5.93731 15.7286 6.69012 16.0013 7.58636 16.1283C8.45674 16.2518 9.56535 16.25 10.9375 16.25V14.75ZM4.95808 6.87H17.0888V5.37H4.95808V6.87ZM19.9232 9.73135L19.4235 12.1561L20.8926 12.4589L21.3923 10.0342L19.9232 9.73135ZM17.0888 6.87C17.9452 6.87 18.6989 6.871 19.2937 6.93749C19.5893 6.97053 19.8105 7.01643 19.9659 7.07105C20.1273 7.12776 20.153 7.17127 20.1401 7.15439L21.329 6.23978C21.094 5.93436 20.7636 5.76145 20.4632 5.65587C20.1567 5.54818 19.8101 5.48587 19.4604 5.44678C18.7646 5.369 17.9174 5.37 17.0888 5.37V6.87ZM21.3933 10.0296C21.5625 9.18167 21.7062 8.47024 21.7414 7.90038C21.7775 7.31418 21.7108 6.73617 21.329 6.23978L20.1401 7.15439C20.2021 7.23508 20.2706 7.38037 20.2442 7.80797C20.2168 8.25191 20.1002 8.84478 19.9223 9.73595L21.3933 10.0296ZM16.2404 16.25C17.0021 16.25 17.6413 16.2513 18.1566 16.1882C18.6923 16.1227 19.1809 15.9794 19.6074 15.6318L18.6598 14.469C18.5346 14.571 18.3571 14.6525 17.9744 14.6994C17.5712 14.7487 17.0397 14.75 16.2404 14.75V16.25ZM19.4235 12.1561C19.2621 12.9389 19.1535 13.4593 19.0238 13.8442C18.9007 14.2095 18.785 14.367 18.6598 14.469L19.6074 15.6318C20.0339 15.2842 20.2729 14.8346 20.4453 14.3232C20.6111 13.8312 20.7388 13.2049 20.8926 12.4589L19.4235 12.1561Z">
                            </path>
                        </g>
                    </svg>
                    <span
                        class="absolute inline-flex items-center justify-center w-4 h-4 text-[10px] font-bold bg-primary text-white rounded-full -top-2 -end-2 dark:border-gray-900">
                        0
                    </span>
                </a>

                <button id="menu-toggle" class="min-[1440px]:hidden block">
                    <svg viewBox="0 0 24 24" class="w-10 h-10 fill-dark" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g id="Menu / Menu_Alt_01">
                                <path class="stroke-dark" id="Vector" d="M12 17H19M5 12H19M5 7H19"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </g>
                        </g>
                    </svg>
                </button>
                @if (\Auth::user())
                    <div class="relative group/profile h-full">
                        <button
                            class="h-full uppercase flex gap-2 items-center font-medium hover:text-primary_dark transition-all {{ Request::routeIs('plan*') ? 'text-primary_dark' : 'text-dark' }}">
                            <img class="w-10 h-10 object-cover rounded-full"
                                src="{{ Storage::url(\Auth::user()->image) }}" alt="">
                            <div class="text-left capitalize">
                                <p class="text-sm">{{ \Auth::user()->name }}</p>
                                <p class="text-xs text-gray-500 ">Pet Owner</p>
                            </div>
                        </button>

                        <!-- Categories Dropdown -->
                        <div
                            class="swipe_up-animation absolute z-50 hidden group-hover/profile:block text-xs w-max bg-light border border-gray-100 shadow-2xl">
                            <a href="{{ route('profile') }}"
                                class="p-4 uppercase text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                My Profile
                            </a><a href="{{ route('order.index') }}"
                                class="p-4 uppercase text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                My Orders
                            </a><a href="{{ route('pet') }}"
                                class="p-4 uppercase text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                My Pets
                            </a>
                            </a><a href="{{ route('appointment.history') }}"
                                class="p-4 uppercase text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                My Appointments
                            </a>
                            </a><a href="/prescriptions"
                                class="p-4 uppercase text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                Prescriptions
                            </a>
                            </a><a href="/tests"
                                class="p-4 uppercase text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                Test Reports
                            </a>
                            </a><a href="{{ route('logout') }}"
                                class="p-4 uppercase text-dark/50 hover:text-primary_dark transition-all flex justify-between items-baseline">
                                Logout
                            </a>
                        </div>
                    </div>
                @else
                    <a href="/user/login"
                        class="hidden min-[1440px]:block text-primary_dark border-2 border-primary transition-all duration-300 uppercase hover:bg-primary hover:text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </nav>

    {{-- Mobile Navbar --}}
    <nav id="mobile-nav"
        class="min-[1440px]:hidden absolute top-0 left-0 w-full h-screen hidden flex justify-end z-50">
        <div
            class="nav-backdrop absolute top-0 left-0 bg-dark/30 backdrop-blur-sm w-full h-screen opacity-0 transition-opacity duration-500">
        </div>
        <div
            class="relative nav-menu bg-light text-dark p-10 [max-500px]:p-20 h-screen overflow-y-auto w-full sm:w-auto min-[1140px]:w-2/5 translate-x-full transition-all duration-500 z-50">
            <button id="menu-toggle" class="absolute right-10 top-10">
                <svg viewBox="0 0 24 24" class="w-8 h-8 fill-dark" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z"
                            fill="#0F0F0F"></path>
                    </g>
                </svg>
            </button>
            <ul class="text-3xl font-semibold uppercase space-y-7 tracking-wider mt-20">
                <li><a class="{{ Request::is('/') ? 'text-primary_dark' : 'text-dark' }}" href="/">Home</a>
                </li>
                <li><a class="{{ Request::routeIs('services*') ? 'text-primary_dark' : 'text-dark' }}"
                        href="/services">Our Services</a></li>
                <li><a class="{{ Request::routeIs('plans*') ? 'text-primary_dark' : 'text-dark' }}"
                        href="/product/filter">Our Packages</a></li>
                <li><a href="/">Company</a></li>
                <li><a class="{{ Request::routeIs('blog*') ? 'text-primary_dark' : 'text-dark' }}"
                        href="/blog">Blogs</a></li>
                <li><a class="{{ Request::is('career') ? 'text-primary_dark' : 'text-dark' }}"
                        href="/career">Career</a></li>
                <li class="py-2">
                    <a href="{{ route('appointment.index') }}"
                        class="h-full grid place-items-center hover:text-primary_dark transition-all {{ Route::is('appointment.index') ? 'text-primary_dark' : 'text-dark' }}">
                        Appointment
                    </a>
                </li>
                <li>
                    <a href="/login"
                        class="inline-block text-primary_dark border-2 border-[#F68685] transition-all duration-300 uppercase hover:bg-[#F68685] hover:text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                        Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light dark:bg-gray-900">
        <div class="mx-auto w-full max-w-screen-2xl px-10 py-6 lg:py-8">
            <div class="grid sm:grid-cols-2 gap-16 sm:gap-6 lg:grid-cols-4 py-16">
                <div class="mb-6 md:mb-0">
                    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse mb-5">
                        <img src="{{ Storage::url(getSettings('logo')) }}" class="h-20" alt="Vetspital Logo" />
                    </a>
                    <p class="text-sm text-dark/60 font-medium leading-loose">Vetspital is committed to enhancing the
                        health and happiness of your pets. We provide expert
                        advice, quality products, and a supportive community to help nurture your pets, ensuring they
                        live a long, vibrant, and fulfilling life with you.</p>
                </div>
                <div class="sm:justify-self-center">
                    <h2 class="mb-6 text-2xl font-semibold">Useful Links</h2>
                    <ul class="text-dark/60 font-medium space-y-4">
                        <li>
                            <a href="/services" class="hover:underline">Services</a>
                        </li>
                        <li>
                            <a href="/product/filter" class="hover:underline">Packages</a>
                        </li>
                        <li>
                            <a href="/our-team" class="hover:underline">Our Team</a>
                        </li>
                        <li>
                            <a href="/blog" class="hover:underline">Blogs</a>
                        </li>
                    </ul>
                </div>
                <div class="lg:justify-self-center">
                    <h2 class="mb-6 text-2xl font-semibold">Legal</h2>
                    <ul class="text-dark/60 font-medium space-y-4">
                        <li class="mb-4">
                            <a href="/privacy-policy" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/terms-and-conditions" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
                <div class="sm:justify-self-center">
                    <h2 class="mb-6 text-2xl font-semibold">Reach Us</h2>
                    <ul class="text-dark/60 font-medium space-y-4">
                        <li class="flex gap-4 items-center">
                            <svg class="w-6 h-6 flex-shrink-0" viewBox="-4 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>location</title>
                                    <desc>Created with Sketch Beta.</desc>
                                    <defs> </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                        fill-rule="evenodd" sketch:type="MSPage">
                                        <g id="Icon-Set" sketch:type="MSLayerGroup"
                                            transform="translate(-104.000000, -411.000000)" fill="#3CB3B9">
                                            <path
                                                d="M116,426 C114.343,426 113,424.657 113,423 C113,421.343 114.343,420 116,420 C117.657,420 119,421.343 119,423 C119,424.657 117.657,426 116,426 L116,426 Z M116,418 C113.239,418 111,420.238 111,423 C111,425.762 113.239,428 116,428 C118.761,428 121,425.762 121,423 C121,420.238 118.761,418 116,418 L116,418 Z M116,440 C114.337,440.009 106,427.181 106,423 C106,417.478 110.477,413 116,413 C121.523,413 126,417.478 126,423 C126,427.125 117.637,440.009 116,440 L116,440 Z M116,411 C109.373,411 104,416.373 104,423 C104,428.018 114.005,443.011 116,443 C117.964,443.011 128,427.95 128,423 C128,416.373 122.627,411 116,411 L116,411 Z"
                                                id="location" sketch:type="MSShapeGroup"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <p>{{ getSettings('company_address') }}</p>
                        </li>
                        <li class="flex gap-4 items-center">
                            <svg class="w-6 h-6 flex-shrink-0" version="1.1" id="_x32_"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #3CB3B9;
                                        }
                                    </style>
                                    <g>
                                        <path class="st0"
                                            d="M510.678,112.275c-2.308-11.626-7.463-22.265-14.662-31.054c-1.518-1.915-3.104-3.63-4.823-5.345 c-12.755-12.818-30.657-20.814-50.214-20.814H71.021c-19.557,0-37.395,7.996-50.21,20.814c-1.715,1.715-3.301,3.43-4.823,5.345 C8.785,90.009,3.63,100.649,1.386,112.275C0.464,116.762,0,121.399,0,126.087V385.92c0,9.968,2.114,19.55,5.884,28.203 c3.497,8.26,8.653,15.734,14.926,22.001c1.59,1.586,3.169,3.044,4.892,4.494c12.286,10.175,28.145,16.32,45.319,16.32h369.958 c17.18,0,33.108-6.145,45.323-16.384c1.718-1.386,3.305-2.844,4.891-4.43c6.27-6.267,11.425-13.741,14.994-22.001v-0.064 c3.769-8.653,5.812-18.171,5.812-28.138V126.087C512,121.399,511.543,116.762,510.678,112.275z M46.509,101.571 c6.345-6.338,14.866-10.175,24.512-10.175h369.958c9.646,0,18.242,3.837,24.512,10.175c1.122,1.129,2.179,2.387,3.112,3.637 L274.696,274.203c-5.348,4.687-11.954,7.002-18.696,7.002c-6.674,0-13.276-2.315-18.695-7.002L43.472,105.136 C44.33,103.886,45.387,102.7,46.509,101.571z M36.334,385.92V142.735L176.658,265.15L36.405,387.435 C36.334,386.971,36.334,386.449,36.334,385.92z M440.979,420.597H71.021c-6.281,0-12.158-1.651-17.174-4.552l147.978-128.959 l13.815,12.018c11.561,10.046,26.028,15.134,40.36,15.134c14.406,0,28.872-5.088,40.432-15.134l13.808-12.018l147.92,128.959 C453.137,418.946,447.26,420.597,440.979,420.597z M475.666,385.92c0,0.529,0,1.051-0.068,1.515L335.346,265.221L475.666,142.8 V385.92z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <p>{{ getSettings('company_email') }}</p>
                        </li>
                        <li class="flex gap-4 items-center">
                            <svg class="w-6 h-6 flex-shrink-0" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.1007 13.359L15.5719 12.8272H15.5719L16.1007 13.359ZM16.5562 12.9062L17.085 13.438H17.085L16.5562 12.9062ZM18.9728 12.5894L18.6146 13.2483L18.9728 12.5894ZM20.8833 13.628L20.5251 14.2869L20.8833 13.628ZM21.4217 16.883L21.9505 17.4148L21.4217 16.883ZM20.0011 18.2954L19.4723 17.7636L20.0011 18.2954ZM18.6763 18.9651L18.7459 19.7119H18.7459L18.6763 18.9651ZM8.81536 14.7266L9.34418 14.1947L8.81536 14.7266ZM4.00289 5.74561L3.2541 5.78816L3.2541 5.78816L4.00289 5.74561ZM10.4775 7.19738L11.0063 7.72922H11.0063L10.4775 7.19738ZM10.6342 4.54348L11.2346 4.09401L10.6342 4.54348ZM9.37326 2.85908L8.77286 3.30855V3.30855L9.37326 2.85908ZM6.26145 2.57483L6.79027 3.10667H6.79027L6.26145 2.57483ZM4.69185 4.13552L4.16303 3.60368H4.16303L4.69185 4.13552ZM12.0631 11.4972L12.5919 10.9654L12.0631 11.4972ZM16.6295 13.8909L17.085 13.438L16.0273 12.3743L15.5719 12.8272L16.6295 13.8909ZM18.6146 13.2483L20.5251 14.2869L21.2415 12.9691L19.331 11.9305L18.6146 13.2483ZM20.8929 16.3511L19.4723 17.7636L20.5299 18.8273L21.9505 17.4148L20.8929 16.3511ZM18.6067 18.2184C17.1568 18.3535 13.4056 18.2331 9.34418 14.1947L8.28654 15.2584C12.7186 19.6653 16.9369 19.8805 18.7459 19.7119L18.6067 18.2184ZM9.34418 14.1947C5.4728 10.3453 4.83151 7.10765 4.75168 5.70305L3.2541 5.78816C3.35456 7.55599 4.14863 11.144 8.28654 15.2584L9.34418 14.1947ZM10.7195 8.01441L11.0063 7.72922L9.9487 6.66555L9.66189 6.95073L10.7195 8.01441ZM11.2346 4.09401L9.97365 2.40961L8.77286 3.30855L10.0338 4.99296L11.2346 4.09401ZM5.73263 2.04299L4.16303 3.60368L5.22067 4.66736L6.79027 3.10667L5.73263 2.04299ZM10.1907 7.48257C9.66189 6.95073 9.66117 6.95144 9.66045 6.95216C9.66021 6.9524 9.65949 6.95313 9.659 6.95362C9.65802 6.95461 9.65702 6.95561 9.65601 6.95664C9.65398 6.95871 9.65188 6.96086 9.64972 6.9631C9.64539 6.96759 9.64081 6.97245 9.63599 6.97769C9.62634 6.98816 9.61575 7.00014 9.60441 7.01367C9.58174 7.04072 9.55605 7.07403 9.52905 7.11388C9.47492 7.19377 9.41594 7.2994 9.36589 7.43224C9.26376 7.70329 9.20901 8.0606 9.27765 8.50305C9.41189 9.36833 10.0078 10.5113 11.5343 12.0291L12.5919 10.9654C11.1634 9.54499 10.8231 8.68059 10.7599 8.27309C10.7298 8.07916 10.761 7.98371 10.7696 7.96111C10.7748 7.94713 10.7773 7.9457 10.7709 7.95525C10.7677 7.95992 10.7624 7.96723 10.7541 7.97708C10.75 7.98201 10.7451 7.98759 10.7394 7.99381C10.7365 7.99692 10.7335 8.00019 10.7301 8.00362C10.7285 8.00534 10.7268 8.00709 10.725 8.00889C10.7241 8.00979 10.7232 8.0107 10.7223 8.01162C10.7219 8.01208 10.7212 8.01278 10.7209 8.01301C10.7202 8.01371 10.7195 8.01441 10.1907 7.48257ZM11.5343 12.0291C13.0613 13.5474 14.2096 14.1383 15.0763 14.2713C15.5192 14.3392 15.8763 14.285 16.1472 14.1841C16.28 14.1346 16.3858 14.0763 16.4658 14.0227C16.5058 13.9959 16.5392 13.9704 16.5663 13.9479C16.5799 13.9367 16.5919 13.9262 16.6024 13.9166C16.6077 13.9118 16.6126 13.9073 16.6171 13.903C16.6194 13.9008 16.6215 13.8987 16.6236 13.8967C16.6246 13.8957 16.6256 13.8947 16.6266 13.8937C16.6271 13.8932 16.6279 13.8925 16.6281 13.8923C16.6288 13.8916 16.6295 13.8909 16.1007 13.359C15.5719 12.8272 15.5726 12.8265 15.5733 12.8258C15.5735 12.8256 15.5742 12.8249 15.5747 12.8244C15.5756 12.8235 15.5765 12.8226 15.5774 12.8217C15.5793 12.82 15.581 12.8183 15.5827 12.8166C15.5862 12.8133 15.5895 12.8103 15.5926 12.8074C15.5988 12.8018 15.6044 12.7969 15.6094 12.7929C15.6192 12.7847 15.6265 12.7795 15.631 12.7764C15.6403 12.7702 15.6384 12.773 15.6236 12.7785C15.5991 12.7876 15.501 12.8189 15.3038 12.7886C14.8905 12.7253 14.02 12.3853 12.5919 10.9654L11.5343 12.0291ZM9.97365 2.40961C8.95434 1.04802 6.94996 0.83257 5.73263 2.04299L6.79027 3.10667C7.32195 2.578 8.26623 2.63181 8.77286 3.30855L9.97365 2.40961ZM4.75168 5.70305C4.73201 5.35694 4.89075 4.9954 5.22067 4.66736L4.16303 3.60368C3.62571 4.13795 3.20329 4.89425 3.2541 5.78816L4.75168 5.70305ZM19.4723 17.7636C19.1975 18.0369 18.9029 18.1908 18.6067 18.2184L18.7459 19.7119C19.4805 19.6434 20.0824 19.2723 20.5299 18.8273L19.4723 17.7636ZM11.0063 7.72922C11.9908 6.7503 12.064 5.2019 11.2346 4.09401L10.0338 4.99295C10.4373 5.53193 10.3773 6.23938 9.9487 6.66555L11.0063 7.72922ZM20.5251 14.2869C21.3429 14.7315 21.4703 15.7769 20.8929 16.3511L21.9505 17.4148C23.2908 16.0821 22.8775 13.8584 21.2415 12.9691L20.5251 14.2869ZM17.085 13.438C17.469 13.0562 18.0871 12.9616 18.6146 13.2483L19.331 11.9305C18.2474 11.3414 16.9026 11.5041 16.0273 12.3743L17.085 13.438Z"
                                        fill="#3CB3B9"></path>
                                </g>
                            </svg>
                            <p>{{ getSettings('company_number') }}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/"
                        class="hover:underline">Vetspital</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="{{ getSettings('company_social_media_facebook') }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd"
                                d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="{{ getSettings('company_social_media_facebook') }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd"
                                d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="{{ getSettings('company_social_media_facebook') }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>whatsapp [#128]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="currentColor"
                                    fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7599.000000)"
                                        fill="currentColor">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path
                                                d="M259.821,7453.12124 C259.58,7453.80344 258.622,7454.36761 257.858,7454.53266 C257.335,7454.64369 256.653,7454.73172 254.355,7453.77943 C251.774,7452.71011 248.19,7448.90097 248.19,7446.36621 C248.19,7445.07582 248.934,7443.57337 250.235,7443.57337 C250.861,7443.57337 250.999,7443.58538 251.205,7444.07952 C251.446,7444.6617 252.034,7446.09613 252.104,7446.24317 C252.393,7446.84635 251.81,7447.19946 251.387,7447.72462 C251.252,7447.88266 251.099,7448.05372 251.27,7448.3478 C251.44,7448.63589 252.028,7449.59418 252.892,7450.36341 C254.008,7451.35771 254.913,7451.6748 255.237,7451.80984 C255.478,7451.90987 255.766,7451.88687 255.942,7451.69881 C256.165,7451.45774 256.442,7451.05762 256.724,7450.6635 C256.923,7450.38141 257.176,7450.3464 257.441,7450.44643 C257.62,7450.50845 259.895,7451.56477 259.991,7451.73382 C260.062,7451.85686 260.062,7452.43903 259.821,7453.12124 M254.002,7439 L253.997,7439 L253.997,7439 C248.484,7439 244,7443.48535 244,7449 C244,7451.18666 244.705,7453.21526 245.904,7454.86076 L244.658,7458.57687 L248.501,7457.3485 C250.082,7458.39482 251.969,7459 254.002,7459 C259.515,7459 264,7454.51465 264,7449 C264,7443.48535 259.515,7439 254.002,7439"
                                                id="whatsapp-[#128]"> </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span class="sr-only">Whatsapp page</span>
                    </a>
                    <a href="{{ getSettings('company_social_media_facebook') }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" viewBox="0 -3 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>youtube [#168]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="currentColor"
                                    fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-300.000000, -7442.000000)"
                                        fill="currentColor">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path
                                                d="M251.988432,7291.58588 L251.988432,7285.97425 C253.980638,7286.91168 255.523602,7287.8172 257.348463,7288.79353 C255.843351,7289.62824 253.980638,7290.56468 251.988432,7291.58588 M263.090998,7283.18289 C262.747343,7282.73013 262.161634,7282.37809 261.538073,7282.26141 C259.705243,7281.91336 248.270974,7281.91237 246.439141,7282.26141 C245.939097,7282.35515 245.493839,7282.58153 245.111335,7282.93357 C243.49964,7284.42947 244.004664,7292.45151 244.393145,7293.75096 C244.556505,7294.31342 244.767679,7294.71931 245.033639,7294.98558 C245.376298,7295.33761 245.845463,7295.57995 246.384355,7295.68865 C247.893451,7296.0008 255.668037,7296.17532 261.506198,7295.73552 C262.044094,7295.64178 262.520231,7295.39147 262.895762,7295.02447 C264.385932,7293.53455 264.28433,7285.06174 263.090998,7283.18289"
                                                id="youtube-[#168]"> </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span class="sr-only">Youtube page</span>
                    </a>
                    <a href="{{ getSettings('company_social_media_facebook') }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M12,9.52A2.48,2.48,0,1,0,14.48,12,2.48,2.48,0,0,0,12,9.52Zm9.93-2.45a6.53,6.53,0,0,0-.42-2.26,4,4,0,0,0-2.32-2.32,6.53,6.53,0,0,0-2.26-.42C15.64,2,15.26,2,12,2s-3.64,0-4.93.07a6.53,6.53,0,0,0-2.26.42A4,4,0,0,0,2.49,4.81a6.53,6.53,0,0,0-.42,2.26C2,8.36,2,8.74,2,12s0,3.64.07,4.93a6.86,6.86,0,0,0,.42,2.27,3.94,3.94,0,0,0,.91,1.4,3.89,3.89,0,0,0,1.41.91,6.53,6.53,0,0,0,2.26.42C8.36,22,8.74,22,12,22s3.64,0,4.93-.07a6.53,6.53,0,0,0,2.26-.42,3.89,3.89,0,0,0,1.41-.91,3.94,3.94,0,0,0,.91-1.4,6.6,6.6,0,0,0,.42-2.27C22,15.64,22,15.26,22,12S22,8.36,21.93,7.07Zm-2.54,8A5.73,5.73,0,0,1,19,16.87,3.86,3.86,0,0,1,16.87,19a5.73,5.73,0,0,1-1.81.35c-.79,0-1,0-3.06,0s-2.27,0-3.06,0A5.73,5.73,0,0,1,7.13,19a3.51,3.51,0,0,1-1.31-.86A3.51,3.51,0,0,1,5,16.87a5.49,5.49,0,0,1-.34-1.81c0-.79,0-1,0-3.06s0-2.27,0-3.06A5.49,5.49,0,0,1,5,7.13a3.51,3.51,0,0,1,.86-1.31A3.59,3.59,0,0,1,7.13,5a5.73,5.73,0,0,1,1.81-.35h0c.79,0,1,0,3.06,0s2.27,0,3.06,0A5.73,5.73,0,0,1,16.87,5a3.51,3.51,0,0,1,1.31.86A3.51,3.51,0,0,1,19,7.13a5.73,5.73,0,0,1,.35,1.81c0,.79,0,1,0,3.06S19.42,14.27,19.39,15.06Zm-1.6-7.44a2.38,2.38,0,0,0-1.41-1.41A4,4,0,0,0,15,6c-.78,0-1,0-3,0s-2.22,0-3,0a4,4,0,0,0-1.38.26A2.38,2.38,0,0,0,6.21,7.62,4.27,4.27,0,0,0,6,9c0,.78,0,1,0,3s0,2.22,0,3a4.27,4.27,0,0,0,.26,1.38,2.38,2.38,0,0,0,1.41,1.41A4.27,4.27,0,0,0,9,18.05H9c.78,0,1,0,3,0s2.22,0,3,0a4,4,0,0,0,1.38-.26,2.38,2.38,0,0,0,1.41-1.41A4,4,0,0,0,18.05,15c0-.78,0-1,0-3s0-2.22,0-3A3.78,3.78,0,0,0,17.79,7.62ZM12,15.82A3.81,3.81,0,0,1,8.19,12h0A3.82,3.82,0,1,1,12,15.82Zm4-6.89a.9.9,0,0,1,0-1.79h0a.9.9,0,0,1,0,1.79Z">
                                </path>
                            </g>
                        </svg>
                        <span class="sr-only">Instagram page</span>
                    </a>
                    <a href="{{ getSettings('company_social_media_facebook') }}"
                        class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 512 512" id="icons"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z">
                                </path>
                            </g>
                        </svg>
                        <span class="sr-only">Tiktok page</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite/dist/flowbite.min.js"></script>

    <script>
        const scrollers = document.querySelectorAll(".scroller");

        function addScrollAnimation() {
            scrollers.forEach((scroller) => {
                scroller.setAttribute("data-animated", true);

                const scrollerInner = scroller.querySelector(".scroller_inner");
                const scrollerContent = Array.from(scrollerInner.children);

                scrollerContent.forEach((item) => {
                    const duplicatedItem = item.cloneNode(true);
                    duplicatedItem.setAttribute("aria-hidden", true);
                    scrollerInner.appendChild(duplicatedItem);
                });
            });
        }

        if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
            addScrollAnimation();
        }
        var swiper = new Swiper(".teamSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            freeMode: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1280: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
        var swiper = new Swiper(".reviewSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            freeMode: true,
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var swiper = new Swiper(".blogSwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            freeMode: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1280: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const toggleButton = document.getElementById("menu-toggle");
            const mobileNav = document.getElementById("mobile-nav");
            const navBackdrop = mobileNav.querySelector(".nav-backdrop");
            const navMenu = mobileNav.querySelector(".nav-menu");

            // Open the menu
            const openMenu = () => {
                mobileNav.classList.remove("hidden");

                setTimeout(() => {
                    // Animate the backdrop and menu
                    navBackdrop.classList.remove("opacity-0");
                    navBackdrop.classList.add("opacity-100");

                    navMenu.classList.remove("translate-x-full");
                    navMenu.classList.add("translate-x-0");
                }, 300); // Match the transition duration
            };

            // Close the menu
            const closeMenu = () => {
                navBackdrop.classList.add("opacity-0");
                navBackdrop.classList.remove("opacity-100");

                navMenu.classList.add("translate-x-full");
                navMenu.classList.remove("translate-x-0");

                setTimeout(() => {
                    mobileNav.classList.add("hidden");
                }, 500); // Match the transition duration
            };

            // Event listeners
            toggleButton.addEventListener("click", () => {
                if (mobileNav.classList.contains("hidden")) {
                    openMenu();
                } else {
                    closeMenu();
                }
            });

            navBackdrop.addEventListener("click", closeMenu);

            // Close button inside the nav-menu
            const closeButton = mobileNav.querySelector("#menu-toggle");
            closeButton.addEventListener("click", closeMenu);
        });
    </script>
    @stack('scripts')

</body>

</html>
