<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    
   protected $fillable = ['nama','harga','stok','diskon'];

    public function hargaSetelahDiskon()
    {
        if ($this->diskon > 0) {
            $diskon = ($this->harga * $this->diskon) / 100;
            return $this->harga - $diskon;
        }
        return $this->harga;
    }

    public function setDiskonAttribute($value)
    {
        $this->attributes['diskon'] = min($value, 100);
    }

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class);
    }


}
