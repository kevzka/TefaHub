<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'peminjam';

    protected $fillable = [
        'nama_peminjam',
        'kelas',
        'jurusan',
        'no_hp',
        'name',
        'class',
        'role',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'peminjam_id');
    }

    public function getNameAttribute()
    {
        return $this->attributes['nama_peminjam'] ?? null;
    }

    public function setNameAttribute($value): void
    {
        $this->attributes['nama_peminjam'] = $value;
    }

    public function getClassAttribute()
    {
        return $this->attributes['kelas'] ?? null;
    }

    public function setClassAttribute($value): void
    {
        $this->attributes['kelas'] = $value;
    }

    public function getIsAdminAttribute(): bool
    {
        return ($this->attributes['role'] ?? null) === 'admin';
    }
}
