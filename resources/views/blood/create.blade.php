@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        
        <div class="col-md-8">
        @if ($errors->has('description'))
            <div class="alert alert-danger alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a> <strong>{{ $errors->first('description') }}</strong>
            </div>
        @endif  
            <div class="modal-content">
                    <form action="{{route('blood_request.store')}}" method="POST">
                    <div class="modal-header">
                        <h4>Create New Request for Blood</h4>                        
                    </div>
                    <div class="modal-body">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Need</label>
                                        </div>                                
                                        <input class="form-control {{ $errors->has('required_date') ? ' is-invalid' : '' }}" type="date" value="{{old('required_date')}}" name="required_date" />                                    
                                        @if ($errors->has('required_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('required_date') }}</strong>
                                            </span>
                                        @endif                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Blood</label>
                                        </div>                                
                                        <select id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" required>
                                            @foreach(array(' '=> 'Group Needed', 'a+' => 'A+', 'b+' => 'B+', 'o+' => 'O+', 'ab+' => 'AB+', 'a-' => 'A-', 'b-' => 'B-', 'o-' => 'O-', 'ab-' => 'AB-') as $key => $val)                                                
                                                <option value="{{$key}}" {{old('blood_group') === $key ? 'selected' : ''}}>{{$val}}</option>
                                            @endforeach
                                        </select>
                                        @error('blood_group')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror                                                                   
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">                                                               
                                <location-search :error="{{$errors->has('location') ? 'true':'false'}}" :old="{{json_encode(old('location', 'false'))}}">
                                    @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                    @endif          
                                </location-search>                              
                                <input type="hidden" name="lat">
                                <input type="hidden" name="long">                                                          
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" type="text" id="editor" name="description" placeholder="Location Where Needed" rows="3">{{
                                    old('description')
                                }}</textarea>                                                                                                   
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <input type="submit" class="btn btn-primary" value="Create"/>
                    </div>
                        </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
