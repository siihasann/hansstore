<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="#" class="text-2xl font-bold text-gray-900">ShopMaster</a>
            </div>
            <!-- Search Bar -->
            <div class="flex items-center w-1/2">
                <input 
                    wire:model="search" 
                    type="text" 
                    placeholder="Search products..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-indigo-500">
            </div>
         @livewire('shop.cartmenu')
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <!-- Categories -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-900">Featured Products</h2>
            <div class="space-x-4">
                <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">All</a>
                <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">Electronics</a>
                <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">Clothing</a>
                <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-900">Accessories</a>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Single Product Card -->
            @foreach ($products as $product)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="{{ $product->image ? asset('/storage/' .$product->image) : 'https://via.placeholder.com/400' }}" alt="{{ $product->title }}" class="w-full h-56 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $product->title }}</h3>
                    <p class="mt-2 text-sm text-gray-600">{{ $product->desc }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <span class="text-lg font-bold text-indigo-600">Rp{{ number_format($product->price, 2, ',', '.') }}</span>
                        <button wire:click="addToCart({{$product -> id}})" type="button" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination (Optional) -->
        <div class="flex justify-center mt-8">
            <nav class="inline-flex rounded-md shadow-sm">
                {{ $products->links('pagination::tailwind') }}
            </nav>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm">&copy; 2024 ShopMaster. All rights reserved.</p>
        </div>
    </footer>
</div>
