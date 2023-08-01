<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'cat_id_fk', 'cat_id');
    }
}