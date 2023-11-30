@extends('layouts.master')

@section('title', 'Pricing')

@section('contents')

<section class="py-14">
    <div class="max-w-screen-xl mx-auto px-4 md:text-center md:px-8">
        <div class="max-w-xl md:mx-auto">
            <h3 class="text-gray-800 text-3xl font-semibold sm:text-4xl">
                Check our best pricing options.
            </h3>
            <p class="mt-3 text-gray-600">
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident.
            </p>
        </div>
        <div class="flex gap-3 items-center mt-4 md:justify-center">
            <a href="javascript:void(0)" class="inline-block py-2 px-4 text-white font-medium bg-gray-800 duration-150 hover:bg-gray-700 active:bg-gray-900 rounded-lg shadow-md hover:shadow-none">
                Get Pricing
            </a>
            <a href="javascript:void(0)" class="inline-block py-2 px-4 text-gray-800 font-medium duration-150 border hover:bg-gray-50 active:bg-gray-100 rounded-lg">
                Learn More
            </a>
        </div>
    </div>
</section>


@endsection