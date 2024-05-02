@extends(TLAYOUT)

@section('page-title',__('default.instructors'))
@section('inline-title',__('default.instructors'))

@section('content')

    <!--? Team Ara Start -->
    <div class="team-area pt-160 pb-160">
        <div class="container">
            <div class="row">
                @foreach($admins as $admin)
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <a href="{{ route('instructor',['admin'=>$admin->id]) }}">
                                @if(empty($admin->user->picture))
                                    <img src="{{ asset('img/user.png') }}" alt="">
                                @else
                                    <img src="{{ asset($admin->user->picture) }}" alt="">
                            @endif
                            </a>
                            <!-- Blog Social -->
                            <ul class="team-social">
                                @if(!empty($admin->social_facebook))
                                    <li><a  href="{{  $admin->social_facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif

                                @if(!empty($admin->social_twitter))
                                    <li><a  href="{{  $admin->social_twitter }}"><i class="fab fa-twitter"></i></a></li>
                                @endif

                                @if(!empty($admin->social_linkedin))
                                    <li><a  href="{{  $admin->social_linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                                @endif

                                @if(!empty($admin->social_instagram))
                                    <li><a  href="{{  $admin->social_instagram }}"><i class="fab fa-instagram"></i></a></li>
                                @endif

                                @if(!empty($admin->social_website))
                                    <li><a  href="{{  $admin->social_website }}"><i class="fas fa-globe"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="team-caption">
                            <h3><a  href="{{ route('instructor',['admin'=>$admin->id]) }}">{{ $admin->user->name.' '.$admin->user->last_name }}</a></h3>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team Ara End -->


@endsection
