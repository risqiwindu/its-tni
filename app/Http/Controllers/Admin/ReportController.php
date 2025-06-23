<?php

namespace App\Http\Controllers\Admin;

use App\AssignmentSubmission;
use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Lib\HelperTrait;
use App\Student;
use App\StudentTest;
use App\Test;
use App\V2\Model\AttendanceTable;
use App\V2\Model\SessionCategoryTable;
use App\V2\Model\SessionLessonTable;
use App\V2\Model\SessionTable;
use App\V2\Model\StudentSessionTable;
use App\V2\Model\TestGradeTable;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Laminas\Form\Element\Select;
use Laminas\Form\Element\Text;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laminas\Db\Sql\Where;

class ReportController extends Controller
{
    use HelperTrait;

    public function index(Request $request){

        $table = new SessionTable();
        $attendanceTable = new AttendanceTable();
        $studentSessionTable = new StudentSessionTable();

        $filter = request()->get('filter');


        if (empty($filter)) {
            $filter=null;
        }

        $group = request()->get('group', null);
        if (empty($group)) {
            $group=null;
        }

        $sort = request()->get('sort', null);
        if (empty($sort)) {
            $sort=null;
        }

        $type = request()->get('type', null);
        if (empty($type)) {
            $type=null;
        }

        $text = new Text('filter');
        $text->setAttribute('class','form-control');
        $text->setAttribute('placeholder',__lang('Search'));
        $text->setValue($filter);

        $select = new Select('group');
        $select->setAttribute('class','form-control select2');
        $select->setEmptyOption('--'.__lang('Select Category').'--');

        $sortSelect = new Select('sort');
        $sortSelect->setAttribute('class','form-control');
        //$sortSelect->setAttribute('style','max-width:100px');
        $sortSelect->setValueOptions([
            'recent'=>__lang('Recently Added'),
            'asc'=>__lang('Alphabetical (Ascending)'),
            'desc'=>__lang('Alphabetical (Descending)'),
            'date'=>__lang('Start Date'),
            'priceAsc' =>__lang('Price (Lowest to Highest)'),
            'priceDesc' => __lang('Price (Highest to Lowest)')
        ]);
        $sortSelect->setEmptyOption('--'.__lang('Sort').'--');
        $sortSelect->setValue($sort);

        $typeSelect = new Select('type');
        $typeSelect->setAttribute('class','form-control');
        //$typeSelect->setAttribute('style','max-width:100px');
        $typeSelect->setValueOptions([
            's'=>__lang('Training Session'),
            'c'=>__lang('Online Course'),
            'b'=>__lang('training-online'),
        ]);
        $typeSelect->setEmptyOption('--'.__lang('Type').'--');
        $typeSelect->setValue($type);

        $groupTable = new SessionCategoryTable();
        $groupRowset = $groupTable->getLimitedRecords(1000);
        $options =[];

        foreach($groupRowset as $row){
            $options[$row->id] = $row->name;
        }
        $select->setValueOptions($options);
        $select->setValue($group);

        $role_id = Auth::user()->role_id;
        $admin = DB::table('admins')
                      ->where('user_id', Auth::user()->id)
                      ->first();
        $admin_role = $admin->admin_role_id;

        $paginator = $table->getPaginatedRecords(true,null,null,$filter,$group,$sort,$type,false,null,$role_id,$admin_role);

        $paginator->setCurrentPageNumber((int)request()->get('page', 1));
        $paginator->setItemCountPerPage(30);

        return viewModel('admin',__CLASS__,__FUNCTION__,array(
            'paginator'=>$paginator,
            'pageTitle'=>__lang('Reports'),
            'attendanceTable'=>$attendanceTable,
            'studentSessionTable'=>$studentSessionTable,
            'filter'=>$filter,
            'group'=>$group,
            'text'=>$text,
            'select'=>$select,
            'sortSelect'=>$sortSelect,
            'sort'=>$sort,
            'typeSelect'=>$typeSelect,
            'type'=>$type
        ));

    }

