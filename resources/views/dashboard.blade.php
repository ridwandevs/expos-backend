<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if($stores->count() == 0)
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="font-bold font-sans text-lg mb-5">Opss! Seem you didnt have store. Add one.</h1>
                        <form action="{{route('dashboard.createStore')}}" method="post">
                            @csrf
                            <div class="block mb-3">
                                <span class="text-gray-700">Store Name</span>
                                <input type="text" class="rounded mt-1 block w-full border-gray-300" name="store_name">
                            </div>
                            <div class="block mb-3">
                                <span class="text-gray-700">Store Phone</span>
                                <input type="text" class="rounded mt-1 block w-full border-gray-300" name="store_phone">
                            </div>
                            <div class="block mb-3">
                                <span class="text-gray-700">Store Email</span>
                                <input type="text" class="rounded mt-1 block w-full border-gray-300" name="store_email">
                            </div>
                            <div class="block">
                                <input type="submit" class="p-2 rounded text-xs bg-blue-400 text-white font-bold" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
