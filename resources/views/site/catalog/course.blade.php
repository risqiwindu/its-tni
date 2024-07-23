@extends('layouts.student')
@section('Detail Kelas',$course->name)
@section('Detail Kelas',$course->name)
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>'Dashboard',
            route('courses')=>'Kelas',
            '#'=>'Detail Kelas'
        ]])
@endsection

@section('content')



    <section class="about-area them-2 pb-130 pt-50 recent-area">
        <div class="container">

            <div class="row">
                <div class="col-md-4 mb-2">
                    @if(!empty($row->picture))
                        <img class="rounded img-fluid img-thumbnail" src="{{  resizeImage($row->picture,400,300,url('/')) }}" >
                    @else
                        <img class="rounded img-fluid img-thumbnail"  src="{{ asset('img/course.png') }}" >
                    @endif
                </div>
                <div class="col-md-8">

                    <h3>{{ $course->name }}</h3>
                    <p>
                        {!! clean($row->short_description) !!}
                    </p>

                </div>

            </div>


            <div class="row mt-5">
                <div class="col-md-8">
                    <ul class="nav nav-pills mb-2" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-info-circle"></i> {{  __lang('details')  }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-table"></i> Materi</a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="card">
                                <div class="card-body">
                                    {!! $row->description !!}
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">

                            @php  $sessionVenue= $row->venue;  @endphp

                            @foreach($rowset as $row2)

                                <div class="card mb-3">
                                    <div class="card-header">
                                        <div class="row" style="width: 100%;">
                                            <div class="col-md-7"><h4>{{  $row2->name }}</h4></div>
                                            <div class="col-md-5">
                                                @if(!empty($row2->lesson_date))
                                                    <div class="card-header-action text-right">
                                                        {{  __lang('starts')  }} {{  showDate('d/M/Y',$row2->lesson_date) }}
                                                    </div>

                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @php  if(!empty($row2->picture)):  @endphp
                                            <div class="col-md-3">
                                                <a href="#" >
                                                    <img class="img-fluid  rounded" src="{{  resizeImage($row2->picture,300,300,url('/')) }}" >
                                                </a>
                                            </div>
                                            @php  endif;  @endphp

                                            <div class="col-md-{{  (empty($row2->picture)? '12':'9')  }}">
                                                <article class="readmore" >{!! $row2->description !!}  </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach


                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            @foreach($instructors as $instructor)
                                <div class="card author-box card-primary">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 text-center">

                                                    <img alt="image" src="{{ profilePictureUrl($instructor->user_picture) }}" class="rounded-circle img-fluid author-box-picture">


                                            </div>
                                            <div class="col-md-7">
                                                <div class="author-box-details_">
                                                    <div class="author-box-name">
                                                        <a href="#">{{  $instructor->name.' '.$instructor->last_name  }}</a>
                                                    </div>
                                                    <div class="author-box-job">{{ \App\Admin::find($instructor->admin_id)->adminRole->name }}</div>
                                                    <div class="author-box-description">
                                                        <p>{!! clean($instructor->about) !!}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($course->has('certificates'))
                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __lang('certificate') }}</th>
                                        <th>{{ __lang('price') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($course->certificates()->where('enabled',1)->get() as $certificate )
                                        <tr>
                                            <td>{{ $certificate->name }}</td>
                                            <td>{{ price($certificate->price) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <form action="{{ route('student.student.pilihKelas') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $row->id }}" id="id" name="id">
                        <button class="btn btn-primary btn-block btn-lg" type="submit">Pilih Kelas</button>
                        {{-- <a class="btn btn-primary btn-block btn-lg" href="{{  route('cart.add',['course'=>$course->id])  }}"><i class="fa fa-plus"></i> Pilih Kelas</a> --}}
                    </form>

                    
                </div>

            </div>



        </div>

    </section>







@endsection


@section('footer')
    <script type="text/javascript" src="{{ asset('client/vendor/readmore/readmore.min.js') }}"></script>
    <script>
        $(function(){
            $('article.readmore').readmore({
                collapsedHeight : 90
            });
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            console.log('clicked');
            $('#timetable article.readmore').readmore({
                collapsedHeight : 90
            });
        });
    </script>
@endsection

@section('header')
    <style>
        #course-specs tr:first-child > td{
            border-top: none
        }
    </style>
@endsection
