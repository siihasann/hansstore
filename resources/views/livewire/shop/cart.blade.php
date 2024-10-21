<div>  
  <!-- Shopping Cart Container -->
  <div class="max-w-5xl mx-auto p-4 md:p-8">
    <div class="bg-white shadow-md rounded-lg p-4 md:p-6">
      <!-- Cart Header -->
      <div class="flex justify-between items-center border-b pb-4">
        <h2 class="text-xl md:text-2xl font-semibold">Shopping Cart</h2>
        <span class="text-lg md:text-xl font-semibold">{{ count($cart['products']) }} Items</span>
      </div>

      <!-- Table Header (hanya ditampilkan pada layar md ke atas) -->
      <div class="hidden md:grid grid-cols-12 gap-4 text-gray-500 mt-6">
        <div class="col-span-6">Product Details</div>
        <div class="col-span-4 text-center">Price</div>
        <div class="col-span-2 text-center">Remove</div>
        <!-- <div class="col-span-2 text-center">Total</div> -->
      </div>

      <!-- Product Rows -->
      @foreach ($cart['products'] as $product)
      <div class="grid grid-cols-1 md:grid-cols-12 gap-5 items-center mt-4 bg-gray-50 p-4 rounded-lg relative">
        <!-- Product Image and Details -->
        <div class="col-span-6 flex items-center space-x-4">
          <img src="https://via.placeholder.com/100" alt="Product Image" class="w-16 h-16 md:w-20 md:h-20 rounded-lg">
          <div>
            <h3 class="text-base md:text-lg font-semibold">{{$product->title}}</h3>
            <p class="text-sm text-gray-500">{{$product->desc}}</p>
            <div class="block md:hidden text-sm text-gray-500 mt-1">
              <span>Price: </span>
              <span class="text-green-600">Rp{{ number_format($product->price, 2, ',', '.') }}</span>
            </div>
          </div>
        </div>

        <!-- Price (desktop) -->
        <div class="col-span-4 text-center hidden md:block">
          <span class="text-lg font-semibold text-green-600">Rp{{ number_format($product->price, 2, ',', '.') }}</span>
        </div>

        <!-- Quantity Input -->
        <!-- <div class="col-span-2 text-center">
          <input type="number" class="w-12 md:w-16 text-center border border-gray-300 rounded" value="1" min="1">
        </div> -->

        <!-- Total (desktop) -->
        <!-- <div class="col-span-2 text-center hidden md:block text-lg font-semibold">
        Rp{{ number_format($product->price * $product->quantity, 2, ',', '.') }}
        </div> -->

        <!-- Total (mobile) -->
        <!-- <div class="block md:hidden text-right text-sm mt-2">
          <span>Total: </span>
          <span class="font-semibold">Rp{{ number_format($product->price * $product->quantity, 2, ',', '.') }}</span>
        </div> -->

        <!-- Remove Button -->
        <div class="absolute right-0 top-0 mt-2 mr-2 md:relative md:col-span-2 text-center">
          <button wire:click="removeFromCart({{ $product-> id }})" class="text-gray-400 hover:text-red-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>

      @endforeach
      <!-- Total and Checkout Button -->
      <div class="flex flex-col md:flex-row justify-between items-center mt-6 border-t pt-4">
        <span class="text-lg md:text-xl font-semibold">0</span>
        <a href="{{route('checkout.index')}}" class="bg-indigo-600 text-white px-4 py-2 mt-4 md:mt-0 rounded-lg hover:bg-indigo-700">Proceed to Checkout</a>
      </div>

      
    </div>
  </div>
</div>
