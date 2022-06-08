<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['name','lastname','phonenumber','identification','birth'];
}
