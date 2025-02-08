@extends('dashboard.layouts.main')

@section('content')
<div class="card">
  <div class="card-body">
      <h3 class="card-title">Data Transaksi</h3>
      <div class="table-responsive">
        <h3><a href="/admin/viewtambahtransaksi" class="btn btn-primary">Tambah Transaksi</a></h3>
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
            @foreach ($transaksi as $index => $trx)
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $trx->kode }}</td>
                <td>{{ $trx->customer->nama }}</td>
                <td>{{ $trx->details->sum('qty') }}</td> 
                <td>Rp {{ number_format($trx->subtotal, 2, ',', '.') }}</td>
                <td>{{ $trx->diskon_pct ? $trx->diskon_pct . '%' : '-' }}</td>
                <td>Rp {{ number_format($trx->ongkir, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($trx->total_bayar, 2, ',', '.') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection