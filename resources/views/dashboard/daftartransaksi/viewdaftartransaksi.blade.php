@extends('dashboard.layouts.main')

@section('content')
<div class="card">
  <div class="card-body">
      <h3 class="card-title">Data Transaksi</h3>
      <div class="table-responsive">
        <h3><a href="/admin/tambahTransaksi" class="btn btn-primary">Tambah Transaksi</a></h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">No Transaksi</th>
              <th scope="col">Nama Customer</th>
              <th scope="col">Jumlah Barang</th>
              <th scope="col">Sub Total</th>
              <th scope="col">Diskon</th>
              <th scope="col">Ongkir</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <th scope="row">1</th>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection