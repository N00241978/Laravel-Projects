@props(['name', 'email', 'phone', 'address' => null, 'image' => 'default.png'])

<div
    class="max-w-sm bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300 border">
    <div class="flex items-center space-x-4 p-4">
        <div class="flex-shrink-0">
            <img class="h-20 w-20 rounded-full border object-cover" src="{{ asset('images/' . $image) }}"
                alt="{{ $name }}">
        </div>
        <div class="ml-6">
            <h4 class="text-xl font-bold text-gray-800">{{ $name }}</h4>
            <p class="text-sm text-gray-600">{{ $email }}</p>
            <p class="text-sm text-gray-600">{{ $phone }}</p>
            @if($address)
                <p class="text-sm text-gray-500 mt-1">{{ $address }}</p>
            @endif
        </div>
    </div>
</div>