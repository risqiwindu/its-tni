<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Nilai Sikap</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Laporan Nilai Sikap Siswa</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP/NRP</th>
                <th>Kreatif</th>
                <th>Kerjasama</th>
                <th>Tanggung Jawab</th>
                <th>Keaktifan</th>
                <th>Toleran</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $i => $siswa)
                @php
                    $nilai = $nilai_sikap->firstWhere('student_id', $siswa->id);
                @endphp
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->nip }}</td>
                    @if ($nilai)
                        <td>{{ $nilai->nilai_kreatif }}</td>
                        <td>{{ $nilai->nilai_kerjasama }}</td>
                        <td>{{ $nilai->nilai_tanggung_jawab }}</td>
                        <td>{{ $nilai->nilai_keaktifan }}</td>
                        <td>{{ $nilai->nilai_toleran }}</td>
                        <td>{{ number_format($nilai->nilai_akhir, 2, ',', '.') }}</td>
                    @else
                        <td colspan="6">Belum dinilai</td>
                        <td>-</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
