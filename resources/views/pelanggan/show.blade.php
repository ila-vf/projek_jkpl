<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">{{$pelanggan->pelanggan_code}}</h6>
                    </div>
                    <form action="{{ route('pelanggans.store') }}" method="post" class="flex-col space-y-4 justify-center p-6">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <input disabled type="text" name="nama" id="nama" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $pelanggan->nama }}">
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <input disabled type="text" name="alamat" id="alamat" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $pelanggan->alamat }}">
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="no_telepon" :value="__('No Telepon')" />
                            <input disabled type="text" name="no_telepon" id="no_telepon" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $pelanggan->no_telepon }}">
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="gender" :value="__('Gender')" />
                            <input disabled type="text" name="gender" id="gender" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $pelanggan->gender }}">
                        </div>
                    </form>
                    <div class="flex-col justify-center px-6 pb-6 mt-5">
                        <div class="flex space-x-3">
                            <a href="{{ route('pelanggans.edit',$pelanggan) }}" class="px-5 py-3 bg-blue-500 rounded-md text-xs text-white">
                                Edit
                            </a>
                            <form action="{{ route('pelanggans.destroy',$pelanggan) }}" method="post" class="p-0 m-0">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Hapus" class="px-5 py-3 bg-red-400 rounded-md text-xs text-white cursor-pointer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
