<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full md:w-8/12">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4 text-white text-lg font-bold text-center">
                    Checkout
                </div>

                <div class="p-6">
                    @if ($formCheckout)
                        <form wire:submit.prevent="checkout" class="space-y-6">
                            <!-- First Name and Last Name -->
                            <div class="flex space-x-4">
                                <div class="w-1/2">
                                    <input wire:model="first_name" type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('first_name') border-red-500 @enderror" placeholder="First Name">
                                    @error('first_name')
                                        <span class="text-red-500 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="w-1/2">
                                    <input wire:model="last_name" type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('last_name') border-red-500 @enderror" placeholder="Last Name">
                                    @error('last_name')
                                        <span class="text-red-500 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email and Phone -->
                            <div class="flex space-x-4">
                                <div class="w-1/2">
                                    <input wire:model="email" type="email" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror" placeholder="Email">
                                    @error('email')
                                        <span class="text-red-500 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="w-1/2">
                                    <input wire:model="phone_number" type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('phone_number') border-red-500 @enderror" placeholder="Phone">
                                    @error('phone_number')
                                        <span class="text-red-500 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Billing Address -->
                            <!-- <h3 class="text-lg font-semibold">Billing Address</h3>
                            <div class="space-y-2">
                                <label for="billing_address" class="block text-sm font-medium text-gray-700">Billing Address</label>
                                <textarea wire:model="billing_address" id="billing_address" cols="30" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('billing_address') border-red-500 @enderror"></textarea>
                                @error('billing_address')
                                    <span class="text-red-500 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->

                            <!-- Shipping Address -->
                            <h3 class="text-lg font-semibold">Shipping Address</h3>
                            <div class="space-y-2">
                                <label for="shipping_address" class="block text-sm font-medium text-gray-700">Shipping Address</label>
                                <textarea wire:model="address" id="shipping_address" cols="30" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('address') border-red-500 @enderror"></textarea>
                                @error('address')
                                    <span class="text-red-500 text-sm">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="same_as_billing" wire:model="use_shipping_as_billing" />
                                <label for="same_as_billing">Same as Billing Address</label>
                            </div>

                            @if (!$use_shipping_as_billing)
                                <!-- Billing Address Fields -->
                                <div class="space-y-2">
                                    <label for="billing_address" class="block text-sm font-medium text-gray-700">Billing Address</label>
                                    <textarea wire:model="billing_address" id="billing_address" cols="30" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('billing_address') border-red-500 @enderror"></textarea>
                                    @error('billing_address')
                                        <span class="text-red-500 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @endif

                            <!-- City and Postal Code -->
                            <div class="flex space-x-4">
                                <div class="w-1/2">
                                    <input wire:model="city" type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('city') border-red-500 @enderror" placeholder="City">
                                    @error('city')
                                        <span class="text-red-500 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="w-1/2">
                                    <input wire:model="postal_code" type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('postal_code') border-red-500 @enderror" placeholder="Postal Code">
                                    @error('postal_code')
                                        <span class="text-red-500 text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="w-full p-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Checkout</button>
                        </form>
                    @else
                        <div class="flex justify-center">
                            <button wire:click="emptyCart" class="px-4 py-2 bg-red-600 text-white rounded-lg">Clear Cart</button>
                        </div>
                        @if ($snapToken)
                            <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
                            <button id="pay-button" class="mt-4 px-4 py-2 bg-green-600 text-white rounded-lg">Pay Now</button>
                            <script>
                                document.getElementById('pay-button').onclick = function () {
                                    window.snap.pay('{{ $snapToken }}', {
                                        onSuccess: function(result) { /* Handle success */ },
                                        onPending: function(result) { /* Handle pending */ },
                                        onError: function(result) { /* Handle error */ },
                                        onClose: function() { /* Handle close */ }
                                    });
                                };
                            </script>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
