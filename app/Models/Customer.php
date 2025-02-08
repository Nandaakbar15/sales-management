<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $table = 'm_customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['kode', 'nama', 'telp'];
}
