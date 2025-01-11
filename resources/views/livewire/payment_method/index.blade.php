<div>
    <table class="min-w-full divide-y divide-gray-200 items-center">
        <thead class="bg-gray-50 ">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Payment Type</th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fee Admin</th>
                <th scope="col"
                    class="px-1 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 items-center">
            @forelse ($items as $index=>$item)
                <tr wire:key="{{ $item->id }}">
                    <td scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $index + 1 }}
                    </td>
                    <td scope="col"
                        class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <img src="{{ Storage::url($item->image) }}" alt="preview_{{ $item->name }}"
                            class="object-contain w-16 aspect-square rounded-lg object-center">
                    </td>
                    <td scope="col"
                        class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                        {{ $item->name }}
                    </td>
                    <td scope="col"
                        class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500  tracking-wider ">
                        {{ $item->slug }}
                    </td>
                    <td scope="col"
                        class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                        Rp. {{ number_format($item->fee_admin, 0, ',', '.') }}
                    </td>
                    <td scope="col"
                        class="px-2 py-3 text-center text-xs font-medium text-gray-500 tracking-wider space-x-1 space-y-1">
                        <button
                            wire:click="$dispatch('openModal', { component: 'payment_method.create', arguments: { payment: {{ $item->id }} }})"
                            class="text-blue-600 hover:text-blue-400 rounded bg-blue-50 ring-1 ring-blue-500 p-1">
                            <i class="fa-solid fa-pen-to-square mx-1"></i>Ubah
                        </button>
                        <button class="text-green-600 hover:text-green-400 rounded bg-green-50 ring-1 ring-green-500 p-1">
                            <i class="fa-solid fa-check mx-1"></i>Aktifkan
                        </button>
                        <button wire:click="confirmAlert({{ $item->id }})" class="text-red-600 hover:text-red-400  rounded bg-red-50 ring-1 ring-red-500 p-1">
                            <i class="fa fa-trash mx-1"></i>Delete
                        </button>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mx-2 my-2">
        {{ $items->links() }}
    </div>
</div>
