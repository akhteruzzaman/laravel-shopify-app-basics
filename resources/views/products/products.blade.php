@extends('layouts.master')

@section('title', 'Products')

@section('contents')

<section class="bg-white">
        <div class="py-14">
            <div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
                <div class=" mx-auto gap-12">
                    <div class="flex justify-between">
                        <div class="max-w-lg space-y-3">
                            <p class="text-gray-800 text-3xl font-semibold sm:text-2xl">
                                Products
                            </p>
                            <p>
                                Here are your available groups. You can edit or delete them.
                            </p>
                        </div>
                        
                    </div>
                </div>
                <div class="max-w-screen-xl mx-auto px-4 py-4 md:px-8">
                    <div class="mt-12 relative h-max overflow-auto">
                        <table class="w-full table-auto text-sm text-left">
                            <thead class="text-gray-600 font-medium border-b">
                                <tr>
                                    <th class="py-3 pr-6">ID</th>
                                    <th class="py-3 pr-6">Title</th>
                                    <th class="py-3 pr-6">Price</th>
                                    <th class="py-3 pr-6">Image</th>
                                    <th class="py-3 pr-6"></th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 divide-y">
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $product['id'] }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $product['title'] }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            {{ $product['variants'][0]['price'] }}
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap ">
                                            @if(isset($product['images'][0]['src']))
                                            <img src="{{ $product['images'][0]['src'] }}" alt="{{ $product['title'] }}" style="max-width: 100px; max-height: 100px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td class="pr-6 py-4 whitespace-nowrap"><span
                                                class="px-3 py-2 rounded-full font-semibold text-xs text-green-600 bg-green-50">Active</span>
                                        </td>

                                        

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
</section>

@endsection