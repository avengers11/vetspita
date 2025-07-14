@extends('frontend.layout')

@section('title', 'Service Details')

@section('css')
    <style>
        .description {
            line-height: 2;
            font-weight: 500;
            font-family: "Inter", serif;
        }

        .description p,
        .description span {
            color: rgba(28, 29, 33, 0.6);
            font-family: "Inter", serif;
        }

        .description a {
            color: rgb(93, 192, 163) !important;
        }

        .description h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: rgb(28, 29, 33) !important;
            font-weight: 500;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="p-16 sm:p-28 bg-primary/30 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">{{ $service->title }}</h1>

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium group text-primary_dark hover:text-secondary dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 fill-primary_dark group-hover:fill-secondary" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-primary_dark mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/services"
                                class="ms-1 text-sm font-medium text-primary_dark hover:text-secondary md:ms-2">Services</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-primary_dark mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-primary_dark md:ms-2">{{ $service->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="max-w-screen-2xl bg-white mx-auto py-28 px-10 grid xl:grid-cols-7 gap-y-10 xl:gap-10">
            <div class="xl:col-span-5 border border-primary/30">
                <img src="{{ Storage::url($service->image) }}" alt="">
                <div class="p-10">
                    <div class="description">@php echo $service->description; @endphp</div>
                </div>
            </div>
            <div class="max-[600px]:block max-[1279px]:grid max-[1279px]:grid-cols-2 gap-10 col-span-2 space-y-8">
                <div class="col-span-2 bg-primary/30 p-7">
                    <div class="mb-3">
                        <h3 class="text-xl font-medium tracking-wider flex flex-col gap-3 w-max">
                            <span>Other Services</span>
                            <span class="h-1 w-10 bg-primary_dark transition-all duration-300"></span>
                        </h3>
                    </div>

                    <div class="space-y-5 divide-y divide-dark/10">
                        <div class="flex gap-5 pt-5">
                            <a class="flex-shrink-0" href="">
                                <img class="w-24 h-24 object-cover object-center" src="{{ Storage::url($service->image) }}"
                                    alt="">
                            </a>
                            <div class="flex-grow">
                                <a href="" class="font-medium">{{ $service->title }}</a>
                                <div class="mt-3">
                                    <a href="{{ route('serviceDetails', $service) }}"
                                        class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs flex flex-col group w-max gap-1">
                                        <span>read more</span>
                                        <span
                                            class="h-[2px] w-6 bg-primary_dark group-hover:bg-secondary_dark group-hover:w-full transition-all duration-300"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-5 pt-5">
                            <a class="flex-shrink-0" href="">
                                <img class="w-24 h-24 object-cover object-center" src="{{ Storage::url($service->image) }}"
                                    alt="">
                            </a>
                            <div class="flex-grow">
                                <a href="" class="font-medium">{{ $service->title }}</a>
                                <div class="mt-3">
                                    <a href="{{ route('serviceDetails', $service) }}"
                                        class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs flex flex-col group w-max gap-1">
                                        <span>read more</span>
                                        <span
                                            class="h-[2px] w-6 bg-primary_dark group-hover:bg-secondary_dark group-hover:w-full transition-all duration-300"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-5 pt-5">
                            <a class="flex-shrink-0" href="">
                                <img class="w-24 h-24 object-cover object-center" src="{{ Storage::url($service->image) }}"
                                    alt="">
                            </a>
                            <div class="flex-grow">
                                <a href="" class="font-medium">{{ $service->title }}</a>
                                <div class="mt-3">
                                    <a href="{{ route('serviceDetails', $service) }}"
                                        class="text-primary_dark hover:text-secondary_dark transition-all uppercase tracking-widest font-semibold text-xs flex flex-col group w-max gap-1">
                                        <span>read more</span>
                                        <span
                                            class="h-[2px] w-6 bg-primary_dark group-hover:bg-secondary_dark group-hover:w-full transition-all duration-300"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-primary/30 p-7">
                    <div class="mb-3">
                        <h3 class="text-xl font-medium tracking-wider flex flex-col gap-3 w-max">
                            <span>Categories</span>
                            <span class="h-1 w-10 bg-primary_dark transition-all duration-300"></span>
                        </h3>
                    </div>

                    <div class="space-y-5 divide-y divide-dark/10">
                        <div class="flex items-center justify-between gap-5 pt-5">
                            <a class="flex-shrink-0 text-dark/60 font-medium" href="">
                                Speciality Services
                            </a>
                            <div>
                                <span
                                    class="bg-primary_dark grid place-items-center w-5 h-5 rounded-full text-light text-xs">2</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-5 pt-5">
                            <a class="flex-shrink-0 text-dark/60 font-medium" href="">
                                Regular Services
                            </a>
                            <div>
                                <span
                                    class="bg-primary_dark grid place-items-center w-5 h-5 rounded-full text-light text-xs">2</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between gap-5 pt-5">
                            <a class="flex-shrink-0 text-dark/60 font-medium" href="">
                                Speciality Services
                            </a>
                            <div>
                                <span
                                    class="bg-primary_dark grid place-items-center w-5 h-5 rounded-full text-light text-xs">2</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-primary/30 p-7">
                    <div class="mb-3">
                        <h3 class="text-xl font-medium tracking-wider flex flex-col gap-3 w-max">
                            <span>Reach Us</span>
                            <span class="h-1 w-10 bg-primary_dark transition-all duration-300"></span>
                        </h3>
                    </div>

                    <div class="space-y-5 divide-y divide-dark/10">
                        <div class="pt-5">
                            <div class="flex items-center gap-3">
                                <svg class="fill-primary_dark w-6 h-6" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M16.1007 13.359L15.5719 12.8272H15.5719L16.1007 13.359ZM16.5562 12.9062L17.085 13.438H17.085L16.5562 12.9062ZM18.9728 12.5894L18.6146 13.2483L18.9728 12.5894ZM20.8833 13.628L20.5251 14.2869L20.8833 13.628ZM21.4217 16.883L21.9505 17.4148L21.4217 16.883ZM20.0011 18.2954L19.4723 17.7636L20.0011 18.2954ZM18.6763 18.9651L18.7459 19.7119H18.7459L18.6763 18.9651ZM8.81536 14.7266L9.34418 14.1947L8.81536 14.7266ZM4.00289 5.74561L3.2541 5.78816L3.2541 5.78816L4.00289 5.74561ZM10.4775 7.19738L11.0063 7.72922H11.0063L10.4775 7.19738ZM10.6342 4.54348L11.2346 4.09401L10.6342 4.54348ZM9.37326 2.85908L8.77286 3.30855V3.30855L9.37326 2.85908ZM6.26145 2.57483L6.79027 3.10667H6.79027L6.26145 2.57483ZM4.69185 4.13552L4.16303 3.60368H4.16303L4.69185 4.13552ZM12.0631 11.4972L12.5919 10.9654L12.0631 11.4972ZM16.6295 13.8909L17.085 13.438L16.0273 12.3743L15.5719 12.8272L16.6295 13.8909ZM18.6146 13.2483L20.5251 14.2869L21.2415 12.9691L19.331 11.9305L18.6146 13.2483ZM20.8929 16.3511L19.4723 17.7636L20.5299 18.8273L21.9505 17.4148L20.8929 16.3511ZM18.6067 18.2184C17.1568 18.3535 13.4056 18.2331 9.34418 14.1947L8.28654 15.2584C12.7186 19.6653 16.9369 19.8805 18.7459 19.7119L18.6067 18.2184ZM9.34418 14.1947C5.4728 10.3453 4.83151 7.10765 4.75168 5.70305L3.2541 5.78816C3.35456 7.55599 4.14863 11.144 8.28654 15.2584L9.34418 14.1947ZM10.7195 8.01441L11.0063 7.72922L9.9487 6.66555L9.66189 6.95073L10.7195 8.01441ZM11.2346 4.09401L9.97365 2.40961L8.77286 3.30855L10.0338 4.99296L11.2346 4.09401ZM5.73263 2.04299L4.16303 3.60368L5.22067 4.66736L6.79027 3.10667L5.73263 2.04299ZM10.1907 7.48257C9.66189 6.95073 9.66117 6.95144 9.66045 6.95216C9.66021 6.9524 9.65949 6.95313 9.659 6.95362C9.65802 6.95461 9.65702 6.95561 9.65601 6.95664C9.65398 6.95871 9.65188 6.96086 9.64972 6.9631C9.64539 6.96759 9.64081 6.97245 9.63599 6.97769C9.62634 6.98816 9.61575 7.00014 9.60441 7.01367C9.58174 7.04072 9.55605 7.07403 9.52905 7.11388C9.47492 7.19377 9.41594 7.2994 9.36589 7.43224C9.26376 7.70329 9.20901 8.0606 9.27765 8.50305C9.41189 9.36833 10.0078 10.5113 11.5343 12.0291L12.5919 10.9654C11.1634 9.54499 10.8231 8.68059 10.7599 8.27309C10.7298 8.07916 10.761 7.98371 10.7696 7.96111C10.7748 7.94713 10.7773 7.9457 10.7709 7.95525C10.7677 7.95992 10.7624 7.96723 10.7541 7.97708C10.75 7.98201 10.7451 7.98759 10.7394 7.99381C10.7365 7.99692 10.7335 8.00019 10.7301 8.00362C10.7285 8.00534 10.7268 8.00709 10.725 8.00889C10.7241 8.00979 10.7232 8.0107 10.7223 8.01162C10.7219 8.01208 10.7212 8.01278 10.7209 8.01301C10.7202 8.01371 10.7195 8.01441 10.1907 7.48257ZM11.5343 12.0291C13.0613 13.5474 14.2096 14.1383 15.0763 14.2713C15.5192 14.3392 15.8763 14.285 16.1472 14.1841C16.28 14.1346 16.3858 14.0763 16.4658 14.0227C16.5058 13.9959 16.5392 13.9704 16.5663 13.9479C16.5799 13.9367 16.5919 13.9262 16.6024 13.9166C16.6077 13.9118 16.6126 13.9073 16.6171 13.903C16.6194 13.9008 16.6215 13.8987 16.6236 13.8967C16.6246 13.8957 16.6256 13.8947 16.6266 13.8937C16.6271 13.8932 16.6279 13.8925 16.6281 13.8923C16.6288 13.8916 16.6295 13.8909 16.1007 13.359C15.5719 12.8272 15.5726 12.8265 15.5733 12.8258C15.5735 12.8256 15.5742 12.8249 15.5747 12.8244C15.5756 12.8235 15.5765 12.8226 15.5774 12.8217C15.5793 12.82 15.581 12.8183 15.5827 12.8166C15.5862 12.8133 15.5895 12.8103 15.5926 12.8074C15.5988 12.8018 15.6044 12.7969 15.6094 12.7929C15.6192 12.7847 15.6265 12.7795 15.631 12.7764C15.6403 12.7702 15.6384 12.773 15.6236 12.7785C15.5991 12.7876 15.501 12.8189 15.3038 12.7886C14.8905 12.7253 14.02 12.3853 12.5919 10.9654L11.5343 12.0291ZM9.97365 2.40961C8.95434 1.04802 6.94996 0.83257 5.73263 2.04299L6.79027 3.10667C7.32195 2.578 8.26623 2.63181 8.77286 3.30855L9.97365 2.40961ZM4.75168 5.70305C4.73201 5.35694 4.89075 4.9954 5.22067 4.66736L4.16303 3.60368C3.62571 4.13795 3.20329 4.89425 3.2541 5.78816L4.75168 5.70305ZM19.4723 17.7636C19.1975 18.0369 18.9029 18.1908 18.6067 18.2184L18.7459 19.7119C19.4805 19.6434 20.0824 19.2723 20.5299 18.8273L19.4723 17.7636ZM11.0063 7.72922C11.9908 6.7503 12.064 5.2019 11.2346 4.09401L10.0338 4.99295C10.4373 5.53193 10.3773 6.23938 9.9487 6.66555L11.0063 7.72922ZM20.5251 14.2869C21.3429 14.7315 21.4703 15.7769 20.8929 16.3511L21.9505 17.4148C23.2908 16.0821 22.8775 13.8584 21.2415 12.9691L20.5251 14.2869ZM17.085 13.438C17.469 13.0562 18.0871 12.9616 18.6146 13.2483L19.331 11.9305C18.2474 11.3414 16.9026 11.5041 16.0273 12.3743L17.085 13.438Z">
                                        </path>
                                    </g>
                                </svg>
                                <p class="text-dark/60 font-medium">{{ getSettings('company_number') }}</p>
                            </div>
                        </div>
                        <div class="pt-5">
                            <div class="flex items-center gap-3">
                                <svg class="fill-primary_dark w-5 h-5" viewBox="0 -5 32 32"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M29.000,22.000 L3.000,22.000 C1.346,22.000 -0.000,20.654 -0.000,19.000 L-0.000,3.000 C-0.000,1.346 1.346,-0.000 3.000,-0.000 L29.000,-0.000 C30.654,-0.000 32.000,1.346 32.000,3.000 L32.000,19.000 C32.000,20.654 30.654,22.000 29.000,22.000 ZM3.000,20.000 L29.000,20.000 C29.551,20.000 30.000,19.552 30.000,19.000 L30.000,3.317 L16.651,14.759 C16.463,14.920 16.232,15.000 16.000,15.000 C15.768,15.000 15.537,14.920 15.349,14.759 L2.000,3.317 L2.000,19.000 C2.000,19.552 2.449,20.000 3.000,20.000 ZM28.464,2.000 L3.536,2.000 L16.000,12.683 L28.464,2.000 Z">
                                        </path>
                                    </g>
                                </svg>
                                <p class="text-dark/60 font-medium">{{ getSettings('company_email') }}</p>
                            </div>
                        </div>
                        <div class="pt-5">
                            <div class="flex items-center gap-3">
                                <svg class="fill-primary_dark w-5 h-5" viewBox="0 0 32 32" version="1.1"
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
                                <p class="text-dark/60 font-medium">{{ getSettings('company_address') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
