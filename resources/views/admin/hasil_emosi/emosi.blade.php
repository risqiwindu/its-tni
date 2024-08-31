@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            '#'=>__lang('students')
        ]])
@endsection

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

@section('content')
<div>
    <div>
        <div class="card">
            <div class="card-body">
                <!-- Tabel Data Emosi -->
                <div class="table-responsive">
                    <table id="emotionTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID Mahasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th class="text-center">Lihat Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emosi as $studentData)
                            <tr>
                                <td>{{ $studentData['student_id'] }}</td>
                                <td>{{ $studentData['name'] }}</td>
                                <td><a href="{{ route('admin.student.detail_emosi', ['student_id' => $studentData['student_id'], 'course_id' => $studentData['course_id']]) }}" class="btn btn-primary btn-block">
                                    Lihat</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--end .box-body -->
        </div><!--end .box -->
    </div><!--end .col-lg-12 -->
</div>
@endsection

@section('footer')

    <script type="text/javascript">
        $(function(){
            $('.viewbutton').click(function(){
                $('#info').text('Loading...');
                var id = $(this).attr('data-id');
                $('#info').load('{{ adminUrl(array('controller'=>'student','action'=>'view'))}}'+'/'+id);
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
