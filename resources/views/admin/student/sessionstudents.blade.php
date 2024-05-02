@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.student.sessions')=>__lang('courses'),
            '#'=>__lang('students')
        ]])
@endsection

@section('content')
    <div >
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __lang('id') }}</th>
                        <th>{{ __lang('name') }}</th>
                        <th>{{ __lang('classes-attended') }}</th>
                        <th>{{ __lang('progress') }}</th>
                        <th>{{ __lang('enrollment-code') }}</th>
                        <th  >{{__lang('actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php foreach($paginator as $row):  @endphp
                        <tr>
                            <td><span class="label label-success">{{ $row->student_id }}</span></td>
                            <td>{{ $row->name }} {{ $row->last_name }}</td>
                            <td><strong>@php $attended= $attendanceTable->getTotalDistinctForStudentInSession($row->student_id,$id); echo $attended @endphp</strong>

                            </td>
                            <td>

                                <div class="text-center" >
                                    <small>@php
                                            $percent = 100 * @($attended/($totalLessons));
                                            if($percent >=0 ){
                                                echo $percent;
                                            }
                                            else{
                                                echo 0;
                                                $percent = 0;
                                            }

                                            @endphp%</small>

                                        <div class="progress progress_sm"  >
                                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{ $percent }}" style="width: {{ $percent }}%;" aria-valuenow="{{ $percent }}"></div>
                                        </div>

                                </div>
                            </td>
                            <td>
                                {{ $row->reg_code }}
                            </td>

                            <td >
                                <a href="{{ adminUrl(array('controller'=>'session','action'=>'stats','id'=>$row->id)) }}" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="{{ __lang('student-progress') }}"><i class="fa fa-chart-bar"></i></a>


                                <a  data-toggle="tooltip" data-placement="top" data-original-title="{{ __lang('Un-enroll') }}"  onclick="return confirm('Are you sure you want to unenroll this student ?')" href="{{ adminUrl(array('controller'=>'student','action'=>'unenroll','id'=>$row->student_id)) }}?session={{ $id }}"  class="btn btn-xs btn-primary btn-equal" ><i class="fa fa-minus"></i></a>

                                <button   data-id="{{ $row->student_id }}" data-toggle="modal" data-target="#simpleModal" title="Student Details" type="button" class="btn btn-xs btn-primary btn-equal viewbutton"  ><i class="fa fa-user"></i></button>
                                <a href="{{ adminUrl(array('controller'=>'student','action'=>'edit','id'=>$row->student_id)) }}" class="btn btn-xs btn-primary btn-equal" data-toggle="tooltip" data-placement="top" data-original-title="{{ __lang('edit-student') }}"><i class="fa fa-edit"></i></a>

                              </td>
                        </tr>
                    @php endforeach;  @endphp

                    </tbody>
                </table>

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
                    array(
                        'route' => 'admin/default',
                        'controller'=>'student',
                        'action'=>'sessionstudents',
                        'id'=>$id
                    )
                );
                @endphp
    </div><!--end .col-lg-12 -->



@endsection

@section('footer')

    <!-- START SIMPLE MODAL MARKUP -->
    <div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="simpleModalLabel">{{ __lang('student-details') }}</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body" id="info">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __lang('close') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- END SIMPLE MODAL MARKUP -->

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('{{ adminUrl(array('controller'=>'student','action'=>'view'))}}'+'/'+id);
            });
        });
    </script>
@endsection