    public function classes(Request $request,$id){

        $session = Course::findorFail($id);

        $this->data['pageTitle']=__lang('Class Report').': '.$session->name;
        $this->data['session'] = $session;
        $this->data['attendanceTable'] = new AttendanceTable();
        $this->data['sessionLessonTable'] = new SessionLessonTable();
        $this->data['id'] = $id;
        return view('admin.report.classes',$this->data);

    }

    public function students(Request $request,$id){

        $attendanceTable = new AttendanceTable();
        $this->data['rowset'] = $attendanceTable->getStudentSessionReportRecords($id);
        $this->data['id']=$id;
        $session= Course::findOrFail($id);
        $this->data['pageTitle']=__lang('Student Report').': '.$session->name;
        $this->data['session'] = $session;
        $this->data['attendanceTable'] = $attendanceTable;

        $totalLessons = $session->lessons()->count();
        if(empty($totalLessons)){
            $totalLessons= 1;
        }
        $this->data['totalSessionLessons'] = $totalLessons;

        $this->data['allTests'] = $this->getSessionTests($id);
        $this->data['controller'] = $this;
        $this->data['testGradeTable'] = new TestGradeTable();


        return view('admin.report.students',$this->data);
    }

    public function countLecture(Request $request)
    {
        // Ambil parameter dari request
        $course_id = $request->input('course_id');
        $student_id = $request->input('student_id');

        // Query untuk menghitung lecture_id berdasarkan course_id dan student_id
        $results = DB::table('student_emotion')
            ->join('lectures', 'student_emotion.lecture_id', '=', 'lectures.id')
            ->select('student_emotion.lecture_id','lectures.title', DB::raw('COUNT(*) as total'))
            ->where('student_emotion.course_id', $course_id)
            ->where('student_emotion.student_id', $student_id)
            ->groupBy('student_emotion.lecture_id')
            ->get();
        
        // Mengembalikan hasil dalam format JSON
        return response()->json($results);
    }

    public function tests(Request $request,$id){

        $this->data['tests'] = $this->getSessionTestsObjects($id);
        $this->data['allTests'] = $this->getSessionTests($id);
        //get studentlist


        $this->data['controller'] = $this;
        $this->data['testGradeTable'] = new TestGradeTable();
        $this->data['pageTitle'] = __lang('Test Report').': '.Course::find($id)->name;

        $attendanceTable = new AttendanceTable();
        $this->data['rowset'] = $attendanceTable->getStudentSessionReportRecords($id);
        $this->data['session']= Course::find($id);

        return view('admin.report.tests',$this->data);
    }

    public function homework(Request $request,$id){

        $session = Course::findOrFail($id);
        $this->data['session'] = $session;

        $this->data['pageTitle'] = __lang('Homework Report').': '.$session->name;
        $this->data['controller'] = $this;
        $attendanceTable = new AttendanceTable();
        $this->data['rowset'] = $attendanceTable->getStudentSessionReportRecords($id);
        $this->data['testGradeTable'] = new TestGradeTable();


        return view('admin.report.homework',$this->data);
    }

    public function reportcard(Request $request,$id){

        $sessionId = $request->get('sessionId');
        $this->data['tests'] = $this->getSessionTestsObjects($sessionId);
        $this->data['allTests'] = $this->getSessionTests($sessionId);
        //get studentlist


        $this->data['controller'] = $this;
        $this->data['testGradeTable'] = new TestGradeTable();
        $student = Student::find($id);
        $this->data['student'] = $student;
        $this->data['session'] = Course::find($sessionId);
        $this->data['baseUrl'] = $this->getBaseUrl();
        $html = view('admin.report.reportcard',$this->data)->toHtml();
        $fileName = safeUrl($student->first_name.' '.$student->last_name.' report '.$this->data['session']->name).'.pdf';
        $orientation = 'portrait';
        if(useDomPdf())
        {
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new Dompdf($options);

            $dompdf->loadHtml($html);


            $dompdf->setPaper('A4', $orientation);
            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            $dompdf->stream($fileName);


            exit();
        }
        else{

            $pdf = App::make('snappy.pdf.wrapper');
            $pdf->loadHTML($html)->setPaper('a4')->setOrientation($orientation)->setOption('disable-smart-shrinking',true);
            return $pdf->download($fileName);
        }


    }



