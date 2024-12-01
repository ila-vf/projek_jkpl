<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Outlet;
use App\Models\paket_kiloan;
use App\Models\PaketSatuan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $outlet_id = $request->input('outlet_id');
        $transaksi = ($outlet_id) ? Transaksi::where('outlet_id',$outlet_id)->get() : Transaksi::where('outlet_id',1)->get();
        $pelanggan = Pelanggan::all();
        $paket_kiloan = ($outlet_id) ? paket_kiloan::where('outlet_id',$outlet_id)->get() : paket_kiloan::where('outlet_id',1)->get();
        $paket_satuan = ($outlet_id) ? PaketSatuan::where('outlet_id',$outlet_id)->get() : PaketSatuan::where('outlet_id',1)->get();
        $invoices = Invoice::all();
        $outlet = Outlet::all();
        $outlets = ($outlet_id) ? Outlet::find($outlet_id) : Outlet::all()->first();
        return View::make('transaksi.index')
            ->with([
                'transaksi' => $transaksi,
                'pelanggan' => $pelanggan,
                'paket_kiloan' => $paket_kiloan,
                'paket_satuan' => $paket_satuan,
                'invoices' => $invoices,
                'outlet' => $outlet,
                'outlets' => $outlets,
                'outlet_id' => $outlet_id
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'tgl_diantar'   => 'required',
            'tgl_selesai'   => 'required',
            'pelanggan_id'  => 'required',
            'paket'         => 'required',
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('transaksis.index'))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $transaksi = Transaksi::create($request->all());
            if ($request->paket == 'kiloan') {
                $transaksi->paket_kiloans()->attach($request->paket_kiloan_id,['kilogram' => $request->kilogram]);
            }
            if ($request->paket == 'satuan') {
                $transaksi->paket_satuans()->attach($request->paket_satuan_id);
            }
            $transaksi->save();
        }

        return Redirect::to(route('transaksis.index'))
            ->with('success','Successfully created transaksi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        return View::make('transaksi.show')
            ->with('transaksi',$transaksi);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        return View::make('transaksi.edit')
            ->with('transaksi',$transaksi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $rules = [
            'tgl_diantar'   => 'required',
            'tgl_selesai'   => 'required'
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('transaksis.create'))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $transaksi->update($request->all());
        }

        return Redirect::to(route('transaksis.index'))
            ->with('success','Successfully updated transaksi!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->paket_kiloans()->detach();
        $transaksi->paket_satuans()->detach();
        $transaksi->invoice()->delete();
        $transaksi->delete();

        return Redirect::to('/transaksis')
            ->with('success','Successfully deleted transaksi!');
    }
}
