{{-- <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-40" aria-hidden="true"></div>

    <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class=" w-full">
                      


                        <form method="post" action="{{ route('category.store') }}" >
                            @csrf
                            @if (Session::has('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: '{{ Session::get('success') }}'
                                    });
                                </script>
                            @endif

                            @if (Session::has('error'))
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: '{{ Session::get('error') }}'
                                    });
                                </script>
                            @endif

                            <div class="card w-1/2">
                                <div class="card-body flex gap-2">
                            
                                    <div class="w-full">
                                        
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                                                <input type="text"
                                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                    name="name" value="{{ old('name') }}" placeholder="Name">
                                            </div>
                                    </div>
                                </div>
                            </div>
                         
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row gap-2 justify-end sm:px-6">
                    <button type="submit"
                        class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 sm:ml-3 sm:w-auto">Create</button>
                    </form>
                    <button type="button"
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                        @click="isOpen = !isOpen">Cancel</button>
                </div>

               
            </div>
        </div>
    </div>
</div>

 --}}
