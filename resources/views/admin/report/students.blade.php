@extends('admin.report.report')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            route('admin.report.index')=>__lang('reports'),
            '#'=>__lang('students')
        ]])
@endsection


@section('content')
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active"  href="#home" aria-controls="home" role="tab" data-toggle="tab">Laporan</a></li>
            <li class="nav-item"><a class="nav-link"  href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{__lang('Totals')}}</a></li>
            <li class="nav-item"><a class="nav-link"  href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Materi</a></li>
            <li class="nav-item"><a class="nav-link"  href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Kelas / Ujian</a></li>
            <li class="nav-item"><a class="nav-link"  href="#homework" aria-controls="homework" role="tab" data-toggle="tab">Tugas</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="table-responsive">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__lang('student-name')}}</th>
                        <th>Enroll Kelas</th>
                        <th>Kehadiran</th>
                        <th>Total Akses Materi</th>
                        <th>Kuis / Ujian Diikuti</th>
                        <th>Skor Kuis / Ujian Rata-Rata</th>
                        {{-- <th>{{__lang('test-grade')}}</th> --}}
                        <th>Tugas</th>
                        <th>Skor Tugas Rata-Rata</th>
                        {{-- <th>{{__lang('homework-grade')}}</th> --}}
                        {{-- <th>{{__lang('instructor-chats')}}</th>
                        <th>{{__lang('forum-topics')}}</th>
                        <th>{{__lang('forum-posts')}}</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rowset as $row)
                        @php $student = \App\Student::find($row->id)  @endphp
                        @if($student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($student->user)
                                    {{ $student->user->name.' '.$student->user->last_name }}
                                    @endif
                                </td>
                                <td>
                                    @php
                                    $enrollment = $student->studentCourses()->where('course_id',$id)->first();
                                     @endphp
                                    @if($enrollment)
                                        {{ showDate('d/M/Y',$enrollment->created_at) }}
                                    @endif
                                </td>
                                @php
                                $attendance = $student->attendances()->where('course_id',$id)->count();
                                @endphp
                                <td>{{ $attendance }}</td>
                                <td class="text-center">
                                    
                                    <button type="button" id="triggerModal" class="btn btn-primary" data-course-id="{{ $id }}" data-student-id="{{ $student }}" data-toggle="modal" data-target="#lectureModal">Lihat</button>
                                </td>

                                {{-- <td>

                                    @php
                                    echo round(($attendance/$totalSessionLessons)*100)
                                    @endphp%
                                </td> --}}
                                @php
                                $testStats = $controller->getStudentTestsStats($row->id);
                                @endphp
                                <td>
                                    {{ $testStats['testsTaken'] }}
                                </td>
                                <td>
                                    {{ $testStats['average'] }}
                                </td>
                                {{-- <td>
                                    {{ $testGradeTable->getGrade($testStats['average']) }}
                                </td> --}}
                                @php
                                $homeworkStats = $controller->getStudentAssignmentStats($row->id);
                                @endphp
                                <td>
                                    {{ $homeworkStats['submissions'] }}
                                </td>
                                <td>
                                    {{ $homeworkStats['average'] }}
                                </td>
                                {{-- <td>
                                    {{ $testGradeTable->getGrade($homeworkStats['average']) }}
                                </td> --}}

                                {{-- <td>
                                    {{ $student->discussions()->where('course_id',$id)->count() }}
                                </td>
                                <td>
                                    {{ $student->user->forumTopics()->where('course_id',$id)->whereHas('user',function ($q){
                                            $q->where('role_id',2);
                                    })->count() }}
                                </td>
                                <td>
                                    {{ $controller->getStudentTotalPosts($row->id) }}
                                </td> --}}


                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <table class="table table-striped">
                    <tr>
                        <td style="width: 30%">{{__lang('enrolled-students')}}:</td>
                        <td>{{ $session->studentCourses()->count() }}</td>
                    </tr>
                    <tr>
                        <td>Total Materi:</td>
                        <td>{{ $session->lessons()->count() }}</td>
                    </tr>
                    <tr>
                        <td>{{__lang('total-students-attended')}}:</td>
                        <td>{{ $attendanceTable->getTotalStudentsForSession($id) }}</td>
                    </tr>
                    <tr>
                        <td>Kuis / Ujian Total:</td>
                        <td>{{ count($allTests) }}</td>
                    </tr>
                    <tr>
                        <td>Tugas Total:</td>
                        <td>{{ $session->assignments()->count() }}</td>
                    </tr>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__lang('class')}}</th>
                        @if($session->type=='c')
                            <th>{{__lang('lectures')}}</th>
                        @endif
                        <th>{{__lang('students-completed')}}</th>
                        <th>{{__lang('completion-percentage')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($session->lessons()->orderBy('pivot_sort_order')->orderBy('pivot_lesson_date')->get() as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            @if($session->type=='c')
                                <td>{{ $row->lectures()->count() }}</td>
                            @endif
                            @php
                            $totalAttended = $attendanceTable->getTotalStudentsForSessionAndLesson($session->id,$row->id);
                             @endphp
                            <td>{{ $totalAttended }}</td>
                            @php
                            $total = $session->studentCourses()->count();
                            if(empty($total)){
                            $total=1;
                            }
                             @endphp
                            <td>{{ ($totalAttended/$total)*100 }}%</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>



            </div>
            <div role="tabpanel" class="tab-pane" id="settings">

                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th>{{__lang('test')}}</th>
                        <th>{{__lang('questions')}}</th>
                        <th>{{__lang('passmark')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach($allTests as $testId)
                                @php $test = \App\Test::find($testId);  @endphp
                                    @if($test)
                                        <tr>
                                            <td>{{ $test->name }}</td>
                                            <td>{{ $test->testQuestions()->count() }}</td>
                                            <td>{{ $test->passmark }}%</td>
                                        </tr>
                                    @endif
                                @endforeach
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="homework">


                <table class="table table-striped datatable">
                    <thead>
                    <tr>
                        <th>{{__lang('homework')}}</th>
                        <th>{{__lang('created-on')}}</th>
                        <th>{{__lang('due-date')}}</th>
                        <th>{{__lang('created-by')}}</th>
                        <th>{{__lang('passmark')}}</th>
                        <th>{{__lang('submissions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($session->assignments as $assignment)

                            <tr>
                                <td>{{ $assignment->title }}</td>
                                <td>{{ showDate('d/M/Y',$assignment->created_at) }}</td>
                                <td>{{ showDate('d/M/Y',$assignment->due_date) }}</td>
                                <td>{{ $assignment->admin->user->name }} {{ $assignment->admin->user->last_name }}</td>
                                <td>{{ $assignment->passmark }}%</td>
                                <td>{{ $assignment->assignmentSubmissions()->count() }}</td>
                            </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    
@endsection

@section('footer')
<div class="modal fade" id="lectureModal" tabindex="-1" role="dialog" aria-labelledby="lectureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lectureModalLabel">Total Akses Materi :</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Lecture ID</th>
                        <th>Materi</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="lectureCountList">
                    <!-- Hasil query akan ditampilkan di sini -->
                </tbody>
            </table>

          {{-- <!-- List yang akan diisi dengan hasil query -->
          <ul id="lectureCountList">
            <!-- Hasil query akan ditampilkan di sini -->
          </ul> --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Ketika tombol untuk membuka modal di-click
    $(document).ready(function(){
        $('#triggerModal').click(function(){
            // Ambil parameter dari tombol (data-course-id dan data-student-id)
            var course_id = $(this).data('course-id');
            var student_id = $(this).data('student-id');
    
            // Panggil Ajax untuk mendapatkan data lecture_id dari route
            $.ajax({
                url: "{{ route('admin.report.students_count') }}",  // Route yang akan di-trigger
                type: 'GET',
                data: {
                    course_id: course_id,
                    student_id: student_id
                },
                success: function(data) {
                    // Buat list dari hasil query
                    let list = '';
                    $.each(data, function(index, value) {
                        list += '<tr><td>' + value.lecture_id + '</td><td>' + value.title + '</td><td>' + value.total + '</td></tr>';
                    });
                    // Tampilkan hasil ke dalam elemen ul di modal
                    $('#lectureCountList').html(list);
                },
                error: function() {
                    $('#lectureCountList').html('<tr><td colspan="2">Terjadi kesalahan saat mengambil data.</td></tr>');
                }
            });
        });
    });
    </script>

@endsection
