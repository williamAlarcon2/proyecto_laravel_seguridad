<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PonedoraslevanteSemanal extends Model
{
    protected $table = 'ponedoraslevante_semanals';
  	protected $fillable = ['idLevante' ,'semanaPle', 'idsPle', 'fdsPle', 'avesmuertasPle', 'mortalidadPle', 'seleccionPle', 'otrosPle', 'alimentoPle', 'consumoPle', 'pesoPle', 'uniformidadPle', 'coeficientePle', 'observacionesPle','kacumPle','acuPle','saldoavesPle','avediarealPle','graveacPle','mortsemPle','mortacuPle','selsemPle','gananciaavediarPle','msacuPle','convsemPle','cumpgananavesemanaPle','cumplconsgradPle','cumplpesoPle','cumplconsumoacmPle'];
  	protected $guarded = ['id'];
}
