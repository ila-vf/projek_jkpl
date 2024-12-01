<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Update Transaksi</h6>
                    </div>
                    <form action="{{ route('transaksis.update',$transaksi) }}" method="POST" class="flex-col space-y-4 justify-center p-6">
                        @csrf
                        @method("PUT")
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="tgl_diantar" :value="__('Tanggal Diantar')" />
                            <input type="date" name="tgl_diantar" id="tgl_diantar" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $transaksi->tgl_diantar }}">
                            <x-input-error :messages="$errors->get('tgl_diantar')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="tgl_selesai" :value="__('Tanggal Selesai')" />
                            <input  type="date" name="tgl_selesai" id="tgl_selesai" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $transaksi->tgl_selesai }}">
                            <x-input-error :messages="$errors->get('tgl_selesai')" class="mt-2" />
                        </div>
                        <div class="flex-col space-y-2 items-center w-full">
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" type="text" name="status" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <option value="Pending">Pending</option>
                                <option value="Doing">Doing</option>
                                <option value="Done">Done</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        <input type="submit" value="Update" class="px-4 py-2 bg-blue-500 rounded-md text-xs text-white">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>