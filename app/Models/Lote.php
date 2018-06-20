<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table = 'lotes';
  	protected $fillable = ['nombreLot', 'pollitasLot', 'encasetamientoLot','encLot', 'idVariedad', 'idGranja', 'idSistema', 'idEstado','idEstadoC'];
  	protected $guarded = ['id'];

  	protected $dates = ['encLot'];
    protected $dateFormat = 'Y-m-d H:i:s';
}
