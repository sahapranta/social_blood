@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hi, {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="text-center mb-4">Please Complete Your Profile Info</h3>                                       
                    
                    <form enctype="multipart/form-data" role="form" method="POST" action="{{route('donor.store')}}">                        
                        @csrf
                        <div class="row">
                            <div class="col order-12">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label form-control-label">Full Name</label>
                                    <div class="col-lg-8">
                                        <input class="form-control {{ $errors->has('fullname') ? ' is-invalid' : '' }}" type="text" value="{{old('fullname')}}" name="fullname">
                                        @if ($errors->has('fullname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('fullname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label form-control-label">Date of Birth</label>
                                    <div class="col-lg-8">
                                        <input class="form-control {{ $errors->has('birthdate') ? ' is-invalid' : '' }}" type="date" value="{{old('birthdate')}}" name="birthdate">
                                        @if ($errors->has('birthdate'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('birthdate') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label form-control-label">Gender</label>
                                    <div class="col-lg-8">
                                        <div class="d-flex mt-2">
                                            <div class="custom-control custom-radio mr-3">
                                                <input id="male" name="gender" value="male" type="radio" class="custom-control-input" checked="true">                                              
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="custom-control custom-radio mr-3">
                                                <input id="female" name="gender" value="female" type="radio" class="custom-control-input">
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="others" name="gender" value="others" type="radio" class="custom-control-input">
                                                <label class="custom-control-label" for="others">Others</label>
                                            </div>                                                
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 order-1 order-lg-12 text-center">
                                <label class="custom-file">                                    
                                    <img src="{{asset('/image/user/user.png')}}" id="create_avatar" class="mx-auto img-fluid d-block" alt="avatar" width="100">                                    
                                    <h6 class="mt-1">Upload a Photo</h6>
                                    <input type="file" id="croppie_file"  class="custom-file-input {{ $errors->has('avatar') ? ' is-invalid' : '' }}" >
                                    @if ($errors->has('avatar'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                    @endif
                                </label>                                
                                <input type="hidden" value="{{old('avatar')}}" name='avatar'>
                            </div>
             
                        </div>                                                                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Mobile No.</label>
                            <div class="col-lg-9">
                                <input class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" type="text" value="{{old('mobile')}}" name="mobile">
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Health</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Height</label>
                                    </div>                                
                                    <input class="form-control {{ $errors->has('height') ? ' is-invalid' : '' }}" type="text" value="{{old('height')}}" name="height" placeholder="inch">
                                    <span class="input-insider">inch</span>
                                    <input class="form-control" type="text" placeholder="Auto" readonly >
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
                                    <input class="form-control {{ $errors->has('weight') ? ' is-invalid' : '' }}" type="text" value="{{old('weight')}}" name="weight" placeholder="kg">
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
                                <input class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" type="text" value="{{old('address')}}" placeholder="Street">
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
                                <input class="form-control {{ $errors->has('thana') ? ' is-invalid' : '' }}" name="thana" type="text" value="{{old('thana')}}" placeholder="Thana">
                                @if ($errors->has('thana'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('thana') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-5">
                                <input class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" type="text" name="city" value="{{old('city')}}" placeholder="District">
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mt-2">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-3">
                                <a href="{{route('home')}}" type="button" class="btn btn-success btn-block">Skip</a>
                            </div>
                            <div class="col-lg-6">
                                <input type="submit" class="btn btn-primary btn-block" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Image Edit Modal -->
<div class="modal fade" id="imgEdit" tabindex="-1" role="dialog" aria-labelledby="imgEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">      
      <div class="modal-body">
        <div class="upload-img d-block" style="height:280px;"></div>
      </div>
      <div class="modal-footer mt-3">
        <button type="button" id="cancelCropBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="cropImagePop">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection