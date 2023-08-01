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

    protected $fillable = [
        'data_nombre',
        'data_apellido',
        'data_tipo_id',
        'data_numero_id',
        'data_telefono',
        'data_correo',
        'usu_id_fk',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usu_id_fk', 'usu_id');
    }
}
