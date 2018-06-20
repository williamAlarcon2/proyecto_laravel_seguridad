<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ponedoraslevante extends Model
{
    protected $table = 'ponedoraslevantes';
  	protected $fillable = ['idLote', 'programaPle', 'fotoPle', 'despiquePle', 'trasladoPle', 'inicioluzPle', 'finluzPle','idGuia','idSublote'];
  	protected $guarded = ['id'];
}
