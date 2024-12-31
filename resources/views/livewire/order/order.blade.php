<div
    class="xl:container px-4 md:px-5 flex flex-col md:flex-row justify-center w-full relative xl:mx-auto gap-4 md:gap-y-8 ">
    <!-- left Side -->
    <div class="w-full md:w-3/4 h-auto order-10 md:order-none flex flex-col gap-y-4">
        <!-- Informasi Pesanan -->
        <div class="w-full px-4 py-6 bg-slate-500 rounded-lg shadow-md shadow-slate-700 ">
            <h2 class="font-semibold text-xl md:text-2xl border-b"><i class="fa-solid fa-gamepad mr-2"></i>Informasi
                Pesanan</h2>
            <!-- Penjelasan Top Up -->
            <ul class="mt-5 ml-3 list-decimal text-sm md:text-lg font-medium">
                <h3 class="text-xl md:text-xl font-semibold text-white">Cara Top Up</h3>
                <li>
                    <p><span class="text-white mx-1">Pilih </span>nominal
                        diamond</p>
                </li>
                <li>
                    <p><span class="text-white mx-1">Masukan Id </span>& Server
                    </p>
                </li>
                <li>
                    <p><span class="text-white mx-1">Pilih </span>metode
                        pembayaran</p>
                </li>
                <li>
                    <p><span class="text-white mx-1">Isi nomor WhatsApp
                        </span>dengan benar</p>
                </li>
                <li>
                    <p><span class="text-white mx-1">Diamond</span>akan otomatis
                        masuk ke akunmu</p>
                </li>
            </ul>
            <!-- Penjelasan Top Up -->
        </div>

        <!-- Informasi Pesanan -->
        <form action="" method="POST" id="shipping-detail">
            <!-- Pilih Diamond -->

            @include('includes.order.menu')
    </div>
    <!-- End Left Side -->

    <!-- Right Side -->
    <div class="w-full md:w-1/4 md:h-screen flex flex-col gap-y-2 order-last md:order-none md:sticky md:top-32  ">

        <!-- START: Shipping Details-->
        @include('includes.order.card-order')
        </form>
    </div>
    <!-- END: Shipping Details-->
</div>
