<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['sprint','created_at','updated_at'];

}
