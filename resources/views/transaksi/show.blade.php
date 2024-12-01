<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">{{$transaksi->transaksi_code}}</h6>
                    </div>
                    <form action="{{ route('transaksis.store') }}" method="post" class="flex-col justify-center p-6">
                        @csrf
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="pelanggan" :value="__('Nama Pelanggan')" />
                            <input disabled type="text" name="pelanggan" id="pelanggan" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $transaksi->pelanggan->nama }}">
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="tgl_diantar" :value="__('Tanggal Pemberian')" />
                            <input disabled type="date" name="tgl_diantar" id="tgl_diantar" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $transaksi->tgl_diantar }}">
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="tgl_selesai" :value="__('Tanggal Selesai')" />
                            <input disabled type="date" name="tgl_selesai" id="tgl_selesai" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $transaksi->tgl_selesai }}">
                        </div>
                        <div class="flex-col space-y-2 items-center w-full mb-5">
                            <x-input-label for="status" :value="__('Status')" />
                            <input disabled type="text" name="tgl_selesai" id="tgl_selesai" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-gray-100 bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" value="{{ $transaksi->status }}">
                        </div>
                    </form>
                    <div class="flex-auto p-6">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                        Layanan Laundry
                                    </th>
                                    <th scope="col"
                                        class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                        Kg or Unit
                                    </th>
                                    <th scope="col" colspan="2"
                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$transaksi->paket_kiloans->isEmpty())
                                    @foreach ($transaksi->paket_kiloans as $item)
                                        <tr class="border-b border-slate-200">
                                            <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                <div class="font-medium text-slate-700">{{$item->nama}}</div>
                                                <div class="mt-0.5 text-slate-500">
                                                    {{$item->deskripsi}}
                                                </div>
                                            </td>
                                            <td class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                {{$item->pivot->kilogram}}
                                            </td>
                                            <td colspan="2" class="hidden py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                Rp {{
                                                    $item->harga * $item->pivot->kilogram
                                                }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                @if (!$transaksi->paket_satuans->isEmpty())
                                    @foreach ($transaksi->paket_satuans as $item)
                                        <tr class="border-b border-slate-200">
                                            <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                                <div class="font-medium text-slate-700">{{$item->nama}}</div>
                                                <div class="mt-0.5 text-slate-500">
                                                    {{$item->deskripsi}}
                                                </div>
                                            </td>
                                            <td class="hidden px-3 py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                1
                                            </td>
                                            <td colspan="2" class="hidden py-4 text-sm text-right text-slate-500 sm:table-cell">
                                                Rp {{$item->harga}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="flex-col space-y-4 justify-center p-6 pt-3">
                        <div class="flex space-x-3">
                            <a href="{{ route('transaksis.edit',$transaksi) }}" class="px-5 py-3 bg-blue-500 rounded-md text-xs text-white">
                                Edit
                            </a>
                            <form action="{{ route('transaksis.destroy',$transaksi) }}" method="post" class="p-0 m-0">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Hapus" class="px-5 py-3 bg-red-400 rounded-md text-xs text-white cursor-pointer">
                            </form>
                            @if (empty($transaksi->tgl_bayar))
                            <a href="{{ route('invoices.create',$transaksi) }}" class="px-4 py-2 bg-blue-500 rounded-md text-xs text-white">
                                Bayar
                            </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>