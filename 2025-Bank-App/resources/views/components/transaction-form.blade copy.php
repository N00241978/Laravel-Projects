@props (['action', 'method', 'transaction'])

<form action="{{  $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
    @method($method)
    @endif

    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $transaction->title ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('title')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="amount" class="block text-sm text-gray-700">Amount</label>
        <input type="text" name="amount" id="amount" value="{{ old('amount', $transaction->amount ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('amount')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="old_balance" class="block text-sm text-gray-700">Old Balance</label>
        <input type="text" name="old_balance" id="old_balance"
            value="{{ old('old_balance', $transaction->old_balance ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('old_balance')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="new_balance" class="block text-sm text-gray-700">New Balance</label>
        <input type="text" name="new_balance" id="new_balance"
            value="{{ old('new_balance', $transaction->new_balance ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('new_balance')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{ isset($transaction) ? 'Update transaction' : 'Add transaction' }}
        </x-primary-button>
    </div>
</form>