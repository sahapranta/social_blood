<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'fullname', 'mobile', 'birthdate', 'gender', 'height', 'weight', 'address', 'thana', 'city', 'avatar'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }   
    
}
