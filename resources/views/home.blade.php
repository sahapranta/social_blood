@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts._message')
    <div class="search-form mb-3">
        <blood-search :model="{{ json_encode($allRequests) }}"></blood-search>
    </div>
  <div class="row mb-3 mt-5">
    @foreach($bloodRequests as $blood)        
        <div class="col-sm-6 col-md-4 col-lg-3 text-center request-card">            
            <div class="card mb-4 shadow-sm">
                @if($blood->is_updated)
                    <h5 class="badge badge-dark text-center">
                    {{explode(" ", $blood->create_date)[0]}} <br> <small>{{explode(" ", $blood->create_date)[1]}} <br> {{explode(" ", $blood->create_date)[2]}}</small>
                    </h5>                    
                @endif
                <div class="card-header">
                    <h5 class="my-0 font-weight-normal">{{date("d M", strtotime($blood->required_date))}}</h5>
                    <small><i class="fa fa-map-marker"></i> {{$blood->location}}</small>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-danger">{{strtoupper($blood->blood_group)}}</h1>
                    <p>{{ strip_tags(str_limit($blood->description, 50)) }}</p>
                    
                    <small class='text-muted mb-2'>By <a href="{{$blood->user->url}}">{{$blood->user->name}}</a> - {{$blood->create_date}}</small>
                    <a href="{{route('blood_request.show', $blood->id)}}" type="button" class="btn btn-lg btn-block btn-outline-danger">
                        @auth
                            @if(Auth::id() === $blood->user_id)
                                View <i class="fa fa-cog"></i>
                            @elseif(Auth::user()->blood_group === $blood->blood_group)
                                Donate
                            @else
                                View <i class="fa fa-eye"></i>                      
                            @endif
                        @endauth
                        @guest
                            View <i class="fa fa-eye"></i>
                        @endguest
                    </a>
                </div>
            </div>
        </div>
    @endforeach
  </div>
    <div class='pagination justify-content-center'>
        {{$bloodRequests->links()}}
    </div>
</div>

@endsection
