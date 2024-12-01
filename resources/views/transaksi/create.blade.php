
    <div class="w-full px-6 pt-0 pb-6 mx-auto max-h-1/2">
        <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6 class="dark:text-white">Tambah Transaksi</h6>
                    </div>
                    <form action="{{ route('transaksis.store') }}" method="post" class="flex-col justify-center p-6" x-data="{ section : 1, paket : '' }">
                        @csrf
                        {{-- section 1 --}}
                        <x-input-label for="outlet" :value="__('Outlet')" />
                        <select name="outlet_id" id="outlet" class="mt-4 mb-4 block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            @if ($outlets)
                                <option value="{{ $outlets->id }}">{{ $outlets->nama }}</option>
                            @else
                                <option value="">Anda belum memiliki outlet</option>
                            @endif
                        </select>
                        <div class="flex-col space-y-4 form-section" x-show="section == 1">
                            {{-- input pelanggan --}}
                            <div class="flex-col space-y-2 items-center w-full mb-5">
                                <x-input-label for="pelanggan" :value="__('Pelanggan')" />
                                <select name="pelanggan_id" id="pelanggan" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="">--Select Pelanggan--</option>
                                    @foreach ($pelanggan as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->id }} - {{ $pelanggan->nama }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('pelanggan_id')" class="mt-2" />
                            </div>

                            <div class="flex-col space-y-2 items-center w-full mb-5">
                                <ul class="grid w-full gap-6 md:grid-cols-2">
                                    {{-- paket kiloan option --}}
                                    <li>
                                        <input x-model="paket" type="radio" id="hosting-small" name="paket" value="kiloan" class="hidden peer" required>
                                        <label for="hosting-small" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Paket Kiloan</div>
                                                <div class="w-full">Paket laundry per kilogram</div>
                                            </div>
                                        </label>
                                    </li>
                                    {{-- paket satuan option --}}
                                    <li>
                                        <input x-model="paket" type="radio" id="hosting-big" name="paket" value="satuan" class="hidden peer">
                                        <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-500 peer-checked:text-blue-500 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Paket Satuan</div>
                                                <div class="w-full">Paket laundry per item</div>
                                            </div>
                                        </label>
                                    </li>
                                </ul>                                
                            </div>
                            {{-- section paket kiloan --}}
                            <div x-show="paket == 'kiloan'" class="flex-col space-y-2 items-center w-full mb-5">
                                <x-input-label for="paket_kiloan" :value="__('Paket Kiloan')" />
                                <select name="paket_kiloan_id" id="paket_kiloan" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="">--Select Paket Kiloan--</option>
                                    @foreach ($paket_kiloan as $paket_kiloan)
                                        <option value="{{ $paket_kiloan->id }}">{{ $paket_kiloan->nama }} - {{ $paket_kiloan->harga }}</option>
                                    @endforeach
                                </select>
                                <x-input-label for="kilogram" :value="__('Kilogram')" />
                                <input type="number" name="kilogram" id="kilogram" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <x-input-error :messages="$errors->get('kilogram')" class="mt-2" />
                            </div>
                            {{-- section paket satuan --}}
                            <div x-show="paket == 'satuan'" class="flex-col items-center w-full mb-5">
                                <x-input-label for="paket_satuan" :value="__('Paket Satuan')" />
                                    @foreach ($paket_satuan as $paket_satuan)
                                        <div class="flex items-center ps-4 border border-gray-300 rounded-lg dark:border-gray-700 my-6">
                                            <input id="{{$paket_satuan->id}}" type="checkbox" value="{{$paket_satuan->id}}" name="paket_satuan_id[]" class="w-4 h-4 text-blue-500 bg-gray-100 border-gray-300 rounded-lg focus:ring-blue-400 dark:focus:ring-blue-500 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="{{$paket_satuan->id}}" class="w-full py-4 ms-4">
                                                <h6 class="text-gray-600">{{$paket_satuan->nama}}</h6>
                                                <div class="flex justify-between">
                                                    <span>{{$paket_satuan->deskripsi}}</span><span class="pe-8">Rp {{$paket_satuan->harga}}</span>
                                                </div>
                                            </label>
                                        </div>
                                    @endforeach
                                <x-input-error :messages="$errors->get('paket_kiloan_id')"/>                           
                            </div>
                        </div>
                        {{-- section 2 --}}
                        <div class="flex-colform-section" x-show="section == 2">
                            <div class="flex-col space-y-2 items-center w-full mb-5">
                                <x-input-label for="tgl_diantar" :value="__('Tanggal Pemberian')" />
                                <input type="date" name="tgl_diantar" id="tgl_diantar" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <x-input-error :messages="$errors->get('tgl_diantar')" class="mt-2" />
                            </div>
                            <div class="flex-col space-y-2 items-center w-full mb-5">
                                <x-input-label for="tgl_selesai" :value="__('Tanggal Selesai')" />
                                <input type="date" name="tgl_selesai" id="tgl_selesai" class="block focus:shadow-primary-outline text-sm leading-5.6 ease  w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                <x-input-error :messages="$errors->get('tgl_selesai')" class="mt-2" />
                            </div>
                        </div>

                        <input type="hidden" name="paket" x-model="paket">
                        {{-- section nav --}}
                        <div class="form-navigation flex justify-between mt-10">
                            <div>
                                <button x-show="section != 1" type="button" class="px-5 py-3 bg-slate-500 rounded-md text-xs text-white" @click="section--">Previous</button>
                                <button x-show="section != 2" type="button" class="px-5 py-3 bg-slate-500 rounded-md text-xs text-white" @click="section++">Next</button>
                            </div>
                            <button x-show="section == 2" type="submit" class="px-5 py-3 bg-blue-500 rounded-md text-xs text-white">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
