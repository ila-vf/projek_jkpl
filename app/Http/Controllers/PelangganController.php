<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = Pelanggan::all();
        return View::make('pelanggan.index')
            ->with('pelanggans', $pelanggans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View::make('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama'      => 'required',
            'alamat'      => 'required',
            'no_telepon'=> 'required|max:12',
            'gender'      => 'required'
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('pelanggans.create'))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $pelanggan = Pelanggan::create($request->all());
            $pelanggan->save();
        }

        return Redirect::to(route('pelanggans.index'))
            ->with('success','Successfully created people!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return View::make('pelanggan.show')
            ->with('pelanggan',$pelanggan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return View::make('pelanggan.edit')
            ->with('pelanggan',$pelanggan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $rules = [
            'nama'      => 'required',
            'no_telepon'=> 'required|max:12'
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('pelanggan.create'))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $pelanggan->update($request->all());
        }

        return Redirect::to(route('pelanggans.index'))
            ->with('success','Successfully updated people!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

        return Redirect::to('/pelanggans')
            ->with('success','Successfully deleted pelanggan!');
    }
}
