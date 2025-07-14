@extends('frontend.layout')

@section('title', 'My Orders')

@section('content')
    <div>
        <div class="p-16 sm:p-28 bg-primary_dark/20 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">My Orders</h1>

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/"
                            class="inline-flex items-center text-sm font-medium group text-primary_dark hover:text-primary dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5 fill-primary_dark group-hover:fill-primary" aria-hidden="true"
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
                            <a href="/orders" class="ms-1 text-sm font-medium text-primary_dark hover:text-primary md:ms-2">
                                My Orders
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="max-w-screen-2xl bg-white mx-auto py-28 px-10">
            <div class="grid grid-cols-2 gap-8">
                @if (count($orders) < 1)
                    <h1 class="text-2xl font-semibold mb-8">No data found!</h1>
                @endif
                @foreach ($orders as $order)
                    <div class="p-10 shadow-lg shadow-primary/20 border border-primary/30">
                        <h1 class="text-2xl font-semibold mb-8">{{ isset($order->product) ? $order->product->title : "" }}</h1>
                        <div class="space-y-3 px-5">
                            <div class="flex items-center justify-between gap-5">
                            <p class="text-gray-500 uppercase text-sm">Total Amount</p>
                            <p>৳{{ $order->product_price }}</p>
                        </div>
                        <div class="flex items-center justify-between gap-5">
                            <p class="text-gray-500 uppercase text-sm">Order Placed</p>
                            <p>{{ timeAgo($order->created_at) }}</p>
                        </div>
                        <div class="flex items-center justify-between gap-5">
                            <p class="text-gray-500 uppercase text-sm">Payment Method</p>
                            <p class="capitalize">{{ $order->payment_method }}</p>
                        </div>
                        <div class="flex items-center justify-between gap-5">
                            <p class="text-gray-500 uppercase text-sm">Order Status</p>
                            @if ($order->status == "success")
                                <p class="text-primary">Payment Success</p>
                            @elseif($order->status == "pending")
                                <p class="text-primary">Verifying Payment</p>
                            @else
                                <p class="text-primary">Payment Rejected</p>
                            @endif
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
