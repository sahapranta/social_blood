<?php

namespace App;

use Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'blood_group'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // protected $primaryKey = 'name';

    public function userDetails(){
        return $this->hasOne('App\UserDetails');
    }

    public function bloodRequest(){
        return $this->hasMany('App\BloodRequest');
    }

    public function requestAccept(){
        return $this->belongsToMany('App\BloodRequest', 'request_accepts')
        ->withTimestamps()
        ->withPivot('donated', 'comments');
    }

    public function getRouteKeyName() {
        return 'name';
    }

    public function getUrlAttribute(){
        return route('donor.show', $this->name);
    }

    public function getCanGoAttribute(){
        return $this->userDetails? true : false;
    }

    public function getAvatarAttribute(){        
        if($this->canGo){          
            return $this->userDetails->avatar ? $this->userDetails->avatar : 'user.png';
        } else {
            return 'user.png';
        }
    }

    public function isDonated($blood){
        if($this->requestAccept()){
            foreach ($this->requestAccept as $value) {
                if ($value->pivot->blood_request_id === $blood) {                    
                    if ($value->pivot->donated === 1) {                        
                        return true;
                    }
                }
            }
        } else{
            return false;
        }
    }

    public function isOnline(){
        return Cache::has('user-is-online-'. $this->id);
    }

    public function getNotificationCountAttribute(){
        return $this->unreadNotifications->count();
    }
    
}
