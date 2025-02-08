<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('dashboard.customer.viewcustomer', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.customer.tambahcustomer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'telp' => 'required'
        ]);

        Customer::create($validateData);

        return redirect('/admin/customer')->with('success', 'Customer berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.customer.ubahcustomer', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'telp' => 'required'
        ]);

        $customer->update($validateData);

        return redirect('/admin/customer')->with('success', 'Customer berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/admin/customer')->with('success', 'Customer berhasil dihapus!');
    }
}
