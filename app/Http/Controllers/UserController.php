<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function create(){
        $auth = \Auth::user(); 
        if (!$auth->canGo) {     
            return view('details');
        } else {
            return redirect()->back();
        }

    }
    
    public function show(User $donor){
        $auth = \Auth::user();        
        if ($auth->canGo) {
            $user = $donor;
            return view('profile', compact('user'));
        } else{
            return redirect()->route('donor.create');
        }            
    }

    public function store(Request $request){
        $user = \Auth::user();        
        $request->validate([
            'fullname' =>'nullable|string|max:255',
            'birthdate'=>'required|date_format:Y-m-d|before:5 years ago',
            'mobile' =>'required|regex:/(01)[0-9]{9}/',
            'gender' =>'nullable|string|max:6',
            'height' =>'nullable|digits_between:1,2|numeric',
            'weight' =>'nullable|digits_between:1,3|numeric',
            'address' =>'nullable|string',
            'thana' =>'nullable|string',
            'city' =>'nullable|string',
            'avatar' =>'required',
        ]);
        
        $image_name = "";

        if ($request->has('avatar')) {
            $image_file = $request->avatar;
            list($type, $image_file) = explode(';', $image_file);
            list(, $image_file)      = explode(',', $image_file);
            $image_file = base64_decode($image_file);
            $image_name= $user->name.'-'.time().'.png';
            $path = public_path('image/user/'.$image_name);
            file_put_contents($path, $image_file);                 
        }

        $user->userDetails()->create([
            'user_id'=>$user->id,
            'fullname'=>$request->input('fullname'),
            'birthdate'=>$request->input('birthdate'),
            'mobile'=>$request->input('mobile'),
            'gender'=>$request->input('gender'),
            'height'=>$request->input('height'),
            'weight'=>$request->input('weight'),
            'address'=>$request->input('address'),
            'thana'=>$request->input('thana'),
            'city'=>$request->input('city'),
            'avatar'=>$image_name,
        ]);
        return redirect('donor/'.$user->name)
                ->with('success', 'Profile Successfully Updated');        
    }
    
    public function edit(User $user)
    {
        //
    }


    public function update(Request $request)
    {
        //        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
