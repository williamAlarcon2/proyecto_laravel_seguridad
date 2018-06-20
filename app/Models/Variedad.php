<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
  protected $table = 'variedads';
  protected $fillable = ['nombreVar', 'modulopEmp','modulorEmp','modulopeEmp','modulolEmp'];
  protected $guarded = ['id'];
}
