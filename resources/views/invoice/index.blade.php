<x-app-layout>
    <div class="w-full px-6 py-6 pb-0 mx-auto max-h-1/2">
        <div class="w-full h-full">
            <div class="h-full w-full relative flex flex-col flex-1 max-w-full mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border overflow-x-auto">
                <div class="p-6 pb-0 mb-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <div class="flex justify-between">
                        <h6 class="dark:text-white">Daftar Invoice</h6>
                        {{-- <button class="inline-block px-8 py-2 mb-0 text-xs font-bold leading-normal text-center text-blue-500 align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer bg-150 active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 hover:opacity-75">View All</button> --}}
                    </div>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <ul class="flex flex-col mb-0 rounded-lg">
                        @foreach ($invoices as $invoice)  
                            <li class="relative flex justify-between px-6 py-2 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                                <div class="flex flex-col">
                                    <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">
                                        {{$invoice->created_at}}
                                    </h6>
                                    <span class="text-xs leading-tight dark:text-white dark:opacity-80">{{$invoice->transaksi->transaksi_code}}</span>
                                </div>
                                <div class="flex items-center text-sm leading-normal dark:text-white/80">
                                Rp {{$invoice->harga_total}}
                                <a class="dark:text-white inline-block px-0 py-2.5 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-in bg-150 text-sm active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 text-slate-700" href="{{route('invoices.show',$invoice)}}"><i class="mr-1 text-lg leading-none fas fa-file-pdf"></i> PDF</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
