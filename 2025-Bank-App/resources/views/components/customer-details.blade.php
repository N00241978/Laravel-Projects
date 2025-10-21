@props(['name', 'email', 'phone', 'address', 'image'])

<div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="md:flex items-center p-10 space-y-6 md:space-y-0 md:space-x-10">
            {{-- Profile Image --}}
            @if ($image)
                <img class="w-40 h-40 rounded-full object-cover border-4 border-indigo-500 shadow-md" src="{{ $image }}"
                    alt="{{ $name }}">
            @else
                <div
                    class="w-40 h-40 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-4xl font-bold border-4 border-indigo-500 shadow-md">
                    {{ strtoupper(substr($name, 0, 1)) }}
                </div>
            @endif

            {{-- Info Section --}}
            <div class="flex-1">
                <h1 class="text-4xl font-extrabold text-gray-800">{{ $name }}</h1>
                <p class="mt-2 text-lg text-gray-600"><strong>Email:</strong> {{ $email }}</p>
                <p class="mt-1 text-lg text-gray-600"><strong>Phone:</strong> {{ $phone }}</p>
                <p class="mt-1 text-lg text-gray-600"><strong>Address:</strong> {{ $address }}</p>
            </div>
        </div>
    </div>
</div>