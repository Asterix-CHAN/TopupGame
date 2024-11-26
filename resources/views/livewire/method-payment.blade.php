<div class=" flex items-center justify-center px-4">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6">
        <!-- Header -->
        <div class="flex justify-between items-center border-b pb-4 mb-4">
            <h2 class="text-lg font-semibold">Pilih Metode Pembayaran</h2>
            <button onclick="Livewire.dispatch('closeModal', {component: 'method-payment'})" class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>
        
        <!-- Tabs -->
        <div class="flex flex-wrap gap-2 border-b pb-4 mb-4">
            <button class="px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg focus:outline-none">e-Wallet</button>
            <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">QR Code</button>
            <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Kartu Kredit/Debit</button>
            <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Transfer Virtual Account</button>
            <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Gerai Retail</button>
            <button class="px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">Cicilan</button>
        </div>
        
        <!-- Form -->
        <form>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- GOPAY -->
                <label class="flex items-center border rounded-lg p-4 cursor-pointer">
                    <input type="radio" name="payment" value="gopay" class="hidden peer">
                    <div class="flex items-center space-x-4 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-300 peer-checked:ring-offset-2">
                        <img src="{{ url('Game/src/images/logo/gopay.png') }}" alt="Gopay" class="w-10 h-10">
                        <div>
                            <p class="text-sm font-medium">GOPAY</p>
                            <p class="text-sm text-gray-500">Biaya: IDR 3.212</p>
                        </div>
                    </div>
                </label>
                <!-- DANA -->
                <label class="flex items-center border rounded-lg p-4 cursor-pointer">
                    <input type="radio" name="payment" value="dana" class="hidden peer">
                    <div class="flex items-center space-x-4 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-300 peer-checked:ring-offset-2">
                        <img src="dana-logo.png" alt="Dana" class="w-10 h-10">
                        <div>
                            <p class="text-sm font-medium">DANA Linkage</p>
                            <p class="text-sm text-gray-500">Biaya: IDR 2.539</p>
                        </div>
                    </div>
                </label>
                <!-- HUBUNGKAN -->
                <label class="flex items-center border rounded-lg p-4 cursor-pointer">
                    <input type="radio" name="payment" value="hubungkan" class="hidden peer">
                    <div class="flex items-center space-x-4 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-300 peer-checked:ring-offset-2">
                        <img src="hubungkan-logo.png" alt="Hubungkan" class="w-10 h-10">
                        <div>
                            <p class="text-sm font-medium">Hubungkan</p>
                            <p class="text-sm text-gray-500">Biaya: IDR 2.600</p>
                        </div>
                    </div>
                </label>
                <!-- LINK AJA -->
                <label class="flex items-center border rounded-lg p-4 cursor-pointer">
                    <input type="radio" name="payment" value="linkaja" class="hidden peer">
                    <div class="flex items-center space-x-4 peer-checked:border-blue-500 peer-checked:ring-2 peer-checked:ring-blue-300 peer-checked:ring-offset-2">
                        <img src="linkaja-logo.png" alt="LinkAja" class="w-10 h-10">
                        <div>
                            <p class="text-sm font-medium">Link Aja!</p>
                        </div>
                    </div>
                </label>
            </div>
            
            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

