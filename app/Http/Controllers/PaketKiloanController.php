<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\paket_kiloan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PaketKiloanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $paket_kiloans = paket_kiloan::all();

        // load the view and pass the paket_kiloans
        return View::make('paket_kiloans.index')
            ->with('paket_kiloans', $paket_kiloans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        return View::make('paket_kiloans.create')->with('outlet',$outlet);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga' => 'required',
            'outlet_id' => 'required',
        );

        $validate = Validator::make($request->all(),$rules);

         // process the login
         if ($validate->fails()) {
            return Redirect::to('paket_kiloans/create')
                ->withErrors($validate)
                ->withInput($request->all());
            } else {
                $paket_kiloan = paket_kiloan::create($request->all());
                $paket_kiloan->save();
            }

            return Redirect::to(route('paket_kiloans.index'))
                ->with('success','Successfully created paket_kiloan!');
        }


    /**
     * Display the specified resource.
     */
    public function show(paket_kiloan $paket_kiloan)
    {
        //
        return View::make('paket_kiloans.show')
        ->with('paket_kiloan',$paket_kiloan);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paket_kiloan $paket_kiloan)
    {
        return View::make('paket_kiloans.edit')
        ->with('paket_kiloan',$paket_kiloan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, paket_kiloan $paket_kiloan)
    {
        $rules = array(
            'nama' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'harga' => 'required',
        );


        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('paket_kiloans.create'))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $paket_kiloan->update($request->all());
        }

        return Redirect::to(route('paket_kiloans.index'))
            ->with('success','Successfully updated paket_kiloan!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(paket_kiloan $paket_kiloan)
    {
        $paket_kiloan->delete();

        return Redirect::to('/paket_kiloans')
            ->with('success','Successfully deleted paket_kiloan!');
    }
}

