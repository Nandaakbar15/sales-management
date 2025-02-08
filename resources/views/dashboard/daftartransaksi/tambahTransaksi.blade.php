@extends('dashboard.layouts.main')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Tambah Transaksi</h3>

        <form action="/admin/tambahTransaksi" method="POST">
            @csrf
            <div class="mb-3">
                <label for="customer" class="form-label">Customer</label>
                <select name="customer_id" id="customer" class="form-control" required>
                    <option value="">-- Pilih Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->customer_id }}">{{ $customer->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal Transaksi</label>
                <input type="date" name="tgl" id="tgl" class="form-control" required>
            </div>

            <h4>Daftar Barang</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Qty</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="barang-list">
                    <tr>
                        <td>
                            <select name="items[0][barang_id]" class="form-control barang-select" required>
                                <option value="">-- Pilih Barang --</option>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->barang_id }}" data-harga="{{ $barang->harga }}">
                                        {{ $barang->nama }} - Rp {{ number_format($barang->harga, 2, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="items[0][qty]" class="form-control qty-input" min="1" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-item">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" id="add-item">Tambah Barang</button>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Simpan Transaksi</button>
                <a href="/admin/viewtambahTransaksi" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let itemIndex = 1;

        document.getElementById('add-item').addEventListener('click', function () {
            let newRow = `
                <tr>
                    <td>
                        <select name="items[${itemIndex}][barang_id]" class="form-control barang-select" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->barang_id }}" data-harga="{{ $barang->harga }}">
                                    {{ $barang->nama }} - Rp {{ number_format($barang->harga, 2, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="items[${itemIndex}][qty]" class="form-control qty-input" min="1" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-item">Hapus</button>
                    </td>
                </tr>
            `;

            document.getElementById('barang-list').insertAdjacentHTML('beforeend', newRow);
            itemIndex++;
        });

        document.getElementById('barang-list').addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-item')) {
                event.target.closest('tr').remove();
            }
        });
    });
</script>

@endsection
