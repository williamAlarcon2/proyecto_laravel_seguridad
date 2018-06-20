<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
  protected $table = 'empresas';
  protected $fillable = ['nombreEmp', 'idEstado', 'modulopEmp', 'modulorEmp', 'modulopeEmp', 'modulolEmp'];
  protected $guarded = ['id'];
}
