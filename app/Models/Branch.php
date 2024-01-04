<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class, 'id_cabang');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_cabang');
    }
}
