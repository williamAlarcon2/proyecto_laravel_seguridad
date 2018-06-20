<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sistemaexplotacion extends Model
{
  protected $table = 'sistemaexplotacions';
  protected $fillable = ['nombreSis', 'modulopSis','modulorSis','modulopeSis','modulolSis'];
  protected $guarded = ['id'];
}
