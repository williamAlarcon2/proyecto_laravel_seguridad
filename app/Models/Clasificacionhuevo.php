<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacionhuevo extends Model
{
  protected $table = 'clasificacionhuevos';
  protected $fillable = ['nombreCla', 'desdeCla' , 'hastaCla'];
  protected $guarded = ['id'];
}
