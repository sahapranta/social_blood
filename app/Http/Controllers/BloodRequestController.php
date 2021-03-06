<?php

namespace App\Http\Controllers;

use App\User;
use App\BloodRequest;
use App\Notifications\RequestMatched;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BloodRequestController extends Controller
{
    public function __construct(){
        return $this->middleware('auth', ['except'=>['index','show']]);
    }
    
    public function index()
    {    
        $bloodRequests = BloodRequest::where('required_date', '>=', date('Y-m-d'))->latest()->paginate(10);        
        $allRequests = BloodRequest::all()->where('required_date', '>=', date('Y-m-d'));        
        return view('home', compact('bloodRequests', 'allRequests'));
    }
    
    public function create()
    {   $auth = \Auth::user();
        if ($auth->canGo) {
            return view('blood.create');
        } else{
            return redirect()->route('donor.create');
        } 
    }
   
    public function store(Request $request)
    {        
        if (!$request->user()) {
            return redirect('/')
            ->with('success', 'Please log in first');
        }
        $request->validate([
            'description' =>'required|string',
            'required_date'=>'required|date_format:Y-m-d|after:today',
            'blood_group' =>'required|string|max:3|in:a+,b+,o+,ab+,a-,b-,o-,ab-,',
            'location' =>'required|string',
        ]);
        
        $new_request = $request->user()
            ->bloodRequest()
            ->create([
                'description'=>$request->input('description'),
                'required_date'=>$request->input('required_date'), 
                'blood_group'=>$request->input('blood_group'), 
                'location'=>$request->input('location'),
            ]);
        $users = User::where('blood_group', $request->input('blood_group'))->get();
        foreach ($users as $user) {            
            $user->notify(new RequestMatched($new_request));
        }
        return redirect('/home')
                ->with('success', 'Your Request Successfully Posted');
    }

  
    public function show(BloodRequest $bloodRequest)
    {
        $blood = $bloodRequest;
        $blood_key = 'blood_' . $blood->id;
        if (!Session::has($blood_key)) {
            $blood->increment('view_count');
            Session::put($blood_key, 1);
        }
        return view('blood.show', compact('blood'));
    }

  
    public function edit(BloodRequest $bloodRequest)
    {
        $blood = $bloodRequest;
        return view('blood.edit', compact('blood')); 
    }

 
    public function update(Request $request, BloodRequest $bloodRequest)
    {
        $bloodRequest->update($request->only('required_date', 'description', 'location', 'blood_group'));
        return redirect()->route('blood_request.show', $bloodRequest)->with('success', 'Your Request has been Updated');
    }

   
    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->delete();
        return redirect('/home')
            ->with('success', "Your Request has been Deleted");
    }
}
