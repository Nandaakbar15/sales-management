<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\Sales;

class TransaksiController extends Controller
{
    public function index()
    {
        // $barang = Barang::all();
        // $customer = Customer::all();
        // $sales = Sales::all();
        return view('dashboard.daftartransaksi.viewdaftartransaksi');
    }

    public function tambahTransaksi(Request $request)
    {

    }
}
