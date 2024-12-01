<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index() {
        $invoices = Invoice::all();
        $pelangganCount = Pelanggan::all()->count();
        $transPendingCount = Transaksi::all()->where('status','=','Pending')->count();
        $transDoneCount = Transaksi::all()->where('status','=','Done')->count();
        $sales = Invoice::all()->sum('harga_total');

        $data = Transaksi::select('id','created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('M');
        });
        $months = [];
        $monthCount = [];
        foreach($data as $month => $values) {
            $months[] = $month;
            $monthCount[] = count($values);
        }

        $data = json_encode($data);

        return View::make('dashboard')
            ->with([
                'data' => $data,
                'months' => $months,
                'monthCount' => $monthCount,
                'tPendingCount' => $transPendingCount,
                'tDoneCount' => $transDoneCount,
                'pCount' => $pelangganCount,
                'sales' => $sales,
                'invoices' => $invoices 
            ]);
    }
}
