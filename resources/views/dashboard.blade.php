<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-section {
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        }
        .product-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .category-card:hover {
            transform: scale(1.03);
            transition: all 0.3s ease;
        }
    </style>

    <div>
    <main>
        <!-- Hero Section -->
        <section class="hero-section text-white py-20 px-8 sm:px-6 lg:px-20">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-5xl font-bold mb-6 leading-tight">Discover Your Style, Define Your Space</h1>
                    <p class="text-xl mb-8 text-indigo-100">Shop the latest trends in fashion, electronics, and home decor with exclusive deals and premium quality.</p>
                    <div class="flex space-x-4">
                        <a href="{{ route('shop.index')}}">
                            <button class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                                Shop Now
                            </button>
                        </a>
                        
                        <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                            Learn More
                        </button>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="/api/placeholder/600/400" alt="Hero Image" class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </section>

        <!-- Categories Section -->
        <section class="py-16 px-4">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold text-center mb-12">Shop by Category</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="category-card bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer">
                        <img src="/api/placeholder/400/300" alt="Fashion" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Fashion</h3>
                            <p class="text-gray-600 mb-4">Discover latest trends</p>
                            <a href="#" class="text-indigo-600 font-medium hover:text-indigo-700">
                                Explore <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="category-card bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer">
                        <img src="/api/placeholder/400/300" alt="Electronics" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Electronics</h3>
                            <p class="text-gray-600 mb-4">Latest gadgets</p>
                            <a href="#" class="text-indigo-600 font-medium hover:text-indigo-700">
                                Explore <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="category-card bg-white rounded-xl shadow-lg overflow-hidden cursor-pointer">
                        <img src="/api/placeholder/400/300" alt="Home & Living" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Home & Living</h3>
                            <p class="text-gray-600 mb-4">Make your space beautiful</p>
                            <a href="#" class="text-indigo-600 font-medium hover:text-indigo-700">
                                Explore <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="py-16 px-4 bg-gray-100">
            <div class="container mx-auto">
                <div class="flex justify-between items-center mb-12">
                    <h2 class="text-3xl font-bold">Featured Products</h2>
                    <a href="#" class="text-indigo-600 font-medium hover:text-indigo-700">View All</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="relative">
                            <img src="/api/placeholder/300/300" alt="Product 1" class="w-full h-64 object-cover">
                            <span class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">-20%</span>
                        </div>
                        <div class="p-6">
                            <h3 class="text-lg font-semibold mb-2">Premium Wireless Headphones</h3>
                            <div class="flex items-center mb-4">
                                <span class="text-xl font-bold text-indigo-600">$79.99</span>
                                <span class="ml-2 text-sm text-gray-500 line-through">$99.99</span>
                            </div>
                            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    <!-- Repeat similar product cards -->
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 px-4">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-truck text-2xl text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Free Shipping</h3>
                        <p class="text-gray-600">On orders over $50</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-2xl text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Secure Payment</h3>
                        <p class="text-gray-600">100% secure payment</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-headset text-2xl text-indigo-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                        <p class="text-gray-600">Dedicated support</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="bg-indigo-600 py-16 px-4">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Stay Updated</h2>
                <p class="text-indigo-100 mb-8 max-w-2xl mx-auto">Subscribe to our newsletter and get exclusive offers, new arrival updates, and special discounts delivered to your inbox.</p>
                <form class="max-w-md mx-auto flex gap-4">
                    <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white">
                    <button type="submit" class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
        </main>
    </div>
    @livewire('component-footer')
</x-app-layout>
