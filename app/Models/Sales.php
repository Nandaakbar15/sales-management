<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    /** @use HasFactory<\Database\Factories\SalesFactory> */
    use HasFactory;
    protected $table = 't_sales';
    protected $primaryKey = 'sales_id';
    protected $fillable = ['kode', 'tgl', 'customer_id', 'subtotal', 'diskon', 'ongkir', 'total_bayar'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function details()
    {
        return $this->hasMany(Sales_det::class, 'id');
    }
}