    public function getStudentTestsStats($studentId){

        $totalTaken = 0;
        $scores = 0;


        foreach($this->data['allTests'] as $testId){
            $studentTest = StudentTest::where('student_id',$studentId)->where('test_id',$testId)->orderBy('score','desc')->first();
            if($studentTest){
                $totalTaken++;
                $scores += $studentTest->score;
            }
        }

        if(!empty($totalTaken)){
            return [
                'testsTaken'=>$totalTaken,
                'average' => ($scores/$totalTaken)
            ];
        }
        else{
            return [
                'testsTaken'=>$totalTaken,
                'average' => 0
            ];
        }


    }

    public function getStudentAssignmentStats($studentId){
        $session= $this->data['session'];
        $totalTaken = 0;
        $scores = 0;

        foreach($session->assignments as $assignment){
            $submission= AssignmentSubmission::where('student_id',$studentId)->where('assignment_id',$assignment->assignment_id)->orderBy('grade','desc')->first();
            if($submission){
                $totalTaken++;
                $scores+=$submission->grade;
            }
        }



        if(!empty($totalTaken)){
            return [
                'submissions'=>$totalTaken,
                'average' => ($scores/$totalTaken)
            ];
        }
        else{
            return [
                'submissions'=>$totalTaken,
                'average' => 0
            ];
        }


    }

    public function getStudentTotalPosts($studentId){
        $student = Student::find($studentId);
        if(!$student){
            return 0;
        }
        $total = 0;

        foreach($this->data['session']->forumTopics as $topic){

            foreach($topic->forumPosts()->where('user_id',$student->user_id)->get() as $row){
                $total++;
            }

        }
        return $total;
    }

    private function getSessionTests($sessionId){
        $session = Course::find($sessionId);
        //create list of tests for this session
        $allTests = [];
        foreach($session->tests as $test){
            $allTests[$test->id] = $test->id;
        }

        foreach($session->lessons as $lesson){

            if( $lesson && !empty($lesson->test_id) && !empty($lesson->test_required) && Test::find($lesson->test_id)){
                $allTests[$lesson->test_id] = $lesson->test_id;
            }

        }
        return $allTests;
    }

    private function getSessionTestsObjects($sessionId){
        $testIds = $this->getSessionTests($sessionId);
        $objects = [];
        foreach($testIds as $id)
        {
            $test = Test::find($id);
            if($test){
                $objects[] = $test;
            }
        }
        return $objects;
    }

