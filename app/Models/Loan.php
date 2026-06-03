<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'peminjam_id',
        'barang_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah_pinjam',
        'status_peminjaman',
        'user_id',
        'item_id',
        'loan_date',
        'return_date',
        'amount',
        'status',
    ];

    public function peminjam()
    {
        return $this->belongsTo(User::class, 'peminjam_id');
    }

    public function barang()
    {
        return $this->belongsTo(Item::class, 'barang_id');
    }

    public function user()
    {
        return $this->peminjam();
    }

    public function item()
    {
        return $this->barang();
    }

    public function getUserIdAttribute()
    {
        return $this->attributes['peminjam_id'] ?? null;
    }

    public function setUserIdAttribute($value): void
    {
        $this->attributes['peminjam_id'] = $value;
    }

    public function getItemIdAttribute()
    {
        return $this->attributes['barang_id'] ?? null;
    }

    public function setItemIdAttribute($value): void
    {
        $this->attributes['barang_id'] = $value;
    }

    public function getLoanDateAttribute()
    {
        return $this->attributes['tanggal_pinjam'] ?? null;
    }

    public function setLoanDateAttribute($value): void
    {
        $this->attributes['tanggal_pinjam'] = $value;
    }

    public function getReturnDateAttribute()
    {
        return $this->attributes['tanggal_kembali'] ?? null;
    }

    public function setReturnDateAttribute($value): void
    {
        $this->attributes['tanggal_kembali'] = $value;
    }

    public function getAmountAttribute()
    {
        return $this->attributes['jumlah_pinjam'] ?? null;
    }

    public function setAmountAttribute($value): void
    {
        $this->attributes['jumlah_pinjam'] = $value;
    }

    public function getStatusAttribute()
    {
        return $this->attributes['status_peminjaman'] ?? null;
    }

    public function setStatusAttribute($value): void
    {
        $this->attributes['status_peminjaman'] = $value;
    }
}
