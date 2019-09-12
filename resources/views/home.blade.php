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
            <div class="card mb-4 shadow-sm card-shade">
                @if($blood->is_updated)
                    <h5 class="badge red-shade text-center">
                    {{explode(" ", $blood->create_date)[0]}} <br> <small>{{explode(" ", $blood->create_date)[1]}} <br> {{explode(" ", $blood->create_date)[2]}}</small>
                    </h5>                    
                @endif
                <div class="card-header">
                    <h5 class="my-0 font-weight-normal">{{date("d M", strtotime($blood->required_date))}}</h5>
                    <small class="text-wrap"><i class="fa fa-map-marker"></i> {{$blood->location}}</small>
                </div>
                <div class="card-body">
                    <!-- <h1 class="card-title text-danger">{{strtoupper($blood->blood_group)}}</h1> -->
                    <svg viewBox="0 0 54 60" width="80" xmlns="http://www.w3.org/2000/svg">
                        <g id="005---Blood-Type-B" fill="none">
                            <g id="Layer_2" transform="translate(0 1)">
                                <path id="Shape" d="m35 30.64c0 .46-.02.91-.06 1.36h-6.94c-1.6568542 0-3 1.3431458-3 3v11.46c-2.1929035 1.0182749-4.582213 1.543923-7 1.54-9.48823862-.0994426-17.0993796-7.8717607-17-17.36 0-11.28 13.21-26.82 16.34-30.34.1663559-.19061609.4070005-.3.66-.3s.4936441.10938391.66.3c3.13 3.52 16.34 19.06 16.34 30.34z" fill="#f44335"/><path id="Shape" d="m22 35v11.46c-1.7493738.8063803-3.6263344 1.3004955-5.546 1.46.51.047 1.024.08 1.546.08 2.417787.003923 4.8070965-.5217251 7-1.54v-11.46c0-1.6568542 1.3431458-3 3-3h-3c-1.6568542 0-3 1.3431458-3 3z" fill="#c81e1e"/><path id="Shape" d="m18.66.3c-.1663559-.19061609-.4070005-.3-.66-.3s-.4936441.10938391-.66.3c-.228.256-.514.583-.84.96 4.148 4.806 15.5 18.921 15.5 29.38 0 .46-.02.91-.06 1.36h3c.04-.45.06-.9.06-1.36 0-11.28-13.21-26.82-16.34-30.34z" fill="#c81e1e"/><rect id="Rectangle-path" fill="#ffdc00" height="26" rx="3" width="28" x="25" y="32"/><path id="Shape" d="m50 32h-3c1.6568542 0 3 1.3431458 3 3v20c0 1.6568542-1.3431458 3-3 3h3c1.6568542 0 3-1.3431458 3-3v-20c0-1.6568542-1.3431458-3-3-3z" fill="#fec108"/></g><g id="Layer_3" fill="#000"><path id="Shape" d="m24 48.936v7.064c0 2.209139 1.790861 4 4 4h22c2.209139 0 4-1.790861 4-4v-20c0-2.209139-1.790861-4-4-4h-14.016c.222-10.183-9.817-23.762-16.584-31.37-.3661261-.38525621-.8745968-.60295845-1.4060756-.60201276-.5314789.00094569-1.0391716.22045606-1.4039244.60701276-3.89 4.378-16.59 19.551-16.59 31.005 0 12.66 12.322 21.538 24 17.296zm28-12.936v20c0 1.1045695-.8954305 2-2 2h-22c-1.1045695 0-2-.8954305-2-2v-20c0-1.1045695.8954305-2 2-2h22c1.1045695 0 2 .8954305 2 2zm-34-33.938c6.265 7.074 16.219 20.471 15.984 29.938h-5.984c-2.209139 0-4 1.790861-4 4v10.785c-10.508 4.385-22-3.585-22-15.145 0-10.911 13.124-26.33 16-29.578z"/><path id="Shape" d="m11.7 42.157c-1.1658808-.7448244-2.19657944-1.6825302-3.048-2.773-.21735342-.2894349-.57414575-.4388227-.93287822-.390593-.35873247.0482298-.66339982.2865473-.79659094.6231112-.13319112.3365638-.07411223.7188296.15446916.9994818.9906733 1.2694912 2.19052968 2.3607923 3.548 3.227.3013059.2011752.6878565.2236486 1.0104456.0587458.3225891-.1649029.5307572-.491388.5441527-.8534339.0133954-.3620459-.1700771-.7030214-.4795983-.8913119z"/><path id="Shape" d="m6.018 31.061c.327-5.353 5.095-14.11 12.754-23.426.3319874-.4275796.2634584-1.04170301-.154615-1.38558463s-1.0338812-.29265182-1.389385.11558463c-7.918 9.635-12.854 18.816-13.206 24.574-.02179321.3572656.14866796.6990192.44717244.8965254.29850448.1975063.67970234.2207594 1.00000002.061.32029768-.1597593.53103435-.4782598.55282754-.8355254z"/>
                                <circle id="Oval" cx="6" cy="36" r="1"/>            
                            </g>
                        </g>
                        @if(strlen($blood->blood_group) > 2)
                        <text transform="matrix(1 0 0 1.28 30 51)" font-weight="bolder" font-size="0.75em" fill="#000" text-align="center">{{strtoupper($blood->blood_group)}}</text>
                        @else
                        <text transform="matrix(1 0 0 1.28 32 51)" font-weight="bolder" font-size="0.75em" fill="#000" text-align="center">{{strtoupper($blood->blood_group)}}</text>
                        @endif
                    </svg>
                    <p class="text-wrap">{{ strip_tags(str_limit($blood->description, 50)) }}</p>
                    
                    <small class='text-muted mb-2'>By <a href="{{$blood->user->url}}">{{$blood->user->name}}</a> - {{$blood->create_date}}</small>
                    <a href="{{route('blood_request.show', $blood->id)}}" type="button" class="btn btn-lg btn-block btn-outline-danger shadow-sm mt-2">
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
