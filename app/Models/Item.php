<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['nama_item', 'stok', 'status'];

    public function riwayats()
    {
        return $this->hasMany(Riwayat::class, 'id', 'item_id');
    }
}
