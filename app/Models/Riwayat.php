<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayats';

    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
