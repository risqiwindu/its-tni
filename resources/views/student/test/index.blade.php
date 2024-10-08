@extends('layouts.student')
@section('pageTitle',$pageTitle)
@section('innerTitle',$pageTitle)
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>'Dashboard',
            '#'=>$pageTitle
        ]])
@endsection

@section('content')



<!--breadcrumb-section ends-->
<!--container starts-->
<div class="card"   >
    <!--primary starts-->

    <div class="card-body">

        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>

                <th>Kuis/Ujian</th>
                <th>Pertanyaan</th>
                <th>Waktu Pengerjaan (Menit)</th>
                {{-- <th colspan="2">Grade</th> --}}
                <th  >{{  __lang('Actions')  }}</th>
            </tr>
            </thead>
            <tbody>
            @php  foreach($paginator as $row):  @endphp
                <tr>
                    <td>{{  $row->name }}</td>
                    <td>{{  $questionTable->getTotalQuestions($row->test_id) }}</td>
                    <td>{{  empty($row->minutes)?__lang('Unlimited'):$row->minutes }}</td>
                    {{-- <td>
                        <li>
                            90 <= Nilai <= 100 (A)
                        </li>
                    </td> --}}
                    <td >
                    @php  if(!$studentTest->hasTest($row->test_id,$id) || !empty($row->allow_multiple)):  @endphp
                        <a href="{{  route('student.test.taketest',array('id'=>$row->test_id)) }}" class="btn btn-primary " ><i class="fa fa-play"></i> {{  __lang('Take Test')  }}</a>
                    @php  endif;  @endphp

                        @php  if($studentTest->hasTest($row->test_id,$id) && $row->show_result==1):  @endphp
                            <a href="{{  route('student.test.testresults',array( 'id'=>$row->test_id)) }}" class="btn btn-success " ><i class="fa fa-list-ul"></i> {{  __lang('Your Results')  }}</a>
                        @php  endif;  @endphp

                    </td>

                </tr>
            @php  endforeach;  @endphp

            </tbody>
        </table>
</div>
        @php
        // add at the end of the file after the table
        echo paginationControl(
        // the paginator object
            $paginator,
            // the scrolling style
            'sliding',
            // the partial to use to render the control
            null,
            // the route to link to when a user clicks a control link
            route('student.test.index')
        );
         @endphp
    </div>


</div>

<!--container ends-->

@endsection
