<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <?php
                    $paket = '';
                    if (!$transaksi->paket_kiloans->isEmpty()) {
                        $paket = 'kiloan';
                    } else {
                        $paket = 'satuan';
                    }
                ?>
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border" x-data="{ paket : '{{$paket}}' }">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Tambah Invoice</h6>
                    </div>
                    <form x-show="paket == 'kiloan'" action="{{ route('invoices.store',$transaksi) }}" method="post" class="flex-col space-y-4 justify-center p-6" x-data="{ bayar : 0, total : {{$transaksi->paket_kiloans->map(function($paket){
                        return $paket->harga * $paket->pivot->kilogram;
                    })->sum()}}, kembali : 0 }">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="transaksi_id" :value="__('Transaksi')" />
                            <x-text-input readonly id="transaksi_id" class="block mt-1 w-full" type="text" name="transaksi_id" :value="$transaksi->id" required autofocus/>
                            <x-input-error :messages="$errors->get('transaksi_id')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga_total" :value="__('Harga Total')" />
                            <x-text-input x-model="total" readonly id="harga_total" class="block mt-1 w-full" type="number" name="harga_total" required autofocus/>
                            <x-input-error :messages="$errors->get('harga_total')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga_bayar" :value="__('Harga Bayar')" />
                            <x-text-input x-model="bayar" x-on:input="kembali = bayar - total" id="harga_bayar" class="block mt-1 w-full" type="number" name="harga_bayar" required autofocus/>
                            <x-input-error :messages="$errors->get('harga_bayar')" class="mt-2" />
                        </div>
                        <div x-show="bayar >= total" class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga_kembali" :value="__('Harga Kembali')" />
                            <x-text-input x-model="kembali" readonly id="harga_kembali" class="block mt-1 w-full" type="number" name="harga_kembali" required autofocus/>
                            <x-input-error :messages="$errors->get('harga_kembali')" class="mt-2" />
                        </div>
                        <input type="submit" value="Tambah" class="px-4 py-2 bg-blue-500 rounded-md text-xs text-white">
                    </form>
                    <form x-show="paket == 'satuan'" action="{{ route('invoices.store',$transaksi) }}" method="post" class="flex-col space-y-4 justify-center p-6" x-data="{ bayar : 0, total : {{$transaksi->paket_satuans->sum('harga')}}, kembali : 0 }">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="transaksi_id" :value="__('Transaksi')" />
                            <x-text-input readonly id="transaksi_id" class="block mt-1 w-full" type="text" name="transaksi_id" :value="$transaksi->id" required autofocus/>
                            <x-input-error :messages="$errors->get('transaksi_id')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga_total" :value="__('Harga Total')" />
                            <x-text-input x-model="total" readonly id="harga_total" class="block mt-1 w-full" type="number" name="harga_total" required autofocus/>
                            <x-input-error :messages="$errors->get('harga_total')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga_bayar" :value="__('Harga Bayar')" />
                            <x-text-input x-model="bayar" x-on:input="kembali = bayar - total" id="harga_bayar" class="block mt-1 w-full" type="number" name="harga_bayar" required autofocus/>
                            <x-input-error :messages="$errors->get('harga_bayar')" class="mt-2" />
                        </div>
                        <div x-show="bayar >= total" class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga_kembali" :value="__('Harga Kembali')" />
                            <x-text-input x-model="kembali" readonly id="harga_kembali" class="block mt-1 w-full" type="number" name="harga_kembali" required autofocus/>
                            <x-input-error :messages="$errors->get('harga_kembali')" class="mt-2" />
                        </div>
                        <input type="submit" value="Tambah" class="px-4 py-2 bg-blue-500 rounded-md text-xs text-white">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
