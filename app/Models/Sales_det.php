<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_det extends Model
{
    /** @use HasFactory<\Database\Factories\SalesDetFactory> */
    use HasFactory;
    protected $table = 't_sales_det';
    protected $fillable = ['sales_id', 'barang_id', 'qty', 'diskon_pct', 'diskon_nilai', 'harga_diskon', 'harga_badrol', 'total'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'sales_id');
    }
}
