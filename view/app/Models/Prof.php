<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prof extends Model
{
    protected $fillable = ['nome','email','siape','ativo','eixo'];
    use SoftDeletes;
    use HasFactory;
}
