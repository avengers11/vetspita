@extends('frontend.layout')

@section('title', 'Terms and Conditions')

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
        <div class="p-16 sm:p-28 bg-secondary/20 flex flex-col items-center">
            <h1 class="text-5xl font-medium mb-7 text-center leading-snug">Terms and Conditions</h1>

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
                            <a href="/terms-and-conditions"
                                class="ms-1 text-sm font-medium text-secondary_dark hover:text-secondary md:ms-2">Terms and
                                Conditions</a>
                        </div>
                    </li>
                </ol>
            </nav>

        </div>
        <div class="description max-w-screen-2xl bg-white mx-auto py-28 px-10 space-y-10">
            Terms & Conditions

            1. Introduction
            By accessing Vetspital’s website, you agree to comply with these terms. If you do not agree, please refrain from
            using our services.

            2. Veterinary Services
            Vetspital provides professional veterinary consultation, diagnosis, treatment, and emergency care. Service
            availability may vary based on clinic hours and availability of Doctors and stuffs.

            3. Payment & Refund Policy

            Payments for services must be completed at/before the time of consultation or treatment.

            Refunds are only applicable in cases of overpayment or service cancellation before commencement.


            4. Appointment & Cancellation Policy

            Clients must book appointments in advance.

            Cancellations should be made at least 12 hours before the scheduled time.


            5. Limitation of Liability
            Vetspital is not responsible for any adverse reactions or outcomes resulting from prescribed treatments, as
            every pet’s response to medical care may vary.

            6. Governing Law
            These Terms & Conditions are governed by the laws of Bangladesh. Any disputes will be settled under the
            jurisdiction of Bangladesh Veterinary Council.

            For any inquiries regarding our policies, contact us at info@vetspital.com and info.vetspital@gmail.com.
        </div>
    </div>
@endsection
