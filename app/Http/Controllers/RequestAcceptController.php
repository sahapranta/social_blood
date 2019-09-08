<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BloodRequest;
use App\User;

class RequestAcceptController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    
    public function store(BloodRequest $bloodRequest)
    {
        $user = \Auth::user();        
        if ($user->canGo) {
            $bloodRequest->requestAccept()->attach($user->id);
            return back()->with('success', 'You have decided to donate blood');            
        }
        return back()->with('success', "Please Complete <a href='" . route('donor.show', $user->name) ."'>Your Profile</a> First");
    }

    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->requestAccept()->detach(auth()->id());
        return back()->with('success', 'You have removed your name from wishlist');
    }

    public function donate(User $user, BloodRequest $bloodRequest)
    {        
        $bloodRequest->markDonated($user, 1);        
        return back()->with('success', "You have marked $user->name as donated");
    }
    
    public function removeDonate(User $user, BloodRequest $bloodRequest)
    {
        $bloodRequest->markDonated($user, 0);
        return back()->with('success', "You have removed $user->name from donated");
    }

    public function comment(Request $request, User $user, BloodRequest $bloodRequest)
    {
        $request->validate(['comment'=>'required|string|max:80']);
        $bloodRequest->giveComment($user, $request->input('comment'));
        return back()->with('success', "You have commented $user->name for donation");
    }
}
