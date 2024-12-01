<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return View::make('invoice.index')
            ->with('invoices', $invoices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Transaksi $transaksi)
    {
        return View::make('invoice.create')
             ->with('transaksi',$transaksi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Transaksi $transaksi)
    {
        $rules = [
            'harga_bayar' => 'required|gte:' . $request->harga_total,
            'harga_kembali' => 'required'
        ];

        $validate = Validator::make($request->all(),$rules);

        if ($validate->fails()) {
            return Redirect::to(route('invoices.create',$transaksi))
                ->withErrors($validate)
                ->withInput($request->all());
        } else {
            $invoice = Invoice::create($request->all());
            $invoice->save();
            $transaksi->update([
                'tgl_bayar' => now(),
                'status' => 'Done',
                'invoice_id' => $invoice->id
            ]);
        }

        return Redirect::to(route('invoices.index'))
            ->with('success',"Successfully created invoice for transaksi with id {$transaksi->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return View::make('invoice.show')->with('invoice',$invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
