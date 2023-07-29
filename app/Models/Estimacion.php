<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimacion extends Model
{
    use HasFactory;
    protected $table = 'estimaciones';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'valor'];
    public $timestamps = false;
}
