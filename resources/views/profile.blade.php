@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-lg-9 order-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#activity" data-toggle="tab" class="nav-link">Activity</a>
                </li>
                @if(Auth::id() === $user->id)
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
                @endif
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">{{$user->userDetails->fullname}}</h4>
                            <h6>Contact</h6>
                            <p>
                                <a href="tel:{{$user->userDetails->mobile}}">{{$user->userDetails->mobile}}</a>
                                <br>
                                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <span class="badge badge-danger"><i class="fa fa-trophy"></i> {{$user->donation_count}} Donation</span>
                            <span class="badge badge-primary"><i class="fa fa-gratipay"></i> {{count($user->requestAccept)}} Wish</span>
                            <span class="badge badge-success"><i class="fa fa-dot-circle-o"></i>{{$user->isOnline() ? ' Online' : ' Offline'}}</span>
                            <hr/>
                            <img src="{{asset('image/award.svg')}}" alt="badge" width="25" class="float-left mr-1">
                            <h4 class="">Recent Badges</h4>
                            <!-- <img src="{{asset('image/badge.svg')}}" alt="badge" width="15"> -->
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Donor</a>                            
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Humane</a>
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Kind</a>
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Superb</a>
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Great</a>
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Generous</a>
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Merciful</a>
                            <a href="#" class="badge badge-warning badge-pill"><i class="fa fa-certificate"></i> Heaven-sent</a>
                        </div>
                        <hr/>
                        <div class="col-md-12 mt-3">
                            <h5 class="mt-2"><img src="{{asset('image/badge.svg')}}" alt="badge" width="25" class="float-right"> Donation History</h5>
                            <table class="table table-sm table-hover">
                                <tbody>
                                    @foreach($user->requestAccept as $accept)                                 
                                        @if($user->isDonated($accept->id))
                                            <tr>
                                                <td>
                                                    <strong>{{ \Carbon\Carbon::parse($accept->pivot->updated_at)->diffForHumans() }}</strong>
                                                    Graciously Donated Blood (<small>Where Patient Commented: <span class="text-danger">{{$accept->pivot->comments}}</span></small>)
                                                </td>
                                            </tr>                                        
                                        @endif
                                    @endforeach                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="activity">                    
                    <table class="table table-hover table-striped">
                        <tbody>           
                            @forelse($user->requestAccept as $accept)                         
                                <tr>
                                    <td>
                                    <span class="float-right font-weight-bold">{{ \Carbon\Carbon::parse($accept->pivot->created_at)->diffForHumans() }}</span>
                                    Wished to Donate <a href="{{route('blood_request.show', $accept->id)}}">`<strong class="text-danger">{{strtoupper($accept->blood_group)}}</strong> Blood at {{$accept->location}}`</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        <strong>Sorry!</strong> you have no active donation.</strong>
                                    </td>
                                </tr>
                            @endforelse                           
                        </tbody> 
                    </table>
                </div>
                @if(Auth::id() === $user->id)
                <div class="tab-pane" id="edit">
                    <form role="form">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Full Name</label>
                            <div class="col-lg-9">
                                <input class="form-control {{ $errors->has('fullname') ? ' is-invalid' : '' }}" type="text" value="{{old('fullname', $user->userDetails->fullname)}}" name="fullname">
                                @if ($errors->has('fullname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" value="{{old('email', $user->email)}}" >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile No.</label>
                            <div class="col-lg-9">
                                <input class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" type="text" value="{{old('mobile', $user->userDetails->mobile)}}" name="mobile">
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Date of Birth</label>
                            <div class="col-lg-9">
                                <input class="form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}" type="date" value="{{old('birthdate', date('Y-m-d', strtotime($user->userDetails->birthdate)))}}" name="birthdate">
                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                            <div class="col-lg-9">
                                <div class="d-flex mt-2">
                                    @foreach(array('male', 'female', 'others') as $gender)
                                        <div class="custom-control custom-radio mr-3">
                                            <input id="{{$gender}}" name="gender" value="{{$gender}}" type="radio" class="custom-control-input" {{$gender === $user->userDetails->gender ? 'checked="true"':''}}>                                              
                                            <label class="custom-control-label" for="{{$gender}}">{{$gender}}</label>
                                        </div>                                   
                                    @endforeach
                                </div>                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Health</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Height</label>
                                    </div>                                
                                    
                                        <input class="form-control {{ $errors->has('height') ? ' is-invalid' : '' }}" type="text" value="{{old('height', $user->userDetails->height)}}" name="height" placeholder="inch">
                                        <span class="input-insider">inch</span>
                                        <input class="form-control" type="text" placeholder="cm" value="{{ceil($user->userDetails->height * 2.54) }}" readonly>                                    
                                        <span class="input-inside">cm</span>
                                    @if ($errors->has('height'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('height') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Weight</label>
                                    </div>
                                    <input class="form-control {{ $errors->has('weight') ? ' is-invalid' : '' }}" type="text" value="{{old('weight', $user->userDetails->weight)}}" name="weight" placeholder="kg">
                                    <span class="input-inside">kg</span>
                                    @if ($errors->has('weight'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('weight') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" type="text" value="{{old('address', $user->userDetails->address)}}" placeholder="Street">
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-4">
                                <input class="form-control {{ $errors->has('thana') ? ' is-invalid' : '' }}" name="thana" type="text" value="{{old('thana', $user->userDetails->thana)}}" placeholder="Thana">
                                @if ($errors->has('thana'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('thana') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" type="text" name="city" value="{{old('city', $user->userDetails->city)}}" placeholder="District">
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" value="{{old('name', $user->name)}}" name="name">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="border border-lg border-danger p-3">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label form-control-label">Current Password</label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="password" value="">
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label form-control-label">New Password</label>
                                <div class="col-lg-4">
                                    <input class="form-control" type="password" value="">
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="password" value="">
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row mt-2">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel" disabled>
                                <input type="button" class="btn btn-primary" value="Save Changes" disabled>
                                <p class="text-danger mt-3">Sorry, Profile Update Feature Implemented Yet!</p>
                            </div>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
        <div class="col-lg-3 order-1 text-center">             
            @if(Auth::id() === $user->id)
            <div class="upload-container mb-3">
                <div class="upload up-img"></div>
                <div class="mt-5 d-flex justify-content-center">
                    <div class="btn-group btn-block" role="group" aria-label="Basic example">
                        <button id="cancelCropImage" class="btn btn-sm btn-outline-danger">Cancel</button>
                        <button id="cropImage" class="btn btn-sm btn-outline-primary">Crop</button>
                    </div>
                </div>
            </div>
            @endif

            <label class="custom-file file-label">                
                <img src="{{asset('image/user/'.$user->avatar)}}" class="mx-auto img-fluid rounded-circle d-block shadow {{ $user->isOnline() ? 'border border-success' : ''}}" alt="avatar" id="avatar">
            @if(Auth::id() === $user->id)
                <span class="custom-file-control upload-logo">
                    <i class="fa fa-camera"></i>
                </span>
                <input type="file" id="file" class="custom-file-input" />
            @endif
            </label>            
        </div>
    </div>
</div>
       
@endsection