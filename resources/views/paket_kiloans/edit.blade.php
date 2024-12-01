<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Update Paket Kiloan</h6>
                    </div>
                    <form action="{{ route('paket_kiloans.update',$paket_kiloan) }}" method="POST" class="flex-col justify-center p-6">
                        @method("PUT")
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="$paket_kiloan->nama" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="$paket_kiloan->deskripsi" required autofocus />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="harga" :value="__('Harga')" />
                            <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="$paket_kiloan->harga" required autofocus />
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>
                        <div class="mt-10">
                            <input type="submit" value="Update" class="px-5 py-3 bg-blue-500 rounded-md text-xs text-white">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
