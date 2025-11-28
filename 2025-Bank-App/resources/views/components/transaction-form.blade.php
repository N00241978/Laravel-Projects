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

    <div>
        <x-primary-button>
            {{ isset($transaction) ? 'Update transaction' : 'Add transaction' }}
        </x-primary-button>
    </div>
</form>