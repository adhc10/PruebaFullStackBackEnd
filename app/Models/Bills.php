<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=['bill_number','total','company','cliente'];
}
