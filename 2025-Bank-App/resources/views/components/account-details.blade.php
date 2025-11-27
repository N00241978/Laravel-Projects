@props(['account'])

@php
    dd($account);
@endphp

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="md:flex items-start p-10 space-y-6 md:space-y-0 md:space-x-10">
            <h1 class="text-xl font-bold text-gray-800">Account ID: {{ $account->id }}</h1>
            <p class="text-xl text-gray-800">Balance: €{{ number_format($account->balance) }}</p>
            <p class="text-xl text-gray-800">Date Opened: {{ $account->date_opened }}</p>
            <p class="text-xl text-gray-800">Account Status: {{ $account->account_status }}</p>
        </div>
    </div>

</div>