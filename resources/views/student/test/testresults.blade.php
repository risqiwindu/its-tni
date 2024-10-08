@extends('layouts.student')
@section('pageTitle',$pageTitle)
@section('innerTitle',$pageTitle)
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('student.dashboard')=>__lang('dashboard'),
            route('student.test.index')=>__lang('tests'),
            '#'=> __lang('test-results')
        ]])
@endsection

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>{{ __lang('taken-on') }}</th>
            <th>Nilai</th>
            <th>Index</th>
            {{-- <th>{{ __lang('Grade') }}</th>
            <th>{{ __lang('Status') }}</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($rowset as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ showDate('d/M/Y',$row->created_at) }}</td>
                <td>{{ round($row->score) }}</td>
                {{-- <td>{{ $gradeTable->getGrade($row->score) }}</td>
                <td>@if($row->score >= $test->passmark)
                <span style="color: green">{{ __lang('Passed') }}</span>
                @else
                        <span style="color: red">{{ __lang('Failed') }}</span>
                    @endif
                </td> --}}
                @php
                if ($row->score >= 90 && $row->score <= 100) {
                    $index = 'A';
                }elseif($row->score >= 85 && $row->score < 90) {
                    $index = 'A-';
                }elseif ($row->score >= 80 && $row->score < 85) {
                    $index = 'B+';
                }elseif ($row->score >= 75 && $row->score < 80) {
                    $index = 'B';
                }elseif ($row->score >= 70 && $row->score < 75) {
                    $index = 'B-';
                }elseif ($row->score >= 65 && $row->score < 70) {
                    $index = 'C+';
                }elseif ($row->score >= 60 && $row->score < 65) {
                    $index = 'C';
                }elseif ($row->score >= 55 && $row->score < 60) {
                    $index = 'D';
                }else {
                    $index = 'E';
                }
            @endphp
                <td>{{ $index }}</td>

            </tr>

            @endforeach
    </tbody>


</table>

{!! $rowset->links() !!}
@endsection
