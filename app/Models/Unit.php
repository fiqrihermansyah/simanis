<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $fillable = [
        'name', 'description', 'inventory_code', 'item_type', 'serial_number', 
        'brand', 'registration_date', 'processor', 'ram', 'hard_disk', 'os', 'vga',
        'user', 'divisi', 'lokasi'
    ];

    //tes

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
