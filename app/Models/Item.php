<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'kategori_barang',
        'stok',
        'kondisi_barang',
        'name',
        'amount',
        'status',
        'category',
        'image',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'barang_id');
    }

    public function loan()
    {
        return $this->loans();
    }

    public function getNameAttribute()
    {
        return $this->attributes['nama_barang'] ?? null;
    }

    public function setNameAttribute($value): void
    {
        $this->attributes['nama_barang'] = $value;
    }

    public function getAmountAttribute()
    {
        return $this->attributes['stok'] ?? null;
    }

    public function setAmountAttribute($value): void
    {
        $this->attributes['stok'] = $value;
    }

    public function getStatusAttribute()
    {
        return $this->attributes['kondisi_barang'] ?? null;
    }

    public function setStatusAttribute($value): void
    {
        $this->attributes['kondisi_barang'] = $value;
    }

    public function getCategoryAttribute()
    {
        return $this->attributes['kategori_barang'] ?? null;
    }

    public function setCategoryAttribute($value): void
    {
        $this->attributes['kategori_barang'] = $value;
    }
}
