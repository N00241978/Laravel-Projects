@props(['account'])

<a href="{{ route('accounts.show', $account) }}" class="flex flex-col p-4 shadow-lg border border-light border-2">

    <h1 class="text-xl font-bold text-gray-800">Account ID: {{ $account->id }}</h1>
    <p class="text-xl text-gray-800">Balance: €{{ number_format($account->balance) }}</p>
    <p class="text-xl text-gray-800">Date Opened: {{ $account->date_opened }}</p>
    <p class="text-xl text-gray-800">Account Status: {{ $account->account_status }}</p>
</a>