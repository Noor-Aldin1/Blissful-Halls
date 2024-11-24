<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'role',
    ] ;

    public $timestamps = false;


    public function users(){
        return $this->hasMany(User::class,'user_id','id');
    }
    public function lessors(){

        return $this->hasMany(Lessor::class,'lessor_id','id');
    }
}