    public function laporan($course_id)
    {
        $filter = request()->get('filter');
        $course = $course_id;
        // $kelas  = $department;
        // Mengambil judul pelajaran berdasarkan course_id
        $materi = DB::table('course_lesson')
                    ->join('lectures', 'course_lesson.lesson_id', '=', 'lectures.lesson_id')
                    ->select('lectures.title', 'lectures.id')
                    ->where('course_lesson.course_id', $course)
                    ->get(); // Mengambil data judul dan ID materi

        if ($materi->isEmpty()) {
            // Menangani jika materi kosong, misal log atau kembalikan pesan ke view
            return redirect()->back()->with('error', 'Data materi tidak ditemukan.');
        }
    
        // Inisialisasi array untuk CASE expressions
        $countStatements   = [];
        $emotionStatements = [];
        $avgStatements     = [];
        $totalSleepy       = [];
        $tanggalStatements = [];

        // Membuat CASE expressions untuk setiap materi
        foreach ($materi as $data) {
            $judul = $data->title;
            $lectureId = $data->id; // Menggunakan lecture_id dari data
        

            $countStatements[] = DB::raw("
                COALESCE(
                    (SELECT COUNT(*)
                     FROM student_emotion
                     WHERE student_emotion.student_id = students.id
                     AND student_emotion.lecture_id = $lectureId),
                    0
                ) AS `count_$judul`
            ");

            $emotionStatements[] = DB::raw("
            (
                SELECT emotion
                FROM student_emotion
                WHERE student_emotion.student_id = students.id
                AND student_emotion.lecture_id = $lectureId
                ORDER BY waktu_akses DESC
                LIMIT 1
            ) AS `emotion_$judul`
        ");

        $tanggalStatements[] = DB::raw("
            (
                SELECT updated_at
                FROM student_emotion
                WHERE student_emotion.student_id = students.id
                AND student_emotion.lecture_id = $lectureId
                ORDER BY waktu_akses DESC
                LIMIT 1
            ) AS `tanggal_$judul`
        ");

        $lamaStatements[] = DB::raw("
            (
                SELECT lamaWaktu
                FROM student_emotion
                WHERE student_emotion.student_id = students.id
                AND student_emotion.lecture_id = $lectureId
                ORDER BY waktu_akses DESC
                LIMIT 1
            ) AS `lama_$judul`
        ");

        }


         // Jika tidak ada data CASE yang terbentuk, bisa kembalikan error
        if (empty($countStatements) && empty($emotionStatements) && empty($tanggalStatements) && empty($lamaStatements)) {
            return redirect()->back()->with('error', 'Tidak ada data untuk diproses.');
        }

        $caseStatements = array_merge($countStatements, $emotionStatements, $tanggalStatements, $lamaStatements);

        //Bangun query utama
        $result = DB::table('students')
            ->select(
                'students.id AS id',
                'users.name AS nama_siswa',
                'users.email AS NIP',
                'student_tests.score AS Ujian',
                ...$caseStatements
                
            )
            ->leftJoin('users', 'students.user_id', '=', 'users.id')
            ->leftJoin('student_tests', 'students.id', '=', 'student_tests.student_id')
            ->leftJoin('student_lectures', 'students.id', '=', 'student_lectures.student_id')
            ->leftJoin('lectures', 'student_lectures.lecture_id', '=', 'lectures.id')
            ->leftJoin('student_courses','students.id','=','student_courses.student_id')
            // ->where('students.department', $department)
            ->where('student_courses.course_id', $course_id);
            // Tambahkan filter pencarian jika ada input
    if (!empty($filter)) {
        $result = $result->where(function($query) use ($filter) {
            $query->where('users.name', 'LIKE', "%$filter%")
                  ->orWhere('users.email', 'LIKE', "%$filter%");
        });
    }

    $result = $result->groupBy('users.name', 'users.email', 'student_tests.score')->get();
            

           
            if ($result->isEmpty()) {
                // Jika hasil query kosong, bisa lakukan redirect atau kembalikan pesan ke view
                return redirect()->back()->with('alert', 'Belum ada siswa yang melakukan enroll untuk materi dengan kategori gaya belajar ini');
            }

        // Kembalikan hasil ke view
        return view('admin.report.laporan', compact('result', 'course'));
    }
    
    public function kesimpulan(Request $request)
    {
        $course_id = $request->input('course_id');
        $student_id = $request->input('student_id');

        $results = DB::table('student_emotion as se')
                    ->join('lectures', 'se.lecture_id', '=', 'lectures.id')
                    ->join(DB::raw('(SELECT lecture_id, MAX(waktu_akses) AS latest_time 
                    FROM student_emotion 
                    WHERE course_id = '.$course_id.' AND student_id = '.$student_id.' 
                    GROUP BY lecture_id) as latest'), 
         function($join) {
             $join->on('se.lecture_id', '=', 'latest.lecture_id')
                  ->on('se.waktu_akses', '=', 'latest.latest_time');
         })
                    ->select('se.course_id', 'lectures.title', 'se.lecture_id', 'se.waktu_akses AS latest_time', 'se.updated_at', 'se.emotion')
                    ->where('se.course_id', $course_id)
                    ->where('se.student_id', $student_id)
                    ->groupBy('se.lecture_id')
                    ->get();

        return response()->json($results);
        
    }

    private function processEmotionData($results)
    {
        // Inisialisasi array untuk menyimpan data emosi
        $emotionData = [];

        // Mengisi data emosi
        foreach ($results as $result) {
            $emotion = $result->emotion;
            $percentage = floatval(str_replace('%', '', $result->lama)); // Mengonversi persentase ke angka

            if (!isset($emotionData[$emotion])) {
                $emotionData[$emotion] = [0, 0]; // Inisialisasi dengan dua nilai
            }
            
            // Update nilai berdasarkan tanggal atau kondisi lain jika perlu
            // Misalnya, menggunakan lamaWaktu atau field lain untuk membedakan data
            $emotionData[$emotion][0] = $percentage; // Data pertama
            $emotionData[$emotion][1] = $percentage; // Data kedua (misalnya, bisa disesuaikan)
        }

        // Mengubah array emosi menjadi format yang diinginkan untuk Chart.js
        $combinedArray = [];
        foreach ($emotionData as $emotion => $values) {
            $combinedArray[] = [$emotion, $values];
        }

        return $combinedArray;
    }

    public function kelas()
    {
        $hasil = DB::table('students')
                ->select('department')
                ->groupBy('department')
                ->get();
        return view('admin.report.kelas', compact('hasil'));
    }

    public function detail_kelas()
{
    // $kelas = $department;
    $role = DB::table('admins')
            ->where('id', $this->getAdministratorID())
            ->first();
    $role_id = $role->id;

    // Define the base query
    $courseQuery = DB::table('courses')
        ->join('course_course_category', 'courses.id', '=', 'course_course_category.course_id')
        ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
        ->join('admin_course','courses.id','=','admin_course.course_id')
        ->select('courses.id as id', 'courses.name as name', 'course_categories.name as kategori');

    // Add condition if the role is not admin (role_id != 1)
    if ($role_id != 1) {
        $courseQuery->where('admin_course.admin_id', $this->getAdministratorID());
        $data = [
            'Audio' => DB::table('student_courses')
                ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
                ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
                ->join('admin_course','student_courses.course_id','=','admin_course.course_id')
                ->where('course_categories.name', 'Audio')
                ->where('admin_course.admin_id', $this->getAdministratorID())
                ->count('student_courses.id'),
    
            'Visual' => DB::table('student_courses')
                ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
                ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
                ->join('admin_course','student_courses.course_id','=','admin_course.course_id')
                ->where('course_categories.name', 'Visual')
                ->where('admin_course.admin_id', $this->getAdministratorID())
                ->count('student_courses.id'),
    
            'Kinestetik' => DB::table('student_courses')
                ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
                ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
                ->join('admin_course','student_courses.course_id','=','admin_course.course_id')
                ->where('course_categories.name', 'Kinestetik')
                ->where('admin_course.admin_id', $this->getAdministratorID())
                ->count('student_courses.id')
        ];
    }else{
        $data = [
            'Audio' => DB::table('student_courses')
                ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
                ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
                ->where('course_categories.name', 'Audio')
                ->count('student_courses.id'),
    
            'Visual' => DB::table('student_courses')
                ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
                ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
                ->where('course_categories.name', 'Visual')
                ->count('student_courses.id'),
    
            'Kinestetik' => DB::table('student_courses')
                ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
                ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
                ->where('course_categories.name', 'Kinestetik')
                ->count('student_courses.id')
        ];
    }

    // $nilai = DB::table('student_courses')
    // ->join('student_tests', 'student_courses.student_id', '=', 'student_tests.student_id')
    // ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
    // ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
    // ->join('students', 'student_tests.student_id', '=', 'students.id')
    // ->select(
    //     'student_courses.course_id as course_id',
    //     'course_categories.name as kategori',
    //     DB::raw('ROUND(AVG(student_tests.score), 1) as rata_rata')
    // )
    // // ->where('students.department', $department)
    // ->groupBy('course_categories.name')
    // ->get();

    // Sort data by value from lowest to highest
    asort($data);

    // Separate the labels and values for the chart
    $labels = array_keys($data);
    $values = array_values($data);

    // Prepare summary text
    $summary = [];
    foreach ($data as $style => $count) {
        $summary[] = "<strong>{$style}</strong>: {$count} Siswa";
    }
    $summaryText = implode(', ', $summary);
    // $manual = DB::table('student_tests')
    //             ->select(DB::raw('ROUND(AVG(student_tests.score), 1) as rata_rata'))
    //             ->where('student_id');

    // $manual = DB::table('student_tests')
    //             ->leftJoin('student_courses', 'student_tests.student_id','=','student_courses.student_id')
    //             ->whereNull('student_courses.student_id')
    //             ->avg('student_tests.score');
    // $categories = ['audio', 'visual', 'kinestetik'];
    // $data = [];

    // Initialize the data with default values
    // foreach ($categories as $category) {
    //     $data[$category] = 0; // Default to 0
    // }

    // Fill in the actual averages from the query
    // foreach ($nilai as $item) {
    //     $data[$item->kategori] = $item->rata_rata; // Assign average scores
    // }

    // $data['manual'] = $manual;

    // Execute the query
    $course = $courseQuery->get();

    return view('admin.report.detail_kelas', compact('course', 'labels', 'values','summaryText'));
}

public function pilih_laporan()
    {
        return view('admin.report.auto_manual');
    }

public function rekap()
{
    $filter = request()->get('filter');

    // Ambil data dari berbagai tabel
    $query = DB::table('student_courses')
        ->join('students', 'student_courses.student_id', '=', 'students.id')
        ->join('student_tests', 'student_courses.student_id', '=', 'student_tests.student_id')
        ->join('course_course_category', 'student_courses.course_id', '=', 'course_course_category.course_id')
        ->join('course_categories', 'course_course_category.course_category_id', '=', 'course_categories.id')
        ->join('users', 'students.user_id', '=', 'users.id')
        ->join('courses','student_courses.course_id','=','courses.id')
        ->join('kuesioner_status','users.id','=','kuesioner_status.user_id')
        ->leftJoin('student_emotion', function($join) {
            $join->on('student_courses.student_id', '=', 'student_emotion.student_id')
                ->on('student_courses.course_id', '=', 'student_emotion.course_id');
        })
        ->select(
            'students.id as id',
            'users.name as student_name',
            'users.email as nrp', 
            'course_categories.name as category_name', 
            'student_tests.score', 
            'student_courses.student_id', 
            'student_courses.course_id',
            'kuesioner_status.status_belajar as gaya_belajar',
            'student_emotion.emotion as emotion_data' // Ambil data emosi dari tabel student_emotion
        );

    // Filter berdasarkan nama atau email
    if (!empty($filter)) {
        $query->where(function($tes) use ($filter) {
            $tes->where('users.name', 'LIKE', "%$filter%")
                ->orWhere('users.email', 'LIKE', "%$filter%");
        });
    }

    // Cek peran admin
    $role = DB::table('admins')
                ->where('id', $this->getAdministratorID())
                ->first();
    $role_id = $role->id;

    // Tambahkan kondisi jika role bukan admin (role_id != 1)
    if ($role_id != 1) {
        $query->where('courses.admin_id', $this->getAdministratorID());
    }

    // Group by dan order sebelum paginasi
    $query->groupBy('student_courses.student_id', 'course_categories.name')
        ->orderBy('student_tests.score', 'desc');

    // Ambil hasil dengan paginasi
    $hasil = $query->get();

    // Inisialisasi array untuk menyimpan emosi dan skor tertinggi per kategori
    $categoryEmotions = [];
    $categoryScores = [];

    // Proses data hasil untuk menghitung emosi tertinggi berdasarkan kategori
    foreach ($hasil as $data) {
        if (!empty($data->emotion_data)) {
            // Ubah JSON string menjadi array
            $emotions = json_decode($data->emotion_data, true);

            // Inisialisasi variabel untuk menyimpan emosi tertinggi
            $highestEmotion = null;
            $highestPercentage = 0;

            // Loop untuk mencari emosi tertinggi
            foreach ($emotions as $emotion) {
                // Ambil nilai persentase dan konversi ke float, hilangkan simbol "%"
                $percentage = floatval(rtrim($emotion[1], '%'));

                // Jika persentasenya lebih tinggi, perbarui emosi tertinggi
                if ($percentage > $highestPercentage) {
                    $highestPercentage = $percentage;
                    $highestEmotion = $emotion[0]; // Nama emosi dengan persentase tertinggi
                }
            }

            // Simpan emosi tertinggi ke dalam data hasil
            $data->highest_emotion = $highestEmotion;
            $data->highest_percentage = $highestPercentage;

            // Periksa apakah kategori sudah ada di array emosi
            if (!isset($categoryEmotions[$data->category_name])) {
                // Jika belum ada, inisialisasi kategori dengan data pertama
                $categoryEmotions[$data->category_name] = [
                    'emotion' => $highestEmotion,
                    'percentage' => $highestPercentage,
                ];
            } else {
                // Jika sudah ada, periksa apakah persentase baru lebih tinggi
                if ($highestPercentage > $categoryEmotions[$data->category_name]['percentage']) {
                    $categoryEmotions[$data->category_name] = [
                        'emotion' => $highestEmotion,
                        'percentage' => $highestPercentage,
                    ];
                }
            }

            // Simpan nilai tertinggi berdasarkan kategori
            if (!isset($categoryScores[$data->category_name])) {
                $categoryScores[$data->category_name] = $data->score;
            } else {
                if ($data->score > $categoryScores[$data->category_name]) {
                    $categoryScores[$data->category_name] = $data->score;
                }
            }
        } else {
            // Jika tidak ada data emosi, set default
            $data->highest_emotion = 'N/A';
            $data->highest_percentage = 0;
        }
    }

    // Ambil hanya satu data per student_id dengan highest_percentage tertinggi
    $uniqueStudents = [];

    foreach ($hasil as $data) {
        $studentId = $data->student_id;

        if (!isset($uniqueStudents[$studentId])) {
            $uniqueStudents[$studentId] = $data;
        } else {
        if ($data->highest_percentage > $uniqueStudents[$studentId]->highest_percentage) {
            $uniqueStudents[$studentId] = $data;
            }
        }
    }

    // Ambil array numerik
    $filteredHasil = array_values($uniqueStudents);
    $nilai_sikap = DB::table('student_sikap')
                    ->get();
    // Return view dengan data hasil yang sudah diproses dan data emosi per kategori serta nilai tertinggi per kategori
    return view('admin.report.rekap', compact('filteredHasil', 'categoryEmotions', 'categoryScores','nilai_sikap'));
}

public function rekap_manual()
    {
        $filter = request()->get('filter');
        $manual = DB::table('student_tests')
                ->leftJoin('student_courses', 'student_tests.student_id', '=', 'student_courses.student_id')
                ->join('students','student_tests.student_id','=','students.id')
                ->join('users','students.user_id','=','users.id')
                ->select('users.name','users.email','student_tests.*')
                ->whereNull('student_courses.student_id')
                ->orderBy('student_tests.score', 'DESC');

                if (!empty($filter)) {
                    $manual->where(function($tes) use ($filter) {
                        $tes->where('users.name', 'LIKE', "%$filter%")
                            ->orWhere('users.email', 'LIKE', "%$filter%");
                    });
                }
            
                $manual = $manual->get();

                $averageScore = DB::table('student_tests')
                        ->leftJoin('student_courses', 'student_tests.student_id', '=', 'student_courses.student_id')
                        ->whereNull('student_courses.student_id')
                        ->avg('student_tests.score');

                $maxScore = DB::table('student_tests')
                        ->leftJoin('student_courses', 'student_tests.student_id', '=', 'student_courses.student_id')
                        ->whereNull('student_courses.student_id')
                        ->max('student_tests.score');

        return view('admin.report.rekap_manual', compact('manual', 'averageScore','maxScore'));
    }

}
