<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profil extends Model
{
    use HasFactory;
    protected $fillable = ['nama_perusahaan', 'visi', 'misi', 'kodepos', 'alamat', 'akun_ig', 'akun_tiktok', 'logo'];
}
