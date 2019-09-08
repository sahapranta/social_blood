@extends('layouts.app')
@section('content')
<div class="container">    
  <div class="row">        
        <div class="col-sm-12 col-md-3 mb-3">
            <div class="p-3 text-center mb-3" style="border:3px solid blue;">
                <h1 class="text-danger">{{strtoupper($blood->blood_group)}}</h1>
            </div>
            <p>{{$blood->location}}</p>
            <h5 class="mb-3">Need Before: {{date("d M", strtotime($blood->required_date))}}</h5> 
            @if(Auth::id() === $blood->user_id)
            <div class="btn-group btn-block" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-outline-danger" 
                onclick="event.preventDefault(); document.querySelector('.form-delete').submit()"
                >Delete</a>
                <form class='form-delete' action="{{route('blood_request.destroy', $blood->id)}}" method="post">
                    @method('DELETE')
                    @csrf                    
                </form>
                <a type="button" class="btn btn-outline-dark" href="{{route('blood_request.edit', $blood)}}">Update</a>                
            </div>
            @auth
                @elseif(Auth::user()->blood_group === $blood->blood_group)
                    <button type="button" class="btn btn-lg btn-block btn-outline-danger"
                    onclick="event.preventDefault(); document.getElementById('request-accept-{{$blood->id}}').submit()">
                        @if($blood->is_accepted)
                            Reject
                        @else
                            Accept
                        @endif
                    </button>
                    <form action="/blood_request/{{$blood->id}}/accept" id="request-accept-{{$blood->id}}" method="post">
                        @csrf
                        @if($blood->is_accepted)
                            @method('DELETE')
                        @endif
                    </form>
                @endif            
            @endauth
        </div>
        <div class="col-md-6 col-sm-12 order-last order-md-1">
            @include('layouts._message')
            <span class="badge badge-pill badge-dark float-right"><i class="fa fa-eye"></i> Views {{$blood->view_count}}</span>
            <p class='text-muted mb-2'>Posted By <a href="{{$blood->user->url}}">{{$blood->user->name}}</a>- {{$blood->create_date}}</p>
            <hr />
            <p>{!! $blood->description_html !!}</p>
            <hr />
            <ul class="list-unstyled">
                <h3>Persons Donated</h3>
                @foreach($blood->requestAccept as $donor)
                    @if($donor->isDonated($blood->id))
                        <li class="media mb-3">
                            <img src="{{asset('image/user/'. $donor->avatar)}}" class="mr-2 img-fluid mt-1" alt="avatar" width="35">
                            <div class="media-body border-bottom">
                                <h5 class="mb-0">{{$donor->userDetails->fullname}}</h5>
                                <small>{{date('D, d M', strtotime($donor->pivot->updated_at))}}</small>
                            </div>
                            <div class="col-6">                                
                                @if(isset($donor->pivot->comments))
                                    <small class="ml-auto">Comments:<span class="badge badge-secondary">{{$donor->pivot->comments}}</span></small>
                                @else
                                    @if(Auth::id() === $blood->user_id)                                    
                                        <form action="{{route('blood_request.comment',[$donor->name, $blood->id] )}}" method="post">
                                            @csrf
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control"  placeholder="Add Comment" name="comment">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-dark" type="submit">Save</button>
                                                </div>
                                            </div>
                                        </form>                                                                    
                                    @endif
                                @endif
                            </div>
                        </li>          
                    @endif
                @endforeach
            </ul>    
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 border-left order-first order-md-12">
            <h4>Decided to Donate <span class="badge badge-danger">{{count($blood->requestAccept)}}</span></h4>
            <hr />
            <div class="donor-list">
                @forelse($blood->requestAccept as $donor)
                    <div class="media mb-2">
                        @if(Auth::id() === $blood->user_id)
                            <div class="d-flex flex-column justify-content-center">
                                <small class="text-center mr-2">Donated</small>
                                <label class="switch switch-left-right">
                                    <input class="switch-input" type="checkbox" 
                                    onclick="event.preventDefault(); document.getElementById('request-donate-{{$donor->id}}').submit()"
                                    id="switch-{{$donor->id}}" 
                                    {{$donor->isDonated($blood->id) ? 'checked' : ''}}>
                                    <span class="switch-label" data-on="YES" data-off="NO"></span>
                                    <span class="switch-handle"></span>
                                </label>                            
                            </div>
                            <form action="{{route('blood_request.donate',[$donor->name, $blood->id] )}}" id="request-donate-{{$donor->id}}" method="post">
                                @if($donor->isDonated($blood->id))
                                    @method('DELETE')
                                @endif
                                @csrf
                            </form>
                        @endif
                        @guest
                            <img src="{{asset('image/user/'.$donor->avatar)}}" class="mr-2 img-fluid rounded-circle shadow border {{ $donor->isOnline() ? 'border-success' : 'border-dark'}}" alt="avatar" id="avatar" width="40">
                        @endguest
                        <div class="media-body">
                            @auth
                            <div class="float-right shadow badge badge-pill badge-danger py-1 border border-dark" title="Call Now!">                                
                                <a class="text-light" href="tel:{{$donor->userDetails->mobile}}" ><i class="fa fa-phone fa-2x"></i></a>                               
                            </div>
                            @endauth
                            <h6 class="mb-0"><a href="{{$donor->url}}">{{$donor->name}}</a></h6>
                            <small>{{$donor->email}}</small>
                        </div>           
                    </div>
                    <hr />
                @empty
                    <p>No One Yet Wants to Donate!</p>
                @endforelse
            </div>
        </div>
  </div>
</div>

@endsection