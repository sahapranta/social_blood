@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>        
        <div class="col-md-8">        
            <div class="modal-content">
                    <form action="{{route('blood_request.update', $blood->id)}}" method="POST">
                    <div class="modal-header">
                        <h4>Edit Your Request for Blood</h4>
                    </div>
                    <div class="modal-body">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text">Need</label>
                                        </div>                                                                        
                                        <input class="form-control {{ $errors->has('required_date') ? ' is-invalid' : '' }}" type="date" value="{{old('required_date', date('Y-m-d', strtotime($blood->required_date)))}}" name="required_date" />                                    
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
                                            <label class="input-group-text" >Blood</label>
                                        </div>                                
                                        <select id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" required>
                                            @foreach(array(' '=> 'Group Needed', 'a+' => 'A+', 'b+' => 'B+', 'o+' => 'O+', 'ab+' => 'AB+', 'a-' => 'A-', 'b-' => 'B-', 'o-' => 'O-', 'ab-' => 'AB-') as $key => $val)                                                
                                            <option value="{{$key}}" {{old('blood_group', $blood->blood_group) === $key ? 'selected' : ''}}>{{$val}}</option>
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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Location</label>
                                    </div>                                
                                    <input class="form-control {{ $errors->has('location') ? ' is-invalid' : '' }}" type="text" value="{{old('location', $blood->location)}}" name="location" placeholder="Location Where Needed" />                                    
                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                    <input type="hidden" name="lat">
                                    <input type="hidden" name="long">                            
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea id="editor" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" type="text" name="description" placeholder="Location Where Needed" rows="3">{{
                                    old('description', $blood->description)
                                }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif                                                                    
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a type="reset" class="btn btn-secondary" href="{{URL::previous() }}">Cancel</a>
                        <input type="submit" class="btn btn-primary" value="Update"/>
                    </div>
                        </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection