@extends('frontend.layout')

@section('title', 'E-Consultation')

@section('content')

    <div>
        <div class="p-16 sm:p-28 bg-primary/30 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">New Appointment</h1>

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
                            <a href="/profile"
                                class="ms-1 text-sm font-medium text-primary_dark hover:text-secondary md:ms-2">New
                                Appointment</a>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="max-w-screen-2xl bg-white mx-auto py-28 px-10 space-y-10">
                <form class="p-4 md:p-5" action="" method="POST">
                    @csrf

                    <div class="grid gap-5">
                        <div class="flex flex-col">
                            <label for="category" class="uppercase mb-2 font-medium text-primary_dark">Select your
                                pet</label>
                            <select name="pet_id" id="pet_id"
                                class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20"
                                required>
                                <option selected="" value="">Select pet</option>
                                @foreach ($pets as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label for="category" class="uppercase mb-2 font-medium text-primary_dark">Choose a
                                doctor</label>
                            <select name="doctor_id" id="doctor_id"
                                class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20"
                                required>
                                <option selected="" value="">Select doctor</option>
                                @foreach ($doctors as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label for="category" class="uppercase mb-2 font-medium text-primary_dark">Appointment Date
                                and Time</label>
                            <input type="datetime-local" name="date_time" id="date_time"
                                class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20"
                                placeholder="Type parent name..." required>
                        </div>

                        <div class="flex flex-col">
                            <label for="description" class="uppercase mb-2 font-medium text-primary_dark">Purpose</label>
                            <textarea id="purpose" name="purpose" rows="4"
                                class="border border-transparent outline-none focus:border focus:border-primary_dark focus:outline-none focus:ring-0 focus:shadow-none w-full p-4 bg-primary_dark/20"
                                placeholder="" required></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="border-2 bg-primary border-primary transition-all duration-300 uppercase hover:bg-secondary_dark hover:border-secondary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                        Book Appointment
                    </button>
                </form>
            </div>
        </form>
    </div>

    {{-- <div class="max-w-screen-2xl mx-auto py-10">
            <div id="crud-modal" tabindex="-1" class="bg-transparent overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex" aria-modal="true" role="dialog">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" style="box-shadow: 0 0 0 100vh #000000;">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Appointment
                            </h3>
                            <a href="/" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </a>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" action="" method="POST">
                            @csrf 
                            
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your pet</label>
                                    <select name="pet_id" id="pet_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                        <option selected="" value="">Select pet</option>
                                        @foreach ($pets as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-2">
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose a doctor</label>
                                    <select name="doctor_id" id="doctor_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                        <option selected="" value="">Select doctor</option>
                                        @foreach ($doctors as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-span-2">
                                    <div class="col-span-2 sm:col-span-1">
                                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Appointment Date and Time</label>
                                        <input type="datetime-local" name="date_time" id="date_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type parent name..." required>
                                    </div>
                                </div>

                                <div class="col-span-2">
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose</label>
                                    <textarea id="purpose" name="purpose" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Add new product
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

@endsection
