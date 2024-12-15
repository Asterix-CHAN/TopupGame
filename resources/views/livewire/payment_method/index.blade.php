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
                    Biaya</th>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                        <img src="{{ Storage::url($item->image) }}" alt=""
                            class="object-contain w-16 aspect-square rounded-lg object-center">
                    </td>
                    <td scope="col"
                        class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                        {{ $item->name }}
                    </td>
                    <td scope="col"
                        class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500  tracking-wider ">
                        {{ $item->payment_type }}
                    </td>
                    <td scope="col"
                        class="px-6 py-3  text-left  rounded-lg  text-xs font-medium text-gray-500 uppercase tracking-wider ">
                        Rp. {{ number_format($item->fee_admin, 0, ',', '.') }}
                    </td>
                    <td scope="col"
                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 tracking-wider gap-2">
                        <button
                            wire:click="$dispatch('openModal', { component: 'payment_method.create', arguments: { payment: {{ $item->id }} }})"
                            class="text-blue-600 hover:text-blue-400">
                            <i class="fa-solid fa-pen-to-square mx-1"></i> Ubah
                        </button>
                        <a href="" class="text-red-600 hover:text-red-400 " data-confirm-delete="true"><i
                                class="fa fa-trash mx-1"></i>Delete</a>
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
