<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Show People</h6>
                    </div>
                    <form action="{{ route('peoples.store') }}" method="post"
                        class="flex-col space-y-4 justify-center p-6">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input :disabled="true" id="nama" class="block mt-1 w-full" type="text"
                                name="nama" :value="$person->nama" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="no_telepon" :value="__('No Telepon')" />
                            <x-text-input :disabled="true" id="no_telepon" class="block mt-1 w-full" type="text"
                                name="no_telepon" :value="$person->no_telepon" required autofocus />
                            <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
                        </div>
                    </form>
                    <div class="flex-col space-y-4 justify-center p-6 pt-3">
                        <div class="flex space-x-3">
                            <a href="{{ route('peoples.edit', $person) }}"
                                class="px-4 py-2 bg-blue-500 rounded-md text-xs text-white">
                                Edit
                            </a>
                            <form action="{{ route('peoples.destroy', $person) }}" method="post" class="p-0 m-0">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Hapus"
                                    class="px-4 py-2 bg-red-400 rounded-md text-xs text-white cursor-pointer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
