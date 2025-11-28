<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="flex gap-5 mt-5 items-center justify-center w-full">
                @foreach ($customers as $customer)
                    <x-customer-card :customer='$customer' />

                @endforeach
            </div>
            <div class="md:flex items-start p-10 space-y-6 md:space-y-0 md:space-x-10">
                <h1 class="text-xl font-bold text-gray-800">Account ID: {{ $account->id }}</h1>
                <p class="text-xl text-gray-800">Balance: €{{ number_format($account->balance) }}</p>
                <p class="text-xl text-gray-800">Date Opened: {{ $account->date_opened }}</p>
                <p class="text-xl text-gray-800">Account Status: {{ $account->account_status }}</p>
            </div>
            <!-- Edit and Delete Buttons -->
            @if(auth()->user()->role === 'admin')
                <div class="mt-4 flex justify-end">

                    <!-- Edit Button route to accounts.edit and receives $account for editing -->
                    <a href="{{ route('accounts.edit', $account) }}"
                        class="inline-block bg-sky-400 text-white font-semibold py-2 px-4 rounded-md shadow 
                                                                                                                                                                                hover:bg-sky-600 focus:ring-2 focus:ring-sky-400 transition-colors duration-200">
                        Edit
                    </a>

                    <!-- Delete Button (you need a form to send DELETE requests) -->
                    <form action="{{ route('accounts.destroy', $account) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this account?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-block bg-gray-400 text-white font-semibold py-2 px-4 rounded-md shadow ml-5
                                                                                                                                                                                    hover:bg-gray-700 focus:ring-2 focus:ring-gray-400 transition-colors duration-200">
                            Delete
                        </button>
                    </form>

                </div>
            @endif
        </div>
    </div>
</x-app-layout>