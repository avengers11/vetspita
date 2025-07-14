@extends('frontend.layout')

@section('title', 'Filtered Plans')

@section('content')
    <div id="team" class="bg-white">
        <div class="max-w-screen-2xl mx-auto p-10">
            {{-- Breadcrumb --}}
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="#"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Plans</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Active Adult
                                Male/Female</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid lg:grid-cols-12 gap-y-8 lg:gap-8 my-10">
                <div class="lg:col-span-3">
                    <div class="bg-primary/30 p-7">
                        <div class="mb-8">
                            <h3 class="text-xl font-medium tracking-wider flex flex-col gap-3 w-max">
                                <span>Filter</span>
                                <span class="h-1 w-10 bg-primary_dark transition-all duration-300"></span>
                            </h3>
                        </div>
                        <h2 class="font-semibold mb-3 text-lg">{{ $category_name }}</h2>
                        <ul class="divide-y ps-3 mb-5">
                            @foreach ($category_data as $item)
                                @php
                                    $href = '';
                                    if ($category_name == 'Packages') {
                                        $href = route('product.filter', ['package' => $item->id]);
                                    } elseif ($category_name == 'Plans') {
                                        $href = route('product.filter', [
                                            'package' => request('package'),
                                            'plan' => $item->id,
                                        ]);
                                    } elseif ($category_name == 'Category') {
                                        $href = route('product.filter', [
                                            'package' => request('package'),
                                            'plan' => request('plan'),
                                            'category' => $item->id,
                                        ]);
                                    } else {
                                    }
                                @endphp
                                <li class="text-sm py-3 font-medium">
                                    <a class="flex justify-between" href="{{ $href }}">
                                        <span>{{ $item->title }}</span>
                                        <span class="text-gray-500">{{ count($item->products) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <h2 class="font-semibold mb-5 text-lg">Price Range ($)</h2>
                        <div x-data="range()" x-init="mintrigger();
                        maxtrigger()" class="relative max-w-xl w-full">
                            <div>
                                <input type="range" step="100" x-bind:min="min"
                                    x-bind:max="max" x-on:input="mintrigger" x-model="minprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                <input type="range" step="100" x-bind:min="min"
                                    x-bind:max="max" x-on:input="maxtrigger" x-model="maxprice"
                                    class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                                <div class="relative z-10 h-2">

                                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

                                    <div class="absolute z-20 top-0 bottom-0 rounded-md bg-primary_dark"
                                        x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'"></div>

                                    <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-primary_dark rounded-full -mt-2 -ml-1"
                                        x-bind:style="'left: ' + minthumb + '%'"></div>

                                    <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-primary_dark rounded-full -mt-2 -mr-3"
                                        x-bind:style="'right: ' + maxthumb + '%'"></div>

                                </div>

                            </div>

                            <div class="flex justify-between items-center py-5">
                                <div>
                                    <input type="text" maxlength="5" x-on:input="mintrigger" x-model="minprice"
                                        class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                                </div>
                                <div>
                                    <input type="text" maxlength="5" x-on:input="maxtrigger" x-model="maxprice"
                                        class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                                </div>
                            </div>

                            <div>
                                <button
                                    class="w-full text-light border-2 bg-primary transition-all duration-300 uppercase hover:bg-primary_dark hover:text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                                    Filter
                                </button>
                            </div>


                        </div>
                    </div>

                    <div class="cols-span-9">

                    </div>

                </div>

                <div class="lg:col-span-9 space-y-6">
                    <div class="bg-primary/30 p-5">
                        <h2 class="text-2xl font-semibold mb-1">{{ $category_name_dynamic }}</h2>
                        <p class="text-sm">Total <span class="text-primary_dark font-semibold">{{ $totalProducts }}
                                Items</span>
                            Available</p>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">

                        @foreach ($products as $product)
                            @php
                                // Review rate
                                $totalReviews = $product->reviews()->count();
                                $totalRatings = $product->reviews->sum('ratings');
                                $totalStar = $totalReviews * 5;
                                $fiveStarRatingRate = $totalStar > 0 ? ($totalRatings / $totalStar) * 5 : 0;
                                $rattingIcons = generateRatingIcons($fiveStarRatingRate);

                                // price & disscount
                                $originalPrice = $product->price;
                                $discountPercentage = $product->discount;
                                $finalPrice = 0;
                                if (!empty($discountPercentage)) {
                                    $discountAmount = ($originalPrice * $discountPercentage) / 100;
                                    $finalPrice = $originalPrice - $discountAmount;
                                }
                            @endphp
                            <div class="p-12 bg-white border border-dark/5 shadow-lg flex flex-col space-y-8">
                                <div>
                                    <div>
                                        <h2
                                            class="text-dark/70 uppercase tracking-wide text-lg font-medium leading-relaxed mb-5">
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
                                                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="currentColor" viewBox="0 0 22 20">
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
                                    It is a long established fact that a reader will be distracted by the readable content
                                    of a
                                    page.
                                </p>

                                <div class="h-[1px] border-b my-3"></div>

                                <div>
                                    <ul class="space-y-4">
                                        <li class="flex items-center gap-2 text-dark/60 font-medium">
                                            <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="16" height="16" id="icon-bound" fill="none">
                                                    </rect>
                                                    <path
                                                        d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span>Professional Calendar View</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-dark/60 font-medium">
                                            <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="16" height="16" id="icon-bound" fill="none">
                                                    </rect>
                                                    <path
                                                        d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span>Free Google Analytics</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-dark/60 font-medium">
                                            <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="16" height="16" id="icon-bound" fill="none">
                                                    </rect>
                                                    <path
                                                        d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span>Unlimited Task and Comments</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-dark/60 font-medium">
                                            <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="16" height="16" id="icon-bound" fill="none">
                                                    </rect>
                                                    <path
                                                        d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span>Unlimited Task and Comments</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-dark/60 font-medium">
                                            <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="16" height="16" id="icon-bound" fill="none">
                                                    </rect>
                                                    <path
                                                        d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span>Unlimited Task and Comments</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-dark/60 font-medium">
                                            <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="16" height="16" id="icon-bound" fill="none">
                                                    </rect>
                                                    <path
                                                        d="M2,9.014L3.414,7.6L6.004,10.189L12.593,3.6L14.007,5.014L6.003,13.017L2,9.014Z">
                                                    </path>
                                                </g>
                                            </svg>
                                            <span>Professional Calendar View</span>
                                        </li>
                                        <li class="flex items-center gap-2 text-dark/60 font-medium">
                                            <svg class="w-5 h-5 fill-dark/60" viewBox="0 0 16 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <rect width="16" height="16" id="icon-bound" fill="none">
                                                    </rect>
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
                                        class="text-light border-2 bg-primary_dark transition-all duration-300 uppercase hover:bg-primary_dark hover:text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                                        View Details
                                    </a>
                                </div>

                            </div>

                            {{-- <div
                                class="w-full bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg h-72 w-full object-cover object-top"
                                        src="{{ Storage::url($product->image) }}" alt="product image" />
                                </a>
                                <div class="p-5">
                                    <a href="{{ route('product.details', ['product' => $product->id]) }}">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{ $product->title }}
                                        </h5>
                                    </a>
                                    <div class="flex items-center mt-2.5 mb-5">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                            @php echo $rattingIcons; @endphp
                                        </div>
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ $fiveStarRatingRate }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        @if ($finalPrice != 0)
                                            <span class="text-3xl font-semibold">${{ $finalPrice }}</span>
                                            <div>
                                                <span
                                                    class="line-through text-xs font-semibold text-gray-500">${{ $product->price }}</span>
                                            </div>
                                        @else
                                            <span class="text-3xl font-semibold">${{ $originalPrice }}</span>
                                        @endif

                                        <a href="#"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                            to cart</a>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


        <script>
            function range() {
                return {
                    minprice: 1000,
                    maxprice: 7000,
                    min: 100,
                    max: 10000,
                    minthumb: 0,
                    maxthumb: 0,

                    mintrigger() {
                        this.minprice = Math.min(this.minprice, this.maxprice - 500);
                        this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                    },

                    maxtrigger() {
                        this.maxprice = Math.max(this.maxprice, this.minprice + 500);
                        this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                    },
                }
            }
        </script>
    @endsection
