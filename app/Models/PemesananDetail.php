<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemesananDetail extends Model
{
    protected $fillable = ['pemesanan_id', 'barang_id', 'qty', 'harga', 'subtotal'];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
