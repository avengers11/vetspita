@extends('frontend.layout')

@section('title', 'Plan Details')

@section('css')
    <style>
        .table.table-bordered {
            border: 1px solid #dddd;
            width: 100%;
        }

        .table.table-bordered td {
            border: 1px solid #dddd;
            padding: 0.8rem;
            font-size: .875rem;
            color: rgb(107 114 128 / var(--tw-text-opacity, 1));
        }
    </style>
@endsection

@section('content')
    <div id="team" class="bg-white">
        <div class="max-w-screen-2xl mx-auto p-10">

            {{-- Breadcrumb --}}
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>

                    @if (!empty($product->package_id))
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $product->package->title }}</span>
                            </div>
                        </li>
                    @endif

                    @if (!empty($product->plan_id))
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span
                                    class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $product->plan->title }}</span>
                            </div>
                        </li>
                    @endif


                    @if (!empty($product->product_category_id))
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="#"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $product->category->title }}</a>
                            </div>
                        </li>
                    @endif

                </ol>
            </nav>

            <div class="grid lg:grid-cols-9 gap-10 my-6">
                <div class="lg:col-span-4 xl:col-span-3">
                    <img class="w-full h-max" src="{{ Storage::url($product->image) }}" alt="">
                </div>
                <div class="lg:col-span-5 xl:col-span-6">
                    <h1 class="text-2xl font-semibold mb-4">{{ $product->title }}</h1>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            {{-- <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path d="M288 376.4l.1-.1 26.4 14.1 85.2 45.5-16.5-97.6-4.8-28.7 20.7-20.5 70.1-69.3-96.1-14.2-29.3-4.3-12.9-26.6L288.1 86.9l-.1 .3 0 289.2zm175.1 98.3c2 12-3 24.2-12.9 31.3s-23 8-33.8 2.3L288.1 439.8 159.8 508.3C149 514 135.9 513.1 126 506s-14.9-19.3-12.9-31.3L137.8 329 33.6 225.9c-8.6-8.5-11.7-21.2-7.9-32.7s13.7-19.9 25.7-21.7L195 150.3 259.4 18c5.4-11 16.5-18 28.8-18s23.4 7 28.8 18l64.3 132.3 143.6 21.2c12 1.8 22 10.2 25.7 21.7s.7 24.2-7.9 32.7L438.5 329l24.6 145.7z" />
                            </svg> --}}

                            @php echo $rattingIcons; @endphp
                        </div>
                        <span class="text-sm font-semibold ms-3">{{ $fiveStarRatingRate }}</span>
                        <span class="text-sm font-semibold ms-3 text-gray-500">({{ $totalReviews }} Reviews)</span>
                    </div>
                    <div class="flex gap-5 items-center mb-5">

                        @if ($finalPrice != 0)
                            <span class="text-3xl font-semibold">${{ $finalPrice }}</span>
                            <div>
                                <span class="line-through text-xs font-semibold text-gray-500">${{ $product->price }}</span>
                                <p class="text-secondary text-sm font-semibold">Don't Miss Out! Save Up to
                                    {{ $discountPercentage }}% OFF!</p>
                            </div>
                        @else
                            <span class="text-3xl font-semibold">${{ $originalPrice }}</span>
                        @endif
                    </div>
                    <div class="mb-5">
                        <p class="font-semibold mb-2">Description :</p>
                        <p class="text-sm border-gray-300 text-gray-600 leading-relaxed font-medium">@php echo $product->short_description; @endphp<br>
                        </p>
                        <p class="mt-3 text-sm">Refer our <a href="" class="text-primary">terms and conditions.</a>
                        </p>
                    </div>
                    <div class="mb-5">
                        <p class="font-semibold">SKU : <span
                                class="font-medium text-primary_dark">{{ $product->sku }}</span>
                        </p>
                    </div>
                    <div class="mb-7 flex items-center gap-2">
                        @if ($product->stock < 1)
                            <span
                                class="text-sm px-3 py-1 rounded-md bg-red-200 text-red-600 font-semibold flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 384 512">
                                    <path
                                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                </svg>
                                Stock Out
                            </span>
                        @else
                            <span
                                class="text-sm px-3 py-1 rounded-md bg-primary/30 text-primary_dark font-semibold flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 fill-primary_dark text-primary_dark"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                </svg>
                                In Stock
                            </span>
                        @endif

                    </div>
                    <div class="flex items-baseline gap-5 mb-5 hidden">
                        <span class="font-semibold mb-2">Quantity : </span>
                        <div class="flex items-center gap-2">
                            <button id="decrement"
                                class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                -
                            </button>
                            <input id="quantity" class="w-20 text-center h-7 border rounded-md border-gray-300 outline-0"
                                type="text" value="1">
                            <button id="increment"
                                class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                +
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        @if ($product->stock > 0)
                            <a href="{{ route("order.checkout", $product) }}" type="button"
                                class="text-light border-2 bg-primary transition-all duration-300 uppercase hover:bg-primary_dark hover:text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                                Buy Now
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="grid xl:grid-cols-6 xl:gap-10 gap-y-10">
                <div class="xl:col-span-4 space-y-8">
                    <div>
                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                                data-tabs-toggle="#default-tab-content" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="details-tab"
                                        data-tabs-target="#details" type="button" role="tab"
                                        aria-controls="details" aria-selected="false">Details</button>
                                </li>
                                <li class="me-2 hidden" role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="eligibility-tab" data-tabs-target="#eligibility" type="button"
                                        role="tab" aria-controls="eligibility" aria-selected="false">Eligibility Of
                                        Pets</button>
                                </li>
                                <li role="presentation">
                                    <button
                                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="more-tab" data-tabs-target="#more" type="button" role="tab"
                                        aria-controls="more" aria-selected="false">More Information</button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-tab-content">
                            {{-- <div class="hidden p-4 rounded-lg" id="details" role="tabpanel"
                                aria-labelledby="details-tab"> --}}
                            <div class="p-4 rounded-lg" id="details" role="tabpanel" aria-labelledby="details-tab">
                                @php
                                    $dbDetails = json_decode($product->details, true);
                                @endphp
                                <table class="table table-bordered">
                                    @foreach ($dbDetails as $item)
                                        @php
                                            $key = key($item);
                                            $value = $item[$key];
                                        @endphp

                                        <tr>
                                            <td class="capitalize">{{ __(str_replace('_', ' ', $key)) }}</td>
                                            <td>{{ $value }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="eligibility" role="tabpanel"
                                aria-labelledby="eligibility-tab">
                                <table class="border w-full">
                                    <tbody>
                                        <tr class="border-b">
                                            <th scope="row" class="font-semibold text-left px-4 py-3">
                                                Brand
                                            </th>
                                            <td class="px-4 py-3 text-sm text-gray-600">TechPro</td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="row" class="font-semibold text-left px-4 py-3">
                                                Model Name
                                            </th>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                X15 Elite - 2024 Edition
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="row" class="font-semibold text-left px-4 py-3">
                                                Display
                                            </th>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                15.6" 4K UHD Touchscreen
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="row" class="font-semibold text-left px-4 py-3">
                                                Processor
                                            </th>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                Intel Core i7
                                            </td>
                                        </tr>
                                        <tr class="border-b">
                                            <th scope="row" class="font-semibold text-left px-4 py-3">
                                                Operating System
                                            </th>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                Windows 10 Home
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="more" role="tabpanel"
                                aria-labelledby="more-tab">
                                {!! $product->more_details !!}
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <h2 class=" font-semibold mb-5">Reviews & Ratings</h2>
                        <div class="space-y-4">

                            @foreach ($product->reviews as $review)
                                <div class="review">
                                    <div class="flex items-center gap-2 mb-3">
                                        <img class="w-7 h-7 rounded-full" src="{{ Storage::url($review->user->image) }}"
                                            alt="">
                                        <p class="text-sm font-semibold">{{ $review->user->name }}</p>
                                        <p class="flex items-center gap-2">
                                            <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            <span class="text-sm">{{ $review->ratings }}</span>
                                        </p>
                                    </div>
                                    <p class="font-semibold text-sm mb-1">{{ $review->title }}</p>
                                    <p class="text-gray-500 text-sm">{{ $review->description }}</p>
                                </div>
                            @endforeach


                            {{-- <div class="review">
                                <div class="flex items-center gap-2 mb-3">
                                    <img class="w-7 h-7 rounded-full" src="https://php.spruko.com/tailwind/xintra/xintra/assets/images/faces/1.jpg"
                                        alt="">
                                    <p class="text-sm font-semibold">Phillip John</p>
                                    <p class="flex items-center gap-2">
                                        <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        <span class="text-sm">4.3</span>
                                    </p>
                                </div>
                                <p class="font-semibold text-sm mb-1">Powerful Performance, Stunning Display!</p>
                                <p class="text-gray-500 text-sm">The TechPro X15 Elite - 2024 Edition is a powerhouse! The 4K UHD touchscreen display is
                                    stunning.vgwrggerrb grgrgerg </p>
                            </div>
                            <div class="review">
                                <div class="flex items-center gap-2 mb-3">
                                    <img class="w-7 h-7 rounded-full" src="https://php.spruko.com/tailwind/xintra/xintra/assets/images/faces/1.jpg"
                                        alt="">
                                    <p class="text-sm font-semibold">Phillip John</p>
                                    <p class="flex items-center gap-2">
                                        <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path
                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                        <span class="text-sm">4.3</span>
                                    </p>
                                </div>
                                <p class="font-semibold text-sm mb-1">Powerful Performance, Stunning Display!</p>
                                <p class="text-gray-500 text-sm">The TechPro X15 Elite - 2024 Edition is a powerhouse! The 4K UHD touchscreen display is
                                    stunning.vgwrggerrb grgrgerg </p>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="bg-white shadow-lg p-5 rounded-lg">
                        <h2 class=" font-semibold mb-5">Leave Us a Review</h2>

                    </div> --}}
                </div>
                <div class="xl:col-span-2">
                    <div class="bg-primary/30 p-7 mb-6">
                        <div class="mb-5">
                            <h3 class="text-xl font-medium tracking-wider flex flex-col gap-3 w-max">
                                <span>Best Sellers</span>
                                <span class="h-1 w-10 bg-primary_dark transition-all duration-300"></span>
                            </h3>
                        </div>
                        <div class="space-y-4 divide-y">
                            @foreach ($bestSellers as $plan)
                                @php
                                    // Review rate
                                    $totalReviews_best = $plan->reviews()->count();
                                    $totalRatings_best = $plan->reviews->sum('ratings');
                                    $totalStar_best = $totalReviews_best * 5;
                                    $fiveStarRatingRate_best =
                                        $totalStar_best > 0 ? ($totalRatings_best / $totalStar_best) * 5 : 0;
                                    $rattingIcons_best = generateRatingIcons($fiveStarRatingRate_best);

                                    // price & disscount
                                    $originalPrice_best = $plan->price;
                                    $discountPercentage_best = $plan->discount;
                                    $finalPrice_best = 0;
                                    if (!empty($discountPercentage_best)) {
                                        $discountAmount_best = ($originalPrice_best * $discountPercentage_best) / 100;
                                        $finalPrice_best = $originalPrice_best - $discountAmount_best;
                                    }
                                @endphp

                                <div class="flex gap-5 pt-4">
                                    <div>
                                        <img class="border min-w-24 h-24" src="{{ Storage::url($plan->image) }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{ route('product.details', $plan) }}"
                                            class="font-semibold">{{ $plan->title }}</a>
                                        <div class="flex items-center mt-1.5 gap-2">
                                            <div class="flex items-center gap-2 rtl:space-x-reverse">
                                                @php echo $rattingIcons_best; @endphp
                                            </div>
                                            <span class="text-sm font-semibold ms-2">{{ $fiveStarRatingRate_best }}</span>
                                            <span
                                                class="text-sm font-semibold ms-2 text-gray-500">({{ $totalReviews_best }})</span>
                                        </div>
                                        <div class="flex gap-2 items-center mt-3">

                                            @if ($finalPrice_best != 0)
                                                <span class="text-3xl font-semibold">${{ $finalPrice_best }}</span>
                                                <div>
                                                    <span
                                                        class="line-through text-xs font-semibold text-gray-500">${{ $product->price }}</span>
                                                    <p class="text-blue-500 text-sm font-semibold">Don't Miss Out! Save Up
                                                        to {{ $discountPercentage_best }}% OFF!</p>
                                                </div>
                                            @else
                                                <span class="text-3xl font-semibold">${{ $originalPrice_best }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if (count($relatedPlans) < 1)
                                <h2 class="font-semibold">No plans Found!</h2>
                            @endif
                        </div>
                    </div>
                    <div class="bg-primary/30 p-7 mb-6">
                        <div class="mb-5">
                            <h3 class="text-xl font-medium tracking-wider flex flex-col gap-3 w-max">
                                <span>Related Plans</span>
                                <span class="h-1 w-10 bg-primary_dark transition-all duration-300"></span>
                            </h3>
                        </div>
                        <div class="space-y-4 divide-y">
                            @foreach ($relatedPlans as $plan)
                                @php
                                    // Review rate
                                    $totalReviews_related = $plan->reviews()->count();
                                    $totalRatings_related = $plan->reviews->sum('ratings');
                                    $totalStar_related = $totalReviews_related * 5;
                                    $fiveStarRatingRate_related =
                                        $totalStar_related > 0 ? ($totalRatings_related / $totalStar_related) * 5 : 0;
                                    $rattingIcons_related = generateRatingIcons($fiveStarRatingRate_related);

                                    // price & disscount
                                    $originalPrice_related = $plan->price;
                                    $discountPercentage_related = $plan->discount;
                                    $finalPrice_related = 0;
                                    if (!empty($discountPercentage_related)) {
                                        $discountAmount_related =
                                            ($originalPrice_related * $discountPercentage_related) / 100;
                                        $finalPrice_related = $originalPrice_related - $discountAmount_related;
                                    }
                                @endphp

                                <div class="flex gap-5 pt-4">
                                    <div>
                                        <img class="border h-24 min-w-24" src="{{ Storage::url($plan->image) }}"
                                            alt="">
                                    </div>
                                    <div>
                                        <a href="{{ route('product.details', $plan) }}"
                                            class="font-semibold">{{ $plan->title }}</a>
                                        <div class="flex items-center mt-1.5">
                                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                                @php echo $rattingIcons_related; @endphp
                                            </div>
                                            <span
                                                class="text-xs font-semibold ms-2">{{ $fiveStarRatingRate_related }}</span>
                                            <span
                                                class="text-xs font-semibold ms-2 text-gray-500">({{ $totalReviews_related }})</span>
                                        </div>
                                        <div class="flex gap-2 items-center mt-3">

                                            @if ($finalPrice_related != 0)
                                                <span class="text-3xl font-semibold">${{ $finalPrice_related }}</span>
                                                <div>
                                                    <span
                                                        class="line-through text-xs font-semibold text-gray-500">${{ $product->price }}</span>
                                                    <p class="text-blue-500 text-sm font-semibold">Don't Miss Out! Save Up
                                                        to {{ $discountPercentage_related }}% OFF!</p>
                                                </div>
                                            @else
                                                <span class="text-3xl font-semibold">${{ $originalPrice_related }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if (count($relatedPlans) < 1)
                                <h2 class="font-semibold">No plans Found!</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Handle increment
            $('#increment').on('click', function() {
                let quantity = parseInt($('#quantity').val());
                if (!isNaN(quantity)) {
                    $('#quantity').val(quantity + 1);
                }
            });

            // Handle decrement
            $('#decrement').on('click', function() {
                let quantity = parseInt($('#quantity').val());
                if (!isNaN(quantity) && quantity > 1) {
                    $('#quantity').val(quantity - 1);
                }
            });
        });
    </script>
@endsection
