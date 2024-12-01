<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\PaketSatuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PaketSatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket_satuans = PaketSatuan::all();
        return View::make("paket_satuans.index")
            ->with('paket_satuans', $paket_satuans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        return View::make('paket_satuans.create')->with('outlet',$outlet);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga' => 'required',
            'outlet_id' => 'required',
        );

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to('paket_satuans/create')
                ->withErrors($validate)
                ->withInput($request->all());
            }
            else {
                $paket_satuan = PaketSatuan::create($request->all());
                $paket_satuan->save();
            }
            return Redirect::to(route('paket_satuans.index'))
                ->with('success','Successfully created paket_satuan!');
        }

    /**
     * Display the specified resource.
     */
    public function show(PaketSatuan $paketSatuan)
    {
        return View::make('paket_satuans.show')
        ->with('paket_satuan',$paketSatuan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketSatuan $paketSatuan)
    {
        return View::make('paket_satuans.edit')
        ->with('paket_satuan',$paketSatuan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketSatuan $paketSatuan)
    {
        $rules = [
            'nama'      => 'required',
            'deskripsi'=> 'required',
            'harga'=> 'required',
            'outlet_id' => 'required',
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('paket_satuans.create'))
                ->withErrors($validate)
                ->withInput($request->all());
        }
        else {
            $paketSatuan->update($request->all());
        }

        return Redirect::to(route('paket_satuans.index'))
            ->with('success','Successfully updated paket_satuan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketSatuan $paketSatuan)
    {
        $paketSatuan->delete();
        return Redirect::to('/paket_satuans')
            ->with('success','Successfully deleted paket_satuan!');
    }
}
