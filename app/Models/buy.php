<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buy extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'harga', 'qty','image', 'kategori_id'
    ];
    public function kategori(){
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
}
