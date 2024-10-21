<div class="flex min-h-screen">
    <div class="flex-1 p-6 bg-gray-100">
    <div class="max-w-7xl mx-auto p-4">
        <!-- Form -->
        @if ($formVisible)
            @if (! $formUpdate)
                @livewire('product.create')
            @else
                @livewire('product.update')
            @endif
        @endif

        <!-- Product List -->
        <div class="flex justify-center">
            <div class="w-full lg:w-2/3">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
                    <div class="flex justify-between items-center bg-gray-100 dark:bg-gray-700 px-6 py-4 rounded-t-lg">
                        <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Product</h2>
                        <button wire:loading.attr="disabled" wire:click="$toggle('formVisible')" 
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded-lg focus:outline-none">
                            Create
                        </button>
                    </div>

                    @if (session()->has('message'))
                        <!-- <div>{{ session('message') }}</div> Cek view message -->
                        <div class="flex items-center justify-between bg-green-500 text-white p-4 rounded-md mb-4" role="alert">
                            <span>{{ session('message') }}</span>
                            <button type="button" class="ml-4 focus:outline-none" onclick="this.parentElement.style.display='none'">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif


                        <!-- Search and Pagination -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <select wire:model="paginate" 
                                    class="block w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                            <div>
                                <input wire:model.debounce.500ms="search" type="text" 
                                    class="block w-full text-sm border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" 
                                    placeholder="Search">
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Product Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full table-auto">
                                <thead class="bg-gray-200 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300">#</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300">Title</th>
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 dark:text-gray-300">Price</th>
                                        <th class="px-4 py-2 text-right text-xs font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    @foreach ($products as $product)
                                    <tr class="border-b dark:border-gray-700">
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $product->title }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                                        <td class="px-4 py-2 text-right">
                                            <button wire:loading.attr="disabled" wire:click="editProduct({{ $product->id }})"
                                                class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold rounded-lg focus:outline-none mr-2">
                                                Edit
                                            </button>
                                            <button  wire:loading.attr="disabled" wire:click="deleteProduct({{ $product->id }})"
                                                class="px-2 py-1 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg focus:outline-none">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>