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
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75">
    </div>
    @include('layouts.sidenav')
    <div class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            <div class="w-full px-6 py-6 mx-auto">
                <!-- row 1 -->
                <div class="flex flex-wrap -mx-3">
                    <!-- card1 -->
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Transaksi Pending</p>
                                            <h5 class="mb-2 font-bold dark:text-white">{{$tPendingCount}}</h5>
                                            {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                                <span class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                                                since yesterday
                                            </p> --}}
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                            <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card2 -->
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Transaksi Done</p>
                                            <h5 class="mb-2 font-bold dark:text-white">{{$tDoneCount}}</h5>
                                            {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                                <span class="text-sm font-bold leading-normal text-emerald-500">+3%</span>
                                                since last week
                                            </p> --}}
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                            <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card3 -->
                    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Jumlah Pelanggan</p>
                                            <h5 class="mb-2 font-bold dark:text-white">{{$pCount}}</h5>
                                            {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                                <span class="text-sm font-bold leading-normal text-red-600">-2%</span>
                                                since last quarter
                                            </p> --}}
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                            <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card4 -->
                    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="flex-auto p-4">
                                <div class="flex flex-row -mx-3">
                                    <div class="flex-none w-2/3 max-w-full px-3">
                                        <div>
                                            <p
                                                class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                                Pendapatan</p>
                                            <h5 class="mb-2 font-bold dark:text-white">Rp{{$sales}}</h5>
                                            {{-- <p class="mb-0 dark:text-white dark:opacity-60">
                                                <span class="text-sm font-bold leading-normal text-emerald-500">+5%</span>
                                                than last month
                                            </p> --}}
                                        </div>
                                    </div>
                                    <div class="px-3 text-right basis-1/3">
                                        <div
                                            class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                                            <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- cards row 2 -->
                <div class="flex flex-wrap mt-6 -mx-3">
                    <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
                        <div
                            class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                                <h6 class="capitalize dark:text-white">Transaksi overview</h6>
                                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                                    <i class="fa fa-arrow-up text-emerald-500"></i>
                                    <span class="font-semibold">4% more</span> in 2021
                                </p>
                            </div>
                            <div class="flex-auto p-4">
                                <div>
                                    <canvas id="chart-line" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
                        <div class="h-full w-full relative flex flex-col flex-1 max-w-full mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border overflow-x-auto">
                            <div class="p-6 pb-0 mb-6 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <div class="flex justify-between">
                                    <h6 class="dark:text-white">Daftar Invoice</h6>
                                    <a href="{{route('invoices.index')}}" class="inline-block px-8 py-2 mb-0 text-xs font-bold leading-normal text-center text-blue-500 align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer bg-150 active:opacity-85 hover:-translate-y-px tracking-tight-rem bg-x-25 hover:opacity-75">View All</a>
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
<script>
    var _ydata = JSON.parse('{!!json_encode($months)!!}');
    var _xdata = JSON.parse('{!!json_encode($monthCount)!!}');
</script>
</html>
