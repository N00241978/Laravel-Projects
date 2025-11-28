<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Transaction:</h3>

                    {{-- Using the TransactionForm component for transaction creation --}}
                    <x-transaction-form :action="route('transactions.update', $transaction)" :method="'PUT'"
                        :transaction="$transaction" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>