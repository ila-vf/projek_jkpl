<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Outlet</h6>
                    </div>
                    <form action="{{ route('outlet.store') }}" method="post" class="flex-col justify-center p-6">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" autofocus/>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" autofocus/>
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="hotline" :value="__('Hotline')" />
                            <x-text-input id="hotline" class="block mt-1 w-full" type="text" name="hotline" :value="old('hotline')" autofocus/>
                            <x-input-error :messages="$errors->get('hotline')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" autofocus/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex justify-between mt-10">
                            <input type="submit" value="Tambah" class="px-5 py-3 bg-blue-500 rounded-md text-xs text-white cursor-pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
