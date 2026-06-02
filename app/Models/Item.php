<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ["name", "amount", "status"];

    public function loan(){
        return $this->hasMany(Loan::class);
    }
}
