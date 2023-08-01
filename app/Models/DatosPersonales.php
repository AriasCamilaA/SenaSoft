<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model
{
    use HasFactory;
    protected $table = 'datos_personales';
    protected $primaryKey = 'data_id';
    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usu_id_fk', 'usu_id');
    }

    public function vehiculos()
    {
        return $this->hasMany(Vehiculo::class, 'data_id_fk', 'data_id');
    }
}
