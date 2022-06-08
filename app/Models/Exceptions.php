<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exceptions extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['message','exception','method','code'];
}
