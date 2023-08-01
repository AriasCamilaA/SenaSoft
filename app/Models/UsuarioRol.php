<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioRol extends Model
{
    use HasFactory;
    protected $table = 'usuario_rol';
    protected $primaryKey = 'usuario_rol_id';
    public $timestamps = false;

    protected $fillable = [
        'usuario_rol_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usu_id_fk', 'usu_id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id_fk', 'rol_id');
    }

}
