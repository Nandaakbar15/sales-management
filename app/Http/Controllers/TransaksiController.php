<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\Sales;
use App\Models\Sales_det;

class TransaksiController extends Controller
{
    public function index()
    {
        // $barang = Barang::all();
        // $customer = Customer::all();
        // $sales = Sales::all();
        return view('dashboard.daftartransaksi.viewdaftartransaksi');
    }

    public function viewtambahTransaksi()
    {
        return view('dashboard.daftartransaksi.tambahTransaksi');
    }

    public function tambahTransaksi(Request $request)
    {
        $request->validate([
            'cust_id' => 'required|exists:m_customer,id',
            'tgl' => 'required|date',
            'items' => 'required|array',
            'items.*.barang_id' => 'required|exists:m_barang,id',
            'items.*.qty' => 'required|integer|min:1',
        ]);
    
        // Hitung total transaksi
        $subtotal = 0;
        foreach ($request->items as $item) {
            $barang = Barang::findOrFail($item['barang_id']);
            $subtotal += $barang->harga * $item['qty'];
        }
    
        // Simpan transaksi utama (t_sales)
        $sales = Sales::create([
            'kode' => 'TRX-' . now()->format('YmdHis'),
            'tgl' => $request->tgl,
            'cust_id' => $request->cust_id,
            'subtotal' => $subtotal,
            'total_bayar' => $subtotal, // Sementara, nanti dihitung ulang
        ]);
    
        // Simpan detail transaksi (t_sales_det)
        foreach ($request->items as $item) {
            $barang = Barang::findOrFail($item['barang_id']);
    
            Sales_det::create([
                'sales_id' => $sales->id,
                'barang_id' => $barang->id,
                'qty' => $item['qty'],
                'harga_bandrol' => $barang->harga,
                'harga_diskon' => $barang->harga, // Sementara tanpa diskon
                'total' => $barang->harga * $item['qty'],
            ]);
        }
    
        return redirect()->route('sales.index')->with('success', 'Transaksi berhasil disimpan.');
    }
}
