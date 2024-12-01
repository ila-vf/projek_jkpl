<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">{{$paket_satuan->paket_code}}</h6>
                    </div>
                    <form action="{{ route('paket_satuans.store') }}" method="post" class="flex-col space-y-4 justify-center p-6">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="outlet" :value="__('Outlet')" />
                            <select disabled name="outlet_id" id="outlet" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <option value="{{$paket_satuan->outlet->id}}">{{$paket_satuan->outlet->nama}}</option>
                            </select>
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <input disabled id="nama" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" type="text" name="nama" value="{{$paket_satuan->nama}}" required autofocus>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <input disabled id="deskripsi" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" type="text" name="deskripsi" value="   {{$paket_satuan->deskripsi}}" required autofocus>
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="harga" :value="__('Harga')" />
                            <input disabled id="harga" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" type="text" name="harga" value="{{$paket_satuan->harga}}" required autofocus>
                            <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                        </div>
                    </form>
                    <div class="flex-col space-y-4 justify-center p-6 pt-3">
                        <div class="flex space-x-3">
                            <a href="{{ route('paket_satuans.edit',$paket_satuan) }}" class="px-4 py-2 bg-blue-500 rounded-md text-xs text-white">
                                Edit
                            </a>
                            <form action="{{ route('paket_satuans.destroy',$paket_satuan) }}" method="post" class="p-0 m-0">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Hapus" class="px-4 py-2 bg-red-400 rounded-md text-xs text-white cursor-pointer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
