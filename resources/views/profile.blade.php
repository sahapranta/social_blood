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
                    <a href="" data-target="#message" data-toggle="tab" class="nav-link">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
                @endif
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="float-right">
                                <svg viewBox="0 0 54 60" width="80" xmlns="http://www.w3.org/2000/svg">
                                    <g id="005---Blood-Type-B" fill="none">
                                        <g id="Layer_2" transform="translate(0 1)">
                                            <path id="Shape" d="m35 30.64c0 .46-.02.91-.06 1.36h-6.94c-1.6568542 0-3 1.3431458-3 3v11.46c-2.1929035 1.0182749-4.582213 1.543923-7 1.54-9.48823862-.0994426-17.0993796-7.8717607-17-17.36 0-11.28 13.21-26.82 16.34-30.34.1663559-.19061609.4070005-.3.66-.3s.4936441.10938391.66.3c3.13 3.52 16.34 19.06 16.34 30.34z" fill="#f44335"/><path id="Shape" d="m22 35v11.46c-1.7493738.8063803-3.6263344 1.3004955-5.546 1.46.51.047 1.024.08 1.546.08 2.417787.003923 4.8070965-.5217251 7-1.54v-11.46c0-1.6568542 1.3431458-3 3-3h-3c-1.6568542 0-3 1.3431458-3 3z" fill="#c81e1e"/><path id="Shape" d="m18.66.3c-.1663559-.19061609-.4070005-.3-.66-.3s-.4936441.10938391-.66.3c-.228.256-.514.583-.84.96 4.148 4.806 15.5 18.921 15.5 29.38 0 .46-.02.91-.06 1.36h3c.04-.45.06-.9.06-1.36 0-11.28-13.21-26.82-16.34-30.34z" fill="#c81e1e"/><rect id="Rectangle-path" fill="#ffdc00" height="26" rx="3" width="28" x="25" y="32"/><path id="Shape" d="m50 32h-3c1.6568542 0 3 1.3431458 3 3v20c0 1.6568542-1.3431458 3-3 3h3c1.6568542 0 3-1.3431458 3-3v-20c0-1.6568542-1.3431458-3-3-3z" fill="#fec108"/></g><g id="Layer_3" fill="#000"><path id="Shape" d="m24 48.936v7.064c0 2.209139 1.790861 4 4 4h22c2.209139 0 4-1.790861 4-4v-20c0-2.209139-1.790861-4-4-4h-14.016c.222-10.183-9.817-23.762-16.584-31.37-.3661261-.38525621-.8745968-.60295845-1.4060756-.60201276-.5314789.00094569-1.0391716.22045606-1.4039244.60701276-3.89 4.378-16.59 19.551-16.59 31.005 0 12.66 12.322 21.538 24 17.296zm28-12.936v20c0 1.1045695-.8954305 2-2 2h-22c-1.1045695 0-2-.8954305-2-2v-20c0-1.1045695.8954305-2 2-2h22c1.1045695 0 2 .8954305 2 2zm-34-33.938c6.265 7.074 16.219 20.471 15.984 29.938h-5.984c-2.209139 0-4 1.790861-4 4v10.785c-10.508 4.385-22-3.585-22-15.145 0-10.911 13.124-26.33 16-29.578z"/><path id="Shape" d="m11.7 42.157c-1.1658808-.7448244-2.19657944-1.6825302-3.048-2.773-.21735342-.2894349-.57414575-.4388227-.93287822-.390593-.35873247.0482298-.66339982.2865473-.79659094.6231112-.13319112.3365638-.07411223.7188296.15446916.9994818.9906733 1.2694912 2.19052968 2.3607923 3.548 3.227.3013059.2011752.6878565.2236486 1.0104456.0587458.3225891-.1649029.5307572-.491388.5441527-.8534339.0133954-.3620459-.1700771-.7030214-.4795983-.8913119z"/><path id="Shape" d="m6.018 31.061c.327-5.353 5.095-14.11 12.754-23.426.3319874-.4275796.2634584-1.04170301-.154615-1.38558463s-1.0338812-.29265182-1.389385.11558463c-7.918 9.635-12.854 18.816-13.206 24.574-.02179321.3572656.14866796.6990192.44717244.8965254.29850448.1975063.67970234.2207594 1.00000002.061.32029768-.1597593.53103435-.4782598.55282754-.8355254z"/>
                                            <circle id="Oval" cx="6" cy="36" r="1"/>            
                                        </g>
                                    </g>
                                    @if(strlen($user->blood_group) > 2)
                                    <text transform="matrix(1 0 0 1.28 29 51)" font-weight="bolder" font-size="0.75em" fill="#000" text-align="center">{{strtoupper($user->blood_group)}}</text>
                                    @else
                                    <text transform="matrix(1.1 0 0 1.28 32 51)" font-weight="bolder" font-size="0.75em" fill="#000" text-align="center">{{strtoupper($user->blood_group)}}</text>
                                    @endif
                                </svg>
                            </div>
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
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <table class="table table-hover table-striped">
                                <h4>Request Accepted</h4>
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
                        <div class="col-12 col-lg-6">
                            <table class="table table-hover table-striped">
                                <h4>Request Created</h4>
                                <tbody>        
                                    @forelse($user->bloodRequest as $blood_request)                         
                                        <tr>
                                            <td>
                                            <span class="float-right font-weight-bold">{{ \Carbon\Carbon::parse($blood_request->created_at)->diffForHumans() }}</span>
                                            Created a Request for  <a href="{{route('blood_request.show', $blood_request->id)}}">`<strong class="text-danger">{{strtoupper($blood_request->blood_group)}}</strong> Blood at {{$blood_request->location}}`</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                <strong>Sorry!</strong> you have not created any request yet.</strong>
                                            </td>
                                        </tr>
                                    @endforelse                      
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="message">
                    @if(Auth::id() === $user->id)
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Message From User</h5>
                                <small>3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small>Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Message From User</h5>
                                <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Message From User</h5>
                                <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                        </div>
                    @endif
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
        <div class="col-lg-3 order-1 text-center mb-3">             
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