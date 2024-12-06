<x-app-layout>
    <x-slot name="header">
        <div class="md:container mx-auto sm:px-8 lg:px-10">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mt-3">
                {{ __('Metode Pembayaran') }}
            </h2>
        </div>
    </x-slot>


    <main>
        <!-- Begin Page Content -->
        <div class="container-fluid pt-10">
            <!-- Page Heading -->
            <div class="container mx-auto">
                <div class="flex flex-col">
                    {{-- sm:-mx-6 lg:-mx-8 --}}
                    <div class="overflow-x-auto ">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="col-lg-12 mb-4 flex justify-end">
                                <x-secondary-button
                                onclick="Livewire.dispatch('openModal', {component: 'payment_method.create'})">Tambah Pembayaran</x-secondary-button>
                            </div>
                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                <livewire:PaymentMethod.index/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</x-app-layout>
