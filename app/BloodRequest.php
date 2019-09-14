<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\DonationSuccess;
use App\User;

class BloodRequest extends Model
{
    protected $fillable = [
        'location', 'description', 'required_date', 'blood_group'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function requestAccept(){
        return $this->belongsToMany('App\User', 'request_accepts')
        ->withTimestamps()
        ->withPivot('donated', 'comments');
    }

    public function getCreateDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getIsAcceptedAttribute(){
        return $this->requestAccept()->where('user_id', auth()->id())
        ->count()>0;
    }

    public function getDescriptionHtmlAttribute(){
        return clean(\Parsedown::instance()->text($this->description));
    }

    public function getIsUpdatedAttribute(){
        $dt = Carbon::parse($this->created_at);
        return $dt->isYesterday() || $dt->isToday();
    }

    public function markDonated(User $user, $mark){
        $donor = $this->requestAccept();
        if ($donor->where('user_id', $user->id)->exists()) {
            $donor->updateExistingPivot($user, ['donated'=>$mark]);
            if ($mark === 1) {
                $user->increment('donation_count');
                $msg = $this->user->name ." has marked your donation.";
            }else {                
                $user->decrement('donation_count');
                $msg = $this->user->name ." has removed your donation.";            
            }            
            $user->notify(new DonationSuccess($this->id, $msg));         
        }

    }

    public function giveComment(User $user, $comment){
        $donor = $this->requestAccept();
        if ($donor->where('user_id', $user->id)->exists()) {
            $donor->updateExistingPivot($user, ['comments'=>$comment]); 
            $msg = $this->user->name ." Commented for your donation.";
            $user->notify(new DonationSuccess($this->id, $msg));     
        }
    }
}
