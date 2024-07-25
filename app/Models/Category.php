<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'kode_inventaris', 
        'jenis_barang', 
        'serial_number', 
        'merk_type', 
        'tanggal_registrasi',
        'tipe_barang',
        'processor', 
        'ram', 
        'disk', 
        'os', 
        'vga',
        'name',
        'description',
        'pengguna',
        'divisi',
        'lokasi'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
