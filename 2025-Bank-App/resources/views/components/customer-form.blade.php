@props (['action', 'method'])

<form action="{{  $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block text-sm text-gray-700">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $book->name ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-sm text-gray-700">Email</label>
        <input type="text" name="email" id="email" value="{{ old('email', $book->email ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('email')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="phone" class="block text-sm text-gray-700">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone', $book->phone ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('phone')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="address" class="block text-sm text-gray-700">Address</label>
        <input type="text" name="address" id="address" value="{{ old('address', $book->address ?? ' ') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('address')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Customer Image</label>
        <input type="file" name="image" id="image" {{ isset($customer) ?: 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($customer->image)
        <div class="mb-4">
            <img src="{{ asset($customer->image) }}" alt="Customer Image" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($book) ? 'Update Customer' : 'Add Customer' }}
        </x-primary-button>
    </div>
</form>