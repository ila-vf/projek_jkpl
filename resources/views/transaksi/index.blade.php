<x-app-layout>
    <div class="w-full px-6 py-6 pb-0 mx-auto max-h-1/2">
        <x-flash-message/>
        <div class="flex flex-wrap w-full">
            <div class="h-full w-full relative flex flex-col max-w-full mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border overflow-x-auto overflow-y-auto">
                <div class="p-6 pb-0 mb-4 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="flex justify-between">
                        <h6 class="dark:text-white">Daftar Transaksi</h6>
                    </div>
                </div>
                <div class="p-6 pb-0 mb-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <form action="{{route('transaksis.index')}}">
                        <x-input-label for="outlet" :value="__('Outlet')" />
                        <div class="flex items-center">
                            <select name="outlet_id" id="outlet" class="mt-4 block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <option value="">--Select outlet--</option>
                                @foreach ($outlet as $outlet)
                                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                @endforeach
                            </select>
                            <input class="mt-4 px-5 py-3 bg-blue-500 rounded-md text-xs text-white" type="submit" value="Filter">
                        </div>
                    </form>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0">
                        <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">ID Transaksi</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Pembayaran</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pelanggan</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tgl Pemberian</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tgl Selesai</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Action</th>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $transaksi)
                                    <tr onclick="">
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <a href="{{ route('transaksis.show',$transaksi) }}">
                                            <div class="flex px-3 py-1">
                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $transaksi->transaksi_code }}</h6>
                                            </div>
                                            </a>
                                        </td>
                                    @if (empty($transaksi->tgl_bayar))    
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-3 py-1 items-center">
                                                <a class="active:shadow-xs active:opacity-85 ease-in leading-pro text-xs bg-150 bg-x-25 rounded-3.5xl p-1.2 h-6 w-6 mb-0 cursor-pointer border border-solid border-slate-500 bg-transparent text-center align-middle font-bold text-slate-500 shadow-none transition-all hover:bg-transparent hover:text-slate-500 hover:opacity-75 hover:shadow-none active:bg-slate-500 active:text-black hover:active:bg-transparent hover:active:text-slate-500 hover:active:opacity-75 hover:active:shadow-none mr-2 flex items-center justify-center" href="{{route('invoices.create',$transaksi)}}"><i class="text-3xs fas fa-question" aria-hidden="true"></i></a>
                                                <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"> Unpaid </span>
                                            </div>
                                        </td>
                                    @else
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-3 py-1 items-center">
                                                <a class="active:shadow-xs active:opacity-85 ease-in leading-pro text-xs bg-150 bg-x-25 rounded-3.5xl p-1.2 h-6 w-6 mb-0 cursor-pointer border border-solid border-emerald-500 bg-transparent text-center align-middle font-bold text-emerald-500 shadow-none transition-all hover:bg-transparent hover:text-emerald-500 hover:opacity-75 hover:shadow-none active:bg-emerald-500 active:text-black hover:active:bg-transparent hover:active:text-emerald-500 hover:active:opacity-75 hover:active:shadow-none mr-2 flex items-center justify-center" href="{{route('invoices.show',$transaksi->invoice)}}"><i class="text-3xs fas fa-check" aria-hidden="true"></i></a>
                                                <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"> Paid </span>
                                            </div>
                                        </td>
                                    @endif
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-3 py-1">
                                                <p class="mb-0 text-sm leading-normal dark:text-white">
                                                    {{ $transaksi->pelanggan->nama }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-3 py-1">
                                                <p class="mb-0 text-sm leading-normal dark:text-white">
                                                    {{ $transaksi->tgl_diantar }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-3 py-1">
                                                <p class="mb-0 text-sm leading-normal dark:text-white">
                                                    {{ $transaksi->tgl_selesai }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-3 py-1" x-data="{ status : '{{$transaksi->status}}' }">
                                                <span x-show="status == 'Pending'" class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-gray-400 to-gray-100 align-baseline font-bold uppercase leading-none text-slate-500">{{ $transaksi->status }}</span>
                                                <span x-show="status == 'Doing'" class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-blue-700 to-cyan-500 align-baseline font-bold uppercase leading-none text-white">{{ $transaksi->status }}</span>
                                                <span x-show="status == 'Done'" class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-emerald-500 to-teal-400 align-baseline font-bold uppercase leading-none text-white">{{ $transaksi->status }}</span>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex items-center space-x-3">
                                                <a href="{{ route('transaksis.edit',$transaksi) }}" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400"> Edit </a>

                                                <form action="{{ route('transaksis.destroy',$transaksi) }}" method="post" class="p-0 m-0">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" value="Hapus" class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400 cursor-pointer">
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
    @include('transaksi.create',[
        'pelanggan' => $pelanggan, 
        'outlet' => $outlet
        ])
</x-app-layout>