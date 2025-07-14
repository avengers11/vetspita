@extends('frontend.layout')

@section('title', 'Cart')

@section('content')
    <div id="checkout" class="bg-gray-100 min-h-screen">
        <div class="max-w-screen-2xl mx-auto py-10">
            <div class="bg-white rounded-lg p-5 shadow-lg mb-6">
                <div class="flex justify-between mb-4">
                    <h2 class=" font-semibold">My Cart</h2>
                    <div class="flex gap-2">
                        <input class="border border-gray-300 outline-none rounded-md h-9 text-sm" type="text"
                            placeholder="search here">
                        <button class="bg-blue-700 rounded px-3 m-1">
                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#ffffff"
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="bg-blue-50 p-5 rounded flex justify-between items-center">
                    <p>Adding <span class="text-blue-600 font-semibold">4 items</span> in your cart</p>
                    <button
                        class="flex items-center gap-2 bg-blue-200 px-5 py-2 rounded text-sm text-blue-600 font-semibold">
                        <span class="text-nowrap">Checkout All</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-9 bg-white p-5 rounded-lg shadow-lg">
                    <h2 class=" font-semibold mb-5">Cart Items</h2>
                    <table class="border w-full">
                        <tbody>
                            <tr class="border-b">
                                <th scope="row" class="font-semibold text-left px-4 py-3 border-r">
                                    Product Name
                                </th>
                                <th scope="row" class="font-semibold text-left px-4 py-3 border-r">
                                    Price
                                </th>
                                <th scope="row" class="font-semibold text-left px-4 py-3 border-r">
                                    Quantity
                                </th>
                                <th scope="row" class="font-semibold text-left px-4 py-3 border-r">
                                    Total
                                </th>
                                <th scope="row" class="font-semibold text-left px-4 py-3 border-r">
                                    Action
                                </th>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-3 text-sm text-gray-600 border-r">
                                    <div class="flex gap-5 pt-4">
                                        <div>
                                            <img class="rounded-lg border h-24"
                                                src="https://www.cessnalifeline.com/media/catalog/product/cache/f14f5e34ac7c50d20fffcdc7a6013921/h/e/health_care_plan.png"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="font-semibold">Active Adult Male/Female</h2>
                                            <div class="flex items-center mt-1.5">
                                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 fill-yellow-300" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 576 512">
                                                        <path
                                                            d="M288 376.4l.1-.1 26.4 14.1 85.2 45.5-16.5-97.6-4.8-28.7 20.7-20.5 70.1-69.3-96.1-14.2-29.3-4.3-12.9-26.6L288.1 86.9l-.1 .3 0 289.2zm175.1 98.3c2 12-3 24.2-12.9 31.3s-23 8-33.8 2.3L288.1 439.8 159.8 508.3C149 514 135.9 513.1 126 506s-14.9-19.3-12.9-31.3L137.8 329 33.6 225.9c-8.6-8.5-11.7-21.2-7.9-32.7s13.7-19.9 25.7-21.7L195 150.3 259.4 18c5.4-11 16.5-18 28.8-18s23.4 7 28.8 18l64.3 132.3 143.6 21.2c12 1.8 22 10.2 25.7 21.7s.7 24.2-7.9 32.7L438.5 329l24.6 145.7z" />
                                                    </svg>
                                                </div>
                                                <span class="text-xs font-semibold ms-2">4.5</span>
                                                <span class="text-xs font-semibold ms-2 text-gray-500">(3)</span>
                                            </div>
                                            <div class="flex gap-2 items-center mt-3">
                                                <span class="text-lg font-semibold">$1,899</span>
                                                <div>
                                                    <span
                                                        class="line-through text-xs font-semibold text-gray-500">$2,599</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-semibold px-4 py-3 border-r">$554</td>
                                <td class="px-4 py-3 border-r">
                                    <div class="flex items-center gap-2">
                                        <button id="decrement"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            -
                                        </button>
                                        <input id="quantity"
                                            class="w-20 text-center h-7 border rounded-md border-gray-300 outline-0"
                                            type="text" value="1">
                                        <button id="increment"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-semibold border-r">$554</td>
                                <td class="px-4 py-3">
                                    <button class="p-2 bg-red-200 rounded text-red-600 flex items-center gap-1">
                                        <svg class="w-3 h-3 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                        </svg>
                                        <span class="text-xs font-semibold">REMOVE FROM CART</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-3 text-sm text-gray-600 border-r">
                                    <div class="flex gap-5 pt-4">
                                        <div>
                                            <img class="rounded-lg border h-24"
                                                src="https://www.cessnalifeline.com/media/catalog/product/cache/f14f5e34ac7c50d20fffcdc7a6013921/h/e/health_care_plan.png"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="font-semibold">Active Adult Male/Female</h2>
                                            <div class="flex items-center mt-1.5">
                                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 fill-yellow-300"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M288 376.4l.1-.1 26.4 14.1 85.2 45.5-16.5-97.6-4.8-28.7 20.7-20.5 70.1-69.3-96.1-14.2-29.3-4.3-12.9-26.6L288.1 86.9l-.1 .3 0 289.2zm175.1 98.3c2 12-3 24.2-12.9 31.3s-23 8-33.8 2.3L288.1 439.8 159.8 508.3C149 514 135.9 513.1 126 506s-14.9-19.3-12.9-31.3L137.8 329 33.6 225.9c-8.6-8.5-11.7-21.2-7.9-32.7s13.7-19.9 25.7-21.7L195 150.3 259.4 18c5.4-11 16.5-18 28.8-18s23.4 7 28.8 18l64.3 132.3 143.6 21.2c12 1.8 22 10.2 25.7 21.7s.7 24.2-7.9 32.7L438.5 329l24.6 145.7z" />
                                                    </svg>
                                                </div>
                                                <span class="text-xs font-semibold ms-2">4.5</span>
                                                <span class="text-xs font-semibold ms-2 text-gray-500">(3)</span>
                                            </div>
                                            <div class="flex gap-2 items-center mt-3">
                                                <span class="text-lg font-semibold">$1,899</span>
                                                <div>
                                                    <span
                                                        class="line-through text-xs font-semibold text-gray-500">$2,599</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-semibold px-4 py-3 border-r">$554</td>
                                <td class="px-4 py-3 border-r">
                                    <div class="flex items-center gap-2">
                                        <button id="decrement"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            -
                                        </button>
                                        <input id="quantity"
                                            class="w-20 text-center h-7 border rounded-md border-gray-300 outline-0"
                                            type="text" value="1">
                                        <button id="increment"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-semibold border-r">$554</td>
                                <td class="px-4 py-3">
                                    <button class="p-2 bg-red-200 rounded text-red-600 flex items-center gap-1">
                                        <svg class="w-3 h-3 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                        </svg>
                                        <span class="text-xs font-semibold">REMOVE FROM CART</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-3 text-sm text-gray-600 border-r">
                                    <div class="flex gap-5 pt-4">
                                        <div>
                                            <img class="rounded-lg border h-24"
                                                src="https://www.cessnalifeline.com/media/catalog/product/cache/f14f5e34ac7c50d20fffcdc7a6013921/h/e/health_care_plan.png"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="font-semibold">Active Adult Male/Female</h2>
                                            <div class="flex items-center mt-1.5">
                                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 fill-yellow-300"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M288 376.4l.1-.1 26.4 14.1 85.2 45.5-16.5-97.6-4.8-28.7 20.7-20.5 70.1-69.3-96.1-14.2-29.3-4.3-12.9-26.6L288.1 86.9l-.1 .3 0 289.2zm175.1 98.3c2 12-3 24.2-12.9 31.3s-23 8-33.8 2.3L288.1 439.8 159.8 508.3C149 514 135.9 513.1 126 506s-14.9-19.3-12.9-31.3L137.8 329 33.6 225.9c-8.6-8.5-11.7-21.2-7.9-32.7s13.7-19.9 25.7-21.7L195 150.3 259.4 18c5.4-11 16.5-18 28.8-18s23.4 7 28.8 18l64.3 132.3 143.6 21.2c12 1.8 22 10.2 25.7 21.7s.7 24.2-7.9 32.7L438.5 329l24.6 145.7z" />
                                                    </svg>
                                                </div>
                                                <span class="text-xs font-semibold ms-2">4.5</span>
                                                <span class="text-xs font-semibold ms-2 text-gray-500">(3)</span>
                                            </div>
                                            <div class="flex gap-2 items-center mt-3">
                                                <span class="text-lg font-semibold">$1,899</span>
                                                <div>
                                                    <span
                                                        class="line-through text-xs font-semibold text-gray-500">$2,599</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-semibold px-4 py-3 border-r">$554</td>
                                <td class="px-4 py-3 border-r">
                                    <div class="flex items-center gap-2">
                                        <button id="decrement"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            -
                                        </button>
                                        <input id="quantity"
                                            class="w-20 text-center h-7 border rounded-md border-gray-300 outline-0"
                                            type="text" value="1">
                                        <button id="increment"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-semibold border-r">$554</td>
                                <td class="px-4 py-3">
                                    <button class="p-2 bg-red-200 rounded text-red-600 flex items-center gap-1">
                                        <svg class="w-3 h-3 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                        </svg>
                                        <span class="text-xs font-semibold">REMOVE FROM CART</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-4 py-3 text-sm text-gray-600 border-r">
                                    <div class="flex gap-5 pt-4">
                                        <div>
                                            <img class="rounded-lg border h-24"
                                                src="https://www.cessnalifeline.com/media/catalog/product/cache/f14f5e34ac7c50d20fffcdc7a6013921/h/e/health_care_plan.png"
                                                alt="">
                                        </div>
                                        <div>
                                            <h2 class="font-semibold">Active Adult Male/Female</h2>
                                            <div class="flex items-center mt-1.5">
                                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 text-yellow-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 22 20">
                                                        <path
                                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                    </svg>
                                                    <svg class="w-3 h-3 fill-yellow-300"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <path
                                                            d="M288 376.4l.1-.1 26.4 14.1 85.2 45.5-16.5-97.6-4.8-28.7 20.7-20.5 70.1-69.3-96.1-14.2-29.3-4.3-12.9-26.6L288.1 86.9l-.1 .3 0 289.2zm175.1 98.3c2 12-3 24.2-12.9 31.3s-23 8-33.8 2.3L288.1 439.8 159.8 508.3C149 514 135.9 513.1 126 506s-14.9-19.3-12.9-31.3L137.8 329 33.6 225.9c-8.6-8.5-11.7-21.2-7.9-32.7s13.7-19.9 25.7-21.7L195 150.3 259.4 18c5.4-11 16.5-18 28.8-18s23.4 7 28.8 18l64.3 132.3 143.6 21.2c12 1.8 22 10.2 25.7 21.7s.7 24.2-7.9 32.7L438.5 329l24.6 145.7z" />
                                                    </svg>
                                                </div>
                                                <span class="text-xs font-semibold ms-2">4.5</span>
                                                <span class="text-xs font-semibold ms-2 text-gray-500">(3)</span>
                                            </div>
                                            <div class="flex gap-2 items-center mt-3">
                                                <span class="text-lg font-semibold">$1,899</span>
                                                <div>
                                                    <span
                                                        class="line-through text-xs font-semibold text-gray-500">$2,599</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="font-semibold px-4 py-3 border-r">$554</td>
                                <td class="px-4 py-3 border-r">
                                    <div class="flex items-center gap-2">
                                        <button id="decrement"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            -
                                        </button>
                                        <input id="quantity"
                                            class="w-20 text-center h-7 border rounded-md border-gray-300 outline-0"
                                            type="text" value="1">
                                        <button id="increment"
                                            class="text-xl w-7 h-7 rounded-md bg-blue-200 text-blue-600 font-semibold">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-semibold border-r">$554</td>
                                <td class="px-4 py-3">
                                    <button class="p-2 bg-red-200 rounded text-red-600 flex items-center gap-1">
                                        <svg class="w-3 h-3 fill-red-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 384 512">
                                            <path
                                                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                        </svg>
                                        <span class="text-xs font-semibold">REMOVE FROM CART</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-span-3">
                    <div class="bg-white p-5 rounded-lg shadow-lg">
                        <h2 class="font-semibold mb-5">Order Summary</h2>
                        <div>
                            <h3 class="text-sm font-semibold">Have a promo code?</h3>
                            <p class="text-xs text-gray-500 mb-3">Apply Your Promo Code for an Instant Discount!</p>
                            <div class="flex mb-5">
                                <input
                                    class="outline-none focus:outline-none bourder flex-grow border-gray-300 rounded-l text-sm h-9"
                                    placeholder="Enter Promo Code" type="text">
                                <button
                                    class="text-sm font-semibold text-center text-white bg-blue-700 border border-blue-700 rounded-r hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 px-3">Apply</button>
                            </div>
                            <div class="font-medium text-sm space-y-2 mb-5">
                                <p class="flex justify-between">
                                    <span class="text-gray-500">Sub Total</span>
                                    <span>$2,547</span>
                                </p>
                                <p class="flex justify-between">
                                    <span class="text-gray-500">Discount</span>
                                    <span class="text-green-500">- $124</span>
                                </p>
                                <p class="flex justify-between">
                                    <span class="text-gray-500">Service Tax (18%)</span>
                                    <span>- $12</span>
                                </p>
                                <p class="flex justify-between text-lg font-semibold">
                                    <span>Total :</span>
                                    <span>$2,254</span>
                                </p>
                            </div>
                            <div class="space-y-2">
                                <button class="w-full py-2 bg-blue-700 rounded text-white font-semibold text-sm">Proceed To
                                    Checkout</button>
                                <button
                                    class="w-full py-2 bg-pink-200 rounded text-pink-600 font-semibold text-sm">Continue
                                    Shopping</button>
                            </div>
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
