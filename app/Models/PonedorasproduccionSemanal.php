<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PonedorasproduccionSemanal extends Model
{
    protected $table = 'ponedorasproduccion_semanals';
  	protected $fillable = ['idProduccion', 'semanaPpr', 'dfsPpr', 'semanavidaPpr', 'huevosPpr', 'consumoPpr', 'mortalidadPpr', 'seleccionPpr', 'ventasPpr', 'pesoavePpr', 'pesohuevoPpr' ,'alimentoPpr', 'ObservacionesPpr'];
  	protected $guarded = ['id'];
}
