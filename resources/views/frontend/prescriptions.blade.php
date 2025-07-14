@extends('frontend.layout')

@section('title', 'Prescriptions')

@section('content')

    <div>
        <div class="p-16 sm:p-28 bg-primary/30 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">Prescriptions</h1>

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
                            <a href="/prescriptions"
                                class="ms-1 text-sm font-medium text-primary_dark hover:text-secondary md:ms-2">
                                Prescriptions</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="max-w-screen-2xl bg-white mx-auto py-28 px-10 space-y-10">
            <table class="w-full border">
                <thead>
                    <tr class="text-left px-4 py-3 border-b">
                        <th class="px-4 py-3 text-sm text-gray-600 text-left border-r">SI NO.</th>
                        <th class="px-4 py-3 text-sm text-gray-600 text-left border-r">DATE</th>
                        <th class="px-4 py-3 text-sm text-gray-600 text-left border-r">PATIENT NAME</th>
                        <th class="px-4 py-3 text-sm text-gray-600 text-left border-r">DOCTOR NAME</th>
                        <th class="px-4 py-3 text-sm text-gray-600 text-center">VIEW</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($prescriptions as $index=>$prescription)
                        <tr class="text-left px-4 py-3 border-b">
                            <td class="px-4 py-3 text-sm text-gray-600 border-r">{{ $index+1 }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 border-r">{{ timeAgo($prescription->created_at) }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 border-r">{{ $prescription->pet_name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 border-r">{{ isset($prescription->doctor) ?? $prescription->doctor->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 text-center">
                                <a
                                    href="{{ route("prescriptions.view", $prescription) }}" type="button"
                                    class="text-light border-0 bg-primary transition-all duration-300 uppercase hover:bg-primary_dark hover:text-white font text-sm px-5 py-2 focus:outline-none tracking-widest">
                                    VIEW
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    @if(count($prescriptions) < 1)
                        <tr class="text-left px-4 py-3 border-b">
                            <td class="px-4 py-3 text-sm text-gray-600 border-r text-center" colspan="5">No data found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
