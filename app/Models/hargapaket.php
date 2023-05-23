<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hargapaket extends Model
{
    use HasFactory;
    protected $fillable = ['id_paket', 'kategori_grup', 'harga_tanpa_hotel', 'harga_hotel_1', 'harga_hotel_2', 'harga_hotel_3', 'harga_hotel_4', 'harga_hotel_5', 'status'];

    public function paketWisata()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket');
    }
}
