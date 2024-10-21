<div class="flex justify-center mb-4">
    <div class="w-full max-w-4xl">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <div class="p-6">
                <!-- Tambahkan elemen root di sini -->
                <div>
                    <form 
                        wire:submit.prevent="store"
                        method="POST" 
                        enctype="multipart/form-data">

                        <!-- Title and Price -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <input 
                                    wire:model="title" 
                                    type="text" 
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" placeholder="Title">
                                @error('title')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <input 
                                    wire:model="price" 
                                    type="text" 
                                    class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('price') border-red-500 @enderror" placeholder="Price">
                                @error('price')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <input 
                                wire:model="desc" 
                                type="text" 
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('desc') border-red-500 @enderror" 
                                placeholder="Description">
                            @error('desc')
                            <span class="text-red-500 text-sm">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image</label>
                            <input 
                                wire:model.lazy="image"
                                type="file"
                                class="block w-full text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                id="image">
                            @error('image')
                                <span class="text-red-500 text-sm">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- Indikator Loading -->
                            <div wire:loading wire:target="image">Loading preview...</div>

                            <!-- Image Preview -->
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" 
                                alt="Preview Image" 
                                class="w-20 h-auto max-w-xs rounded-md mt-2">
                            @endif
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-between items-center">
                            <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Submit
                            </button>
                            <button wire:click="$emit('formClose')" type="button" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Close
                            </button>
                        </div>
                    </form>
                </div> <!-- Tutup elemen root di sini -->
            </div>
        </div>
    </div>
</div>
