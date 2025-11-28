<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex flex-col items-center justify-center px-4">
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
                <div class="mt-4 flex justify-end mb-5 mr-5">

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
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden mt-5 ">
            <div class="flex w-full pr-5 pt-3 pb-3 pl-5 items-start">
                <h1 class="font-bold">Recent Transactions</h1>
                <a href="{{ route('accounts.transactions.create', $account) }}"
                    class="inline-block bg-sky-400 text-white font-semibold py-2 px-4 rounded-md shadow ml-auto
                                                                                                                                                                                                                                                                                        hover:bg-sky-600 focus:ring-2 focus:ring-sky-400 transition-colors duration-200">
                    Create
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Amount
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Old Balance
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            New Balance
                        </th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($account->transactions as $transaction)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                {{ $transaction->id }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                {{ $transaction->title }}
                            </td>
                            <td
                                class="px-4 py-2 text-sm 
                                                                                                                                                                                            {{ $transaction->amount < 0 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $transaction->amount }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                {{ $transaction->old_balance }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800 font-semibold">
                                {{ $transaction->new_balance }}
                            </td>
                            <td>
                                <!-- Delete Button (you need a form to send DELETE requests) -->
                                <form action="{{ route('accounts.transactions.destroy', [$account, $transaction]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block bg-gray-400 text-white font-semibold py-2 px-4 rounded-md shadow ml-5
                                                                                                                                                                                                                                                                                                                                                                                                hover:bg-gray-700 focus:ring-2 focus:ring-gray-400 transition-colors duration-200">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>