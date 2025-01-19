<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Shop</title>
    <!-- Include Tailwind CSS or your preferred CSS framework -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Admin Page</h1>
        <div class="mb-6">
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                Back to Dashboard
            </a>
        </div>
        <!-- Display Products -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                    <p class="text-gray-600">Price: ${{ number_format($product->price, 2) }}</p>
                    <p class="text-gray-600">Points: {{ $product->point }}</p>
                    <p class="text-gray-600">Stock: {{ $product->stock }}</p>

                    <!-- Edit Product Button -->
                    <a href="{{ route('admin.products.edit', $product) }}"
                        class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Edit
                    </a>

                    <!-- Delete Product Button -->
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                            Delete
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <!-- Add Product Button -->
        <div class="mt-8">
            <a href="{{ route('admin.products.create') }}"
                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                Add Product
            </a>
        </div>
    </div>
</body>

</html>
