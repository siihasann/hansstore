<div>
    <!-- Cart Icon -->
    <div class="flex mt-4 items-center space-x-2">
        <a href="{{route('cart.index')}}" class="flex items-center dark:text-gray-400 dark:hover:text-gray-200 text-gray-700 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18l-2 13H5L3 3z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 21a2 2 0 100-4 2 2 0 000 4zM8 21a2 2 0 100-4 2 2 0 000 4z"/>
            </svg>
            <span class="ml-1 text-sm text-gray-800">{{ $cartTotal }}</span>
        </a>
    </div>
</div>
