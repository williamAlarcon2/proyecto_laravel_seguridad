<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesiones extends Model
{
    protected $table = 'sesiones';
  	protected $fillable = ['id_user', 'direccion_ip','fecha', 'estado_sesion'];
  	protected $guarded = ['id'];

  	public $timestamps = false;
}
