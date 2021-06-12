<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $primaryKey   = 'emp_id';
    protected $fillable     = ['first_name','last_name','comp_id','email','phone'];

    public function company(){
        return $this->hasOne(company::class,'comp_id');
    }
}
