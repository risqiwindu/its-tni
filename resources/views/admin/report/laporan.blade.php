@extends('layouts.admin')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>__('default.dashboard'),
            '#'=>'Laporan'
        ]])
@endsection

@section('search-form')
    <form class="form-inline mr-auto" method="get" action="{{ adminUrl(array('controller'=>'report','action'=>'index')) }}">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input value="{{ request()->get('filter') }}"   name="filter" class="form-control" type="search" placeholder="{{ __lang('search') }}" aria-label="{{ __lang('search') }}" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
@endsection
@section('content')
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th rowspan="3">No</th>
                <th rowspan="3">Nama Siswa</th>
                <th rowspan="3">NIP / NRP</th>
                <th rowspan="3">Ujian</th>
        
                @php
                    // Hitung jumlah kolom 'count_' untuk menentukan jumlah materi
                    $materiCount = 0;
                    foreach ($result[0] as $key => $value) {
                        if (str_contains($key, 'count_')) {
                            $materiCount++;
                        }
                    }
                @endphp
        
                <th colspan="{{ $materiCount * 5 }}" class="text-center">Materi</th> <!-- Mengubah kolom menjadi *4 untuk menambahkan detail ekspresi -->
                <th rowspan="3">Kesimpulan</th>
                <th rowspan="3">Grafik</th>
            </tr>
            <tr>
                @foreach ($result[0] as $key => $value)
                    @if (str_contains($key, 'count_'))
                        <th colspan="5" class="text-center">{{ str_replace('count_', '', $key) }}</th> <!-- Mengubah colspan menjadi 4 -->
                    @endif
                @endforeach
            </tr>
            <tr>
                @foreach ($result[0] as $key => $value)
                    @if (str_contains($key, 'count_'))
                        <th>Status</th>
                        <th>Total Akses</th>
                        <th>Tanggal Akses</th>
                        <th>Lama Akses</th>
                        <th>Detail Ekspresi</th> <!-- Menambahkan kolom Detail Ekspresi -->
                    @endif
                @endforeach
            </tr>
        </thead>
        
        
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($result as $row)
            @php
                $ngantuk = 0;
            @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama_siswa }}</td>
                    <td>{{ $row->NIP }}</td>
                    <td>{{ $row->Ujian ?? '0' }}</td>
        
                    @foreach ($row as $key => $value)
                        @if (str_contains($key, 'count_'))
                            <td>
                                @if ($value > 0)
                                    <span style="color: green;">
                                        <i class="fa fa-check"></i>
                                    </span>
                                @else
                                    <span style="color: red;">
                                        <i class="fa fa-window-close"></i>
                                    </span>
                                @endif
                            </td>
        
                            <td>{{ $value }}</td>
        
                            @php
                                $tanggalKey = str_replace('count_', 'tanggal_', $key);
                                $tanggalAkses = $row->$tanggalKey ?? '-';
                            @endphp
                            <td>{{ $tanggalAkses }}</td>
        
                            @php
                                $lamaKey = str_replace('count_', 'lama_', $key);
                                $lamaAkses = $row->$lamaKey ?? '-';
                            @endphp
                            <td>{{ $lamaAkses . ' Menit' }}</td>
        
                            @php
                                $emotionKey = str_replace('count_', 'emotion_', $key);
                                $emotionData = $row->$emotionKey ?? 'Data Ekspresi Kosong';
                            @endphp
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal" 
                                        data-emotion="{{ $emotionData }}">
                                    Lihat
                                </button>
                            </td>
        
                            @php
                            // Retrieve emotion data and decode into an array
                            $emotionArray = json_decode($row->$emotionKey, true) ?? [];
                            
                            // Debugging: Check the emotion data
                            if (empty($emotionArray)) {
                                echo "<script>console.log('Emotion data is empty or not valid for student ID: {$row->id}');</script>";

                            }
        
                            // Initialize variables to store yawning and sleepy data
                            $yawning = 0;
                            $sleepy = 0;
        
                            // Find yawning and sleepy data
                            foreach ($emotionArray as $emotion) {
                                if ($emotion[0] === "yawning") {
                                    $yawning = (float) rtrim($emotion[1], '%'); // Convert yawning percentage to float
                                }
                                if ($emotion[0] === "sleepy") {
                                    $sleepy = (float) rtrim($emotion[1], '%'); // Convert sleepy percentage to float
                                }
                            }
        
                            // Debugging: Log yawning and sleepy values
                            echo "<script>console.log('Yawning: $yawning, Sleepy: $sleepy for student ID: {$row->id}');</script>";
        
                            // Sum yawning and sleepy percentages
                            $total = $sleepy + $yawning  ;
                            $ngantuk = $ngantuk + $total;
                            @endphp
                        @endif
                    @endforeach
                    @if ($ngantuk > 0)
                    <td>Mengantuk :{{ number_format($ngantuk, 2) }}%</td> <!-- Format to 2 decimal places -->
                    @else
                    <td>Tidak Mengantuk</td> <!-- Format to 2 decimal places -->
                    @endif
                    <td>
                        <button type="button" id="triggerModal" class="btn btn-primary" 
                                data-course-id="{{ $course }}" 
                                data-student-id="{{ $row->id }}" 
                                data-toggle="modal" 
                                data-target="#lectureModal">
                            Lihat Grafik
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
        
        
    </table>
