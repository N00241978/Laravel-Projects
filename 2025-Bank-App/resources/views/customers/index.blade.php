<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Customers') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Customers:</h3>

                    <!-- Search bar -->
                    <div class="max-w-[1600px] mx-auto px-4">
                        <form action="{{ route('customers.index') }}" method="GET" class="flex items-center gap-2 mb-6">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Search customers..." class="w-full bg-white-800 text-white-100 border border-white-800
                   rounded-xl px-4 py-2 focus:outline-none focus:ring-2
                   focus:ring-sky-400/40 placeholder-white-400 transition">
                            <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white font-semibold
                   px-4 py-2 rounded-xl transition hover:shadow-sky-500/30">
                                Search
                            </button>
                        </form>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($customers as $customer)
                            <div class="border p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                                <a href="{{ route('customers.show', $customer) }}">
                                    <x-customer-card :customer="$customer" />
                                </a>

                                <!-- Edit and Delete Buttons -->
                                @if(auth()->user()->role === 'admin')
                                    <div class="mt-4 flex justify-between">

                                        <!-- Edit Button route to customers.edit and receives $customer for editing -->
                                        <a href="{{ route('customers.edit', $customer) }}"
                                            class="inline-block bg-sky-400 text-white font-semibold py-2 px-4 rounded-md shadow 
                                                                                                                                                        hover:bg-sky-600 focus:ring-2 focus:ring-sky-400 transition-colors duration-200">
                                            Edit
                                        </a>

                                        <!-- Delete Button (you need a form to send DELETE requests) -->
                                        <form action="{{ route('customers.destroy', $customer) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block bg-gray-400 text-white font-semibold py-2 px-4 rounded-md shadow 
                                                                                                                                                            hover:bg-gray-700 focus:ring-2 focus:ring-gray-400 transition-colors duration-200">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>