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
        $transaksi = Sales::with('customer', 'details')->get();
        return view('dashboard.daftartransaksi.viewdaftartransaksi', [
            'transaksi' => $transaksi
        ]);
    }

    public function viewtambahTransaksi()
    {
        $barangs = Barang::all();
        $customers = Customer::all();
        return view('dashboard.daftartransaksi.tambahTransaksi', [
            'barangs' => $barangs,
            'customers' => $customers
        ]);
    }

    public function tambahTransaksi(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:m_customer,customer_id',
            'tgl' => 'required|date',
            'items' => 'required|array',
            'items.*.barang_id' => 'required|exists:m_barang,barang_id',
            'items.*.qty' => 'required|integer|min:1',
        ]);
    
        // Inisialisasi variabel
        $subtotal = 0;
        $diskon_pct = 12; // 12% diskon
        $ongkir = 2000; // Biaya ongkir tetap

        foreach ($request->items as $item) {
            $barang = Barang::findOrFail($item['barang_id']);
            $subtotal += $barang->harga * $item['qty'];
        }
    
         // Hitung diskon dalam rupiah
        $diskon_nilai = ($diskon_pct / 100) * $subtotal;

        // Hitung total bayar
        $total_bayar = $subtotal - $diskon_nilai + $ongkir;

        // Simpan transaksi utama (t_sales)
        $sales = Sales::create([
            'kode' => 'TRX-' . now()->format('ymd'),
            'tgl' => $request->tgl,
            'customer_id' => $request->customer_id,
            'subtotal' => $subtotal,
            'diskon' => $diskon_nilai, // Simpan diskon dalam rupiah
            'ongkir' => $ongkir,
            'total_bayar' => $total_bayar,
        ]);
    
        // Simpan detail transaksi (t_sales_det)
        foreach ($request->items as $item) {
            $barang = Barang::findOrFail($item['barang_id']);
            $harga_bandrol = $barang->harga;
            $diskon_item = ($diskon_pct / 100) * ($harga_bandrol * $item['qty']);
            $harga_diskon = ($harga_bandrol * $item['qty']) - $diskon_item;
            $total = $harga_diskon;
    
            Sales_det::create([
                'sales_id' => $sales->sales_id,
                'barang_id' => $barang->barang_id,
                'qty' => $item['qty'],
                'harga_bandrol' => $harga_bandrol,
                'diskon_pct' => $diskon_pct, // Simpan persentase diskon
                'diskon_nilai' => $diskon_item, // Simpan diskon dalam rupiah
                'harga_diskon' => $harga_diskon,
                'harga_badrol' => $harga_bandrol,
                'total' => $total,
            ]);
        }
    
        return redirect('/admin/transaksi')->with('success', 'Transaksi berhasil disimpan!');
    }
}
