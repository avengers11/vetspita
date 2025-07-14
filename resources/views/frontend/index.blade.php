@extends('frontend.layout')

@section('title', 'Home')

@section('css')
    <style>
        #featured-plans,
        #reviews {
            background-image: url('{{ asset('assets/frontend/images/mission_bg.png') }}');
            /* background-size: cover; */
            /* background-position: center; */
            /* background-repeat: no-repeat; */
        }

        #statistics {
            position: relative;
            background-image: url('https://plus.unsplash.com/premium_photo-1661699717204-82c08926c77a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
        }

        #statistics::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(175, 224, 209, 0.8);
            /* Overlay color */
            z-index: 1;
        }

        #statistics>* {
            position: relative;
            z-index: 2;
        }

        .review:before {
            background-color: #f3f4f6;
            bottom: -60px;
            -webkit-clip-path: polygon(50% 0, 0 100%, 100% 100%);
            clip-path: polygon(50% 0, 0 100%, 100% 100%);
            content: "";
            height: 150px;
            left: 130px;
            position: absolute;
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
            width: 90px;
            z-index: -1;
        }

        .scroller[data-animated="true"] {
            overflow: hidden;
            -webkit-mask: linear-gradient(90deg, transparent, white 20%, white 80%, transparent);
            mask: linear-gradient(90deg, transparent, white 20%, white 80%, transparent);
        }

        .scroller[data-animated="true"] .scroller_inner {
            flex-wrap: nowrap;
            animation: scroll 40s linear infinite;
            width: max-content;
        }

        @keyframes scroll {
            to {
                transform: translate(calc(-50% - 5rem));
            }
        }
    </style>
@endsection

