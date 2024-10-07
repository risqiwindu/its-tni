@extends('layouts.student')
@section('pageTitle',$pageTitle)
@section('innerTitle',$pageTitle)
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.test.index')=>__lang('tests'),
            '#'=>$pageTitle
        ]])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7 offset-3">
            <div class="card">

                <div class="card-body">
                    <div class="container">
                        @php  if($testRow->show_result==1): @endphp
                        <div class="row">
                            <div class="col-md-4 col-md-offset-3">
                                <h4>{{  __lang('your-score')  }}</h4>
                                <h1>{{  $row->score  }}</h1>
                            </div>
                            <div class="col-md-4">
                                <h4>Index Nilai</h4>
                                @php
                                    if ($row->score >= 80 && $row->score <= 100) {
                                        $index = 'A';
                                    }elseif($row->score >= 68 && $row->score <= 79) {
                                        $index = 'B';
                                    }elseif ($row->score >= 56 && $row->score <= 67) {
                                        $index = 'C';
                                    }elseif ($row->score >= 45 && $row->score <= 55) {
                                        $index = 'D';
                                    }else {
                                        $index = 'E';
                                    }
                                @endphp
                                <h1>{{  $index  }}</h1>
                            </div>
                        </div>

                        {{-- <div id="testresult" class="row" style="text-align: center; margin-top: 30px">

                            @php  if($row->score >= $testRow->passmark ):  @endphp
                            <h1 style="color:green">{{  __lang('you-passed-test')  }}</h1>
                            @php  else:  @endphp
                            <h1 style="color:red">{{  __lang('you-failed-test')  }}</h1>
                            @php  endif;  @endphp

                        </div> --}}
                        @php  else:  @endphp
                        <div class="row">
                            <h4>{{  __lang('you-completed-test')  }}</h4>
                        </div>

                        @php  endif;  @endphp

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
