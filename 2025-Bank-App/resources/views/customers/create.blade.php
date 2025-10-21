<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text -x1 text-gray-800 leading-tight">
            {{ __('Create New Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add a New Customer</h3>

                    <x-customer-form :action="route('customers.store')" :method="'POST'" />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>