<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lib\HelperTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class SikapController extends Controller
{
    use HelperTrait;
    public function index(Request $request)
    {
        $role = DB::table('admins')
                ->where('id', $this->getAdministratorID())
                ->first();
        $role_id = $role->id;
        
        $admin = DB::table('admins')
                ->where('user_id', Auth::user()->id)
                ->first();
        $admin_role = $admin->admin_role_id;

        $searchTerm = $request->input('search');
        
        $student = DB::table('student_courses')
            ->join('students', 'student_courses.student_id', '=', 'students.id')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->select(
                'students.id as id',
                'users.name as name',
                'users.email as nip'
            )
            ->when($searchTerm, function ($query, $search) {
                    return $query->where(function($q) use ($search) {
                        $q->where('users.name', 'like', "%$search%")
                        ->orWhere('users.email', 'like', "%$search%");
                    });
                })
            ->groupBy('students.id', 'users.name', 'users.email') // group untuk hindari duplikat siswa
            ->get();

        $nilai_sikap = DB::table('student_sikap')
                        ->get();
                          
        return view('admin.sikap.otomatis',compact('student','nilai_sikap','admin_role'));
    }

    public function input_sikap($id)
    {
        $student = DB::table('students')
                    ->join('users','students.user_id','=','users.id')
                    ->select(
                        'students.id as id',
                        'users.name as name',
                        'users.email as nip'
                        )
                    ->where('students.id', $id)
                    ->first();
        $nilai = DB::table('student_sikap')
                    ->where('student_id', $id)
                    ->first();
        return view('admin.sikap.input_sikap', compact('student','nilai'));
    }

    public function simpan_sikap(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'nilai_kreatif' => 'required|integer|between:1,5',
            'nilai_kerjasama' => 'required|integer|between:1,5',
            'nilai_tanggung_jawab' => 'required|integer|between:1,5',
            'nilai_keaktifan' => 'required|integer|between:1,5',
            'nilai_toleran' => 'required|integer|between:1,5',
        ]);
    
        $nilai_akhir = (
            $request->nilai_kreatif +
            $request->nilai_kerjasama +
            $request->nilai_tanggung_jawab +
            $request->nilai_keaktifan +
            $request->nilai_toleran
        ) / 25 * 100;
    
        DB::table('student_sikap')->updateOrInsert(
            ['student_id' => $request->student_id],
            [
                'nilai_kreatif' => $request->nilai_kreatif,
                'nilai_kerjasama' => $request->nilai_kerjasama,
                'nilai_tanggung_jawab' => $request->nilai_tanggung_jawab,
                'nilai_keaktifan' => $request->nilai_keaktifan,
                'nilai_toleran' => $request->nilai_toleran,
                'nilai_akhir' => round($nilai_akhir, 2),
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    
        return redirect()->route('admin.sikap.index')->with('success', 'Nilai berhasil disimpan.');
    }

    public function store_massal_sikap(Request $request)
{
    $selectedStudents = $request->input('selected_students', []);

    if (empty($selectedStudents)) {
        return redirect()->back()->with('alert', 'Tidak ada siswa yang dipilih.');
    }

    foreach ($selectedStudents as $studentId) {
        // Ambil nilai dari checkbox tiap aspek (jika dicentang bernilai 1, jika tidak NULL)
        $nilaiKreatif = isset($request->kreatif[$studentId]) ? 1 : 0;
        $nilaiKerjasama = isset($request->kerjasama[$studentId]) ? 1 : 0;
        $nilaiTanggungJawab = isset($request->tanggung_jawab[$studentId]) ? 1 : 0;
        $nilaiKeaktifan = isset($request->keaktifan[$studentId]) ? 1 : 0;
        $nilaiToleran = isset($request->toleran[$studentId]) ? 1 : 0;

        // Hitung nilai akhir
        $total = $nilaiKreatif + $nilaiKerjasama + $nilaiTanggungJawab + $nilaiKeaktifan + $nilaiToleran;
        $nilaiAkhir = ($total / 25) * 100;

        // Simpan ke database dengan Query Builder
        DB::table('student_sikap')->insert([
            'student_id' => $studentId,
            'nilai_kreatif' => $nilaiKreatif,
            'nilai_kerjasama' => $nilaiKerjasama,
            'nilai_tanggung_jawab' => $nilaiTanggungJawab,
            'nilai_keaktifan' => $nilaiKeaktifan,
            'nilai_toleran' => $nilaiToleran,
            'nilai_akhir' => $nilaiAkhir,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
}

public function mass_input(Request $request)
{
    $searchTerm = $request->input('search');

    // Ambil siswa dari student_courses → students → users
    $students = DB::table('student_courses')
        ->join('students', 'student_courses.student_id', '=', 'students.id')
        ->join('users', 'students.user_id', '=', 'users.id')
        ->select(
            'students.id as id',
            'users.name as name',
            'users.email as nip'
        )
        ->when($searchTerm, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('users.name', 'like', "%$search%")
                  ->orWhere('users.email', 'like', "%$search%");
            });
        })
        ->groupBy('students.id', 'users.name', 'users.email')
        ->get();

    // Ambil semua nilai sikap yang sudah tersimpan
    $nilai_sikap = DB::table('student_sikap')->get();

    // Tandai apakah siswa sudah memiliki nilai
    foreach ($students as $s) {
        $s->sudah_dinilai = $nilai_sikap->contains('student_id', $s->id);
    }

    return view('admin.sikap.mass_input', compact('students', 'nilai_sikap'));
}


public function mass_store(Request $request)
    {
        $data = $request->input('penilaian', []);

        foreach ($data as $nilai) {
            if (!isset($nilai['aktif'])) continue;

            if (DB::table('student_sikap')->where('student_id', $nilai['student_id'])->exists()) continue;

            $validator = Validator::make($nilai, [
                'student_id' => 'required|exists:students,id',
                'kreatif' => 'required|integer|min:1|max:5',
                'kerjasama' => 'required|integer|min:1|max:5',
                'tanggung_jawab' => 'required|integer|min:1|max:5',
                'keaktifan' => 'required|integer|min:1|max:5',
                'toleran' => 'required|integer|min:1|max:5',
            ]);

            if ($validator->fails()) continue;

            $validated = $validator->validated();

            $total = $validated['kreatif'] + $validated['kerjasama'] + $validated['tanggung_jawab'] +
            $validated['keaktifan'] + $validated['toleran'];

            $nilai_akhir = ($total / 25) * 100;


            DB::table('student_sikap')->insert([
                'student_id' => $validated['student_id'],
                'nilai_kreatif' => $validated['kreatif'],
                'nilai_kerjasama' => $validated['kerjasama'],
                'nilai_tanggung_jawab' => $validated['tanggung_jawab'],
                'nilai_keaktifan' => $validated['keaktifan'],
                'nilai_toleran' => $validated['toleran'],
                'nilai_akhir' => $nilai_akhir,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('admin.sikap.index')->with('success', 'Penilaian massal berhasil disimpan.');
    }

    public function resetAll()
    {
        DB::table('student_sikap')->delete();
        return back()->with('success', 'Semua nilai sikap berhasil direset.');
    }

    public function resetOne($studentId)
    {
        DB::table('student_sikap')->where('student_id', $studentId)->delete();
        return back()->with('success', 'Nilai sikap siswa berhasil direset.');
    }

    public function print(Request $request)
    {
        $students = DB::table('student_courses')
        ->join('students', 'student_courses.student_id', '=', 'students.id')
        ->join('users', 'students.user_id', '=', 'users.id')
        ->select(
            'students.id as id',
            'users.name as name',
            'users.email as nip'
        )
        ->groupBy('students.id', 'users.name', 'users.email')
        ->get();

    $nilai_sikap = DB::table('student_sikap')->get();

    $pdf = Pdf::loadView('admin.sikap.print', compact('students', 'nilai_sikap'));
    return $pdf->stream('laporan_nilai_sikap.pdf'); // atau ->download('laporan.pdf');
    }

    public function printPerSiswa($id)
{
    $siswa = DB::table('students')
        ->join('users', 'students.user_id', '=', 'users.id')
        ->select('students.*', 'users.name', 'users.email')
        ->where('students.id', $id)
        ->first();

    $nilai = DB::table('student_sikap')->where('student_id', $id)->first();

    if (!$nilai || !$siswa) {
        return redirect()->back()->with('alert', 'Data tidak ditemukan.');
    }

    $rata = (
        $nilai->nilai_kreatif +
        $nilai->nilai_kerjasama +
        $nilai->nilai_tanggung_jawab +
        $nilai->nilai_keaktifan +
        $nilai->nilai_toleran
    ) / 5;

    $konversi = [
        'akhir' => $this->konversiNilai($rata),
        'kreatif' => $this->konversiNilai($nilai->nilai_kreatif),
        'kerjasama' => $this->konversiNilai($nilai->nilai_kerjasama),
        'tanggung_jawab' => $this->konversiNilai($nilai->nilai_tanggung_jawab),
        'keaktifan' => $this->konversiNilai($nilai->nilai_keaktifan),
        'toleran' => $this->konversiNilai($nilai->nilai_toleran),
    ];

    $pdf = Pdf::loadView('admin.sikap.print_persiswa', [
        'siswa' => $siswa,
        'nilai' => $nilai,
        'rata' => $rata,
        'konversi' => $konversi,
    ])->setPaper('A4');

    return $pdf->stream('sikap-' . $siswa->name . '.pdf');
}

private function konversiNilai($angka)
{
    if ($angka >= 4.5) return 'Sangat Baik';
    if ($angka >= 3.5) return 'Baik';
    if ($angka >= 2.5) return 'Cukup';
    if ($angka >= 1.5) return 'Kurang';
    return 'Tidak Baik';
}


}

?>