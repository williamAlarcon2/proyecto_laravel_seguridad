<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clima extends Model
{
  protected $table = 'climas';
  protected $fillable = ['nombreCli'];
  protected $guarded = ['id'];
}
