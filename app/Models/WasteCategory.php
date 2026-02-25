<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteCategory extends Model
{
    //
    protected $fillable = [
        'nama',
        'kategori',
        'satuan',
        'harga_dasar'
    ];

    public function getPriceAttribute()
    {
        return $this->harga_dasar;
    }
}
