@extends('dashboard.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Form Tambah Customer</h3>
            <form action="/admin/customer/tambahCustomer" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="kode" class="form-label">Kode</label>
                  <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode" required value="{{ old('kode') }}">
                  @error('kode')
                      <div class="is-invalid">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Customer</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
                  @error('nama')
                      <div class="is-invalid">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="harga" class="form-label">Telp</label>
                  <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" required value="{{ old('telp') }}">
                  @error('telp')
                      <div class="is-invalid">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Customer!</button>
              </form>
        </div>
    </div>
@endsection