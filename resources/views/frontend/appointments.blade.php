@extends('frontend.layout')

@section('title', 'My Appointments')

@section('content')
    <div>
        <div class="p-16 sm:p-28 bg-primary_dark/20 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">My Appointments</h1>

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
                            <a href="/appointments"
                                class="ms-1 text-sm font-medium text-primary_dark hover:text-primary md:ms-2">
                                My Appointments
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="max-w-screen-2xl bg-white mx-auto py-28 px-10 space-y-10">
            <div class="mb-10 flex justify-end">
                <a href="/appointment"
                    class="border-2 flex items-center gap-2 bg-primary_dark border-primary_dark transition-all duration-300 uppercase hover:bg-secondary_dark hover:border-secondary_dark text-white font text-sm px-7 py-3 focus:outline-none tracking-widest">
                    <svg class="w-5 h-5 " viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path d="M4 12H20M12 4V20" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </g>
                    </svg>
                    New Appointment
                </a>
            </div>

            <div class="grid grid-cols-2 gap-8">
                @if (count($appointments) < 1)
                    <h1 class="text-2xl font-semibold mb-8">No appointments found!</h1>
                @endif
                @foreach ($appointments as $appointment)
                    <div class="p-10 shadow-lg shadow-primary/20 border border-primary/30">
                        <h1 class="text-2xl font-semibold mb-8">{{ timeAgo($appointment->created_at) }}</h1>
                        <div class="grid grid-cols-3 justify-between gap-3 mb-3">
                            <p>Pateint Name: {{ $appointment->pet->name }}</p>
                            <p>Species: {{ $appointment->pet->species }}</p>
                            <p>Breed: {{ $appointment->pet->breed }}</p>
                            <p>Gender: {{ $appointment->pet->sex }}</p>
                            <p class="col-span-2">Consultant: {{ $appointment->doctor->name }}</p>
                        </div>
                        <p>Reason: {{ $appointment->purpose }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
