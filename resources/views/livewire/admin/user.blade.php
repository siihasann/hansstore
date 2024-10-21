<div>
    <div class="flex min-h-screen">

    <div class="flex-1 p-6 bg-gray-100">
        
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <!-- Search Box -->
            <div class="relative">
                <input type="text" wire:model="search" placeholder="Search users..." class="w-full py-2 px-4 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Pagination Select Box -->
    <div class="flex items-center space-x-2">
        <span class="text-sm text-gray-700">Show</span>
        <div class="relative">
            <select wire:model="paginate" class="appearance-none w-full py-2 px-4 pr-8 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
        </div>
    </div>
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto h-[500px] bg-white rounded-lg shadow-md">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Nama</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Email</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Role</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Telp</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Alamat</th>
                        <th class="py-3 px-4 text-center text-sm font-semibold text-gray-700">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($users as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $user->id }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $user->name }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $user->email }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $user->role }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $user->telp }}</td>
                            <td class="py-3 px-4 text-sm text-gray-900">{{ $user->address }}</td>
                            <td class="py-3 px-4 text-center">
                                <!-- Dropdown Action -->
                                <div class="relative inline-block text-left" x-data="{ open: false }">
                                    <button @click="open = !open" class="flex items-center justify-center w-8 h-8 text-gray-700 rounded-full hover:bg-gray-200">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 110-4 2 2 0 010 4zm8 0a2 2 0 110-4 2 2 0 010 4zm-4 0a2 2 0 110-4 2 2 0 010 4z"/>
                                        </svg>
                                    </button>

                                    <!-- Dropdown Menu -->
                                    <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-28 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                                        <div class="py-1">
                                            <button wire:click="editUser({{ $user->id }})" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</button>
                                            <button wire:click="deleteUser({{ $user->id }})" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-3 px-4 text-center text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

</div>

</div>


</div>
