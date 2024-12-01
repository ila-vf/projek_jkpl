<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Update</h6>
                    </div>
                    <form action="{{ route('paket_satuans.update',$paket_satuan) }}" method="POST" class="flex-col space-y-4 justify-center p-6">
                        @method("PUT")
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="$paket_satuan->nama" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="$paket_satuan->deskripsi" required autofocus />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga" :value="__('Harga')" />
                            <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="$paket_satuan->harga" required autofocus />
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>
                        <input type="submit" value="Update" class="px-4 py-2 bg-blue-500 rounded-md text-xs text-white">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
