<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $primaryKey = 'comp_id';
    protected $fillable = ['name','email','logo','website'];
}
