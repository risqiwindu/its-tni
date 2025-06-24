@extends('layouts.admin')
@section('innerTitle','Detail Nilai Akhir')
@section('page-title','')
@section('breadcrumb')
    @include('admin.partials.crumb',[
    'crumbs'=>[
            route('admin.dashboard')=>'Dashboard',
            route('admin.report.detail_kelas')=>'Laporan',
            route('admin.report.rekap')=>'Laporan Keseluruhan Sistem',
            '#' => 'Detail Nilai Akhir'
        ]])
@endsection

@section('content')
<div class="header">
    <div class="kop">
        <strong>MARKAS BESAR TNI ANGKATAN DARAT<br>SEKOLAH STAF DAN KOMANDO</strong>
        <hr class="kop-line">
    </div>

    <h3 class="text-center">LAPORAN HASIL BELAJAR PERWIRA SISWA<br>PENDIDIKAN REGULER LXV SESKOAD TA 2025</h3>
</div>
<br>
            <table class="info-table">
                <tr><td>Nama</td><td> : <strong>{{ $student->student_name }}</strong></td></tr>
                <tr><td>NIP / NRP</td><td> : {{ $student->nrp }}</td></tr>
                <tr><td>Tipe Gaya Belajar</td><td> : {{ $student->gaya_belajar }}</td></tr>
            </table>
            <br>
            @php
                    $huruf = '';
                    $angka = 0;
                    $kategori = '';
        
                    $rata_tugas = $data_tugas->rata_rata ?? 0;
                    $rata_ujian = $data_ujian2->rata_rata ?? 0;
                    $sikap = $nilai_sikap->firstWhere('student_id', $student->id);
                    $sikap_akhir = $nilai_sikap_siswa->nilai_akhir ?? 0;
        
                    $nilai_akhir_tugas = $data_tugas->bobot_15_persen ?? 0;
                    $nilai_akhir_ujian = $data_ujian2->bobot_80_persen ?? 0;
                    $nilai_akhir_sikap = $sikap_akhir * 0.05;
        
                    $total_akhir = $nilai_akhir_tugas + $nilai_akhir_ujian + $nilai_akhir_sikap;
                    
                    if ($total_akhir >= 90 && $total_akhir <= 100) {
                        $huruf = 'A';
                        $angka = 4.0;
                        $kategori = 'Istimewa';
                    } elseif ($total_akhir >= 85) {
                        $huruf = 'A-';
                        $angka = 3.7;
                        $kategori = 'Cukup Istimewa';
                    } elseif ($total_akhir >= 80) {
                        $huruf = 'B+';
                        $angka = 3.4;
                        $kategori = 'Sangat Baik';
                    } elseif ($total_akhir >= 75) {
                        $huruf = 'B';
                        $angka = 3.0;
                        $kategori = 'Baik';
                    } elseif ($total_akhir >= 70) {
                        $huruf = 'B-';
                        $angka = 2.7;
                        $kategori = 'Cukup Baik';
                    } elseif ($total_akhir >= 65) {
                        $huruf = 'C+';
                        $angka = 2.4;
                        $kategori = 'Sangat Cukup';
                    } elseif ($total_akhir >= 60) {
                        $huruf = 'C';
                        $angka = 2.0;
                        $kategori = 'Cukup';
                    } elseif ($total_akhir >= 55) {
                        $huruf = 'D';
                        $angka = 1.0;
                        $kategori = 'Kurang';
                    } else {
                        $huruf = 'E';
                        $angka = 0.0;
                        $kategori = 'Gagal';
                    }

                    function konversiNilaiSikap($nilai) {
                        return match($nilai) {
                        1 => 'Tidak Baik',
                        2 => 'Kurang Baik',
                        3 => 'Cukup',
                        4 => 'Baik',
                        5 => 'Baik Sekali',
                        default => 'Tidak Diketahui',
                    };
}
                @endphp
            <h4>Tipe Gaya Belajar</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tipe Gaya Belajar</th>
                            <th>Audio (%)</th>
                            <th>Visual (%)</th>
                            <th>Kinestetik (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $student->gaya_belajar }}</td>
                            <td>{{ $student->audio }}%</td>
                            <td>{{ $student->visual }}%</td>
                            <td>{{ $student->kinestetik }}%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <h4>Nilai Sikap</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nilai Kreatif</th>
                            <th>Nilai Tanggung Jawab</th>
                            <th>Nilai Kerjasama</th>
                            <th>Nilai Keaktifan</th>
                            <th>Nilai Toleran</th>
                            <th>Nilai Akhir</th>
                            <th>Nilai Persentase Akhir (5%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sikap)
                        <tr>
                            <td>{{ konversiNilaiSikap($sikap->kreatif) }}</td>
                            <td>{{ konversiNilaiSikap($sikap->tanggung_jawab) }}</td>
                            <td>{{ konversiNilaiSikap($sikap->kerjasama) }}</td>
                            <td>{{ konversiNilaiSikap($sikap->keaktifan) }}</td>
                            <td>{{ konversiNilaiSikap($sikap->toleran) }}</td>
                            <td>{{ $sikap->sikap_akhir }}</td>
                            <td>{{ $nilai_akhir_sikap }}</td>
                        </tr>
                        @else
                        <tr>
                            <td colspan="7" class="text-center">
                                <strong>Nilai Belum Diisi</strong>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <br>
            <h4>Nilai Tugas</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nilai Akhir</th>
                            <th>Nilai Persentase Akhir (15%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $rata_tugas ?? 0}}</td>
                            <td>{{ number_format($nilai_akhir_tugas ?? 0, 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <h4>Nilai Ujian</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nilai Akhir</th>
                            <th>Nilai Persentase Akhir (80%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $rata_ujian ?? 0}}</td>
                            <td>{{ number_format($nilai_akhir_ujian ?? 0, 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4>Nilai Akhir</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Total Nilai (Nilai Persentase Akhir Sikap + Nilai Persentase Akhir Tugas + Nilai Persentase Akhir Ujian)</th>
                            <th>Indeks Nilai</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>{{ number_format($total_akhir, 2, ',', '.') }}</td>
                           <td>{{ $huruf }}</td>
                           <td>{{ $kategori }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
</div>
@endsection