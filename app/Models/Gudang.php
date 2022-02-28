<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = 'gudang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_nota',
        'nama_supplier',
        'tanggal_order',
        'tanggal_diterima',
        'nama_barang',
        'quantity',
    ];
}
