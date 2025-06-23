<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Deskripsi Nilai Sikap</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
    
        h3, h4 {
            text-align: center;
            margin: 5px 0;
        }
    
        p, li {
            text-align: justify;
            margin: 4px 0;
        }
    
        .header {
            margin-bottom: 20px;
        }
    
        .kop {
            text-align: center;
            display: inline-block;
        }

        .kop-text {
            display: inline-block;
            font-weight: bold;
        }

        .kop-line {
            border-top: 1px solid black;
            width: fit-content;
            display: block;
            margin-top: 4px;
            }

    
        .section-title {
            font-weight: bold;
            margin-top: 10px;
        }
    
        .info-table td {
            padding: 4px 8px;
        }
    
        .ttd {
            margin-top: 30px;
            text-align: right;
            line-height: 1.6;
        }

        .observasi-box {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 12px;
            border-radius: 4px;
        }

        .sosiometri {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 12px;
            border-radius: 4px;
        }

        .simpulan {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 12px;
            border-radius: 4px;
        }

    </style>
    
    
</head>
<body>
    <div class="header">
        <div class="kop">
            <strong>MARKAS BESAR TNI ANGKATAN DARAT<br>SEKOLAH STAF DAN KOMANDO</strong>
            <hr class="kop-line">
        </div>
    
        <h3>DESKRIPSI NILAI SIKAP DAN PERILAKU<br>PENDIDIKAN REGULER LXV SESKOAD TA 2025</h3>
    </div>
    

    <table class="info-table">
        <tr><td>Nama</td><td>: {{ $siswa->name }}</td></tr>
        <tr><td>Pangkat/Korps/NRP</td><td>: {{ $siswa->rank ?? 'Mayor Inf' }}</td></tr>
        <tr><td>NIP</td><td>: {{ $siswa->email ?? '65108' }}</td></tr>
    </table>

    <p class="section-title">A. HASIL OBSERVASI.</p>
    <div class="observasi-box">
    <p>
        Tingkat kepercayaan dan kejujuran individu serta konsistensi bertindak Mayor Inf {{ $siswa->name }} sudah <strong>{{ $konversi['akhir'] }}</strong> sesuai dengan nilai-nilai moral dan etika yang seharusnya, agar terus dipelihara dan ditingkatkan di masa mendatang.
    </p>
    <p>
        Rasa tanggung jawab, inisiatif, semangat, keuletan dan etos kerja serta kemampuan menyelesaikan tugas Mayor Inf {{ $siswa->name }} sudah <strong>{{ $konversi['akhir'] }}</strong> dan masih berpotensi untuk bisa ditingkatkan menjadi lebih optimal.
    </p>
    <p>
        Keterampilan mendengarkan, berkomunikasi efektif serta penguasaan diri sudah <strong>{{ $konversi['kerjasama'] }}</strong>. Kemampuan kepemimpinan dan pengambilan keputusan pun tergolong <strong>{{ $konversi['tanggung_jawab'] }}</strong> dan dapat ditingkatkan.
    </p>
    <p>
        Mayor Inf {{ $siswa->name }} juga menunjukkan semangat kerjasama dan toleransi yang <strong>{{ $konversi['toleran'] }}</strong> serta kreatifitas yang <strong>{{ $konversi['kreatif'] }}</strong>.
    </p>
    </div>
    <p class="section-title">B. HASIL SOSIOMETRI.</p>
    <div class="sosiometri">
    <p>
        Mayor Inf {{ $siswa->name }} mampu mengintegrasikan peran sosial dalam kelompok belajar dan menunjukkan penerimaan sosial yang <strong>{{ $konversi['keaktifan'] }}</strong> dari rekan-rekannya.
    </p>
    </div>
    <p class="section-title">C. SIMPULAN SIKAP DAN PERILAKU.</p>
    <div class="simpulan">
    <p>
        Mayor Inf {{ $siswa->name }} memiliki Sikap dan Perilaku dengan predikat yang <strong>{{ $konversi['akhir'] }}</strong>. Jika sikap dan perilaku ini bisa terus dikembangkan secara konsisten, maka yang bersangkutan akan mampu menjalankan peran dengan baik sebagai pemimpin masa depan.
    </p>
    </div>
    <div class="ttd">
        Bandung, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        <br>
        a.n. Komandan SESKOAD<br>
        Wakil Komandan,<br><br><br><br>
        <strong>Brigjen TNI A. Sujadidin, S.H.</strong><br>
        Brigadir Jenderal TNI
    </div>
</body>
</html>
