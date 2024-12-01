<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">

    <div class="relative h-full max-h-screen transition-all duration-200 ease-in-out rounded-xl">

        <!-- Page Content -->
        <main>
            <div class="w-full px-6 py-6 mx-auto">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div class="bg-white rounded-2xl">
                            <div class="p-9">
                                <div class="space-y-6 text-slate-700">
                                    {{-- <img src="{{asset('assets/img/logo-ct-dark.png')}}"
                                    class="inline h-12 object-cover transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                                    alt="main_logo" /> --}}
                                    <p class="text-xl font-extrabold tracking-tight uppercase font-body">
                                        Wash-Right
                                    </p>
                                </div>
                            </div>
                            <div class="p-9">
                                <div class="flex w-full border-b-2 border-slate-200 border-dashed pb-6">
                                    <div class="grid grid-cols-4 gap-12">
                                        <div class="text-sm font-light text-slate-500">
                                            <p class="text-sm font-normal text-slate-700">
                                                Invoice Detail:
                                            </p>
                                            <p>{{$invoice->transaksi->outlet->nama}}</p>
                                            <p>{{$invoice->transaksi->outlet->alamat}}</p>
                                            <p>{{$invoice->transaksi->outlet->email}}</p>
                                        </div>
                                        <div class="text-sm font-light text-slate-500">
                                            <p class="text-sm font-normal text-slate-700">Billed To</p>
                                            <p>{{$invoice->transaksi->pelanggan->pelanggan_code}}</p>
                                            <p>{{$invoice->transaksi->pelanggan->nama}}</p>
                                            <p>{{$invoice->transaksi->pelanggan->alamat}}</p>
                                        </div>
                                        <div class="text-sm font-light text-slate-500">
                                            <p class="text-sm font-normal text-slate-700">Invoice Number</p>
                                            <p>{{$invoice->invoice_code}}</p>

                                            <p class="mt-2 text-sm font-normal text-slate-700">
                                                Created At
                                            </p>
                                            <p>{{$invoice->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-9">
                                <div class="flex flex-col mx-0 mt-8">
                                    <table class="min-w-full divide-y divide-slate-500">
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
                                            @if (!$invoice->transaksi->paket_kiloans->isEmpty())
                                                @foreach ($invoice->transaksi->paket_kiloans as $item)
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
                                            @if (!$invoice->transaksi->paket_satuans->isEmpty())
                                                @foreach ($invoice->transaksi->paket_satuans as $item)
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
                                        <tfoot>
                                            <tr>
                                                <th scope="row" colspan="3"
                                                    class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                                    Total
                                                </th>
                                                <th scope="row"
                                                    class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                                                    Total
                                                </th>
                                                <td
                                                    class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                                                    Rp {{$invoice->harga_total}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="3"
                                                    class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                                    Bayar
                                                </th>
                                                <th scope="row"
                                                    class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                                                    Bayar
                                                </th>
                                                <td
                                                    class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                                                    Rp {{$invoice->harga_bayar}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" colspan="3"
                                                    class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                                    Kembalian
                                                </th>
                                                <th scope="row"
                                                    class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                                                    Kembalian
                                                </th>
                                                <td
                                                    class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                                                    Rp {{$invoice->harga_kembali}}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="mt-48 p-9">
                                <div class="border-t pt-9 border-slate-200">
                                    <div class="text-sm font-light text-slate-700">
                                        <p>
                                            Payment terms are 14 days. Please be aware that according to the
                                            Late Payment of Unwrapped Debts Act 0000, freelancers are
                                            entitled to claim a 00.00 late fee upon non-payment of debts
                                            after this time, at which point a new invoice will be submitted
                                            with the addition of this fee. If payment of the revised invoice
                                            is not received within a further 14 days, additional interest
                                            will be charged to the overdue account and a statutory rate of
                                            8% plus Bank of England base of 0.5%, totalling 8.5%. Parties
                                            cannot contract out of the Act’s provisions.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<!-- plugin for charts  -->
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- main script file  -->
<script src="{{ asset('assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
</html>
