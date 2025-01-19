<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <!-- Display User's Balance -->
                <span class="text-gray-800 font-semibold">
                    Balance: ${{ Auth::user()->balance }}
                    Points: {{ Auth::user()->point }}
                </span>

                <!-- Admin Shop Button -->
                @if (Auth::check() && Auth::user()->role === 'admin')
                    <a href="{{ route('editStock') }}" class="text-sm text-gray-700 hover:text-gray-900">
                        Admin Shop
                    </a>
                @endif

                <!-- Logout Button -->
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Display Products -->
                    <div class="mt-8">
                        <h3 class="text-2xl font-semibold mb-6">Selling Items</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($products as $product)
                                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                                    <h4 class="text-xl font-bold text-gray-800">{{ $product->name }}</h4>
                                    <p class="mt-2 text-gray-600">Price: ${{ number_format($product->price, 2) }}</p>
                                    <p class="mt-2 text-gray-600">Points: {{ $product->point }}</p>
                                    <p class="mt-2 text-gray-600">Stock: {{ $product->stock }}</p>
                                    <form action="{{ route('purchase', $product) }}" method="POST" class="mt-4">
                                        @csrf
                                        <button type="submit" class="w-full px-4 py-2 bg-[#FF2D20] text-black rounded-md hover:bg-[#FF2D20]/90 transition duration-300">
                                            Buy Now
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@if (Auth::check())
    <script>
        // Listen for the form submission
        document.querySelectorAll('form[action="{{ route('purchase', ['product' => $product]) }}"]').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the default form submission

                // Send the form data via AJAX (optional) or proceed with a simple alert
                // Here, we'll just show an alert for simplicity
                if (confirm("Are you sure you want to buy this item?")) {
                    this.submit(); // Submit the form
                }
            });
        });
    </script>
@endif
