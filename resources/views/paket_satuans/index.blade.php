<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <x-flash-message/>
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="flex justify-between">
                            <h6 class="dark:text-white">Daftar Paket Satuan</h6>
                            <a class="inline-block px-5 py-2.5 text-sm font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-transparent rounded-lg shadow-md cursor-pointer bg-150 bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 hover:shadow-xs active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25" href="{{ route('paket_satuans.create') }}">  <i class="leading-none fas fa-plus" aria-hidden="true"> </i> Tambah Paket</a>
                        </div>
                    </div>
                    <div class="flex-auto px-0 pt-0 pb-2">
                        <div class="p-0 overflow-x-auto">
                            <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-bottom">
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Deskripsi</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Harga</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Created At</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Updated At</th>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                                </thead>
                                <tbody>
                                    @foreach($paket_satuans as $paket_satuan)
                                        <tr onclick="">
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <a href="{{ route('paket_satuans.show',$paket_satuan) }}">
                                                <div class="flex-col px-3 py-1">
                                                    <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $paket_satuan->nama }}</h6>
                                                    <po class="text-xs">{{ $paket_satuan->deskripsi }}</p>
                                                </div>
                                                </a>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-3 py-1">
                                                    <p class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $paket_satuan->deskripsi }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-3 py-1">
                                                    <p class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $paket_satuan->harga }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-3 py-1">
                                                    <p class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $paket_satuan->created_at }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex px-3 py-1">
                                                    <p class="mb-0 text-sm leading-normal dark:text-white">
                                                        {{ $paket_satuan->updated_at }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="p-4 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                <div class="flex items-center space-x-3">
                                                    <a href="{{ route('paket_satuans.edit',$paket_satuan) }}" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                        <i class="mr-2 leading-none fas fa-pencil-alt text-slate-700" aria-hidden="true"></i>
                                                    </a>
                                                    <form action="{{ route('paket_satuans.destroy',$paket_satuan) }}" method="post" class="p-0 m-0">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit">
                                                            <i class="mr-2 far fa-trash-alt text-orange-600" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
