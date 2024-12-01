<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Paket Kiloan Baru</h6>
                    </div>
                    <form action="{{ route('paket_kiloans.store') }}" method="post" class="flex-col justify-center p-6">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="outlet" :value="__('Outlet')" />
                            <select name="outlet_id" id="outlet" class="mt-4 mb-4 block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <option value="">--Select outlet--</option>
                                @foreach ($outlet as $outlet)
                                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus/>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="old('deskripsi')" required autofocus/>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="harga" :value="__('Harga')" />
                            <div class="flex items-center">
                                <x-text-input id="harga" class="block w-full rounded-e-0" type="text" name="harga" :value="old('harga')" required autofocus/>
                                <span class="bg-gray-100 px-4 py-1.8 rounded-e-md min-w-25">/Kg</span>
                            </div>
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>
                        <div class="mt-10">
                            <input type="submit" value="Tambah" class="px-5 py-3 bg-blue-500 rounded-md text-xs text-white cursor-pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
