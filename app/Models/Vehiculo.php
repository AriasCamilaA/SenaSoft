<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculo';
    protected $primaryKey = 'veh_placa';
    public $timestamps = false;

    protected $fillable = [
        'veh_placa',
        'veh_modelo',
        'veh_marca',
        'veh_color',
        'veh_estado',
        'veh_precio',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'cat_id_fk', 'cat_id');
    }

    public function datosPersonales()
    {
        return $this->belongsTo(DatosPersonales::class, 'data_id_fk', 'data_id');
    }
}
