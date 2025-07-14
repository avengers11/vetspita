@extends('frontend.layout')

@section('title', 'Checkout')

@section('content')
    <div>
        <div class="p-16 sm:p-28 bg-secondary/20 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">Checkout</h1>

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium group text-secondary_dark hover:text-secondary dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 fill-secondary_dark group-hover:fill-secondary" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-secondary_dark mx-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="/add-pet"
                                class="ms-1 text-sm font-medium text-secondary_dark hover:text-secondary md:ms-2">Checkout</a>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="max-w-screen-2xl bg-white mx-auto py-28 px-10 space-y-10">
            <div class="grid grid-cols-3 gap-10">
                
                <form class="col-span-2" action="" method="post">
                    @csrf 
                    
                    <div class="p-10">
                        <h1 class="text-2xl font-semibold mb-8">{{ $product->title }} @if($finalPrice != 0) | {{ $discountPercentage }}% OFF! @endif</h1>
                        <div class="space-y-3 px-5">
                            @if ($finalPrice != 0)
                                <div class="flex items-center justify-between gap-5">
                                    <p class="text-gray-500 uppercase text-sm">Price</p>
                                    <p>৳{{ $product->price }}</p>
                                </div>
                                <div class="flex items-center justify-between gap-5">
                                    <p class="text-gray-500 uppercase text-sm">Discount</p>
                                    <p>{{ $discountPercentage }}%</p>
                                </div>
                                <div class="flex items-center justify-between gap-5">
                                    <p class="text-gray-500 uppercase text-sm">Subtotal</p>
                                    <p class="text-primary">৳{{ $paymentAmount }}</p>
                                </div>
                            @else
    
                                <div class="flex items-center justify-between gap-5">
                                    <p class="text-gray-500 uppercase text-sm">Subtotal</p>
                                    <p class="text-primary">৳{{ $paymentAmount }}</p>
                                </div>
                            @endif
                        </div>
    
                        <div class="space-y-3">
                            <div class="flex flex-col mt-10">
                                <label for="vaccinated" class="uppercase mb-2 font-medium text-secondary_dark">Select payment
                                    method</label>
                                <div class="flex items-center gap-10 py-4">
                                    <div class="flex items-center">
                                        <input checked id="bkash" type="radio" value="bkash" name="payment_method"
                                            class="w-4 h-4 text-secondary_dark bg-gray-100 border-gray-300 focus:ring-secondary_dark focus:ring-2">
                                        <label for="bkash" class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">
                                            <img class="w-20" src="{{ asset('assets/frontend/images/Bkash-logo.png') }}"
                                                alt="">
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="nagad" type="radio" value="nagad" name="payment_method"
                                            class="w-4 h-4 text-secondary_dark bg-gray-100 border-gray-300 focus:ring-secondary_dark focus:ring-2">
                                        <label for="nagad" class="ms-2 text-sm font-medium text-gray-400 dark:text-gray-500">
                                            <img class="w-20" src="{{ asset('assets/frontend/images/Nagad-logo.png') }}"
                                                alt="">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label for="transaction_id" class="uppercase mb-2 font-medium text-secondary_dark">
                                    Transaction ID
                                </label>
                                <input type="text" name="trx_id" id="transaction_id"
                                    placeholder="Type Transaction ID"
                                    class="border border-transparent outline-none focus:border focus:border-secondary focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-secondary/20"
                                    required>
                            </div>
                            <div class="pt-5">
                                <button type="submit"
                                    class="border-2 bg-secondary_dark border-secondary_dark transition-all duration-300 uppercase hover:bg-secondary_dark hover:border-secondary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="justify-self-end">
                    <h2 class="text-xl font-semibold mb-3">How to complete the payment?</h2>
                    <ul class="ml-3 space-y-2">
                        <li class="flex gap-1">
                            <span class="font-semibold flex-shrink-0">Step 1:</span>
                            <p>
                                <span>Open your <strong>Bkash/Nagad</strong> Mobile App.</span>
                            </p>
                        </li>
                        <li class="flex gap-1">
                            <span class="font-semibold flex-shrink-0">Step 2:</span>
                            <p>
                                <span>Go to the <strong>Payment</strong> option.</span>
                            </p>
                        </li>
                        <li class="flex gap-1">
                            <span class="font-semibold flex-shrink-0">Step 3:</span>
                            <div>
                                <span>Enter the number given below:</span>
                                <p class="mt-1"><strong>019********</strong> (For Bkash)</p>
                                <p class="mt-1"><strong>019********</strong> (For Nagad)</p>
                            </div>
                        </li>
                        <li class="flex gap-1">
                            <span class="font-semibold flex-shrink-0">Step 4:</span>
                            <p>
                                <span>Complete the payment and collect the <strong>Transasction ID.</strong></span>
                            </p>
                        </li>
                        <li class="flex gap-1">
                            <span class="font-semibold flex-shrink-0">Step 5:</span>
                            <p>
                                <span>Enter your <strong>Transaction ID</strong> and submit.</span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
