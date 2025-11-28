@props (['action', 'method', 'account'])

<form action="{{  $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="balance" class="block text-sm text-gray-700">Balance</label>
        <input type="text" name="balance" id="balance" value="{{ old('balance', $account->balance ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('balance')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="date_opened" class="block text-sm text-gray-700">Date Opened</label>
        <input type="text" name="date_opened" id="date_opened"
            value="{{ old('date_opened', $account->date_opened ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('date_opened')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="account_status" class="block text-sm text-gray-700">Account Status</label>
        <input type="text" name="account_status" id="account_status"
            value="{{ old('account_status', $account->account_status ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('account_status')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <x-primary-button>
            {{ isset($account) ? 'Update Account' : 'Add Account' }}
        </x-primary-button>
    </div>
</form>