</div>

@endsection

@section('footer')
<!-- Bootstrap Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Ekspresi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul id="emotionDetailList">
                    <!-- List of emotions will be inserted here -->
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener to populate the modal with the emotion data as a list
    $('#detailModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var emotionData = button.data('emotion'); // Extract info from data-* attributes

        // Clear the previous list
        var emotionDetailList = $('#emotionDetailList');
        emotionDetailList.empty();

        // Check if emotionData is a string, array, or object
        console.log(emotionData); // Debugging: Check the type and structure of the data
        
        var emotionsArray = [];

        // If it's a string, split it (assuming comma-separated)
        if (typeof emotionData === 'string') {
            emotionsArray = emotionData.split(',').map(emotion => emotion.trim());
        }
        // If it's already an array
        else if (Array.isArray(emotionData)) {
            emotionsArray = emotionData;
        }
        // If it's an object, extract values
        else if (typeof emotionData === 'object') {
            emotionsArray = Object.values(emotionData);
        }

        // Populate the list with emotion data
        emotionsArray.forEach(function (emotion) {
            emotionDetailList.append('<li>' + emotion + '</li>');
        });
    });
</script>


<div class="modal fade" id="lectureModal" tabindex="-1" role="dialog" aria-labelledby="lectureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lectureModalLabel">Grafik Ekspresi :</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <canvas id="emotionChart" width="400" height="200"></canvas> <!-- Elemen canvas untuk grafik -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let emotionChart;
$(document).ready(function(){
    // Ketika modal dibuka, lakukan AJAX request
    $('#lectureModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);  // Tombol yang memicu modal
        var course_id = button.data('course-id');  // Ambil data course_id dari tombol
        var student_id = button.data('student-id');  // Ambil data student_id dari tombol

        $('#lectureCountList').html('<tr><td colspan="3">Memuat data...</td></tr>');
        // Kosongkan grafik jika ada
        if (emotionChart) {
            emotionChart.destroy(); // Hancurkan grafik sebelumnya
        }
        // Panggil Ajax untuk mendapatkan data lecture_id dari route
        $.ajax({
            url: "{{ route('admin.report.kesimpulan') }}",  // Route yang akan di-trigger
            type: 'GET',
            data: {
                course_id: course_id,
                student_id: student_id
            },
            success: function(data) {
                // Buat tabel dari hasil query
                let list = '';
                let labels = [];
                let emotions = {}; // Objek untuk menyimpan data emosi

                if (data.length > 0) {
                    $.each(data, function(index, value) {
                        list += '<tr><td>' + value.lecture_id + '</td><td>' + value.title + '</td><td>' + value.emotion + '</td></tr>';

                        // Parse data emosi
                        let emotionData = JSON.parse(value.emotion);
                        labels.push(value.title); // Menyimpan judul materi sebagai label

                        // Tambahkan emosi ke objek
                        $.each(emotionData, function(i, e) {
                            let emotionName = e[0];
                            let percentage = parseFloat(e[1]);
                            if (!emotions[emotionName]) {
                                emotions[emotionName] = [];
                            }
                            emotions[emotionName].push(percentage); // Menyimpan persentase
                        });
                    });
                } else {
                    list = '<tr><td colspan="3">Data tidak ditemukan.</td></tr>';
                }
                // Tampilkan hasil ke dalam tbody tabel di modal
                $('#lectureCountList').html(list);

                // Buat grafik
                createChart(labels, emotions);
            },
            error: function() {
                $('#lectureCountList').html('<tr><td colspan="3">Terjadi kesalahan saat mengambil data.</td></tr>');
            }
        });
    });
});

// Fungsi untuk membuat grafik
function createChart(labels, emotions) {
    const ctx = document.getElementById('emotionChart').getContext('2d');
    const datasets = [];

    // Buat dataset untuk setiap emosi
    for (const emotion in emotions) {
        datasets.push({
            label: emotion,
            data: emotions[emotion],
            fill: false,
            borderColor: getRandomColor(), // Warna acak untuk setiap emosi
            tension: 0.1
        });
    }

    // Buat grafik
    emotionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Persentase'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Materi'
                    }
                }
            }
        }
    });
}

// Fungsi untuk mendapatkan warna acak
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

