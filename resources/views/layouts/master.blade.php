<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Pixi FAQ')</title>
    <!-- plugins:css -->
    @include('partials.styles')
    <!-- endinject -->
    
</head>

<body> 

    <div class="bg-yellow-600">
        <div class="max-w-screen-xl mx-auto px-4 py-3 items-center justify-between text-white sm:flex md:px-8">
            <div class="flex gap-x-4">
                <div class="w-10 h-10 flex-none rounded-lg bg-yellow-800 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                </div>
                <p class="py-2 font-medium">
                    We just launched a new version of our FAQ App .
                </p>
            </div>
            <a href="{{ URL::tokenRoute('groups')}}" class="inline-block w-full mt-3 py-2 px-3 text-center text-yellow-600 font-medium bg-white duration-150 hover:bg-gray-100 active:bg-gray-200 rounded-lg sm:w-auto sm:mt-0 sm:text-sm">
                Groups
            </a>
        </div>
    </div>

    <div>
        @yield('contents')
    </div>

    <section class="max-w-xl mt-12 mx-auto px-4 md:px-8">
        
        <div class="mt-6">
            <form class="items-center justify-center sm:flex">
                <input 
                    type="email"
                    placeholder="Enter your email"
                    class="text-gray-500 w-full p-3 rounded-md border outline-none focus:border-yellow-600"
                />
                <button
                    class="w-full mt-3 px-5 py-3 rounded-md text-white bg-yellow-600 hover:bg-yellow-500 active:bg-yellow-700 duration-150 outline-none shadow-md focus:shadow-none focus:ring-2 ring-offset-2 ring-yellow-600 sm:mt-0 sm:ml-3 sm:w-auto"
                >
                    Subscribe
                </button>
            </form>
            <p class="mt-3 mx-auto text-center max-w-lg text-[15px] text-gray-400">
                No spam ever, we are care about the protection of your data. 
                Read our <a class="text-yellow-600 underline" href="javascript:void(0)"> Privacy Policy </a>
            </p>
        </div>
    </section>

    @include('partials.scripts')
</body>

</html>
