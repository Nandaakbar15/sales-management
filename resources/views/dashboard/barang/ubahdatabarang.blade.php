@extends('dashboard.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Form Tambah Barang</h3>
            <form action="/admin/barang/ubahBarang/{{ $barang->barang_id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Kode</label>
                  <input type="text" class="form-control" id="kode" name="kode" required value="{{ old('kode', $barang->kode) }}">
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama', $barang->nama) }}">
                </div>
                <div class="mb-3">
                  <label for="harga" class="form-label">Harga Barang</label>
                  <input type="text" class="form-control" id="harga" name="harga" required value="{{ old('harga', $barang->harga) }}">
                </div>
                <button type="submit" class="btn btn-primary">Ubah Barang!</button>
              </form>
        </div>
    </div>
@endsection