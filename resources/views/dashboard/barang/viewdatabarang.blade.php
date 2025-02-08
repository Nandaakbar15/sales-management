@extends('dashboard.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Daftar Barang</h3>
            <div class="table-responsive">
                <h4> <a href="/admin/barang/viewtambahBarang" class="btn btn-primary">Tambah Barang</a></h4>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($barang as $item)
                        <tr>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>
                                <a href="/admin/barang/viewubahBarang/{{ $item->barang_id }}" class="btn btn-primary"><img src="{{ asset('images/edit.png') }}" alt="" width="60px" height="60px"></a>
                            </td>
                            <td>
                                <form action="/admin/barang/hapusBarang/{{ $item->barang_id }}" class="d-inline" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="badge border-0" onclick="return confirm('Yakin mau hapus data ini?')"><img src="{{ asset('images/delete.png') }}" alt="" width="60px" height="60px"></button>
                                </form>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection