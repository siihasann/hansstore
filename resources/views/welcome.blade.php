<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your E-commerce Store</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased bg-gray-100">
    <header class="bg-white shadow-md">
            <nav class="container mx-auto px-6 py-8">
                <div class="flex justify-between items-center">
                    <div class="text-xl font-bold text-gray-800">LaraStore</div>
                    <div class="flex items-center">
                        <a href="#" class="text-gray-800 hover:text-blue-600 mx-4">Home</a>
                        <a href="{{ route('public.shop') }}" class="text-gray-800 hover:text-blue-600 mx-4">Shop</a>
                        <a href="#" class="text-gray-800 hover:text-blue-600 mx-4">About</a>
                        <a href="#" class="text-gray-800 hover:text-blue-600 mx-4">Contact</a>
                        @if (Route::has('login'))
                            <div class="ml-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-800 hover:text-blue-600">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-600">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-gray-800 hover:text-blue-600">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <section class="bg-blue-600 text-white py-20">
                <div class="container mx-auto px-6">
                    <h2 class="text-4xl font-bold mb-2">Welcome to Your Store</h2>
                    <h3 class="text-2xl mb-8">Discover amazing products at unbeatable prices!</h3>
                    <button class="bg-white text-blue-600 font-bold rounded-full py-4 px-8 shadow-lg uppercase tracking-wider hover:bg-gray-200">
                        Shop Now
                    </button>
                </div>
            </section>

            <section class="container mx-auto px-6 py-10">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">
                    Featured Products
                </h2>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <img src="/api/placeholder/300/200" alt="Product 1" class="rounded-lg shadow-md mb-4">
                        <h3 class="text-xl text-gray-800 font-bold mb-2">Product 1</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="bg-blue-600 text-white rounded-full px-4 py-2 hover:bg-blue-500">
                            Add to Cart
                        </button>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <img src="/api/placeholder/300/200" alt="Product 2" class="rounded-lg shadow-md mb-4">
                        <h3 class="text-xl text-gray-800 font-bold mb-2">Product 2</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="bg-blue-600 text-white rounded-full px-4 py-2 hover:bg-blue-500">
                            Add to Cart
                        </button>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <img src="/api/placeholder/300/200" alt="Product 3" class="rounded-lg shadow-md mb-4">
                        <h3 class="text-xl text-gray-800 font-bold mb-2">Product 3</h3>
                        <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="bg-blue-600 text-white rounded-full px-4 py-2 hover:bg-blue-500">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </section>

            <section class="bg-gray-200 py-10">
                <div class="container mx-auto px-6">
                    <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">
                        Why Choose Us?
                    </h2>
                    <div class="flex flex-wrap">
                        <div class="w-full md:w-1/3 px-4 mb-8">
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Quality Products</h3>
                                <p class="text-gray-600">We offer only the best quality products for our customers.</p>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-4 mb-8">
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Fast Shipping</h3>
                                <p class="text-gray-600">Get your products delivered quickly and efficiently.</p>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-4 mb-8">
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">24/7 Support</h3>
                                <p class="text-gray-600">Our customer support team is always here to help you.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto px-6">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-1/4 text-center md:text-left">
                        <h5 class="uppercase mb-6 font-bold">Company</h5>
                        <ul class="mb-4">
                            <li class="mt-2">
                                <a href="#" class="hover:underline text-gray-400 hover:text-white">About Us</a>
                            </li>
                            <li class="mt-2">
                                <a href="#" class="hover:underline text-gray-400 hover:text-white">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/4 text-center md:text-left">
                        <h5 class="uppercase mb-6 font-bold">Legal</h5>
                        <ul class="mb-4">
                            <li class="mt-2">
                                <a href="#" class="hover:underline text-gray-400 hover:text-white">Terms of Use</a>
                            </li>
                            <li class="mt-2">
                                <a href="#" class="hover:underline text-gray-400 hover:text-white">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/4 text-center md:text-left">
                        <h5 class="uppercase mb-6 font-bold">Social</h5>
                        <ul class="mb-4">
                            <li class="mt-2">
                                <a href="#" class="hover:underline text-gray-400 hover:text-white">Facebook</a>
                            </li>
                            <li class="mt-2">
                                <a href="#" class="hover:underline text-gray-400 hover:text-white">Instagram</a>
                            </li>
                            <li class="mt-2">
                                <a href="#" class="hover:underline text-gray-400 hover:text-white">Twitter</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/4 text-center md:text-left">
                        <h5 class="uppercase mb-6 font-bold">Newsletter</h5>
                        <p class="text-gray-400 mb-4">Subscribe to our newsletter for updates yaa</p>
                        <div class="flex mt-4">
                            <input type="text" class="rounded-l-lg p-2 w-full" placeholder="Your Email">
                            <button class="bg-blue-600 text-white rounded-r-lg px-4 py-2 hover:bg-blue-500">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>