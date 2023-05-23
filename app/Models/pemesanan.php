<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_hargapaket',
        'nama_pemesan',
        'tanggal',
        'no_telp',
        'status',
    ];
}