@section('content')

    <div id="gallery" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-60 overflow-hidden sm:h-72 md:h-96 lg:h-[85vh]">
            @foreach ($sliders as $slider)
                <a href="{{ $slider->link }}" class="hidden duration-[3500ms] ease-in-out" data-carousel-item>
                    <img src="{{ Storage::url($slider->image) }}"
                        class="absolute block w-full object-cover object-center h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </a>
            @endforeach
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    {{-- Why Choose us --}}
    <div class="bg-primary_dark/20 flex ">
        <div class="hidden lg:block w-1/5 flex-shrink-0 bg-primary_dark">
            <img class="w-full h-full object-cover object-left"
                src="{{ asset('assets/frontend/images/mission_bg.png') }}" />
        </div>

        <div class="flex-grow py-24 lg:py-36 px-12">
            <div class="mb-24">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Why Choose Us</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">Why People Trust VetsPital</h2>
                <p class="text-sm text-dark/60 leading-relaxed font-medium">
                    At Vetspital, we are committed to providing compassionate, high-quality veterinary care with a focus on
                    <br>
                    advanced medical expertise and client satisfaction. Here’s why pet owners trust us:
                </p>
            </div>
            <div class="grid xl:grid-cols-4 sm:grid-cols-2 xl:gap-7 gap-x-7 gap-y-14">
                <div
                    class="bg-white shadow-sm hover:shadow-lg transition-all duration-300 px-8 pb-10 grid justify-center group">
                    <div
                        class="bg-primary_dark p-3 w-min mx-auto h-min -translate-y-5 shadow-2xl group-hover:-translate-y-8 transition-all duration-300">
                        <svg viewBox="0 0 400 400" class="w-16 h-16" fill="none" xmlns="http://www.w3.org/2000/svg"
                            stroke="#fff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M222 76C210.988 106.84 171.627 128.31 147 132" stroke="#fff" stroke-opacity="0.9"
                                    stroke-width="16" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M236 44.053C123.346 20.1218 96.7679 144.026 136.104 167" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M256 54C302.745 75.4047 288.975 108.654 272.736 144" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M260.902 122C295.577 228.082 142 250.963 142 156.601" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M218.892 153C219.298 150.031 218.46 147.754 218 145" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M191 154C191 151.332 191 148.668 191 146" stroke="#fff" stroke-opacity="0.9"
                                    stroke-width="16" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M60 345.501C60 309.522 83.3747 224.325 163.582 228.248C185.925 229.341 191.24 351.835 206.062 345.501C232 334.416 223.446 254.231 243.571 224.158C340.019 219.027 341 340.572 341 359"
                                    stroke="#fff" stroke-opacity="0.9" stroke-width="16" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M296 271C288.365 253.665 267.103 230.409 247 228" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M163 232C139.27 246.396 128.966 267.837 120 292" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M93.0228 347.996C90.4525 330.039 91.6852 307.132 109.075 296.665C157.969 267.237 151.718 362.878 128.138 345.983"
                                    stroke="#fff" stroke-opacity="0.9" stroke-width="16" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M293.07 271.039C321.891 269.785 283.781 299.392 290.907 273.038" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M304 324.289C291.859 322.728 282.476 327.953 271 329" stroke="#fff"
                                    stroke-opacity="0.9" stroke-width="16" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="space-y-5 group-hover:-translate-y-3 transition-all duration-300">
                        <h3 class="text-2xl font-semibold mt-5 text-center">Experienced & Skilled Veterinarian</h3>
                        <p class="text-center text-sm text-dark/60 font-medium">Led by Dr. Rumman Hossain Tuhin and Dr
                            Abdur Rajjak, licensed veterinarian with three years of experience and over 10,000 successful
                            surgeries, Vetspital ensures expert diagnosis, treatment, and surgical care.</p>
                        {{-- <div class="flex justify-center">
                            <a href=""
                                class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs">
                                <span>read more</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div
                    class="bg-white shadow-sm hover:shadow-lg transition-all duration-300 px-8 pb-10 grid justify-center group">
                    <div
                        class="bg-primary_dark p-3 w-min mx-auto h-min -translate-y-5 shadow-2xl group-hover:-translate-y-8 transition-all duration-300">
                        <svg class="w-16 h-16" fill="#ffffff" viewBox="0 0 50 50" version="1.2" baseProfile="tiny"
                            xmlns="http://www.w3.org/2000/svg" overflow="inherit" stroke="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M18.48 18.875c2.33-.396 4.058-2.518 4.321-5.053.267-2.578.869-12.938-3.02-12.279-10.088 1.711-9.38 18.702-1.301 17.332zm13.273 0c8.077 1.37 8.785-15.621-1.303-17.333-3.888-.659-3.287 9.701-3.021 12.279.264 2.536 1.994 4.658 4.324 5.054zm-17.417 8.005c0-1.348-.481-2.57-1.256-3.459-1.275-1.666-5.328-5.035-6.323-4.172-2.077 1.806-2.01 6.251-.759 9.481.643 1.796 2.196 3.059 4.011 3.059 2.389 0 4.327-2.198 4.327-4.909zm29.137-7.631c-.993-.863-5.046 2.506-6.321 4.172-.775.889-1.257 2.111-1.257 3.459 0 2.711 1.94 4.909 4.327 4.909 1.816 0 3.37-1.263 4.013-3.059 1.248-3.23 1.317-7.675-.762-9.481zm-8.136 15.277c-3.676-1.833-3.562-5.363-4.398-8.584-.665-2.569-3.02-4.469-5.823-4.469-2.743 0-5.057 1.821-5.779 4.312-.895 3.082-.356 6.67-4.363 8.717-3.255 1.061-4.573 2.609-4.573 6.27 0 2.974 2.553 6.158 5.848 6.554 3.676.554 6.544-.17 8.867-1.494 2.323 1.324 5.189 2.047 8.871 1.494 3.293-.396 5.847-3.568 5.847-6.554-.001-3.741-1.235-5.135-4.497-6.246zm-4.337 4.474h-3.811l.005 4h-4.156l.006-4h-4.044v-4h4.045l-.006-4h4.156l-.005 4h3.81v4z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="space-y-5 group-hover:-translate-y-3 transition-all duration-300">
                        <h3 class="text-2xl font-semibold mt-5 text-center">Comprehensive Pet Healthcare Services</h3>
                        <p class="text-center text-sm text-dark/60 font-medium">From routine check-ups and vaccinations to
                            emergency treatments and specialized surgeries, we offer a full range of veterinary services
                            tailored to your pet’s needs.</p>
                        {{-- <div class="flex justify-center">
                            <a href=""
                                class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs">
                                <span>read more</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div
                    class="bg-white shadow-sm hover:shadow-lg transition-all duration-300 px-8 pb-10 grid justify-center group">
                    <div
                        class="bg-primary_dark p-3 w-min mx-auto h-min -translate-y-5 shadow-2xl group-hover:-translate-y-8 transition-all duration-300">
                        <svg class="w-16 h-16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <defs>
                                    <clipPath id="clip-pricetag2">
                                        <rect width="32" height="32"></rect>
                                    </clipPath>
                                </defs>
                                <g id="pricetag2" clip-path="url(#clip-pricetag2)">
                                    <g id="Group_2401" data-name="Group 2401" transform="translate(-208 -260)">
                                        <g id="Group_2397" data-name="Group 2397">
                                            <g id="Group_2396" data-name="Group 2396">
                                                <g id="Group_2395" data-name="Group 2395">
                                                    <path id="Path_3856" data-name="Path 3856"
                                                        d="M227.168,273.419l.524-.524q.4-.4.087-.708t-.713.1l-.514.514a3.37,3.37,0,0,0-2.156-.915,2.941,2.941,0,0,0-2.675,2.156,2.6,2.6,0,0,0,.08,1.337,8.391,8.391,0,0,0,.687,1.486l-2.256,2.255a1.844,1.844,0,0,1-.254-.788,1.652,1.652,0,0,1,.092-.679,8.652,8.652,0,0,1,.381-.836.745.745,0,0,0,.077-.495.906.906,0,0,0-.267-.471.854.854,0,0,0-.64-.266.828.828,0,0,0-.6.237,2.367,2.367,0,0,0-.507.779,2.985,2.985,0,0,0-.211,1.05,3.323,3.323,0,0,0,.2,1.215,4.338,4.338,0,0,0,.725,1.258l-1.309,1.31a.861.861,0,0,0-.26.4.386.386,0,0,0,.138.352.336.336,0,0,0,.376.114,1.61,1.61,0,0,0,.473-.362l1.208-1.207a3.856,3.856,0,0,0,1.562.834,2.913,2.913,0,0,0,1.552-.024,3.061,3.061,0,0,0,1.295-.776,2.85,2.85,0,0,0,.65-.975,2.564,2.564,0,0,0,.174-1.1,2.806,2.806,0,0,0-.245-1.031q-.22-.492-.657-1.259l2.018-2.017a1.554,1.554,0,0,1-.034,1.576.853.853,0,0,0,.1,1.13.826.826,0,0,0,.606.252.807.807,0,0,0,.6-.242,1.666,1.666,0,0,0,.362-.6,2.914,2.914,0,0,0,.172-.846,2.5,2.5,0,0,0-.162-1.133A4.3,4.3,0,0,0,227.168,273.419Zm-4.263,6.31a1.413,1.413,0,0,1-.956.422,1.883,1.883,0,0,1-1.149-.364l2.124-2.124a2.987,2.987,0,0,1,.374,1.154A1.174,1.174,0,0,1,222.9,279.729Zm.844-4.123a2.76,2.76,0,0,1-.294-1.006,1.274,1.274,0,0,1,1.2-1.167,2.414,2.414,0,0,1,.955.315Z"
                                                        fill="#ffffff"></path>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="Group_2400" data-name="Group 2400">
                                            <g id="Group_2399" data-name="Group 2399">
                                                <g id="Group_2398" data-name="Group 2398">
                                                    <path id="Path_3857" data-name="Path 3857"
                                                        d="M239.516,261.014a.47.47,0,0,0-.519-.462.506.506,0,0,0-.48.514c0,.063-.013,1.556-3.314,1.978a4.632,4.632,0,0,0-1.631.529l-1.613-1.614a1,1,0,0,0-.966-.259l-8.016,2.149a1,1,0,0,0-.675.292l-13.526,13.526a1,1,0,0,0,0,1.414l12.08,12.079a1,1,0,0,0,1.414,0L235.8,277.635a1,1,0,0,0,.292-.673l2.148-8.018a1,1,0,0,0-.259-.966l-3.657-3.657a3.672,3.672,0,0,1,1.01-.285C239.621,263.488,239.522,261.114,239.516,261.014Zm-5.361,15.433-12.592,12.592L210.9,278.374l12.592-12.593,7.464-2,1.092,1.093a7.589,7.589,0,0,0-1.165,2.164,2.122,2.122,0,1,0,.967.245,6.461,6.461,0,0,1,.908-1.7l3.4,3.4Zm-2.545-8.12a1,1,0,1,1-1.415,0,.978.978,0,0,1,.371-.227,7.822,7.822,0,0,0-.161.886.5.5,0,0,0,.448.545.423.423,0,0,0,.05,0,.5.5,0,0,0,.5-.451,7.226,7.226,0,0,1,.147-.8C231.566,268.3,231.591,268.309,231.61,268.327Z"
                                                        fill="#ffffff"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="space-y-5 group-hover:-translate-y-3 transition-all duration-300">
                        <h3 class="text-2xl font-semibold mt-5 text-center">Affordable & Transparent Pricing</h3>
                        <p class="text-center text-sm text-dark/60 font-medium">We believe in offering high-quality care at
                            reasonable prices. Our transparent pricing policy ensures pet owners know exactly what they are
                            paying for.</p>
                        {{-- <div class="flex justify-center">
                            <a href=""
                                class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs">
                                <span>read more</span>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div
                    class="bg-white shadow-sm hover:shadow-lg transition-all duration-300 px-8 pb-10 grid justify-center group">
                    <div
                        class="bg-primary_dark p-3 w-min mx-auto h-min -translate-y-5 shadow-2xl group-hover:-translate-y-8 transition-all duration-300">
                        <svg class="w-16 h-16" fill="#ffffff" height="200px" width="200px" version="1.1"
                            id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 489.714 489.714" xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M468.493,240.568c-11.5-1-20.9,7.3-21.9,18.8c-6.3,92.8-75.1,169.9-166.8,186.6c-79.4,14.4-158.7-18.7-203.7-83.3 l43.1,6.2c10.4,2.1,20.9-6.3,21.9-16.7c1-11.5-6.3-21.9-17.7-22.9l-85.5-12.6c-11.5-1-20.9,6.3-22.9,17.7l-12.5,85.5 c-1,11.5,6.3,21.9,17.7,22.9c13.4,1.1,21.9-7.3,24-17.7l4.5-31.3c94.9,117.8,223.8,94.9,238.4,92.8 c109.5-19.8,192.9-112.6,200.2-224.1C488.293,250.968,479.993,241.568,468.493,240.568z">
                                            </path>
                                            <path
                                                d="M471.593,48.768c-11.5-1-20.9,6.3-22.9,17.7l-5.2,36.7c-54.4-76.2-148.8-116.3-244-99.3 c-109.4,19.8-191.8,111.6-199.1,224.2c-1,11.5,7.3,20.9,19.8,21.9c10.4,0,18.8-8.3,19.8-19.8c6.3-92.8,75.1-169.9,166.8-186.6 c80.7-14.5,159.8,19.9,204.4,84.6l-37.6-5.4c-11.5-1-21.9,6.3-22.9,17.7c-1,10.4,6.3,20.9,17.7,21.9l85.5,12.5 c14.1,0.6,21.9-7.3,22.9-17.7l12.5-85.5C490.393,60.168,483.093,49.768,471.593,48.768z">
                                            </path>
                                        </g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M226.993,310.268h-82.1c-5.4,0-10.3-3.3-12.4-8.3c-2.1-5-1-10.8,2.8-14.7l61.6-62.6c2.5-3.6,3.9-7.8,3.9-12.2 c0-11.7-9.5-21.2-21.2-21.2s-21.2,9.5-21.2,21.2c0,7.4-6,13.5-13.5,13.5c-7.4,0-13.5-6-13.5-13.5c0-26.5,21.6-48.1,48.1-48.1 s48.1,21.6,48.1,48.1c0,10.6-3.4,20.7-9.8,29.2c-0.3,0.5-0.7,0.9-1.1,1.3l-39.7,40.3h49.9c7.4,0,13.5,6,13.5,13.5 S234.493,310.268,226.993,310.268z">
                                                </path>
                                            </g>
                                            <g>
                                                <path
                                                    d="M321.993,310.268c-7.4,0-13.5-6-13.5-13.5v-20.2h-57.3c-5.2,0-10-3-12.2-7.8c-2.2-4.7-1.5-10.3,1.8-14.3l70.8-85.1 c3.6-4.4,9.6-6,15-4.1c5.3,1.9,8.9,7,8.9,12.7v71.6h9.4c7.4,0,13.5,6,13.5,13.5c0,7.4-6,13.5-13.5,13.5h-9.4v20.2 C335.493,304.268,329.393,310.268,321.993,310.268z M279.893,249.568h28.6v-34.3L279.893,249.568z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="space-y-5 group-hover:-translate-y-3 transition-all duration-300">
                        <h3 class="text-2xl font-semibold mt-5 text-center">24/7 Emergency Support & Critical Care</h3>
                        <p class="text-center text-sm text-dark/60 font-medium">Vetspital provides urgent care services and
                            emergency consultations, ensuring that your pet gets the help they need when they need it the
                            most.
                        </p>
                        {{-- <div class="flex justify-center">
                            <a href=""
                                class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs">
                                <span>read more</span>
                            </a>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Mission and vision --}}
    <div class="bg-secondary_dark/20 flex gap-12">
        <div class="flex-grow py-24 lg:py-36 xl:pl-72 lg:pl-44 px-16 md:px-20 lg:px-0">
            <div class="mb-8">
                <p class="uppercase font-extrabold text-secondary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-secondary_dark"></span>
                    <span>Mission & vision</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">What Does VetsPital Wants To Achieve</h2>
                {{-- <p class="text-sm text-dark/60 leading-relaxed font-medium">
                    To revolutionize animal healthcare in Bangladesh. <br>Challenge status quo on animal healthcare and be a
                    change agent in redefining veterinary care.
                </p> --}}
            </div>
            <div class="space-y-5">
                <div>
                    <p class="uppercase font-extrabold text-secondary_dark text-xs tracking-widest mb-5">
                        Our Mission
                    </p>
                    <p class="text-sm leading-relaxed">
                        At Vetspital, our mission is to redefine veterinary healthcare in Bangladesh by providing
                        compassionate, high-quality, and evidence-based medical services for pets. We are dedicated to
                        ensuring the health and well-being of animals through advanced diagnostics, personalized treatment
                        plans, and preventive care. Our approach combines cutting-edge veterinary medicine with a deep
                        understanding of the human-animal bond, ensuring that every pet receives the best possible care in a
                        stress-free environment. <br> <br>

                        We strive to build long-term relationships with pet owners by offering transparent communication,
                        ethical treatment practices, and a commitment to continuous education. By fostering a culture of
                        excellence, innovation, and empathy, Vetspital aims to enhance the standard of veterinary care and
                        promote responsible pet ownership within our community.

                    </p>
                </div>
                <div>
                    <p class="uppercase font-extrabold text-secondary_dark text-xs tracking-widest mb-5">
                        Our Vision
                    </p>
                    <p class="text-sm leading-relaxed">
                        Our vision is to establish Vetspital as a center of excellence in veterinary medicine, recognized
                        both nationally and internationally for its advanced healthcare services, ethical standards, and
                        innovative approach to pet care. We aspire to be at the forefront of veterinary advancements by
                        integrating modern technology, research-driven treatments, and a team of highly skilled
                        professionals dedicated to lifelong learning. <br><br>

                        Vetspital envisions a future where every pet receives timely and effective medical attention,
                        ensuring a longer, healthier, and happier life. Beyond clinical services, we aim to contribute to
                        the broader veterinary field by engaging in research, collaborating with global experts, and
                        actively participating in community initiatives such as animal welfare programs, pet adoption
                        drives, and public education on pet health. <br><br>

                        Through our unwavering commitment to quality, compassion, and innovation, Vetspital seeks to raise
                        the benchmark for veterinary care in Bangladesh and set new standards in the industry for
                        generations to come.


                    </p>
                </div>
                {{-- <ul class="text-dark/70 text-sm space-y-4 font-medium mb-16">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 stroke-secondary" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M18 20.75H6C5.27065 20.75 4.57118 20.4603 4.05546 19.9445C3.53973 19.4288 3.25 18.7293 3.25 18V6C3.25 5.27065 3.53973 4.57118 4.05546 4.05546C4.57118 3.53973 5.27065 3.25 6 3.25H14.86C15.0589 3.25 15.2497 3.32902 15.3903 3.46967C15.531 3.61032 15.61 3.80109 15.61 4C15.61 4.19891 15.531 4.38968 15.3903 4.53033C15.2497 4.67098 15.0589 4.75 14.86 4.75H6C5.66848 4.75 5.35054 4.8817 5.11612 5.11612C4.8817 5.35054 4.75 5.66848 4.75 6V18C4.75 18.3315 4.8817 18.6495 5.11612 18.8839C5.35054 19.1183 5.66848 19.25 6 19.25H18C18.3315 19.25 18.6495 19.1183 18.8839 18.8839C19.1183 18.6495 19.25 18.3315 19.25 18V10.29C19.25 10.0911 19.329 9.90032 19.4697 9.75967C19.6103 9.61902 19.8011 9.54 20 9.54C20.1989 9.54 20.3897 9.61902 20.5303 9.75967C20.671 9.90032 20.75 10.0911 20.75 10.29V18C20.75 18.7293 20.4603 19.4288 19.9445 19.9445C19.4288 20.4603 18.7293 20.75 18 20.75Z"
                                    class="fill-secondary"></path>
                                <path
                                    d="M10.5 15.25C10.3071 15.2352 10.1276 15.1455 10 15L7.00001 12C6.93317 11.86 6.91136 11.7028 6.93759 11.5499C6.96382 11.3971 7.03679 11.2561 7.14646 11.1464C7.25613 11.0368 7.3971 10.9638 7.54996 10.9376C7.70282 10.9113 7.86006 10.9331 8.00001 11L10.47 13.47L19 4.99998C19.14 4.93314 19.2972 4.91133 19.4501 4.93756C19.6029 4.96379 19.7439 5.03676 19.8536 5.14643C19.9632 5.2561 20.0362 5.39707 20.0624 5.54993C20.0887 5.70279 20.0669 5.86003 20 5.99998L11 15C10.8724 15.1455 10.693 15.2352 10.5 15.25Z"
                                    class="fill-secondary"></path>
                            </g>
                        </svg>
                        <span>
                            Strive to be a global leader in transforming how pets are nurtured and cherished.
                        </span>
                    </li>
                </ul>
                <div>
                    <img class="mb-5" src="{{ asset('assets/frontend/images/ceo-signature.png') }}" alt="">
                    <h3 class="text-3xl mb-3">Briar Ford</h3>
                    <p class="text-secondary_dark font-semibold uppercase tracking-widest text-sm">CEO & Founder</p>
                </div> --}}
            </div>
        </div>
        <div class="hidden lg:block w-1/5 flex-shrink-0 bg-secondary">
            <img class="w-full h-full object-cover object-left"
                src="{{ asset('assets/frontend/images/mission_bg.png') }}" />
        </div>

        {{-- <div class="flex-grow grid justify-items-center py-28 max-w-screen-2xl mx-auto">
            <div class="mb-5"><img src="{{ asset('assets/frontend/images/header-icon.png') }}" alt=""></div>
            <h1 class="text-4xl font-semibold mb-3">Why Choose Us</h1>
            <div class="grid sm:grid-cols-3 px-28 md:px-16 mt-10 gap-16 text-center">
                <div class="exp-card grid justify-items-center aos-init aos-animate" data-aos="zoom-in-up">
                    <div class="w-36 h-36 shadow-md border p-9 rounded-full mb-10 grid place-items-center">
                        <img class="w-full"
                            src="data:image/png;base64,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"
                            alt="">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 cursor-pointer">Modern Techniques</h3>
                    <p class="text-lg leading-relaxed">We use a combination of traditional and modern techniques to heal
                        patients.</p>
                </div>
                <div class="exp-card grid justify-items-center aos-init aos-animate" data-aos="zoom-in-up">
                    <div class="w-36 h-36 shadow-md border p-9 rounded-full mb-10 grid place-items-center">
                        <img class="w-full"
                            src="data:image/png;base64,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"
                            alt="">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 cursor-pointer">Qualified Specialist</h3>
                    <p class="text-lg leading-relaxed">Our team of more than 40+ professionals are highly trained to
                        serve our patient's needs.</p>
                </div>
                <div class="exp-card grid justify-items-center aos-init aos-animate" data-aos="zoom-in-up">
                    <div class="w-36 h-36 shadow-md border p-9 rounded-full mb-10 grid place-items-center">
                        <img class="w-full"
                            src="data:image/png;base64,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"
                            alt="">
                    </div>
                    <h3 class="text-xl font-semibold mb-3 cursor-pointer">Therapy Services</h3>
                    <p class="text-lg leading-relaxed">Cessna Lifeline offers a wide variety of therapy services that
                        helps in treating even the most complex diseases.</p>
                </div>
            </div>
        </div> --}}
    </div>

    {{-- Services --}}

    <div id="services">
        <div class="max-w-screen-2xl mx-auto py-24 lg:py-36 px-10">
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
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5 xl:gap-8">
                            @foreach ($category->services as $service)
                                <div
                                    class="p-8 xl:p-12 bg-white border border-dark/5 shadow-lg flex flex-col space-y-7 hover:shadow-2xl hover:-translate-y-4 transition-all duration-300">
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

    {{-- Statistics --}}

    {{-- <div id="statistics" class="h-72 md:p-8 grid items-center" id="stats" role="tabpanel"
        aria-labelledby="stats-tab">
        <dl class="grid grid-cols-2 gap-8 p-4 text-gray-900 sm:grid-cols-2 xl:grid-cols-4 sm:p-8">
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-6xl font-extrabold">{{ getSettings('choose_us_consultation') }}+</dt>
                <dd class="font-semibold">Consultation</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-6xl font-extrabold">{{ getSettings('choose_us_surgery') }}+</dt>
                <dd class="font-semibold">Surgery</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-6xl font-extrabold">{{ getSettings('choose_us_online_consultation') }}</dt>
                <dd class="font-semibold">Online Consultation</dd>
            </div>
            <div class="flex flex-col items-center justify-center">
                <dt class="mb-2 text-6xl font-extrabold">{{ getSettings('choose_us_diagnostic') }}+</dt>
                <dd class="font-semibold">Diagnostics</dd>
            </div>
        </dl>
    </div> --}}

    {{-- Featured plans --}}
    <div id="featured-plans" class="bg-primary_dark/10">
        <div class="max-w-screen-2xl mx-auto py-24 lg:py-36 px-10 grid justify-items-center">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Plans</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">Featured Plans</h2>
                <p class="text-dark/60 leading-relaxed font-medium max-w-xl">
                    It is a long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout.
                </p>
            </div>
            <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <div class="p-12 bg-white border border-dark/5 shadow-lg flex flex-col space-y-8">
                        <div>
                            <div>
                                <h2 class="text-dark/70 uppercase tracking-wide text-lg font-medium leading-relaxed mb-5">
                                    {{ $product->title }}
                                </h2>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="flex items-end">
                                            <span class="text-6xl font-semibold">
                                                ${{ $product->price }}
                                            </span>
                                            <span class="font-medium text-dark/60">/ Year</span>
                                        </p>
                                        <div class="flex items-center mt-2.5">
                                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                            </div>
                                            <span
                                                class="bg-highlight text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 ms-3">5.0</span>
                                        </div>

                                    </div>
                                    <img class="w-auto h-32" src="{{ asset('assets/frontend/images/puppy.svg') }}"
                                        alt="product image" />
                                </div>
                            </div>
                        </div>

                        <p class="text-dark/60 font-medium">
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page.
                        </p>

                        <div class="h-[1px] border-b my-3"></div>

                        <div>
                            <ul class="space-y-4">
                                <li class="flex items-center gap-2 text-dark/60 font-medium">
                                    <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="16" height="16" id="icon-bound" fill="none"></rect>
                                            <path
                                                d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Professional Calendar View</span>
                                </li>
                                <li class="flex items-center gap-2 text-dark/60 font-medium">
                                    <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="16" height="16" id="icon-bound" fill="none"></rect>
                                            <path
                                                d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Free Google Analytics</span>
                                </li>
                                <li class="flex items-center gap-2 text-dark/60 font-medium">
                                    <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="16" height="16" id="icon-bound" fill="none"></rect>
                                            <path
                                                d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Unlimited Task and Comments</span>
                                </li>
                                <li class="flex items-center gap-2 text-dark/60 font-medium">
                                    <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="16" height="16" id="icon-bound" fill="none"></rect>
                                            <path
                                                d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Unlimited Task and Comments</span>
                                </li>
                                <li class="flex items-center gap-2 text-dark/60 font-medium">
                                    <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="16" height="16" id="icon-bound" fill="none"></rect>
                                            <path
                                                d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Unlimited Task and Comments</span>
                                </li>
                                <li class="flex items-center gap-2 text-dark/60 font-medium">
                                    <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="16" height="16" id="icon-bound" fill="none"></rect>
                                            <path
                                                d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Professional Calendar View</span>
                                </li>
                                <li class="flex items-center gap-2 text-dark/60 font-medium">
                                    <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <rect width="16" height="16" id="icon-bound" fill="none"></rect>
                                            <path
                                                d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                            </path>
                                        </g>
                                    </svg>
                                    <span>Free Google Analytics</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <a href="{{ route('product.details', ['product' => $product->id]) }}"
                                class="text-light border-2 bg-primary transition-all duration-300 uppercase hover:bg-primary_dark hover:text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                                View Details
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>


    {{-- Our Team --}}
    <div>
        <div class="max-w-screen-2xl mx-auto py-24 px-10 grid justify-items-center">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Doctors</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">Our Outstanding Doctors</h2>
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

    {{-- Reviews --}}
    <div id="reviews" class="bg-secondary/20">
        <div class="max-w-screen-2xl mx-auto py-24 lg:py-36 px-10">
            <div class="mb-16 flex flex-col">
                <p class="uppercase font-extrabold text-secondary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-secondary_dark"></span>
                    <span>Testimonial</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">What Our Clients Says</h2>
            </div>
            <div class=" xl:grid xl:grid-cols-3 gap-20">

                <div class="swiper reviewSwiper col-span-2">
                    <div class="swiper-wrapper">

                        @foreach ($reviews as $review)
                            <div class="swiper-slide">
                                <div class="pb-5">
                                    <div class="h-64 relative text-gray-700 p-8 bg-light shadow-lg">
                                        <p
                                            class="h-full text-xl text-dark/70 leading-loose italic overflow-hidden text-ellipsis line-clamp-5">
                                            " {{ $review->description }} "
                                        </p>
                                    </div>
                                    <div class="author flex items-center gap-5 mt-10">
                                        <div class="author-image bg-cover bg-top w-16 h-16 rounded-full"
                                            style="background-image: url(&quot;https://i.postimg.cc/g2Vq3b7h/albert-dera-ILip77-Sbm-OE-unsplash.jpg&quot;);">
                                        </div>
                                        <div class="author-detail text-left">
                                            <p class="author-name text-lg font-medium">{{ $review->user->name }}</p>
                                            <p class="author-title text-dark/60 uppercase text-sm tracking-wider">
                                                {{ $review->user->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                <div class="relative">
                    <div class="bg-secondary p-12 xl:absolute -bottom-44 right-0 xl:w-max shadow-xl">
                        <div class="space-y-8 [max:1280px]:grid md:grid-cols-2 gap-5">
                            <div class="flex gap-8 text-light items-center">

                                <svg class="h-14 flex-shrink-0" viewBox="0 0 15 15" version="1.1" id="doctor"
                                    xmlns="http://www.w3.org/2000/svg" fill="#f8f8ff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M5.5,7C4.1193,7,3,5.8807,3,4.5l0,0v-2C3,2.2239,3.2239,2,3.5,2H4c0.2761,0,0.5-0.2239,0.5-0.5S4.2761,1,4,1H3.5
                                                                                             C2.6716,1,2,1.6716,2,2.5v2c0.0013,1.1466,0.5658,2.2195,1.51,2.87l0,0C4.4131,8.1662,4.9514,9.297,5,10.5C5,12.433,6.567,14,8.5,14
                                                                                             s3.5-1.567,3.5-3.5V9.93c1.0695-0.2761,1.7126-1.367,1.4365-2.4365C13.1603,6.424,12.0695,5.7809,11,6.057
                                                                                             C9.9305,6.3332,9.2874,7.424,9.5635,8.4935C9.7454,9.198,10.2955,9.7481,11,9.93v0.57c0,1.3807-1.1193,2.5-2.5,2.5S6,11.8807,6,10.5
                                                                                             c0.0511-1.2045,0.5932-2.3356,1.5-3.13l0,0C8.4404,6.7172,9.001,5.6448,9,4.5v-2C9,1.6716,8.3284,1,7.5,1H7
                                                                                             C6.7239,1,6.5,1.2239,6.5,1.5S6.7239,2,7,2h0.5C7.7761,2,8,2.2239,8,2.5v2l0,0C8,5.8807,6.8807,7,5.5,7 M11.5,9
                                                                                             c-0.5523,0-1-0.4477-1-1s0.4477-1,1-1s1,0.4477,1,1S12.0523,9,11.5,9z">
                                        </path>
                                    </g>
                                </svg>
                                <div>
                                    <p class="text-[2.5rem] font-medium tracking-wider">
                                        {{ getSettings('choose_us_consultation') }}+</p>
                                    <p class="font-medium uppercase tracking-widest">Consultation</p>
                                </div>
                            </div>
                            <div class="flex gap-8 text-light items-center">
                                <svg class="h-14 flex-shrink-0" fill="#f8f8ff" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 406.836 406.836" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path style="fill-rule:evenodd;clip-rule:evenodd;"
                                            d="M144.722,225.265h242.11v-15.122c0-5.522,4.478-10,10-10s10,4.478,10,10 v25.122c0,5.522-4.478,10-10,10h-252.11c-5.522,0-10-4.478-10-10S139.199,225.265,144.722,225.265z M240.212,212.143 c4.931,2.488,10.944,0.509,13.434-4.422c8.402-16.65,17.85-23.441,32.606-23.441h20.7c14.758,0,24.205,6.791,32.607,23.441 c1.76,3.485,5.28,5.496,8.936,5.496c1.515,0,3.053-0.346,4.498-1.074c4.931-2.488,6.91-8.503,4.422-13.434 c-7.46-14.78-20.807-34.43-50.463-34.43h-20.7c-29.655,0-43.002,19.649-50.462,34.43 C233.302,203.64,235.282,209.655,240.212,212.143z M246.045,103.756c0-20.043,12.547-37.662,30.775-44.541 c2.867-23.524,22.963-41.808,47.249-41.808c26.248,0,47.602,21.354,47.602,47.601c0,20.325-12.806,37.717-30.773,44.528 c-2.861,23.53-22.962,41.818-47.253,41.818C267.398,151.355,246.045,130.002,246.045,103.756z M296.47,65.008 c0,0.439,0.011,0.876,0.03,1.311c0.001,0.012,0.002,0.024,0.002,0.037c0.003,0.046,0.005,0.094,0.008,0.141 c0.774,14.498,12.79,26.062,27.466,26.111c0.013-0.003,0.028,0,0.043,0c0.003,0,0.004,0,0.007,0c0.028,0,0.057,0,0.087,0 c0.014,0,0.028,0,0.042,0c0.012,0,0.023-0.002,0.041,0c0.014,0,0.026-0.002,0.04,0c1.097-0.007,2.195-0.079,3.283-0.215 c0.008,0,0.014-0.002,0.021-0.002c13.587-1.712,24.132-13.339,24.132-27.383c0-15.219-12.382-27.601-27.602-27.601 C308.851,37.408,296.47,49.79,296.47,65.008z M266.045,103.756c0,15.218,12.381,27.599,27.6,27.599 c12.193,0,22.564-7.945,26.207-18.931c-19.038-1.666-34.913-14.501-40.864-32.066C271.136,85.288,266.045,94.03,266.045,103.756z M82.109,157.585c24.175,0,43.842,19.667,43.842,43.841s-19.667,43.841-43.842,43.841c-24.174,0-43.841-19.667-43.841-43.841 S57.936,157.585,82.109,157.585z M82.109,177.585c-13.146,0-23.841,10.695-23.841,23.841s10.695,23.841,23.841,23.841 c13.146,0,23.842-10.695,23.842-23.841S95.256,177.585,82.109,177.585z M406.836,379.428c0,5.522-4.478,10-10,10H10.002 c-5.522,0-10-4.478-10-10s4.478-10,10-10h38.349V284.89H10c-5.522,0-10-4.478-10-10c0-0.067,0.001-0.135,0.002-0.201V93.235 c0-32.173,26.174-58.348,58.347-58.348h34.124c36.635,0,67.017,27.276,71.901,62.589h39.041c5.522,0,10,4.478,10,10s-4.478,10-10,10 h-96.706c-5.522,0-10-4.478-10-10s4.478-10,10-10h37.397c-4.683-24.233-26.055-42.589-51.634-42.589H58.349 c-21.145,0-38.347,17.203-38.347,38.348V264.89h328.28c0.133-0.002,0.27-0.002,0.402,0h48.151c5.522,0,10,4.478,10,10 s-4.478,10-10,10h-38.353v84.538h38.353C402.358,369.428,406.836,373.906,406.836,379.428z M338.483,284.89H68.351v84.538h270.133 V284.89z M324.071,76.064c6.104,0,11.056-4.951,11.056-11.056c0-6.106-4.952-11.057-11.056-11.057 c-6.107,0-11.058,4.95-11.058,11.057C313.013,71.114,317.964,76.064,324.071,76.064z">
                                        </path>
                                    </g>
                                </svg>
                                <div>
                                    <p class="text-[2.5rem] font-medium tracking-wider">
                                        {{ getSettings('choose_us_surgery') }}+</p>
                                    <p class="font-medium uppercase tracking-widest">Surgery</p>
                                </div>
                            </div>
                            <div class="flex gap-8 text-light items-center">
                                <svg class="h-14 flex-shrink-0" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                                    fill="#f8f8ff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: # class="post-date absolute top-0 right-0 w-20 h-20 items-center justify-center text-xl flex flex-col bg-primary_dark text-light"&gt;
                                                    ;
                                                }

                                                .cls-2 {
                                                    fill: #f8f8ff;
                                                }
                                            </style>
                                        </defs>
                                        <g data-name="15. Consultation" id="_15._Consultation">
                                            <rect class="cls-1" height="4" rx="1" width="8" x="12"
                                                y="24"></rect>
                                            <path class="cls-2"
                                                d="M31,24V7a3,3,0,0,0-3-3H27a1,1,0,0,0,0,2h1a1,1,0,0,1,1,1V24H3V7A1,1,0,0,1,4,6H5A1,1,0,0,0,5,4H4A3,3,0,0,0,1,7V24a1,1,0,0,0-1,1v2a5,5,0,0,0,5,5H27a5,5,0,0,0,5-5V25A1,1,0,0,0,31,24Zm-1,3a3,3,0,0,1-3,3H5a3,3,0,0,1-3-3V26H30Z">
                                            </path>
                                            <path class="cls-2"
                                                d="M26,10a3,3,0,1,0-4,2.82V14a4,4,0,0,1-8,0V10a1,1,0,0,0-2,0v4a6,6,0,0,0,12,0V12.82A3,3,0,0,0,26,10Zm-3,1a1,1,0,1,1,1-1A1,1,0,0,1,23,11Z">
                                            </path>
                                            <path class="cls-1"
                                                d="M13,10A5,5,0,0,1,8,5V2a2,2,0,0,1,2-2h1a1,1,0,0,1,0,2H10V5a3,3,0,0,0,6,0V2H15a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2V5A5,5,0,0,1,13,10Z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                                <div>
                                    <p class="text-[2.5rem] font-medium tracking-wider">
                                        {{ getSettings('choose_us_online_consultation') }}+</p>
                                    <p class="font-medium uppercase tracking-widest">Online Consultation</p>
                                </div>
                            </div>
                            <div class="flex gap-8 text-light items-center">
                                <svg class="h-14 flex-shrink-0" viewBox="0 0 15 15" version="1.1" id="blood-bank"
                                    xmlns="http://www.w3.org/2000/svg" fill="#f8f8ff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M11.2,7.1L11.2,7.1L7.5,2L3.8,7.1h0C3.3,7.8,3,8.7,3,9.6C3,12,5,14,7.5,14c0,0,0,0,0,0C10,14,12,12,12,9.6c0,0,0,0,0,0
                                                                                 C12,8.7,11.7,7.8,11.2,7.1z M10,10H8v2H7v-2H5V9h2V7h1v2h2V10z">
                                        </path>
                                    </g>
                                </svg>
                                <div>
                                    <p class="text-[2.5rem] font-medium tracking-wider">
                                        {{ getSettings('choose_us_diagnostic') }}+</p>
                                    <p class="font-medium uppercase tracking-widest">Diagnostics</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Companies --}}
    <div class="bg-light">
        <div class="scroller max-w-screen-2xl mx-auto py-24 lg:py-36 px-10 overflow-hidden">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Our Partners</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">Look Who's Talking About Us</h2>
                <p class="text-dark/60 leading-relaxed font-medium max-w-xl">
                    Check out what some of the famous publishers wrote about Cessna Lifeline.
                </p>
            </div>
            <ul class="scroller_inner flex flex-wrap gap-x-20">
                <li class="flex-shrink-0">
                    <img class="w-40" src="https://www.cessnalifeline.com/media/wysiwyg/brand/newz3.png"
                        alt="" />
                </li>
                <li class="flex-shrink-0">
                    <img class="w-40" src="https://www.cessnalifeline.com/media/wysiwyg/brand/newz4.png"
                        alt="" />
                </li>
                <li class="flex-shrink-0">
                    <img class="w-40" src="https://www.cessnalifeline.com/media/wysiwyg/brand/newz5.png"
                        alt="" />
                </li>
                <li class="flex-shrink-0">
                    <img class="w-40" src="https://www.cessnalifeline.com/media/wysiwyg/brand/newz6.png"
                        alt="" />
                </li>
                <li class="flex-shrink-0">
                    <img class="w-40" src="https://www.cessnalifeline.com/media/wysiwyg/brand/newz1.png"
                        alt="" />
                </li>
                <li class="flex-shrink-0">
                    <img class="w-40" src="https://www.cessnalifeline.com/media/wysiwyg/brand/newz3.png"
                        alt="" />
                </li>
                <li class="flex-shrink-0">
                    <img class="w-40" src="https://www.cessnalifeline.com/media/wysiwyg/brand/newz2.png"
                        alt="" />
                </li>
            </ul>
        </div>
    </div>

    {{-- Gallery --}}


    {{-- Blogs --}}
    <div id="blogs">
        <div class="max-w-screen-2xl mx-auto py-32 grid justify-items-center">
            <div class="mb-16 text-center flex flex-col items-center justify-center">
                <p class="uppercase font-extrabold text-primary_dark text-xs tracking-widest flex items-center gap-2">
                    <span class="h-[2px] w-6 bg-primary_dark"></span>
                    <span>Blogs</span>
                </p>
                <h2 class="text-5xl mt-3 mb-5 font-medium leading-snug">
                    Stay Updated with our latest Articles
                </h2>
            </div>
            <div class="swiper blogSwiper px-10">
                <div class="swiper-wrapper">
                    @foreach ($posts as $post)
                        <div class="swiper-slide bg-white shadow-lg">
                            <div>
                                <div class="relative"><img class="w-full h-96 object-cover object-center" alt=""
                                        src="{{ Storage::url($post->image) }}">
                                    <div
                                        class="post-date absolute top-0 right-0 w-20 h-20 items-center justify-center text-xl flex flex-col bg-primary_dark text-light">
                                        @php
                                            $date = new DateTime($post->created_at);
                                            $dateFormat = $date->format('d _ M');
                                            $dateParts = explode(' _ ', $dateFormat);
                                            $dateFormat_d = $dateParts[0];
                                            $dateFormat_m = $dateParts[1];
                                        @endphp
                                        <span class=" font-semibold">{{ $dateFormat_d }}</span><span class="uppercase">
                                            {{ $dateFormat_m }}</span>
                                    </div>
                                </div>
                                <div class="p-8">
                                    <div class="flex gap-5 text-sm font-medium text-dark/60">
                                        {{-- <p class="uppercase">groomings</p> --}}
                                        <p>0 Comments</p>
                                        <p>{{ $post->view }} Views</p>
                                    </div>
                                    <h1 class="text-2xl font-medium my-3 leading-relaxed">{{ $post->title }}
                                    </h1>
                                    <p class="text-dark/60 text-sm font-medium leading-relaxed">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->description), 100) }}</p>
                                    {{-- <div class="relative py-8">
                                        <a href="{{ route('blog.details', $post) }}"
                                            class="absolute top-5 -right-5 bg-primary hover:bg-secondary hover:text-white duration-300 transition-all read-more-btn px-5 py-2 rounded-l-full font-semibold">
                                            Read More
                                        </a>
                                    </div> --}}
                                    <div class=" mt-8">
                                        <a href="{{ route('blog.details', $post) }}"
                                            class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs flex flex-col group w-max gap-1">
                                            <span>read more</span>
                                            <span
                                                class="h-[2px] w-6 bg-primary_dark group-hover:bg-secondary_dark group-hover:w-full transition-all duration-300"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="swiper-slide">
                        <div class="blog-card-container rounded aos-init aos-animate" data-aos="fade-up"
                            data-aos-duration="500">
                            <div class="relative"><img class="rounded-t w-full" alt=""
                                    src="https://i.ibb.co/kK3jKS1/news-5.png">
                                <div
                                    class="post-date absolute top-0 right-0 w-20 h-20 items-center justify-center text-white text-xl flex flex-col rounded-tr bg-primary">
                                    <span class=" font-semibold">23</span><span class="uppercase"> Feb</span>
                                </div>
                            </div>
                            <div class="p-5 bg-white border rounded">
                                <div class="flex gap-5 text-sm font-semibold text-gray-500">
                                    <p class="uppercase">groomings</p>
                                    <p>25 Comments</p>
                                    <p>130 Likes</p>
                                </div>
                                <h1 class="blog-title cursor-pointer text-xl font-bold mt-5 mb-3">At Away Gazel Petulantly
                                    Crud
                                    Lightheartedly</h1>
                                <p class="">Forwardly echidna outside tiger split thanks far vibrantly gosh hence
                                    pang.
                                    Oh w ...</p>
                                <div class="relative py-8"><a class="absolute top-5 -right-5" href="/">
                                        <button
                                            class="bg-primary primary-btn read-more-btn px-5 py-2 rounded-l-full font-semibold text-white">
                                            Read More
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card-container rounded aos-init aos-animate" data-aos="fade-up"
                            data-aos-duration="500">
                            <div class="relative"><img class="rounded-t w-full" alt=""
                                    src="https://i.ibb.co/W3sXrQ8/news-2.jpg">
                                <div
                                    class="post-date absolute top-0 right-0 w-20 h-20 items-center justify-center text-white text-xl flex flex-col rounded-tr bg-primary">
                                    <span class=" font-semibold">23</span><span class="uppercase"> Feb</span>
                                </div>
                            </div>
                            <div class="p-5 bg-white border rounded">
                                <div class="flex gap-5 text-sm font-semibold text-gray-500">
                                    <p class="uppercase">groomings</p>
                                    <p>25 Comments</p>
                                    <p>130 Likes</p>
                                </div>
                                <h1 class="blog-title cursor-pointer text-xl font-bold mt-5 mb-3">At Away Gazel Petulantly
                                    Crud
                                    Lightheartedly</h1>
                                <p class="">Forwardly echidna outside tiger split thanks far vibrantly gosh hence
                                    pang.
                                    Oh w ...</p>
                                <div class="relative py-8"><a class="absolute top-5 -right-5" href="/">
                                        <button
                                            class="bg-primary primary-btn read-more-btn px-5 py-2 rounded-l-full font-semibold text-white">
                                            Read More
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-card-container rounded aos-init aos-animate" data-aos="fade-up"
                            data-aos-duration="500">
                            <div class="relative"><img class="rounded-t w-full" alt=""
                                    src="https://i.ibb.co/CMPtL3G/news-1.jpg">
                                <div
                                    class="post-date absolute top-0 right-0 w-20 h-20 items-center justify-center text-white text-xl flex flex-col rounded-tr bg-primary">
                                    <span class=" font-semibold">23</span><span class="uppercase"> Feb</span>
                                </div>
                            </div>
                            <div class="p-5 bg-white border rounded">
                                <div class="flex gap-5 text-sm font-semibold text-gray-500">
                                    <p class="uppercase">groomings</p>
                                    <p>25 Comments</p>
                                    <p>130 Likes</p>
                                </div>
                                <h1 class="blog-title cursor-pointer text-xl font-bold mt-5 mb-3">At Away Gazel Petulantly
                                    Crud
                                    Lightheartedly</h1>
                                <p class="">Forwardly echidna outside tiger split thanks far vibrantly gosh hence
                                    pang.
                                    Oh w ...</p>
                                <div class="relative py-8"><a class="absolute top-5 -right-5" href="/">
                                        <button
                                            class="bg-primary primary-btn read-more-btn px-5 py-2 rounded-l-full font-semibold text-white">
                                            Read More
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>


@endsection
