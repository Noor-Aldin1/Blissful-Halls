<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Codec\TimestampLastCombCodec;

class Lessor extends Model
{
    use HasFactory;

    protected $table = 'lessors';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_num',
        'address',
        'role_id',
        'photo',
    ] ;

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function properties(){
        return $this->hasMany(Property::class,'lessor_id','id');
    }

}