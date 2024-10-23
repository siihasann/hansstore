<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hans E-commerce Store</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://kit.fontawesome.com/b30d6eb604.js" crossorigin="anonymous"></script>
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
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Announcement Bar -->
        <div class="bg-indigo-600 px-4 py-2">
            <p class="text-center text-sm font-medium text-white">
                🎉 Free shipping on orders over $50! Limited time offer
            </p>
        </div>
        <!-- Navigation -->
        <header class="bg-white sticky top-0 z-50 shadow-sm">
            <nav class="container mx-auto px-8 sm:px-6 lg:px-20">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <a href="#" class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 text-transparent bg-clip-text">
                            HansStore
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Home</a>
                        <a href="{{ route('public.shop')}}" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Shop</a>
                        <a href="" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Categories</a>
                        <a href="#" class="text-gray-600 hover:text-indigo-600 font-medium transition-colors">Deals</a>
                    </div>

                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors">
                            <i class="fas fa-search text-xl"></i>
                        </button>
                        <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors relative">
                            <i class="fa-solid fa-cart-shopping text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </button>
                        @if (Route::has('register'))
                            <div class="ml-4">
                                @guest
                                    <a href="{{ route('register') }}">
                                        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                                            Sign Up
                                        </button>
                                    </a>
                                @endguest
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </header>

        <main>
        <!-- Hero Section -->
        <section class="hero-section text-white py-20 px-8 sm:px-6 lg:px-20">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-5xl font-bold mb-6 leading-tight">Discover Your Style, Define Your Space</h1>
                    <p class="text-xl mb-8 text-indigo-100">Shop the latest trends in fashion, electronics, and home decor with exclusive deals and premium quality.</p>
                    <div class="flex space-x-4">
                        <button class="bg-white text-indigo-600 px-8 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                            Shop Now
                        </button>
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
        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-300 py-12 px-4">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <h5 class="text-white text-lg font-semibold mb-4">About LaraStore</h5>
                        <p class="text-gray-400 mb-4">Your premium shopping destination for fashion, electronics, and home decor.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h5 class="text-white text-lg font-semibold mb-4">Quick Links</h5>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Shop Now</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Help Center</a></li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="text-white text-lg font-semibold mb-4">Customer Service</h5>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Shipping Information</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Returns & Exchanges</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Size Guide</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Track Your Order</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Gift Cards</a></li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="text-white text-lg font-semibold mb-4">Contact Info</h5>
                        <ul class="space-y-4">
                            <li class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt mt-1 text-indigo-500"></i>
                                <span class="text-gray-400">123 Store Street, City Center, State 12345</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-phone-alt text-indigo-500"></i>
                                <span class="text-gray-400">+1 234 567 8900</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-envelope text-indigo-500"></i>
                                <span class="text-gray-400">support@larastore.com</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <i class="fas fa-clock text-indigo-500"></i>
                                <span class="text-gray-400">Mon - Fri: 9:00 AM - 6:00 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Payment Methods & Bottom Bar -->
                <div class="border-t border-gray-800 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-400">Payment Methods:</span>
                            <div class="flex space-x-3">
                                <i class="fab fa-cc-visa text-2xl text-gray-400"></i>
                                <i class="fab fa-cc-mastercard text-2xl text-gray-400"></i>
                                <i class="fab fa-cc-paypal text-2xl text-gray-400"></i>
                                <i class="fab fa-cc-apple-pay text-2xl text-gray-400"></i>
                            </div>
                        </div>
                        
                        <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-4">
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a>
                                <a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a>
                            </div>
                            <p class="text-gray-400">© 2024 HansStore. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>